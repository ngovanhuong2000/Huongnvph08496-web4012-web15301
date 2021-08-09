<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoSendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;


    public function __construct()
    {
        $this->name = "FPT Polytechnic";
    }

    public function build()
    {

        return $this->from('example@example.com', 'Example')->view('mails.demo.mail');
    }
}
