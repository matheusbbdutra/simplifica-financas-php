<?php

namespace App\Finance\Adapter\Http\Requests\Account;

use App\Finance\Adapter\Http\DTOs\Account\DeleteAccountDTO;
use Illuminate\Foundation\Http\FormRequest;

class DeleteAccountRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|string|uuid',
        ];
    }

    public function getDTO(): DeleteAccountDTO
    {
        return new DeleteAccountDTO($this->input('id'));
    }
}
