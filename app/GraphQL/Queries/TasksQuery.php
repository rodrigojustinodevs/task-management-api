<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Application\UseCases\SearchTaskUseCase;
use App\Models\Task;
use Tymon\JWTAuth\Facades\JWTAuth;

class TasksQuery
{
    protected $searchTask;

    public function __construct(SearchTaskUseCase $searchTask)
    {
        $this->searchTask = $searchTask;
    }

    public function resolve($root, array $args)
    {

        $userId = auth()->id();

        if (isset($args['id'])) {
            $task = $this->searchTask->getTaskById($args['id'], $userId);
            return $task ? [$task] : [];
        }

        return $this->searchTask->getTasksByTitle($args['title'], $userId);
    }
}
