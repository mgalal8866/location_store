<?php

namespace App;

use App\Models\Setting;

class NullSetting extends Setting
{
    protected $attributes = [
        'site_title' => 'Default site Title',
        'site_name' => 'Default site name',
        'site_email' => 'default@gmail.com',
        'footer_text' => 'default footer text',
        'sidebar_collapse' => false,
        'app_page_branch'=>10,
        'app_pag'=>10,
        'app_new_branch'=>10,
        'splash'=>'',
    ];
}
