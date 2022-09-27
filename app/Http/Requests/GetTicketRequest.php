<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Validation\Validator;


class GetTicketRequest extends FormRequest
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

    public function prepareForValidation(){
        $this->merge([
            'code' => $this->route('ticketCode')
        ]);


    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|exists:tickets,code'
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
