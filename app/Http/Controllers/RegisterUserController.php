<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\User;
use App\Service\UserRegisterService;
use App\Service\VerifyOtpService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use PharIo\Manifest\Email;

class RegisterUserController extends Controller
{


    // /**
    //  * an instance of UserRegisterService class
    //  * 
    //  * @var \App\Service\UserRegisterService
    //  */
    // private $userRegisterService;


    // public function __construct(UserRegisterService $userRegisterService)
    // {
    //     $this->userRegisterService = $userRegisterService;
    // }


    /**
     * Display the registration view
     */
    public function  create(): View
    {
        return view ('register');
    }



    /**
     * validate request, and call userRegisterService
     * 
     * @param  \Request
     * @param  \App\Service\UserRegisterService 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, UserRegisterService $userRegisterService): RedirectResponse
    {
        $requestData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ]);
        
        $userRegisterService->registerUser($requestData);

        return redirect(route('dashboard', absolute: false));
    }

}
