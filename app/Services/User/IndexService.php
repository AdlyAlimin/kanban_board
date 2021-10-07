<?php

namespace App\Services\User;

use App\Models\User;
use Exception;

class IndexService
{
    public function index()
    {
        try {

            $data = User::with('roles')->get();

            return $data;
        } catch (Exception $e) {
            userLog($e->getMessage());
            return false;
        }
    }
}
