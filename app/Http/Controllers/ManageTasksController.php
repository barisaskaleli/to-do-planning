<?php

namespace App\Http\Controllers;

use App\Interfaces\DeveloperRepositoryInterface;
use App\Interfaces\TaskRepositoryInterface;

class ManageTasksController extends Controller
{
    /**
     * @var TaskRepositoryInterface $taskRepository
     */
    private TaskRepositoryInterface $taskRepository;

    /**
     * @var DeveloperRepositoryInterface
     */
    private DeveloperRepositoryInterface $developerRepository;

    /**
     * @param TaskRepositoryInterface $taskRepository
     * @param DeveloperRepositoryInterface $developerRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository, DeveloperRepositoryInterface $developerRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->developerRepository = $developerRepository;
    }

    /**
     * Calculating weekly tasks
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getWeeklyPlan()
    {
        $averageDeveloperWeeklyWorkingHour = 45;
        $tasks = $this->taskRepository->getTasks();
        $developers = $this->developerRepository->getDevelopers();

        $developerTasks = [];
        $usedTasks = [];

        // loop through all developers
        foreach($developers as $developer){
            // setting up week and task array
            $week = 1;
            $developerTasks[$developer->name][$week] = [
                'totalWorkingHour' => 0,
            ];

            // loop through all tasks
            foreach($tasks as $task){
                // check if developer is assigned to this task
                if($task->level <= $developer->difficulty && ($developerTasks[$developer->name][$week]['totalWorkingHour'] + $task->estimated_duration) <= $averageDeveloperWeeklyWorkingHour){
                    // checking if task is already assigned to another developer
                    if(in_array($task->id, $usedTasks)){
                        continue;
                    }

                    // assign task to developer
                    $developerTasks[$developer->name][$week][] = [$task->name, $task->estimated_duration];
                    $developerTasks[$developer->name][$week]['totalWorkingHour'] += $task->estimated_duration;
                    $usedTasks[] = $task->id;

                    // check if developer is done with this week
                } else if($task->level <= $developer->difficulty && ($developerTasks[$developer->name][$week]['totalWorkingHour'] + $task->estimated_duration) >= $averageDeveloperWeeklyWorkingHour){
                    // checking if task is already assigned to another developer
                    if(in_array($task->id, $usedTasks)){
                        continue;
                    }

                    // assign task to developer and start new week
                    $week++;
                    $developerTasks[$developer->name][$week]['totalWorkingHour'] = 0;
                    $developerTasks[$developer->name][$week][] = [$task->name, $task->estimated_duration];
                    $developerTasks[$developer->name][$week]['totalWorkingHour'] += $task->estimated_duration;
                    $usedTasks[] = $task->id;;
                }
            }
        }

        return view('weekly-plan', [
            'developerTasks' => $developerTasks,
        ]);
    }
}
