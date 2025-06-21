<?php

namespace App\Finance\Ports\UseCases\Account;

use App\Finance\Adapter\Http\DTOs\Account\AccountResponseDTO;
use App\Finance\Adapter\Http\DTOs\Account\DeleteAccountDTO;

interface DeleteAccountUseCaseInterface
{
    public function __invoke(DeleteAccountDTO $showAccountDTO): AccountResponseDTO;
}
