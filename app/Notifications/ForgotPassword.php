<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ForgotPassword extends Notification
{
    use Queueable;

    private $forgotPasswordData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($forgotPasswordData)
    {
        $this->forgotPasswordData = $forgotPasswordData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject("UAS HDF Notification")
                    ->line($this->forgotPasswordData['body'])
                    ->action($this->forgotPasswordData['text'], $this->forgotPasswordData['url'])
                    ->line($this->forgotPasswordData['footer'])
                    ->line($this->forgotPasswordData['thank_you']);
                    // ->markdown('emails.forgotPasswordNotification', [
                    //     'forgotPasswordData' => $this->forgotPasswordData
                    // ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
