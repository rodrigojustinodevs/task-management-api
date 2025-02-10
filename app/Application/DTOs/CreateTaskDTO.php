<?php
namespace App\Application\DTOs;

class CreateTaskDTO
{
    public string $title;
    public string $description;
    public string $status;
    public string $userId;

    public function __construct(string $title, string $description, string $status, string $userId)
    {
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->userId = $userId;
    }
}
