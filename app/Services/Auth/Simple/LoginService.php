<?php

namespace App\Services\Auth\Simple;

use Exception;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login($request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerateToken();

                return true;
            }

            return false;
        } catch (Exception $e) {
            authLog($e->getMessage());
            return false;
        }
    }
}
