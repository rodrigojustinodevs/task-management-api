<?php

namespace App\GraphQL\Mutations;

use App\Application\UseCases\DeleteTaskUseCase;
use App\Domain\Repositories\TaskRepositoryInterface;

class DeleteTaskMutation
{
    public function resolve($root, array $args)
    {
        $id = $args['id'];
        $userId = auth()->id();

        $useCase = new DeleteTaskUseCase(app()->make(TaskRepositoryInterface::class));

        return $useCase->execute($id, $userId);
    }
}
