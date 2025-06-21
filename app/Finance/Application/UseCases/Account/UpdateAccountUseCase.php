<?php

namespace App\Finance\Application\UseCases\Account;

use App\Finance\Adapter\Http\DTOs\Account\UpdateAccountDTO;
use App\Finance\Ports\UseCases\Account\UpdateAccountUseCaseInterface;

readonly class UpdateAccountUseCase implements UpdateAccountUseCaseInterface
{
    public function __invoke(UpdateAccountDTO $updateAccountDTO): void
    {
        // TODO: Implement __invoke() method.
    }
}
