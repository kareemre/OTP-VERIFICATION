<?php

//OTP generaating function
if (! (function_exists('generateOTP')) ) {

    function generateOtp() {

        return rand(1000, 5000);
    }

}