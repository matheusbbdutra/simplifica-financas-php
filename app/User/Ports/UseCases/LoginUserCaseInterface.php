<?php

namespace App\User\Ports\UseCases;

use App\User\Adapter\Http\DTOs\LoginUserDTO;
use App\User\Infrastructure\Persistence\Models\UserModel;
use Illuminate\Contracts\Auth\Authenticatable;

interface LoginUserCaseInterface
{
    public function __invoke(LoginUserDTO $dto): ?array;
}
