<?php
namespace App\GraphQL\Mutations;

use App\Application\DTOs\UpdateTaskDTO;
use App\Application\UseCases\UpdateTaskUseCase;
use App\Domain\Repositories\TaskRepositoryInterface;

class UpdateTaskMutation
{
    public function resolve($root, array $args)
    {

        $id = $args['id'];
        $title = $args['title'];
        $description = $args['description'];
        $status = $args['status'];
        $userId = auth()->id();

        $dto = new UpdateTaskDTO($id, $title, $description, $status);
        $useCase = new UpdateTaskUseCase(app()->make(TaskRepositoryInterface::class));

        return $useCase->execute($id, $userId, $dto);
    }
}
