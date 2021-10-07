<?php

use Illuminate\Support\Facades\Log;

function authLog($error)
{
    Log::channel('authlog')->error($error);
}

function googleAuthLog($error)
{
    Log::channel('googleauthlog')->error($error);
}

function roleLog($error)
{
    Log::channel('rolelog')->error($error);
}

function permissionLog($error)
{
    Log::channel('permissionlog')->error($error);
}

function userLog($error)
{
    Log::channel('userlog')->error($error);
}

function taskLog($error)
{
    Log::channel('tasklog')->error($error);
}
