<?php

namespace App\Services\Kanban\Task;

use App\Models\Kanban\Task;
use Exception;
use Illuminate\Support\Facades\Auth;

class StoreService
{
    public function store($request)
    {
        try {
            $task = new Task;

            $task->title = $request->title;
            $task->description = $request->description;
            $task->status_id = $request->status_id;
            $task->user_id = Auth::user()->id;

            $task->save();

            return $task;
        } catch (Exception $e) {
            taskLog($e->getMessage());
            return false;
        }
    }
}
