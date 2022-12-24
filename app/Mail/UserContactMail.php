<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact_details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact_details)
    {
        $this->contact_details = $contact_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->contact_details['subject'])->view('pages.contact_message.message');
    }
}
