<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSend extends Mailable
{
    use Queueable, SerializesModels;

    public $empData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($empData)
    {
        $this->empData = $empData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Info Akun Pengguna')
                    ->view('mailtemplate');
    }
}