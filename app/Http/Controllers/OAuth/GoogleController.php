<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                return redirect()->intended('home');
            }else{
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'password' => bcrypt('admin123')
                ]);

                $newUser->assignRole('guest');
                $user_data= User::where('email',$newUser['email'])->first();
                $profile=Profile::create([
                    'user_id'=>$user_data->id,
                    'profile_name'=>$user['name'],
                ]);

                Auth::login($newUser);
                return redirect()->intended('home');
            }
        }catch (\Throwable $throwable){

        }
    }
}
