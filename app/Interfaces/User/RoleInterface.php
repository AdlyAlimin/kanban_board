<?php

namespace App\Interfaces\User;

interface RoleInterface
{
    public function index();

    public function show($id);

    public function update($request, $id);
}