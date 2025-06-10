<?php

namespace App\User\Domain\Entities;

use App\Finance\Domain\Entities\Account;
use Illuminate\Support\Collection;

class User
{
    private string $password;

    public function __construct(
        private ?int       $id,
        private string     $name,
        private string     $email,
        string     $password,
        private Collection $accounts = new Collection()
    ) {
        $this->setPassword($password);
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getAccounts(): Collection
    {
        return $this->accounts;
    }

    public function setAccounts(Collection $accounts): void
    {
        $this->accounts = $accounts;
    }

    public function addAccount(Account $account): void
    {
        $this->accounts->push($account);
    }

    public function removeAccount(Account $account): void
    {
        $this->accounts = $this->accounts
            ->filter(fn(Account $a) => $a->getId() !== $account->getId())
            ->values();
    }

    public function updateData(string $name, string $email, ?string $password = null): void
    {
        if (
            $this->name === $name &&
            $this->email === $email &&
            (empty($password) || password_verify($password, $this->password))
        ) {
            throw new \DomainException('Nenhum dado foi alterado');
        }

        $this->name = $name;
        $this->email = $email;
        if (!empty($password)) {
            $this->setPassword($password);
        }
    }
}
