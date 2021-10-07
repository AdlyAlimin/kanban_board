<?php

namespace App\Repositories\Kanban;

use App\Interfaces\Kanban\TaskInterface;
use App\Services\Kanban\Task\IndexService;
use App\Services\Kanban\Task\StoreService;
use App\Services\Kanban\Task\SyncService;

class TaskRepository implements TaskInterface
{
    protected $indexService;
    protected $storeService;
    protected $syncService;

    public function __construct(
        IndexService $indexService,
        StoreService $storeService,
        SyncService $syncService
    )
    {
        $this->indexService = $indexService;       
        $this->storeService = $storeService;
        $this->syncService = $syncService;
    }

    public function index()
    {
        return $this->indexService->index();
    }

    public function store($request)
    {
        return $this->storeService->store($request);
    }

    public function sync($request)
    {
        return $this->syncService->sync($request);
    }
}