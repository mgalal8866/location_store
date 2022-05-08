<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Support\Carbon;

use Illuminate\Console\Command;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class notification extends Command
{
    use GeneralTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifi:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send Notifiction';

    /**
     * Create a new command instance.
     *
     * @return void
     */
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
        $firebaseToken =   User::find(3)->pluck('device_token');
        // return $firebaseToken;
        $SERVER_API_KEY = env('FCM_SERVER_KEY');
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => 'Automaticsend',
                "body" => Carbon::now(),
                "icon" => 'https://images.theconversation.com/files/93616/original/image-20150902-6700-t2axrz.jpg',
                "image" => 'https://images.theconversation.com/files/93616/original/image-20150902-6700-t2axrz.jpg',
                "fcm_options.link" => '$link',
                "click_action" => '',

            ],
            "actions"=> [
                "title"=> "Like",
                  "action"=> "like",
                  "icon"=> "icons/heart.png"
            ],
        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);


        return  curl_exec($ch);

        return 0;
    }
}
