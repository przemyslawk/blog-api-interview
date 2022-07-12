<?php

declare(strict_types=1);

namespace App\User\UI\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class UserListRequest extends FormRequest
{
    public function rules()
    {
        return [
            'page' => 'numeric|min:1',
            'limit' => 'numeric|min:1|max:50',
        ];
    }

    public function getPage(): int
    {
        return Arr::get($this->validated(), 'page', 1);
    }

    public function getLimit(): int
    {
        return Arr::get($this->validated(), 'limit', 50);
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
