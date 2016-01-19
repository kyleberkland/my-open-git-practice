module.exports = function(grunt) {

  require('time-grunt')(grunt);

  var package = require('./grunt_config.json');
  var _themeReplaceName = 'THEMENAME';

  grunt.initConfig({

    settings: package,

    connect: {
      server: {
        options: {
          port: 8001,
          base: '.',
          keepalive:true
        }
      }
    },

/*
    // Uglify Kineo raw JS
    uglify: {
      options: {
        report: 'min'
      },
      main:{
        src: [ 'src/js/kineo/raw/*.js' ],
        dest: 'src/js/kineo/kineo.min.js'
      }
    },
*/

    // make a zipfile
    compress: {
      main: {
        options: {
          mode: 'zip', // zip it, plz
          archive: '<%= settings.projectId %>_<%= settings.projectTitle %>_t<%= settings.themeVersion %>_<%= grunt.option("timestamp") %>.zip', // in build/
          pretty: 'true' // tell me the filesize of the archive
        },
        files: [
          {
            expand: true, // required
            cwd: './', // current working directory
            src: [
              '**/**', // any folders or sub folders, any files
              '!**.zip','!**/*.7z', // except compressed files
              '!**/.git/**','!**/#assets/**','!**/node_modules/**','!**/*.sql','!README.md', '!**/style/less/**','!.gitignore','!package.json','!grunt_config.json','!Gruntfile.js' // exclude build related files
            ],
            dest: '<%= settings.projectTitle %>/'
          }
        ]
      }
    },


    // Compile LESS to CSS
    less: {
      options: {
        ieCompat: true,
        report: 'min'
      },
      development: {
        options: {
          cleancss: false,
          sourceMap: false,
          //sourceMapFilename: 'src/css/custom.map',
          //sourceMapRootpath: '.'
        },
        files: {
          // target.css file: source.less file
          'style/custom.css': 'style/less/_collection.less'
        }

      }
    },

    watch: {
      styles: {
        // Which files to watch (all .less files recursively in the less directory)
        files: ['style/less/*.less'],
        tasks: ['less:development'],
        options: {
          nospawn: true
        }
      },
/*
      js: {
        files: ['src/js/kineo/raw/*.js'],
        tasks: ['uglify'],
        options: {
          nospawn: true
        }
      }
*/
    },

    // 
    version: {
      moodleVersion: {
        src: ['version.php'],
        overwrite: true,
        replacements: [
          {
            from: /$plugin->version = '[^']*';/g,
            to: '$plugin->version = <%= grunt.option("timestamp") %>00;'
          }
        ]
      }
    },

    copy: {
      renameStubFilesAndContents: {
        files: [
          {
            expand: true,
            filter: 'isFile',
            cwd: './', 
            src: ['**','!**/*.json','!**/.git/**','!**/node_modules/**','!**/*.sql','!README.md','!**/*.png','!**/*.jpg','!**/*.gif','!**/*.svg'],
            dest: './',
            rename: function(dest, src) {

              var replaceValue = _themeReplaceName;
              var start = src.search(replaceValue);
              var end = start + replaceValue.length;

              if (start === -1) {
                return src;
              }

              var returnVal = dest + src.substring(0, start) + package.projectTitle + src.substring(end);

              grunt.log.writeln(returnVal);

              return returnVal;
            }

          }
        ],

        options: {
          process: function (content, srcpath) {

            var newContent = content.split(_themeReplaceName).join(package.projectTitle);
            grunt.log.writeln('Processing ' + srcpath + 'for ' + _themeReplaceName + 'replacement...');

            return newContent;
          },
        }

      }
    },

    // clean: {
    //   removeStubFiles: {
    //     src: ['tmp/**/*'],
    //     filter: function(filepath) {
    //       return (grunt.file.isDir(filepath) && require('fs').readdirSync(filepath).length === 0);
    //     },
    //   }
    // }

  });

  // Load all files starting with `grunt-`
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.option('timestamp', grunt.template.today('yyyymmdd'));

  // deployment related tasks
  grunt.registerTask('build', 'Build tasks.', function() {

    grunt.task.run(
      'less:development'
    );
  });

  grunt.registerTask('package', 'Package tasks.', function() {

    grunt.task.run(
      'compress:main'
    );
  });

/*
  grunt.registerTask('dev', 'Dev tasks.', function(moduleID) {
    // Check if we are sending a module ID to the dev task
    if (moduleID == null) {
      grunt.warn('A module ID must be specified, like build:m00');
    }
    utils.checkValidMod(moduleID);
    // Set grunt.option 'modID' to whatever we just passed to dev task
    grunt.option('modID', moduleID);
    grunt.task.run(
      //'clean:build',
      'copy:common',
      'copy:specific',
      'less:development',
      'replace:indexdev',
      'watch'
    );
  });
*/
  grunt.registerTask('theme', 'Rename theme files, directories and file contents..', function () {

    // check that there is a projectTitle grunt config option defined
    // TODO: also check that a projectTitle does not already exist, as it would conflict with another theme
    if (!package.projectTitle || !package.projectId) {
      grunt.warn('A projectTitle and projectId must be specified in grunt_config.json');
      return;
    }

    grunt.task.run(
      'copy:renameStubFilesAndContents'
      //'clean:removeStubFiles'
    );

  });

  grunt.registerTask('server', [
    'connect'
  ]);

  grunt.registerTask('default', '', function(moduleID) {
      grunt.log.writeln('');
      grunt.log.ok('No task specified. See below for a list of available tasks.');
      grunt.log.writeln('');
      grunt.log.writeln('Note: tasks are listed in blue, mandatory parameters are in red, and optional parameters are in purple.');
      grunt.log.writeln('');
      writeTask('build', '', ':mod', 'Builds a production ready/minified version of the specified module.');
      writeTask('dev', '', ':mod', 'Creates a developer-friendly version of the specified module (including source maps).');

      // FYI: colors = 'white', 'black', 'grey', 'blue', 'cyan',
      //         'green', 'magenta', 'red', 'yellow', 'rainbow'
      function writeTask(name, mandParams, optParams, description) {
          grunt.log.writeln(name['cyan'].bold + mandParams['red'].bold + optParams['red']);
          grunt.log.writeln(description);
          grunt.log.writeln('');
      }
  });



  /**
   * processes a JSON config file into a stringified JSON value, then runs a replacement task to
   * update our K.SCO.CONFIG_SEED_STRING value
   * 
   * this event method surely isn't the best way: http://stackoverflow.com/questions/12063266/how-do-you-watch-multiple-files-but-only-run-task-on-changed-file-in-grunt-js
   * because https://github.com/gruntjs/grunt-contrib-watch notes that "If you're trying to run tasks
   * from within the watch event you're more than likely doing it wrong." the reason i'm going with
   * this, is because i cannot find a way to make use of the currently changed file from within the
   * task definition.
   * 
   * THEREFORE: keep in mind that the below event is GENERIC and fires with ANY watched file change,
   *            so the task routines must be suitably wrapped in specific checks to ensure they only
   *            execute under the right conditions.
  grunt.event.on('watch', function(action, filepath, target) {

    var fileName = utils.getFileName(filepath, true);

    if (fileName === 'kineo-scorm-config.json') {
      processConfigSeed(filepath);
    }

  });
  **/

};
