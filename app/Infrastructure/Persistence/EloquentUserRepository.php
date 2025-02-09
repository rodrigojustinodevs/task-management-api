<?php
namespace App\Infrastructure\Persistence;

use App\Domain\Repositories\UserRepositoryInterface;
use App\Domain\Entities\User;
use App\Models\User as EloquentUser;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function save(User $user)
    {
        return EloquentUser::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
        ]);
    }
}
