<?php

namespace App\Finance\Application\UseCases\Account;

use App\Finance\Adapter\Http\DTOs\Account\AccountResponseDTO;
use App\Finance\Adapter\Http\DTOs\Account\DeleteAccountDTO;
use App\Finance\Ports\UseCases\Account\DeleteAccountUseCaseInterface;

readonly class DeleteAccountUseCase implements DeleteAccountUseCaseInterface
{

    public function __invoke(DeleteAccountDTO $showAccountDTO): AccountResponseDTO
    {
        // TODO: Implement __invoke() method.
    }
}
