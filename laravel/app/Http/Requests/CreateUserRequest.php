<?php

namespace App\Http\Requests;

class CreateUserRequest extends UserRequest
{
    public function rules(): array
    {
        return \array_merge_recursive(parent::rules(), [
            'id' => [
                'required',
            ],
            'name' => [
                'required',
            ],
            'temperament' => [
                'required',
            ],
            'birth_year' => [
                'required',
            ],
            'birth_month' => [
                'required',
            ],
            'living_country' => [
                'required',
            ],
            'living_city' => [
                'required',
            ],
            'sex' => [
                'required',
            ],
        ]);
    }
}
