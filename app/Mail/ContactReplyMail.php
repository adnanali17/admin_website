<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reply;
    public $contactMessage;

    /**
     * Create a new message instance.
     *
     * @param  string  $reply
     * @param  \App\Models\ContactMessage  $contactMessage
     * @return void
     */
    public function __construct($reply, $contactMessage)
    {
        $this->reply = $reply;
        $this->contactMessage = $contactMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact_reply')
                    ->with([
                        'reply' => $this->reply,
                        'contactMessage' => $this->contactMessage,
                    ]);
    }
}
