<?php

namespace App\Application\UseCases;

use App\Domain\Repositories\TaskRepositoryInterface;

class DeleteTaskUseCase
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function execute(string $taskId, string $userId)
    {
        $eloquentTask = $this->taskRepository->find($taskId, $userId);

        if (!$eloquentTask) {
            throw new \Exception("Task not found");
        }

        return $this->taskRepository->delete($taskId, $userId);
    }
}
