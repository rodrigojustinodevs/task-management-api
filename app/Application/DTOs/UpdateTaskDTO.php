<?php

namespace App\Application\DTOs;

class UpdateTaskDTO
{
    public string $id;
    public ?string $title;
    public ?string $description;
    public ?string $status;

    public function __construct(
        string $id = null,
        ?string $title = null,
        ?string $description = null,
        ?string $status = null,
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
    }
}
