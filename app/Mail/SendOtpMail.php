<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class SendOtpMail extends Mailable
{
    public $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function build()
    {
        return $this->subject('Your Email OTP Verification')
            ->view('otp_verify.email.email_otp');
    }
}
