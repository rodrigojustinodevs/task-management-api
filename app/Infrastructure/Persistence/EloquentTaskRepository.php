<?php

namespace App\Infrastructure\Persistence;

use App\Application\DTOs\CreateTaskDTO;
use App\Application\DTOs\UpdateTaskDTO;
use App\Domain\Repositories\TaskRepositoryInterface;
use App\Models\Task as EloquentTask;

class EloquentTaskRepository implements TaskRepositoryInterface
{
    public function save(CreateTaskDTO $task): EloquentTask
    {
        $eloquentTask = EloquentTask::create([
            'title' => $task->title,
            'description' => $task->description,
            'status' => $task->status,
            'user_id' => $task->userId,
        ]);

        $eloquentTask->load(['user:id,name']);

        return $eloquentTask;
    }

    public function find($taskId, $userId): ?EloquentTask
    {
        return EloquentTask::where('id', $taskId)
                   ->where('user_id', $userId)
                   ->first();
    }


    public function searchByTitle($title, $userId): array
    {
        return EloquentTask::where('title', 'LIKE', '%' . $title . '%')
                            ->where('user_id', '=', $userId)
                            ->with(['user:id,name']);
    }

    public function update(string $taskId, UpdateTaskDTO $task): EloquentTask
    {
        $existingTask = EloquentTask::find($taskId);

        if (!$existingTask) {
            throw new \Exception("Task not found");
        }


        $existingTask->title = $task->title;
        $existingTask->description = $task->description;
        $existingTask->status = $task->status;

        $existingTask->save();

        return $existingTask;
    }

    public function delete($taskId, $userId)
    {
        $task = EloquentTask::where('id', $taskId)
                ->where('user_id', $userId)
                ->firstOrFail();

        $task->delete();

        return $task;
    }

}
