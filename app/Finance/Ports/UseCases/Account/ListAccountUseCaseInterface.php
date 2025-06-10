<?php

namespace App\Finance\Ports\UseCases\Account;

interface ListAccountUseCaseInterface
{
    public function __invoke(): array;
}
