<?php

namespace App;

use App\Models\setting;

class NullSetting extends setting
{
    protected $attributes = [
        'delete_store'            => '* * * * * ', //every minute
        'notification_expires'    => 'Default site name',
        'time_'              => 'default@gmail.com',
        'footer_text'             => 'default footer text',
        'sidebar_collapse'        => false,
        'app_page_branch'         => 10,
        'app_pag'                 => 10,
        'app_new_branch'          => 10,
        'app_pagforsearch_branch' => 10,
        'splash'                  => '',
    ];

    //'* * * * * ', //every minute
    //'0 * * * * ', //hourly
   // '0 0 * * * ', //dialy
   // '0 0 0 * * ', //weekly
   // '0 0 1 * * ', //monthly
   // '0 0 0 1 1 ', //yearly


}
