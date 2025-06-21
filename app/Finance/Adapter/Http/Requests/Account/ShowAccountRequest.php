<?php

namespace App\Finance\Adapter\Http\Requests\Account;

use App\Finance\Adapter\Http\DTOs\Account\ShowAccountDTO;
use Illuminate\Foundation\Http\FormRequest;

class ShowAccountRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|string|uuid',
        ];
    }

    public function getDTO(): ShowAccountDTO
    {
        return new ShowAccountDTO($this->route('id'));
    }

}
