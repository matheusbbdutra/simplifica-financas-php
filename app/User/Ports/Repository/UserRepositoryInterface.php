<?php

namespace App\User\Ports\Repository;

use App\User\Domain\Entities\User;
use App\User\Infrastructure\Persistence\Models\UserModel;

interface UserRepositoryInterface
{
    public function save(User $user): User;
    public function findByEmail(string $email): ?UserModel;
    public function findById(int $id): ?User;
}
