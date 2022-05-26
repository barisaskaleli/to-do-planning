<?php

namespace App\Console\Commands;

use App\Interfaces\TaskRepositoryInterface;
use App\Services\Task;
use Illuminate\Console\Command;

class FetchTasks extends Command
{
    /**
     * @var TaskRepositoryInterface $taskRepository
     */
    private TaskRepositoryInterface $taskRepository;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weekly tasks fetching';

    /**
     * Create a new command instance.
     * @param TaskRepositoryInterface $taskRepository
     * @return void
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        parent::__construct();
        $this->taskRepository = $taskRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("Fetching tasks...");

        $firstTask = app()->make(Task::class)->getFirstTask();
        $this->info("First task fetched.");

        $secondTask = app()->make(Task::class)->getSecondTask();
        $this->info("Second task fetched.");

        $this->taskRepository->addTasks($firstTask);
        $this->taskRepository->addTasks($secondTask);

        $this->info("Tasks added.");
    }
}
