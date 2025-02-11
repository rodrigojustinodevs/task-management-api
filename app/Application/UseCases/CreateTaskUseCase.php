<?php
namespace App\Application\UseCases;

use App\Application\DTOs\CreateTaskDTO;
use App\Models\Task;
use App\Mail\TaskCreatedMail;
use App\Domain\Repositories\TaskRepositoryInterface;
use Illuminate\Support\Facades\Mail;

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

        Mail::to(auth()->user()->email)->send(new TaskCreatedMail($savedTask));

        return $savedTask;
    }
}
