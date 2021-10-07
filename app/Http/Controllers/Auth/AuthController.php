<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Auth\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    protected $authInterface;

    public function __construct(
        AuthInterface $authInterface
    ) {
        $this->authInterface = $authInterface;
    }

    public function postLogin(Request $request)
    {
        $data = $this->authInterface->login($request);

        if ($data == false) {
            return redirect()->back()->withErrors('Please Try Again')->withInput();
        }

        return redirect()->route('home');
    }

    public function getLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
