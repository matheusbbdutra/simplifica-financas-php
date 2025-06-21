<?php

namespace App\Finance\Ports\UseCases\Account;

use App\Finance\Adapter\Http\DTOs\Account\UpdateAccountDTO;

interface UpdateAccountUseCaseInterface
{
    public function __invoke(UpdateAccountDTO $updateAccountDTO): void;
}
