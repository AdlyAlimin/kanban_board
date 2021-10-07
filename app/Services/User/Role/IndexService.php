<?php

namespace App\Services\User\Role;

use Exception;
use Spatie\Permission\Models\Role;

class IndexService
{
    public function index()
    {
        try {

            $data['role'] = Role::all();

            return $data;
        } catch (Exception $e) {
            roleLog($e->getMessage());
            return false;
        }
    }
}
