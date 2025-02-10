<?php

namespace App\Domain\Repositories;

use App\Application\DTOs\CreateTaskDTO;
use App\Application\DTOs\UpdateTaskDTO;
use App\Models\Task;

interface TaskRepositoryInterface
{
    public function save(CreateTaskDTO $task): Task;
    public function update(string $id, UpdateTaskDTO $task): Task;
    public function find(string $id, string $userId): ?Task;
    public function searchByTitle(string $title, string $userId): array;
    public function delete(string $title, string $userId);
}
