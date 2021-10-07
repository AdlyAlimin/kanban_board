<?php

namespace App\Interfaces\Kanban;

interface TaskInterface
{
    public function index();

    public function store($request);

    public function sync($request);
}