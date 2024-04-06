<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterUserController extends Controller
{

    /**
     * Display the registration view
     */
    public function  create(): View
    {
        return view ('register');
    }



    /**
     * @register a new user
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ]);

        $user = User::create([
            'username'=> $request->name,
            'email'=> $request->email,
        ]);

        event(new UserRegistered($user));
    }



}
