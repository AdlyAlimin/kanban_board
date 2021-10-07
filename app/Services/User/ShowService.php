<?php

namespace App\Services\User;

use App\Models\User;
use Exception;

class ShowService
{
    public function show($id)
    {
        try {

            $data['user'] = User::find($id);

            $data['user_role'] = $data['user']->roles->pluck('name')->toArray();

            return $data;
        } catch (Exception $e) {
            userLog($e->getMessage());
            return false;
        }
    }
}
