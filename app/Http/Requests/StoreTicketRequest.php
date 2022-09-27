<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Validation\Validator;


class StoreTicketRequest extends FormRequest
{
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
            'name' => 'required|string',
            'n1' => 'required|integer|between:1,60',
            'n2' => 'required|integer|between:1,60',
            'n3' => 'required|integer|between:1,60',
            'n4' => 'required|integer|between:1,60',
            'n5' => 'required|integer|between:1,60',
            'n6' => 'required|integer|between:1,60',
        ];
    }


    /**
    * Get the error messages for the defined validation rules.*
    * @return array
    */
    protected function failedValidation(Validator $validator)
    {
        $error_messages = $validator->errors()->all();
        throw new HttpResponseException(
            response()->json(
                [
                    'message' => $error_messages,
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            )
        );
    }
}
