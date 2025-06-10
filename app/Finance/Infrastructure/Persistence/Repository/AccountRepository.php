<?php

namespace App\Finance\Infrastructure\Persistence\Repository;

use App\Finance\Domain\Entities\Account;
use App\Finance\Infrastructure\Persistence\Mappers\AccountMapper;
use App\Finance\Infrastructure\Persistence\Models\AccountModel;
use App\Finance\Ports\Repository\AccountRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AccountRepository implements AccountRepositoryInterface
{
    public function save(Account $account): Account
    {
       return DB::transaction(function () use ($account) {
           if ($account->getId() !== null) {
               $model = AccountModel::find($account->getId());
               if ($model) {
                   $model->name = $account->getName();
                   $model->balance = $account->getBalance();
                   $model->created_at = $account->getCreatedAt();
                   $model->user_id = $account->getUserId();
                   $model->save();
               }
           } else {
               $model = AccountModel::create([
                   'name' => $account->getName(),
                   'balance' => $account->getBalance(),
                   'created_at' => $account->getCreatedAt(),
                   'user_id' => $account->getUserId(),
               ]);
           }
            return AccountMapper::accountDomainFromModel($model);
        });
    }

    public function listByUserId(int $userId): array
    {
        $models = AccountModel::where('user_id', $userId)->get();

        if ($models->isEmpty()) {
            return [];
        }

        return array_map(
            fn($model) => AccountMapper::accountDomainFromModel($model),
            $models->all()
        );
    }
}
