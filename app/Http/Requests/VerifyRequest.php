<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Dto\SubmissionDto;
use Illuminate\Foundation\Http\FormRequest;

final class VerifyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:200', 'string'],
            'email' => ['required', 'email'],
            'message' => ['required', 'max:2000'],
        ];
    }

    public function getDto() : SubmissionDto
    {
        return new SubmissionDto(
            name: $this->input('name'),
            email: $this->input('email'),
            message: $this->input('message')
        );
    }
}
