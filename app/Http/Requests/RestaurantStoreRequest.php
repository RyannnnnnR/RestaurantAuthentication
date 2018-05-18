<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantStoreRequest extends FormRequest
{
  public function wantsJson()
    {
        return true;
    }
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
          'restname' => 'required|regex:/[a-zA-Z\s]+/',
          'restphone' => 'required|numeric',
          'restaddress1' => 'required|regex:/[a-zA-Z0-9\s]+$/',
          'suburb' => 'required|alpha',
          'state' => 'required|alpha',
          'numberofseats' => 'required|numeric',
        ];
    }
    public function messages()
    {
    return [
        'restname.required' => 'A Restaurant name is required',
        'restphone.required' => 'A Restaurant phone number is required',
        'restaddress1.required' => 'A Restaurant address is required',
        'suburb.required' => 'The Restaurant\'s suburb is required',
        'state.required' => 'The Restaurant\'s state is required',
        'numberofseats.required' => 'The Restaurant\'s number of seats is required',
        'restname.regex' => 'The Restaurant name must be letters and numbers only',
        'restphone.numeric' => 'The Restaurant phone number must be numeric',
        'restaddress1.regex' => 'The Restaurant address must be only letters and numbers',
        'suburb.alpha' => 'The Restaurant\'s suburb must only be letters',
        'state.alpha' => 'The Restaurant\'s state must only be letters',
        'numberofseats.numeric' => 'The Restaurant\'s number of seats must be numeric',
    ];
  }
}
