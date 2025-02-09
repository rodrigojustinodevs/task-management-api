<?php
namespace App\Domain\Entities;

use Illuminate\Support\Facades\Hash;

class User
{
    public string $id;
    public string $name;
    public string $email;
    public string $password;

    public function __construct(string $id, string $name, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function setPassword(string $password): void
    {
        $this->password = Hash::make($password);
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
