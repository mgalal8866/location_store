<?php

namespace App;


use Illuminate\Support\Collection ;

// use App\Models\setting;'

class Timetask extends Collection
{
    protected $attributes = [
        'delete_store'            => '* * * * *', //every minute
       
    ];

    //'* * * * * ', //every minute
    //'0 * * * * ', //hourly
   // '0 0 * * * ', //dialy
   // '0 0 0 * * ', //weekly
   // '0 0 1 * * ', //monthly
   // '0 0 0 1 1 ', //yearly


}
