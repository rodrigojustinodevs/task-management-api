<?php
namespace App\GraphQL\Mutations;

use App\Application\DTOs\CreateUserDTO;
use App\Application\UseCases\CreateUserUseCase;
use App\Domain\Repositories\UserRepositoryInterface;

class CreateUserMutation
{
    public function resolve($root, array $args)
    {
        $name = $args['name'];
        $email = $args['email'];
        $password = $args['password'];

        $dto = new CreateUserDTO($name, $email, $password);
        $useCase = new CreateUserUseCase(app()->make(UserRepositoryInterface::class));

        return $useCase->execute($dto);
    }
}
