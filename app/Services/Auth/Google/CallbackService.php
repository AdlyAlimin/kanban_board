<?php

namespace App\Services\Auth\Google;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class CallbackService
{
    public function callback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return true;
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('password')
                ]);

                Auth::login($newUser);

                return true;
            }
        } catch (Exception $e) {
            googleAuthLog($e->getMessage());
            return false;
        }
    }
}
