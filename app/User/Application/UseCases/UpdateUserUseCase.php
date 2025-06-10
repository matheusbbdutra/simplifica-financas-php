<?php

namespace App\User\Application\UseCases;

use App\User\Adapter\Http\DTOs\UpdateUserDTO;
use App\User\Domain\Entities\User;
use App\User\Infrastructure\Persistence\Models\UserModel;
use App\User\Ports\Repository\UserRepositoryInterface;
use App\User\Ports\UseCases\UpdateUserUseCaseInterface;
use Illuminate\Support\Facades\Auth;

readonly class UpdateUserUseCase implements UpdateUserUseCaseInterface
{
    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    public function __invoke(UpdateUserDTO $dto): User
    {
        $userId = Auth::id();
        if (!$userId) {
            throw new \Exception('User not authenticated');
        }

        $user = $this->repository->findById($userId);

        $user->updateData($dto->getName(), $dto->getEmail(), $dto->getPassword());

        return $this->repository->save($user);
    }
}
