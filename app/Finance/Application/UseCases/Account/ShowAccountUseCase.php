<?php

namespace App\Finance\Application\UseCases\Account;

use App\Finance\Adapter\Http\DTOs\Account\AccountResponseDTO;
use App\Finance\Adapter\Http\DTOs\Account\ShowAccountDTO;
use App\Finance\Ports\UseCases\Account\ShowAccountUseCaseInterface;

readonly class ShowAccountUseCase implements ShowAccountUseCaseInterface
{
    public function __invoke(ShowAccountDTO $showAccountDTO): AccountResponseDTO
    {
        // TODO: Implement __invoke() method.
    }
}
