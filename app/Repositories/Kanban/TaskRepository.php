<?php

namespace App\Repositories\Kanban;

use App\Interfaces\Kanban\TaskInterface;
use App\Services\Kanban\Task\IndexService;

class TaskRepository implements TaskInterface
{
    protected $indexService;

    public function __construct(
        IndexService $indexService
    )
    {
        $this->indexService = $indexService;       
    }

    public function index()
    {
        return $this->indexService->index();
    }
}