<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserSetting extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email;
    public $alerts_email;
    public $name;

    public function __construct($email, $alerts_email, $name)
    {
        $this->email = $email;
        $this->alerts_email = $alerts_email;
        $this->name = $name;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Your Alerts Email has been updated')
        ->markdown('emails.userSetting');
    }
}
