<?php

namespace App\Application\UseCases;

use App\Application\DTOs\UpdateTaskDTO;
use App\Models\Task;
use App\Domain\Repositories\TaskRepositoryInterface;

class UpdateTaskUseCase
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function execute(string $taskId, string $userId, UpdateTaskDTO $dto): Task
    {
        $eloquentTask = $this->taskRepository->find($taskId, $userId);

        if (!$eloquentTask) {
            throw new \Exception("Task not found");
        }

        return $this->taskRepository->update($eloquentTask->id, $dto);
    }
}
