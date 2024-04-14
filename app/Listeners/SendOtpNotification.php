<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Service\SendOtpService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;



class SendOtpNotification
{

    /**
     * an instance of sendOtpService class
     * 
     * @var \App\Service\SendOtpService
     */
    private $sendOtpService;


    /**
     * Create the event listener.
     */
    public function __construct(SendOtpService $sendOtpService)
    {
        $this->sendOtpService = $sendOtpService;
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        if (! $this->sendOtpService->hasOtp($event->user)) {

            $this->sendOtpService->setOtp($event->user);

            $this->sendOtpService->sendOtpNotification($event->user);
        }
    }
}
