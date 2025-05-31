<?php

namespace App\User\Ports\UseCases;

use App\User\Adapter\Http\DTOs\CreateUserDTO;
use App\User\Domain\Entities\User;

interface CreateUserUseCaseInterface
{
    public function __invoke(CreateUserDTO $createUserResponseDTO): User;
}
