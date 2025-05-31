<?php

namespace App\User\Infrastructure\Persistence\Mappers;

use App\User\Domain\Entities\User;
use App\User\Infrastructure\Persistence\Models\UserModel;

class UserMapper
{
    public static function toModel(User $user): UserModel
    {
        $model = new UserModel([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
        ]);

        if ($user->getId() !== null) {
            $model->id = $user->getId();
        }

        return $model;
    }

    public static function toDomain(UserModel $model): User
    {
        return new User(
            $model->id,
            $model->name,
            $model->email,
            $model->password
        );
    }
}
