<?php

namespace App\Services\Auth\Google;

use Exception;
use Laravel\Socialite\Facades\Socialite;

class RedirectService
{
    public function redirect()
    {
        try {

            return Socialite::driver('google')->redirect();
        } catch (Exception $e) {
            googleAuthLog($e->getMessage());
            return false;
        }
    }
}
