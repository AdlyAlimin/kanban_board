<?php

namespace App\Http\Controllers\Kanban;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskSyncRequest;
use App\Interfaces\Kanban\TaskInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskInterface;

    public function __construct(
        TaskInterface $taskInterface
    ) {
        $this->taskInterface = $taskInterface;
    }

    public function getIndex()
    {
        $data = $this->taskInterface->index();

        if ($data == false) {
            return redirect()->back()->withErrors('Please Try Again');
        }

        return view('tasks.index', compact('data'));
    }

    public function postStore(TaskRequest $request)
    {
        $data = $this->taskInterface->store($request);

        return $data;
    }

    public function putSync(TaskSyncRequest $request)
    {
        $data = $this->taskInterface->sync($request);

        return $data;
    }

    public function putUpdate(Request $request)
    {
    }
}
