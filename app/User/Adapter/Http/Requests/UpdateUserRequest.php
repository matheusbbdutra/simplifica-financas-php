<?php

namespace App\User\Adapter\Http\Requests;

use App\User\Adapter\Http\DTOs\UpdateUserDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function getDTO(): UpdateUserDTO
    {
        return new UpdateUserDTO(
            $this->get('name'),
            $this->get('email'),
            $this->get('password', '')
        );
    }
}
