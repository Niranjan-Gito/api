<?php

namespace GitoAPI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class storeAddress extends FormRequest
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
            'alpha_street'  => 'required|alpha_dash',
            'beta_street'   => 'required|alpha_dash',
            'city'          => 'required|alpha',
            'state'         => 'required|alpha',
            'country'       => 'required|alpha',
            'zipcode'       => 'required|numeric',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'alpha_street.required' => 'Primary address field is required.',
            'beta_street.required'  => 'Secondary address field is required.',
            'city.required'         => 'City field is required.',
            'state.required'        => 'State field is required.',
            'country.required'      => 'Country field is required.',
            'zipcode.required'      => 'Zip-code field is required.',

            'alpha_street.alpha_dash' => 'The Primary address may only contain letters, numbers, dashes and underscores.',
            'beta_street.alpha_dash'  => 'Secondary address may contain only letters, numbers, dashes and underscores.',

            'city.alpha'    => 'City  may only contain letters.',
            'state.alpha'   => 'State  may only contain letters.',
            'country.alpha' => 'Country  may only contain letters.',

            'zipcode.numeric'  => 'The Zip-code must be a number.',
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
