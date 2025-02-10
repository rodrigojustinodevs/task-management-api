<?php
namespace App\GraphQL\Mutations;

use App\Application\DTOs\CreateTaskDTO;
use App\Application\UseCases\CreateTaskUseCase;
use App\Domain\Repositories\TaskRepositoryInterface;

class CreateTaskMutation
{
    public function resolve($root, array $args)
    {
        $title = $args['title'];
        $description = $args['description'];
        $status = $args['status'];
        $userId = auth()->id();

        $dto = new CreateTaskDTO($title, $description, $status, $userId);
        $useCase = new CreateTaskUseCase(app()->make(TaskRepositoryInterface::class));
        return $useCase->execute($dto);
    }
}
