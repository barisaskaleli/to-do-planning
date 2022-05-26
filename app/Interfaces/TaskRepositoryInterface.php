<?php

namespace App\Interfaces;

interface TaskRepositoryInterface
{
    public function addTasks (array $data);
    public function getTasks();
}
