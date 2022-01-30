<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
{
    use Traits\ApiFailedValidationHandler;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
                'integer',
                'digits:10',
            ],
            'name' => [
                'required',
                'string',
                'min:2',
                'max:25',
            ],
            'temperament' => [
                'required',
                Rule::in([
                    'سرد و خشک',
                    'سرد و تر',
                    'گرم و خشک',
                    'گرم و تر',
                    'متعادل',
                ]),
            ],
            'birth_year' => [
                'required',
                'integer',
                'min:1200',
                'max:1400',
            ],
            'birth_month' => [
                'required',
                'integer',
                'min:1',
                'max:12',
            ],
            'living_country' => [
                'required',
                Rule::in([
                    'ایران'
                ]),
            ],
            'living_city' => [
                'required',
                Rule::in([
                    'تهران',
                    'قزوین',
                    'همدان',
                ]),
            ],
            'sex' => [
                'required',
                Rule::in(['f', 'm'])
            ],
        ];
    }
}
