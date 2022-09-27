<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Validation\Validator;


class SaveDrawingRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:255|min:3',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'status' => 'in:pending,active,finished',
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
