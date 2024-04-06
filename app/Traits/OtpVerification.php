<?php

namespace App\traits;
use App\Notifications\OtpNotification;

trait OtpVerification
{

    /**
     * check if the user has received OTP
     */
    public function hasVerifiedOtp()
    {
        return ! is_null($this->expires_at);
    }

    public function sendOtpNotification()
    {
        $this->notify(new OtpNotification);
    }


}