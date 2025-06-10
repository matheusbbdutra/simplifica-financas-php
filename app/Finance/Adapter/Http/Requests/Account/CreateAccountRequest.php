<?php

namespace App\Finance\Adapter\Http\Requests\Account;

use App\Finance\Adapter\Http\DTOs\Account\CreateAccountDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'balance' => 'required|numeric',
        ];
    }

    public function getDTO()
    {
        return new CreateAccountDTO(
            $this->get('name'),
            $this->get('balance', 0.0),
            $this->user()->id,
        );
    }
}
