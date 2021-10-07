<?php

namespace App\Http\Controllers\Kanban;

use App\Http\Controllers\Controller;
use App\Interfaces\Kanban\TaskInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskInterface;

    public function __construct(
        TaskInterface $taskInterface
    )
    {
        $this->taskInterface = $taskInterface;
    }

    public function getIndex()
    {
        $data = $this->taskInterface->index();

        if($data == false) {
            return redirect()->back()->withErrors('Please Try Again');
        }

        return view('tasks.index', compact('data'));
    }
}
