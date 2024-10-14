<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\ForgotPassword;

class SendNotificationService {

    public function sendForgotPasswordNotification($request){

        $user = User::firstWhere('email', $request->email);
        $host= gethostname();
        // $url = "http://" . gethostbyname($host) . ":" . $request->clientPort . "/" . $user->change_password_token;
        $url = "http://" . $request->url . "/reset-password/" . $user->change_password_token;

        $forgotPasswordData = [
            'body' => 'You have received an email notification for changing your password',
            'text' => 'Change Password',
            'url' => url($url),
            'footer' => 'This is a system generated email. Please do not reply.',
            'thank_you' => 'Thank you!'
        ];

        $user->notify(new ForgotPassword($forgotPasswordData));
    }
}