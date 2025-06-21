<?php

namespace App\Finance\Adapter\Http\Requests\Account;

use App\Finance\Adapter\Http\DTOs\Account\UpdateAccountDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:checking,savings,credit_card',
            'balance' => 'required|numeric|min:0',
            'currency' => 'required|string|max:3',
        ];
    }

    public function getDTO(): UpdateAccountDTO
    {
        return new UpdateAccountDTO(
            id: $this->route('id'),
            name: $this->input('name'),
            balance: $this->input('balance'),
            userId: $this->user()->id,
        );
    }
}
