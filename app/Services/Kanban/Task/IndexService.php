<?php

namespace App\Services\Kanban\Task;

use Exception;
use Illuminate\Support\Facades\Auth;

class IndexService
{
    public function index()
    {
        try {

            $data = Auth::user()->statuses()->With('tasks')->get();

            return $data;

        } catch (Exception $e) {
            taskLog($e->getMessage());
            return false;
        }
    }
}