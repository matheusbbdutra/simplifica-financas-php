<?php

namespace App\Finance\Adapter\Http\DTOs\Account;

class CreateAccountDTO
{
    public function __construct(
        private string $name,
        private float $balance,
        private int $userId,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}
