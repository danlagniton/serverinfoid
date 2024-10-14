<?php

namespace App\Services;

use App\Mail\FormEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendEmailService {

    public function sendFormEmailNotification($submittedForm, $requestMethod){

        $emailTo = array();
        if($submittedForm->status === "For Approval"){
            $nurse = User::isNurse()->get('email');
            if(count($nurse) > 1){
                foreach ($nurse as $key => $value) {
                    array_push($emailTo, $value);
                }
            } else {
                array_push($emailTo, $nurse[0]->email);
                // $emailTo = $emailTo->push($nurse[0]->email);
            }

            if($requestMethod === "POST"){
                $message = "A New Health Declaration Form has been filed.";
            } else {
                $message = "An appointment schedule has been updated and needs your re-approval.";
            }
        } else {
            $emailTo = User::firstWhere('id', $submittedForm->user_id)->email;
            
            if($submittedForm->status === "Approved") {
                $message = "Your submitted Health Declaration Form has been approved.";
            } else {
                $message = "Your submitted Health Declaration Form has been rejected.";
            }
        }

        $submittedFormData = [
                "to" => $emailTo,
                "subject" => "UAS HDF Notification",
                // "title" => "UAS HDF",
                "body" => $message,
                "user" => $submittedForm->user,
                "appointment_schedule" => $submittedForm->appointment_schedule,
                "status" => $submittedForm->status,
                "footer" => "This is a system generated email. Please do not reply."
            ];


        $email = new FormEmail($submittedFormData);
        Mail::to($submittedFormData['to'])
            ->send($email);
    }

}