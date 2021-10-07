<?php

namespace App\Services\Kanban\Task;

use App\Models\Kanban\Task;
use Exception;

class SyncService
{
    public function sync($request)
    {
        try {

            foreach ($request->columns as $status) {
                foreach ($status['tasks'] as $i => $task) {
                    $order = $i + 1;
                    if ($task['status_id'] !== $status['id'] || $task['order'] !== $order) {
                        $data = Task::find($task['id']);

                        $data->status_id = $status['id'];
                        $data->order = $order;

                        $data->save();
                    }
                }
            }

            return $request->user()->statuses()->with('tasks')->get();
        } catch (Exception $e) {
            taskLog($e->getMessage());
            return false;
        }
    }
}
