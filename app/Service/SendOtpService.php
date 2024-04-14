<?php

namespace App\Service;

use App\Notifications\OtpNotification;

class SendOtpService
{

    /**
     * the generated OTP
     * 
     * @var string
     */
    protected $otp;

    public function __construct()
    {
        $this->otp = generateOtp();
    }

    /**
     * Determine if user has cached key
     * 
     * @param mixed $user
     * 
     * @return bool
     */
    public function hasOtp($user)
    {
        return ! is_null($user->OTP);
    }


    /**
     * set otp key and value in redis
     *
     * @return bool
     */
    public function setOtp($user)
    {
        return $user->forceFill([
            'OTP' => sha1($this->otp),
        ])->save();
    }


    /**
     * send to use notification mail
     * 
     * @return void
     */
    public function sendOtpNotification($user)
    {
       $user->notify(new OtpNotification($this->otp));
    }

}
