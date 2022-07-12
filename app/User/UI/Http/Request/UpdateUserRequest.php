<?php

declare(strict_types=1);

namespace App\User\UI\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|min:3|max:15',
            'email' => 'nullable|email|unique:users, email',
            'role_id' => 'nullable|integer|exists:roles,id',
        ];
    }

    public function getName(): ?string
    {
        return Arr::get($this->validated(), 'name');
    }

    public function getEmail(): ?string
    {
        return Arr::get($this->validated(), 'email');
    }

    public function getRoleId(): ?int
    {
        return Arr::get($this->validated(), 'role_id') !== null ? (int)Arr::get($this->validated(), 'role_id') : null;
    }
}
