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
        // setting::create([ 'display_name' => 'locationstore@support.com', 'key' => 'splash_screen', 'value' => 'Active', 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 6]);
        setting::create([ 'display_name' => 'Phone Number', 'key' => 'phone_number', 'value' => '05123456789', 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 6]);
        setting::create([ 'display_name' => 'app_new_branch', 'key' => 'app_new_branch', 'value' => 10, 'details' => null, 'type' => 'text', 'section' => 'pages', 'ordering' => 1]);
        setting::create([ 'display_name' => 'app_pag', 'key' => 'app_pag', 'value' => 10, 'details' => null, 'type' => 'text', 'section' => 'pages', 'ordering' => 2]);
        setting::create([ 'display_name' => 'app_page_branch', 'key' => 'app_page_branch', 'value' => 10, 'details' => null, 'type' => 'text', 'section' => 'pages', 'ordering' => 3]);
        setting::create([ 'display_name' => 'app_pagforsearch_branch', 'key' => 'app_pagforsearch_branch', 'value' => 10, 'details' => null, 'type' => 'text', 'section' => 'general', 'ordering' => 7]);
        setting::create([ 'display_name' => 'footer_text', 'key' => 'footer_text', 'value' => '<strong>Copyright &copy; 2022 <a href="01024346011">Mohamed Galal</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.2.0-rc
        </div>', 'details' => null, 'type' => 'text', 'section' => 'site', 'ordering' => 1]);

        $settings = Valuestore::make(config_path('settings.json'));
        $settings->put('splash', 'https://locationstor.com/assets/images/photo-1557682257-2f9c37a3a5f3.jpg');

        setting::create([ 'display_name' => 'CLIENT_ID', 'key' => 'GOOGLE_DRIVE_CLIENT_ID', 'value' => '1064102621926-1dlmdjuv8nravekddi2t92tp697t02bb.apps.googleusercontent.com', 'details' => null, 'type' => 'text', 'section' => 'GOOGLE_DRIVE', 'ordering' => 1]);
        setting::create([ 'display_name' => 'CLIENT_SECRET', 'key' => 'GOOGLE_DRIVE_CLIENT_SECRET', 'value' => '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', 'details' => null, 'type' => 'text', 'section' => 'GOOGLE_DRIVE', 'ordering' => 2]);
        setting::create([ 'display_name' => 'REFRESH_TOKEN', 'key' => 'GOOGLE_DRIVE_REFRESH_TOKEN', 'value' => '1//04Gsh8891SFLFCgYIARAAGAQSNwF-L9IrseukNw0sIMYGC0YYIguP2nIs0gsgb3xN0QbYmqSLCbifKokkD1TY0f8k6oG-hrtHNZQ', 'details' => null, 'type' => 'text', 'section' => 'GOOGLE_DRIVE', 'ordering' => 2]);
        setting::create([ 'display_name' => 'FOLDER_ID', 'key' => 'GOOGLE_DRIVE_FOLDER_ID', 'value' => '1D9zYPa8ZaHODOI86_qS2OpKPlJBy52t9', 'details' => null, 'type' => 'text', 'section' => 'GOOGLE_DRIVE', 'ordering' => 3]);


        setting::create([ 'display_name' => 'FCM SERVER KEY', 'key' => 'FCM_SERVER_KEY', 'value' => 'AAAAFV7UKVU:APA91bHbfviv2y_IqklCTDe8kEz126o1beHeBY7SahvWcS_iuzhvZ0UMMdimYMYQ1pED1E_g_MFTOTu5EHUizblicxIRlwnnSVKRQ2EVXVNSFTqiDT2whSBbEmOHApG4o9EVqFd94Mfs', 'details' => null, 'type' => 'text', 'section' => 'Firebase', 'ordering' => 1]);
        setting::create([ 'display_name' => 'Api KEY', 'key' => 'apiKey', 'value' => 'AIzaSyAVy7aBtyOJChOGJfxZYozaYvWpxinbvH8', 'details' => null, 'type' => 'text', 'section' => 'Firebase', 'ordering' => 2]);
        setting::create([ 'display_name' => 'Auth Domain', 'key' => 'authDomain', 'value' => 'storeshopping-22586.firebaseapp.com', 'details' => null, 'type' => 'text', 'section' => 'Firebase', 'ordering' => 3]);
        setting::create([ 'display_name' => 'Project Id', 'key' => 'projectId', 'value' => 'storeshopping-22586', 'details' => null, 'type' => 'text', 'section' => 'Firebase', 'ordering' => 4]);
        setting::create([ 'display_name' => 'Storage Bucket', 'key' => 'storageBucket', 'value' => 'storeshopping-22586.appspot.com', 'details' => null, 'type' => 'text', 'section' => 'Firebase', 'ordering' => 5]);
        setting::create([ 'display_name' => 'Messaging SenderId', 'key' => 'messagingSenderId', 'value' => '91785275733', 'details' => null, 'type' => 'text', 'section' => 'Firebase', 'ordering' => 6]);
        setting::create([ 'display_name' => 'App id', 'key' => 'appId', 'value' => '1:91785275733:web:7cfee18833325ac80627dc', 'details' => null, 'type' => 'text', 'section' => 'Firebase', 'ordering' => 7]);


        generateCache();

    }

}
