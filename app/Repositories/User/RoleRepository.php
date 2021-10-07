<?php

namespace App\Repositories\User;

use App\Services\User\IndexService as UserIndexService;
use App\Interfaces\User\RoleInterface;
use App\Services\User\Role\IndexService;
use App\Services\User\Role\UpdateService;
use App\Services\User\ShowService as UserShowService;

class RoleRepository implements RoleInterface
{
    protected $userIndexService;
    protected $userShowService;
    protected $indexService;
    protected $permissionIndexService;
    protected $updateService;

    public function __construct(
        UserIndexService $userIndexService,
        UserShowService $userShowService,
        IndexService $indexService,
        UpdateService $updateService
    ) {
        $this->userIndexService = $userIndexService;
        $this->userShowService = $userShowService;
        $this->indexService = $indexService;
        $this->updateService = $updateService;
    }

    public function index()
    {
        return $this->userIndexService->index();
    }

    public function show($id)
    {
        $user = $this->userShowService->show($id);

        $role = $this->indexService->index();

        $data_merge = array_merge($user, $role);

        return $data_merge;
    }

    public function update($request, $id)
    {
        return $this->updateService->update($request, $id);
    }
}
