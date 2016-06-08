<<<<<<< HEAD
# Setup (brand new theme only)
 1. create a directory in htdocs/theme/ using acceptable Totara naming conventions, eg; 'catholichealthcare', this name is referred to as `themename` in the following steps
 2. clone this repository into that directory, ensuring that another root subfolder is *not* created, eg; 'htdocs/theme/themename/CLONED_FILES_HERE' should be the expected structure
 3. run `git checkout -b j000-themename-theme`, to create your own theme branch 
 4. run `npm install`, to set up build dependencies & tools
 5. update the values in `grunt_config.json`:
    - `projectTitle` will be the name of your theme, and should match the directory name you chose for your theme
    - `projectId` is the WorkflowMax job number for this theme
    - `themeVersion` is the Totara version being deployed for the client, triple check you have this right
 6. run `grunt theme`, to rename all templated files to your theme name
 7. run `grunt watch`, to listen for file changes that you make
 8. start editing your theme config files where required, then LESS files
 9. commit your changes using logical, [atomic commits](https://en.wikipedia.org/wiki/Atomic_commit), with meaningful commit messages that will provide context for yourself and others later on
 10. run `git push -u origin j000-themename-theme`, to add your branch to this remote repository
 11. run `grunt build` to create a zip file containing only relevant files
 12. [[[TBC - upload your package to Box.com as a snapshot / create a Git tag? ]]]

# Notes
 - your Git branch name should use our associated WorkflowMax job number, replacing the `j000` part
 - running step 6. will rename quite a few file names and file content parts - ensure you do this part correctly. If you fail, delete the entire git branch and start again
 - running step 10. will push your branch to the remote server - this only needs to happen once
 - running step 11. will automatically re-version your Theme which will then trigger a plugin upgrade once deployed to a Totara instance
=======
# my-open-git-practice
>>>>>>> 545c9fef782f02e1cc47ea46573b74745258854a
