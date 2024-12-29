<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $emailMessage;

    public function __construct($title, $emailMessage)
    {
        $this->title = $title;
        $this->emailMessage = $emailMessage;
    }

    public function build()
    {
        return $this->subject($this->title)
                    ->view('emails.notification')
                    ->with([
                        'emailMessage' => $this->emailMessage,
                    ]);
    }
}
