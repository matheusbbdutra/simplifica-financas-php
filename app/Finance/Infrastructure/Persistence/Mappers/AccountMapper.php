<?php

namespace App\Finance\Infrastructure\Persistence\Mappers;


use App\Finance\Domain\Entities\Account;
use App\Finance\Infrastructure\Persistence\Models\AccountModel;

class AccountMapper
{
    public static function accountModelFromDomain(Account $account): AccountModel
    {
        $data = [
            'name' => $account->getName(),
            'balance' => $account->getBalance(),
            'created_at' => $account->getCreatedAt(),
            'user_id' => $account->getUserId(),
        ];

        if ($account->getId() !== null) {
            $data['id'] = $account->getId();
        }

        return new AccountModel($data);
    }

    public static function accountDomainFromModel(AccountModel $model): Account
    {
        return new Account(
            $model->id,
            $model->name,
            $model->balance,
            $model->created_at,
            $model->user_id,
        );
    }
}
