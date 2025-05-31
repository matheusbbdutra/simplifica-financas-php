<?php

namespace App\User\Application\Mappers;

use App\User\Domain\Entities\User;
use App\User\Adapter\Http\DTOs\CreateUserDTO;

readonly class UserMapper
{
    public static function fromDto(CreateUserDTO $dto): User
    {
        return new User(
            null,
            $dto->getName(),
            $dto->getEmail(),
            $dto->getPassword()
        );
    }
}
