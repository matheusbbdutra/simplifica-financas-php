<?php

namespace App\User\Ports\UseCases;

use App\User\Adapter\Http\DTOs\UpdateUserDTO;
use App\User\Domain\Entities\User;
use App\User\Infrastructure\Persistence\Models\UserModel;

interface UpdateUserUseCaseInterface
{
    public function __invoke(UpdateUserDTO $dto): User;
}
