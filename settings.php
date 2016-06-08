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
 * @subpackage customtotararesponsive
 */

/**
 * Settings for the customtotararesponsive theme
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Logo file setting.
    $name = 'theme_THEMENAME/logo';
    $title = new lang_string('logo', 'theme_THEMENAME');
    $description = new lang_string('logodesc', 'theme_THEMENAME');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Logo alt text.
    $name = 'theme_THEMENAME/alttext';
    $title = new lang_string('alttext', 'theme_THEMENAME');
    $description = new lang_string('alttextdesc', 'theme_THEMENAME');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Favicon file setting.
    $name = 'theme_THEMENAME/favicon';
    $title = new lang_string('favicon', 'theme_THEMENAME');
    $description = new lang_string('favicondesc', 'theme_THEMENAME');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0, array('accepted_types' => '.ico'));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Link colour setting.
    $name = 'theme_THEMENAME/linkcolor';
    $title = new lang_string('linkcolor', 'theme_THEMENAME');
    $description = new lang_string('linkcolordesc', 'theme_THEMENAME');
    $default = '#087BB1';
    $previewconfig = array('selector' => 'a', 'style' => 'color');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    //Link visited colour setting.
    $name = 'theme_THEMENAME/linkvisitedcolor';
    $title = new lang_string('linkvisitedcolor', 'theme_THEMENAME');
    $description = new lang_string('linkvisitedcolordesc', 'theme_THEMENAME');
    $default = '#087BB1';
    $previewconfig = array('selector' => 'a:visited', 'style' => 'color');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Page header background colour setting.
    $name = 'theme_THEMENAME/headerbgc';
    $title = new lang_string('headerbgc', 'theme_THEMENAME');
    $description = new lang_string('headerbgcdesc', 'theme_THEMENAME');
    $default = '#F5F5F5';
    $previewconfig = array('selector' => '#page-header', 'style' => 'backgroundColor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Button colour setting.
    $name = 'theme_THEMENAME/buttoncolor';
    $title = new lang_string('buttoncolor','theme_THEMENAME');
    $description = new lang_string('buttoncolordesc', 'theme_THEMENAME');
    $default = '#E6E6E6';
    $previewconfig = array('selector'=>'input[\'type=submit\']]', 'style'=>'background-color');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Custom CSS file.
    $name = 'theme_THEMENAME/customcss';
    $title = new lang_string('customcss','theme_THEMENAME');
    $description = new lang_string('customcssdesc', 'theme_THEMENAME');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

}
