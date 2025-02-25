<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SampleEmailer extends Mailable
{
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build(){
        return $this->subject('This is a Sample Subject')
                    ->view('email.sample')
                    ->to('jeffrey.wong@avvanz.com')
                    ->with('data', $this->data);
    }
}
