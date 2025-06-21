<?php

namespace App\Finance\Ports\UseCases\Account;

use App\Finance\Adapter\Http\DTOs\Account\AccountResponseDTO;
use App\Finance\Adapter\Http\DTOs\Account\ShowAccountDTO;
use App\Finance\Domain\Entities\Account;

interface ShowAccountUseCaseInterface
{
    public function __invoke(ShowAccountDTO $showAccountDTO): AccountResponseDTO;
}
