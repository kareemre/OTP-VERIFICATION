<?php

namespace App\Http\Controllers;

use App\Http\Requests\OtpVerificationRequest;
use App\Models\User;
use App\Service\VerifyOtpService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    /**
     * Display the registration view
     */
    public function  create(): View
    {
        return view ('otp');
    }

    public function store(Request $request)
    {
        $request->validate([
            'otp' => 'required|size:4'
        ]) ;
  
        $email = Auth::user()->email;
        $user = User::where('email', $email)->first();
        if (! hash_equals((string) sha1($request->input('otp')), (string) $user->otp)) {
            dd($user);
        }
        if ($user) {
            $user->OTp = null;
            $user->save();
            return redirect()->route('dashboard, absolute: false');
        }
        

    }
}
