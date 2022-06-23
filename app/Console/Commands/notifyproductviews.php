<?php

namespace App\Console\Commands;

use App\Models\tasklog;
use App\Models\products;
use Illuminate\Console\Command;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class notifyproductviews extends Command
{
    use GeneralTrait;
    protected $signature = 'Notifyproduct:views';

    protected $description = 'Notify product views';


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $products = products::whereActive(0)->get();
        foreach ($products as $product) {
            if($product->view ==  gettaskvar('viewsproduct') && $product->view != null ){
                $body = str_replace(array(':view',':expiry_date', ':username' ,':storename',':productname',':cityname',':regionname' , ":newline", ':start_date'),
                    array($product->view,$product->expiry_date, $product->branch->stores->user->name,$product->branch->stores->name,$product->name,$product->branch->city->name,$product->branch->region->name , "\n", $product->start_date), __('notify.task_notify_body_expire_date_product'));

                $title = str_replace(array(':expiry_date', ':username' ,':storename',':productname',':cityname',':regionname' , ":newline", ':start_date'),
                    array($product->view,$product->expiry_date, $product->branch->stores->user->name,$product->branch->stores->name,$product->name,$product->branch->city->name,$product->branch->region->name , "\n", $product->start_date), __('notify.task_notify_title_expire_date_product'));

                $notify = $this->notificationFCM($title,$body ,[$product->branch->stores->user->device_token]);
                tasklog::create(['state'=>  ($this->description) ,'type'=> $notify ]);
            }

          }
    }
}
