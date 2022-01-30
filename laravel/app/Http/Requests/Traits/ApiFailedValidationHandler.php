<?php

namespace App\Http\Requests\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait ApiFailedValidationHandler
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'result' => $validator->getMessageBag()->all(),
            ]),
            422
        );
    }
}
