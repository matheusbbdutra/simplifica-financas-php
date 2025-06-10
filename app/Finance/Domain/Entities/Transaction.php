<?php

namespace App\Finance\Domain\Entities;

class Transaction
{
    public function __construct(
        private ?int $id,
        private string $description,
        private float $amount,
        private \DateTime  $dueDate,
        private ?\DateTime $paidAt = null,
        private bool       $isEffected = false,
        private ?int       $categoryId = null,
        private ?int       $subcategoryId = null,
        private string     $accountId,
        private bool       $isRecurring = false,
        private ?int       $installmentNumber = null,
        private ?int       $totalInstallments = null,
        private ?int       $creditCardId = null,
        private int        $typeId,
        private int        $userId
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getDueDate(): \DateTime
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    public function getPaidAt(): ?\DateTime
    {
        return $this->paidAt;
    }

    public function setPaidAt(?\DateTime $paidAt): void
    {
        $this->paidAt = $paidAt;
    }

    public function isEffected(): bool
    {
        return $this->isEffected;
    }

    public function setIsEffected(bool $isEffected): void
    {
        $this->isEffected = $isEffected;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function getSubcategoryId(): ?int
    {
        return $this->subcategoryId;
    }

    public function setSubcategoryId(?int $subcategoryId): void
    {
        $this->subcategoryId = $subcategoryId;
    }

    public function getAccountId(): string
    {
        return $this->accountId;
    }

    public function setAccountId(string $accountId): void
    {
        $this->accountId = $accountId;
    }

    public function isRecurring(): bool
    {
        return $this->isRecurring;
    }

    public function setIsRecurring(bool $isRecurring): void
    {
        $this->isRecurring = $isRecurring;
    }

    public function getInstallmentNumber(): ?int
    {
        return $this->installmentNumber;
    }

    public function setInstallmentNumber(?int $installmentNumber): void
    {
        $this->installmentNumber = $installmentNumber;
    }

    public function getTotalInstallments(): ?int
    {
        return $this->totalInstallments;
    }

    public function setTotalInstallments(?int $totalInstallments): void
    {
        $this->totalInstallments = $totalInstallments;
    }

    public function getCreditCardId(): ?int
    {
        return $this->creditCardId;
    }

    public function setCreditCardId(?int $creditCardId): void
    {
        $this->creditCardId = $creditCardId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function setTypeId(int $typeId): void
    {
        $this->typeId = $typeId;
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
