<?php
namespace App\Service;

use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRegisterService
{


    /**
     * register a new user
     * 
     * @param array $userData
     * 
     * @return void
     */
    public function registerUser($userData)
    {
        $user = User::create([
            'username'=> $userData['name'],
            'email'=> $userData['email'],
        ]);

        event(new UserRegistered($user));

        Auth::login($user);
        
    }

}