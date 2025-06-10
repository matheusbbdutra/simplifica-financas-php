<?php

namespace App\Finance\Ports\UseCases\Account;

use App\Finance\Adapter\Http\DTOs\Account\CreateAccountDTO;
use App\Finance\Domain\Entities\Account;

interface CreateAccountUseCaseInterface
{
    public function __invoke(CreateAccountDTO $dto): void;
}
