<?php

namespace App\User\Application\UseCases;

use App\User\Adapter\Http\DTOs\CreateUserDTO;
use App\User\Application\Mappers\UserMapper;
use App\User\Domain\Entities\User;
use App\User\Ports\Repository\UserRepositoryInterface;
use App\User\Ports\UseCases\CreateUserUseCaseInterface;

readonly class CreateUserUseCase implements CreateUserUseCaseInterface
{
    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    public function __invoke(CreateUserDTO $createUserResponseDTO): User
    {
        $user = UserMapper::userDomainfromDto($createUserResponseDTO);
        return $this->repository->save($user);
    }
}
