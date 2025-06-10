<?php

namespace App\User\Adapter\Http\Requests;

use App\User\Adapter\Http\DTOs\CreateUserDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ];
    }

    public function getDTO(): CreateUserDTO
    {
        return new CreateUserDTO(
            $this->input('name'),
            $this->input('email'),
            $this->input('password'),
        );
    }
}
