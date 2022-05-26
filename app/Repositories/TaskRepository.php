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
        $task = new Task();
        $task->setConnection('mysql2');
        $task->insert($data);
    }

    /**
     * @param $data
     * @return void
     */
    public function getTasks()
    {
        return Task::get();
    }
}
