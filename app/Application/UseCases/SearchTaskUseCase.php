<?php

namespace App\Application\UseCases;

use App\Domain\Repositories\TaskRepositoryInterface;

class SearchTaskUseCase
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getTaskById($id, $userId)
    {
        return $this->taskRepository->find($id, $userId);
    }

    public function getTasksByTitle($title = '', $userId)
    {
        return $this->taskRepository->searchByTitle($title,$userId);
    }
}
