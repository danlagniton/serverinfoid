<?php

namespace App\Mail;

use App\Models\SubmittedForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $submittedFormData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($submittedFormData)
    {
        $this->submittedFormData = $submittedFormData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->submittedFormData['subject'])
            ->markdown('emails.submittedForm', [
                    'submittedFormData' => $this->submittedFormData
                ]);
    }
}
