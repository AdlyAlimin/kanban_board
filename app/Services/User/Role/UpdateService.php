<?php

namespace App\Services\User\Role;

use App\Models\User;
use Exception;

class UpdateService
{
    public function update($request, $id)
    {
        try {

            $user = User::find($id);

            $user->syncRoles($request->role);

            return true;
        } catch (Exception $e) {
            roleLog($e->getMessage());
            return false;
        }
    }
}
