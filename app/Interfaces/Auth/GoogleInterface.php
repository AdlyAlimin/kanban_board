<?php

namespace App\Interfaces\Auth;

interface GoogleInterface
{
    public function redirect();

    public function callback();
}