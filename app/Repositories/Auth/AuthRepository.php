<?php

namespace App\Repositories\Auth;

use App\Interfaces\Auth\AuthInterface;
use App\Services\Auth\Simple\LoginService;

class AuthRepository implements AuthInterface
{
    protected $loginService;

    public function __construct(
        LoginService $loginService
    ) {
        $this->loginService = $loginService;
    }

    public function login($request)
    {
        return $this->loginService->login($request);
    }
}
