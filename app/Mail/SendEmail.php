<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

     /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('إعادة تعيين كلمة المرور')
        ->from($this->details->user['email'] , $this->details->user['name'])
        ->view('site.emails.invitation');
    }
}
