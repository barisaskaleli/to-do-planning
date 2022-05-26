<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @param $data
     * @return void
     */
    public function addTasks($data)
    {
        Task::insert($data);
    }

    /**
     * @param $data
     * @return void
     */
    public function getTasks()
    {
        Task::get();
    }
}
