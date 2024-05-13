<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Requests extends Mailable
{
    use Queueable, SerializesModels;

    public $message_data = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->message_data = [
            'name' => $data['name'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->message_data);
        return $this->view('mail.requests');
    }
}
