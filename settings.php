<?php
/*
 * This file is part of Totara LMS
 *
 * Copyright (C) 2010 onwards Totara Learning Solutions LTD
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Brian Barnes <brian.barnes@totaralms.com>
 * @package theme
 * @subpackage dfsnz
 */

/**
 * Settings for the dfsnz theme
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    // Favicon file setting.
    $name = 'theme_dfsnz/favicon';
    $title = new lang_string('favicon', 'theme_dfsnz');
    $description = new lang_string('favicondesc', 'theme_dfsnz');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0, array('accepted_types' => '.ico'));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Logo file setting.
    $name = 'theme_dfsnz/logo';
    $title = new lang_string('logo', 'theme_dfsnz');
    $description = new lang_string('logodesc', 'theme_dfsnz');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Logo alt text.
    $name = 'theme_dfsnz/alttext';
    $title = new lang_string('alttext', 'theme_dfsnz');
    $description = new lang_string('alttextdesc', 'theme_dfsnz');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Site text color
    $name = 'theme_dfsnz/textcolor';
    $title = get_string('textcolor', 'theme_dfsnz');
    $description = get_string('textcolor_desc', 'theme_dfsnz');
    $default = '#333366';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Link colour setting.
    $name = 'theme_dfsnz/linkcolor';
    $title = new lang_string('linkcolor', 'theme_dfsnz');
    $description = new lang_string('linkcolordesc', 'theme_dfsnz');
    $default = '#087BB1';
    $previewconfig = array('selector' => 'a', 'style' => 'color');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    //Link visited colour setting.
    $name = 'theme_dfsnz/linkvisitedcolor';
    $title = new lang_string('linkvisitedcolor', 'theme_dfsnz');
    $description = new lang_string('linkvisitedcolordesc', 'theme_dfsnz');
    $default = '#087BB1';
    $previewconfig = array('selector' => 'a:visited', 'style' => 'color');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Button colour setting.
    $name = 'theme_dfsnz/buttoncolor';
    $title = new lang_string('buttoncolor','theme_dfsnz');
    $description = new lang_string('buttoncolordesc', 'theme_dfsnz');
    $default = '#E6E6E6';
    $previewconfig = array('selector'=>'input[\'type=submit\']]', 'style'=>'background-color');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Site content background color.
    $name = 'theme_dfsnz/bodybackground';
    $title = get_string('bodybackground', 'theme_dfsnz');
    $description = get_string('bodybackground_desc', 'theme_dfsnz');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Background image setting.
    $name = 'theme_dfsnz/backgroundimage';
    $title = get_string('backgroundimage', 'theme_dfsnz');
    $description = get_string('backgroundimage_desc', 'theme_dfsnz');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Background repeat setting.
    $name = 'theme_dfsnz/backgroundrepeat';
    $title = get_string('backgroundrepeat', 'theme_dfsnz');
    $description = get_string('backgroundrepeat_desc', 'theme_dfsnz');;
    $default = 'repeat';
    $choices = array(
        '0' => get_string('default'),
        'repeat' => get_string('backgroundrepeatrepeat', 'theme_dfsnz'),
        'repeat-x' => get_string('backgroundrepeatrepeatx', 'theme_dfsnz'),
        'repeat-y' => get_string('backgroundrepeatrepeaty', 'theme_dfsnz'),
        'no-repeat' => get_string('backgroundrepeatnorepeat', 'theme_dfsnz'),
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Background position setting.
    $name = 'theme_dfsnz/backgroundposition';
    $title = get_string('backgroundposition', 'theme_dfsnz');
    $description = get_string('backgroundposition_desc', 'theme_dfsnz');
    $default = '0';
    $choices = array(
        '0' => get_string('default'),
        'left_top' => get_string('backgroundpositionlefttop', 'theme_dfsnz'),
        'left_center' => get_string('backgroundpositionleftcenter', 'theme_dfsnz'),
        'left_bottom' => get_string('backgroundpositionleftbottom', 'theme_dfsnz'),
        'right_top' => get_string('backgroundpositionrighttop', 'theme_dfsnz'),
        'right_center' => get_string('backgroundpositionrightcenter', 'theme_dfsnz'),
        'right_bottom' => get_string('backgroundpositionrightbottom', 'theme_dfsnz'),
        'center_top' => get_string('backgroundpositioncentertop', 'theme_dfsnz'),
        'center_center' => get_string('backgroundpositioncentercenter', 'theme_dfsnz'),
        'center_bottom' => get_string('backgroundpositioncenterbottom', 'theme_dfsnz'),
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Background fixed setting.
    $name = 'theme_dfsnz/backgroundfixed';
    $title = get_string('backgroundfixed', 'theme_dfsnz');
    $description = get_string('backgroundfixed_desc', 'theme_dfsnz');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Main content background color.
    $name = 'theme_dfsnz/contentbackground';
    $title = get_string('contentbackground', 'theme_dfsnz');
    $description = get_string('contentbackground_desc', 'theme_dfsnz');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Page header background colour setting.
    $name = 'theme_dfsnz/headerbgc';
    $title = new lang_string('headerbgc', 'theme_dfsnz');
    $description = new lang_string('headerbgcdesc', 'theme_dfsnz');
    $default = '#F5F5F5';
    $previewconfig = array('selector' => '#page-header', 'style' => 'backgroundColor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Footnote setting.
    $name = 'theme_dfsnz/footnote';
    $title = get_string('footnote', 'theme_dfsnz');
    $description = get_string('footnotedesc', 'theme_dfsnz');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Custom CSS file.
    $name = 'theme_dfsnz/customcss';
    $title = new lang_string('customcss','theme_dfsnz');
    $description = new lang_string('customcssdesc', 'theme_dfsnz');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);
}
