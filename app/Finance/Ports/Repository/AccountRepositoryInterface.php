<?php

namespace App\Finance\Ports\Repository;

use App\Finance\Domain\Entities\Account;

interface AccountRepositoryInterface
{
    public function save(Account $account): Account;
    public function listByUserId(int $userId): array;
}
