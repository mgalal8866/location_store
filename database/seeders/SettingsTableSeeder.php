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
        setting::create([ 'display_name' => 'Site Email', 'key' => 'site_email', 'value' => 'admin@bloggi.test', 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 5]);
        setting::create([ 'display_name' => 'Splash Screen', 'key' => 'splash_screen', 'value' => 'Active', 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 6]);
        setting::create([ 'display_name' => 'Phone Number', 'key' => 'phone_number', 'value' => '05123456789', 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 7]);
        setting::create([ 'display_name' => 'app_new_branch', 'key' => 'app_new_branch', 'value' => 10, 'details' => null, 'type' => 'text', 'section' => 'pages', 'ordering' => 1]);
        setting::create([ 'display_name' => 'app_pag', 'key' => 'app_pag', 'value' => 10, 'details' => null, 'type' => 'text', 'section' => 'pages', 'ordering' => 2]);
        setting::create([ 'display_name' => 'app_page_branch', 'key' => 'app_page_branch', 'value' => 10, 'details' => null, 'type' => 'text', 'section' => 'pages', 'ordering' => 3]);
        setting::create([ 'display_name' => 'app_pagforsearch_branch', 'key' => 'app_pagforsearch_branch', 'value' => 10, 'details' => null, 'type' => 'text', 'section' => 'pages', 'ordering' => 4]);
        setting::create([ 'display_name' => 'backuptime', 'key' => 'backup_time', 'value' => '(* * * * *)', 'details' => null, 'type' => 'text', 'section' => 'schedule', 'ordering' => 1]);
        // setting::create([ 'display_name' => 'backuptime', 'key' => 'backup_time', 'value' => '(* * * * *)', 'details' => null, 'type' => 'text', 'section' => 'schedule', 'ordering' => 1]);
        // setting::create([ 'display_name' => 'backuptime', 'key' => 'backup_time', 'value' => '(* * * * *)', 'details' => null, 'type' => 'text', 'section' => 'schedule', 'ordering' => 1]);



        // setting::create([ 'display_name' => 'Map Latitude', 'key' => 'address_latitude', 'value' => '21.671914', 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 10]);
        // setting::create([ 'display_name' => 'Map Longitude', 'key' => 'address_longitude', 'value' => '39.173875', 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 11]);

        // setting::create([ 'display_name' => 'Google Maps API Key', 'key' => 'google_maps_api_key', 'value' => null, 'details' => null, 'type' => 'text', 'section' => 'social_accounts', 'ordering' => 1]);
        // setting::create([ 'display_name' => 'Google Recaptcha API Key', 'key' => 'google_recaptcha_api_key', 'value' => null, 'details' => null, 'type' => 'text', 'section' => 'social_accounts', 'ordering' => 2]);
        // setting::create([ 'display_name' => 'Google Analytics Client ID', 'key' => 'google_analytics_client_id', 'value' => null, 'details' => null, 'type' => 'text', 'section' => 'social_accounts', 'ordering' => 3]);
        // setting::create([ 'display_name' => 'Facebook ID', 'key' => 'facebook_id', 'value' => 'https://www.facebook.com/mindscms123', 'details' => null, 'type' => 'text', 'section' => 'social_accounts', 'ordering' => 4]);
        // setting::create([ 'display_name' => 'Twitter ID', 'key' => 'twitter_id', 'value' => 'https://twitter.com/mindscms', 'details' => null, 'type' => 'text', 'section' => 'social_accounts', 'ordering' => 5]);
        // setting::create([ 'display_name' => 'Instagram ID', 'key' => 'instagram_id', 'value' => 'https://instagram.com/mindscms', 'details' => null, 'type' => 'text', 'section' => 'social_accounts', 'ordering' => 6]);
        // setting::create([ 'display_name' => 'Patreon ID', 'key' => 'flickr_id', 'value' => 'https://www.patreon.com/mindscms', 'details' => null, 'type' => 'text', 'section' => 'social_accounts', 'ordering' => 7]);
        // setting::create([ 'display_name' => 'Youtube ID', 'key' => 'youtube_id', 'value' => 'https://www.youtube.com/mindscms', 'details' => null, 'type' => 'text', 'section' => 'social_accounts', 'ordering' => 8]);
        generateCache();

    }

}
