<?php

namespace App\User\Application\UseCases;

use App\User\Adapter\Http\DTOs\LoginUserDTO;
use App\User\Infrastructure\Persistence\Models\UserModel;
use App\User\Ports\Repository\UserRepositoryInterface;
use App\User\Ports\UseCases\LoginUserCaseInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

readonly class LoginUserUseCase implements LoginUserCaseInterface
{
    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    public function __invoke(LoginUserDTO $dto): ?array
    {
       $user =  $this->repository->findByEmail($dto->getEmail());

       if (!$user || ! Hash::check($dto->getPassword(), $user->password)) {
            throw new \DomainException('Invalid credentials.');
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
