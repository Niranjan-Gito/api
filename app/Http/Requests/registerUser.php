<?php
namespace GitoAPI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;


class registerUser extends FormRequest
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
            'name'          => 'required|alpha',
            'email'         => 'required|email|unique:users,email,NULL,id,site_id,'.siteId(),
            'phone'         => 'required',
            'password'      => 'required',
        ];
    }


    /**
     * {@inheritdoc}
     */
    protected function formatErrors(Validator $validator)
    {
        return [
            'status' => 'fail',
            'errors' => $validator->errors()->getMessages()
        ];
    }
}