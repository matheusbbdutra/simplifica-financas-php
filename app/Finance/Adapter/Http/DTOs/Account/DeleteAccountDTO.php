<?php

namespace App\Finance\Adapter\Http\DTOs\Account;

class DeleteAccountDTO
{
    public function __construct(private string $id)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }
}
