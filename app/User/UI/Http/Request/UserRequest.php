<?php

declare(strict_types=1);

namespace App\User\UI\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|numeric|exists:roles,id',
        ];
    }

    public function getName(): string
    {
        return Arr::get($this->validated(), 'name');
    }

    public function getEmail(): string
    {
        return Arr::get($this->validated(), 'email');
    }

    public function getPassword(): string
    {
        return Arr::get($this->validated(), 'password');
    }

    public function getRoleId(): int
    {
        return (int)Arr::get($this->validated(), 'role_id');
    }

    /**
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_BAD_REQUEST)
        );
    }
}
