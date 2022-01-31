<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    use Traits\ApiFailedValidationHandler;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'id' => [
                'integer',
                'digits:10',
            ],
            'name' => [
                'string',
                'between:2,25',
            ],
            'temperament' => [
                Rule::in([
                    'سرد و خشک',
                    'سرد و تر',
                    'گرم و خشک',
                    'گرم و تر',
                    'متعادل',
                ]),
            ],
            'birth_year' => [
                'integer',
                'between:1200,1400',
            ],
            'birth_month' => [
                'integer',
                'between:1,12',
            ],
            'living_country' => [
                Rule::in([
                    'ایران'
                ]),
            ],
            'living_city' => [
                Rule::in([
                    'تهران',
                    'قزوین',
                    'همدان',
                ]),
            ],
            'sex' => [
                Rule::in(['f', 'm'])
            ],
        ];
    }
}
