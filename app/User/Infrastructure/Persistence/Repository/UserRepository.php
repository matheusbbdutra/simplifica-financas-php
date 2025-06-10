<?php

namespace App\User\Infrastructure\Persistence\Repository;

use App\User\Domain\Entities\User;
use App\User\Infrastructure\Persistence\Mappers\UserMapper;
use App\User\Ports\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\User\Infrastructure\Persistence\Models\UserModel;

class UserRepository implements UserRepositoryInterface
{
    public function save(User $user): User
    {
        return DB::transaction(function () use ($user) {
            $model = UserModel::find($user->getId());
            if ($model) {
                $model->name = $user->getName();
                $model->email = $user->getEmail();
                $model->password = $user->getPassword();
                $model->save();
            } else {
                $model = UserModel::create([
                    'id' => $user->getId(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword(),
                ]);
            }
            return UserMapper::userDomainFromModel($model);
        });
    }

    public function findByEmail(string $email): ?UserModel
    {
        return DB::transaction(function () use ($email) {
            return UserModel::where('email', $email)->first();
        });
    }

    public function findById(int $id): ?User
    {
        return DB::transaction(function () use ($id) {
            $model = UserModel::find($id);
            return $model ? UserMapper::userDomainFromModel($model) : null;
        });
    }
}
