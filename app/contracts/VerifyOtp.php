<?php
namespace App\contracts;

interface VerifyOtp
{
    /**
     * Determine if the user has verified OTP
     * 
     * @return bool
     */
    public function hasVerifiedOtp();


    /**
     * Send the OTP verification notification.
     *
     * @return void
     */
    public function sendOtpVerification();

}