<?php

namespace App\Finance\Domain\Entities;

class CreditCard
{
    public function __construct(
        private ?int $id,
        private string $name,
        private float $limitTotal,
        private float $limitAvailable,
        private int $accountId,
        private int $userId
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLimitTotal(): float
    {
        return $this->limitTotal;
    }

    public function setLimitTotal(float $limitTotal): void
    {
        $this->limitTotal = $limitTotal;
    }

    public function getLimitAvailable(): float
    {
        return $this->limitAvailable;
    }

    public function setLimitAvailable(float $limitAvailable): void
    {
        $this->limitAvailable = $limitAvailable;
    }

    public function getAccountId(): int
    {
        return $this->accountId;
    }

    public function setAccountId(int $accountId): void
    {
        $this->accountId = $accountId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }
}
