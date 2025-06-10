<?php

namespace App\User\Adapter\Http\Requests;

use App\User\Adapter\Http\DTOs\LoginUserDTO;
use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
     public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function getDTO(): LoginUserDTO
    {
        return new LoginUserDTO(
            $this->get('email'),
            $this->get('password')
        );
    }
}
