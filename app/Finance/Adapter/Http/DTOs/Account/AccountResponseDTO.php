<?php

namespace App\Finance\Adapter\Http\DTOs\Account;

class AccountResponseDTO implements \JsonSerializable
{
    public function __construct(
        private string $id,
        private string $name,
        private float $balance,
        private string $userId,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'balance' => $this->getBalance(),
            'user_id' => $this->getUserId(),
        ];
    }

}
