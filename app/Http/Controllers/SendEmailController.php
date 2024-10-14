<?php

namespace App\Http\Controllers;

use App\Mail\FormEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function sendFormEmailNotification($emailDetails){

        $email = new FormEmail($this->details);
        Mail::to($emailDetails['to'])->send($email);
    }
}
