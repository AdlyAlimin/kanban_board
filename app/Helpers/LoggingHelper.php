<?php

use Illuminate\Support\Facades\Log;

function googleAuthLog($error)
{
    Log::channel('googleauthlog')->error($error);
}