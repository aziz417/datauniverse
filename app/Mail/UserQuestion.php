<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserQuestion extends Mailable
{
    use Queueable, SerializesModels;

    public $question_details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($question_details)
    {
        $this->question_details = $question_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->question_details['subject'])->view('pages.question_details.question_message');
    }
}
