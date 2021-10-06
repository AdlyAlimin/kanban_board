<?php

namespace App\Repositories\Auth;

use App\Interfaces\Auth\GoogleInterface;
use App\Services\Auth\Google\CallbackService;
use App\Services\Auth\Google\RedirectService;

class GoogleRepository implements GoogleInterface
{
    protected $redirectService;
    protected $callbackService;

    public function __construct(
        RedirectService $redirectService,
        CallbackService $callbackService
    ) {
        $this->redirectService = $redirectService;
        $this->callbackService = $callbackService;
    }

    public function redirect()
    {
        return $this->redirectService->redirect();
    }

    public function callback()
    {
        return $this->callbackService->callback();
    }
}
