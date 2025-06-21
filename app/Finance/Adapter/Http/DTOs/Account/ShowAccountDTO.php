<?php

namespace App\Finance\Adapter\Http\DTOs\Account;

class ShowAccountDTO
{
    public function __construct(private string $id)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }
}
