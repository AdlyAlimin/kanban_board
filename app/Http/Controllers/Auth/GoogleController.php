<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\Auth\GoogleInterface;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    protected $googleInterface;

    public function __construct(
        GoogleInterface $googleInterface
    )
    {
        $this->googleInterface = $googleInterface;
    }

    public function redirect()
    {
        return $this->googleInterface->redirect();
    }

    public function callback()
    {
        $data = $this->googleInterface->callback();

        if($data == false) {
            return redirect()->route('login')->withErrors('Please Try Again');
        }

        return redirect()->route('home');
    }
}
