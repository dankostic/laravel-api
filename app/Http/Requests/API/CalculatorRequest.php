<?php

namespace App\Http\Requests\API;

use App\Traits\ValidationExceptions;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CalculatorRequest extends FormRequest
{
    use ValidationExceptions;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'selectCurrencyId' => 'required',
            'amount' => 'decimal:0,2',
        ];
    }

    /**
     * @param Validator $validator
     * @return HttpResponseException
     */
    public function failedValidation(Validator $validator): HttpResponseException
    {
        return $this->failedValidationResponse($validator);
    }
}
