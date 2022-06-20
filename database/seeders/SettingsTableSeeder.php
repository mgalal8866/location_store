<?php

namespace Database\Seeders;

use App\Models\setting;
use Illuminate\Database\Seeder;
use Spatie\Valuestore\Valuestore;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        setting::create(['display_name' => 'Site title', 'key' => 'site_title', 'value' => 'Location Store', 'type' => 'text', 'section' => 'general', 'ordering' => 1]);
        setting::create([ 'display_name' => 'Site Slogan', 'key' => 'site_slogan', 'value' => 'Location Store', 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 2]);
        setting::create([ 'display_name' => 'Site Description', 'key' => 'site_description', 'value' => 'Location Store', 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 3]);
        setting::create([ 'display_name' => 'Site Keywords', 'key' => 'site_keywords', 'value' => 'Location Store', 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 4]);
        setting::create([ 'display_name' => 'Site Email', 'key' => 'site_email', 'value' => 'locationstore@support.com', 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 5]);
        setting::create([ 'display_name' => 'locationstore@support.com', 'key' => 'splash_screen', 'value' => 'Active', 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 6]);
        setting::create([ 'display_name' => 'Phone Number', 'key' => 'phone_number', 'value' => '05123456789', 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 7]);
        setting::create([ 'display_name' => 'app_new_branch', 'key' => 'app_new_branch', 'value' => 10, 'details' => null, 'type' => 'text', 'section' => 'pages', 'ordering' => 1]);
        setting::create([ 'display_name' => 'app_pag', 'key' => 'app_pag', 'value' => 10, 'details' => null, 'type' => 'text', 'section' => 'pages', 'ordering' => 2]);
        setting::create([ 'display_name' => 'app_page_branch', 'key' => 'app_page_branch', 'value' => 10, 'details' => null, 'type' => 'text', 'section' => 'pages', 'ordering' => 3]);
        setting::create([ 'display_name' => 'app_pagforsearch_branch', 'key' => 'app_pagforsearch_branch', 'value' => 10, 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 8]);
        setting::create([ 'display_name' => 'footer_text', 'key' => 'footer_text', 'value' => '<strong>Copyright &copy; 2022 <a href="01024346011">Mohamed Galal</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.2.0-rc
        </div>', 'details' => null, 'type' => 'text', 'section' => 'site', 'ordering' => 1]);

        $settings = Valuestore::make(config_path('settings.json'));
        $settings->put('splash', 'https://locationstor.com/assets/images/photo-1557682257-2f9c37a3a5f3.jpg');



        generateCache();

    }

}
