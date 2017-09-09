<?php

namespace App\Listeners;

use App\Events\SendFcmNotification;
use Illuminate\Support\Facades\Auth;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class FcmNotificationListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendFcmNotification  $event
     * @return void
     */
    public function handle(SendFcmNotification $event)
    {
        $message = $event->message;
//        dd($message);
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($message['title']);
        $notificationBuilder->setBody($message['body'])
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $token = $message['token'];

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();
        $downstreamResponse->tokensToDelete();
        $downstreamResponse->tokensToModify();
        $downstreamResponse->tokensToRetry();

        return response('Notification Send', 200);

    }
}
