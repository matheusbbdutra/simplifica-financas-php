<?php

namespace App\Finance\Application\Mappers;

use App\Finance\Adapter\Http\DTOs\Account\CreateAccountDTO;
use App\Finance\Domain\Entities\Account;

class AccountMapper
{
    public static function accountDomainFromCreateAccountDto(CreateAccountDTO $dto): Account
    {
        return new Account(
            null,
            $dto->getName(),
            $dto->getBalance(),
            new \DateTime(),
            $dto->getUserId()
        );
    }
}
