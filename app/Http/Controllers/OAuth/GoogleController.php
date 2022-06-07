<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
//            dd($user);
            $finduser = User::where('google_id',$user->getId())->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('dashboard');
            }else{
                $newUser = User::create([
                   'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'password' => bcrypt('admin123')
                ]);
                $newUser->assignRole('guest');
                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }
        }catch (\Throwable $throwable){
        }
    }
}
