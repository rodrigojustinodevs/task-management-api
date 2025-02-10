<?php
namespace App\Application\UseCases;

use App\Application\DTOs\CreateTaskDTO;
use App\Models\Task;
use App\Domain\Repositories\TaskRepositoryInterface;

class CreateTaskUseCase
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function execute(CreateTaskDTO $dto): Task
    {
        $savedTask = $this->taskRepository->save($dto);

        return $savedTask;
    }
}
