<?php
namespace App\Domain\Entities;


class Task
{
    public string $id;
    public string $title;
    public string $description;
    public string $status;
    public ?UserRelation $user = null;

    public function __construct(
        string $id,
        string $title,
        string $description,
        string $status,
        ?UserRelation $user = null
    ){
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->user = $user;
    }
}
