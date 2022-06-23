<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Models\products;
use App\Models\tasklog;
use Illuminate\Console\Command;

class Notifyexpireproduct extends Command
{
    use GeneralTrait;
    protected $signature = 'Notifyexpire:product';
    protected $description = 'Alert user for expire product';
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $products = products::whereActive(0)->get();
        foreach ($products as $product) {

            if($product->expiry_date ==  now()->toFormattedDate() && $product->expiry_date != null ){
                $body = str_replace(array(':expiry_date', ':username' ,':storename',':productname',':cityname',':regionname' , ":newline", ':start_date'),
                    array($product->expiry_date, $product->branch->stores->user->name,$product->branch->stores->name,$product->name,$product->branch->city->name,$product->branch->region->name , "\n", $product->start_date), __('notify.task_notify_body_expire_date_product'));

                $title = str_replace(array(':expiry_date', ':username' ,':storename',':productname',':cityname',':regionname' , ":newline", ':start_date'),
                    array($product->expiry_date, $product->branch->stores->user->name,$product->branch->stores->name,$product->name,$product->branch->city->name,$product->branch->region->name , "\n", $product->start_date), __('notify.task_notify_title_expire_date_product'));

                $notify = $this->notificationFCM($title,$body ,[$product->branch->stores->user->device_token]);
                tasklog::create(['state'=>  ($this->description) ,'type'=> $notify ]);
            }
            if($product->expiry_date < now()->addDays(7) && $product->expiry_date ==  now()->toFormattedDate() && $product->expiry_date != null){
                $body = str_replace(array(':expiry_date', ':username' ,':storename',':productname',':cityname',':regionname' , ":newline", ':start_date'),
                array($product->expiry_date, $product->branch->stores->user->name,$product->branch->stores->name,$product->name,$product->branch->city->name,$product->branch->region->name , "\n", $product->start_date), __('notify.task_notify_body_before_expire_date_product'));

                $title = str_replace(array(':expiry_date', ':username' ,':storename',':productname',':cityname',':regionname' , ":newline", ':start_date'),
                array($product->expiry_date, $product->branch->stores->user->name,$product->branch->stores->name,$product->name,$product->branch->city->name,$product->branch->region->name , "\n", $product->start_date), __('notify.task_notify_title_before_expire_date_product'));

                $notify = $this->notificationFCM($title,$body,[$product->branch->stores->user->device_token]);
                tasklog::create(['state'=> ($this->description),'type'=> $notify ]);
            }
          }
    }
}
