<?php

namespace App\Providers;

use App\Interfaces\Kanban\StatusInterface;
use App\Interfaces\Kanban\TaskInterface;
use App\Repositories\Kanban\StatusRepository;
use App\Repositories\Kanban\TaskRepository;
use Illuminate\Support\ServiceProvider;

class KanbanServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TaskInterface::class,
            TaskRepository::class
        );

        $this->app->bind(
            StatusInterface::class,
            StatusRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
