<?php

namespace App\Http\Requests\VPN;

use Illuminate\Foundation\Http\FormRequest;

class CreateVPNRequest extends FormRequest
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
        return array(
            'username' => 'required|unique:vpn_users|min:4|max:12|regex:/(^[a-z0-9])/',
            'password' => 'required',
            'phone' => 'required|min:11|max:15|regex:/([+0-9])+$/',
            'days' => 'required|regex:/([0-9])+$/',
            'platform' => 'required',
            'slip' => 'required|image',
            'dateOfSlip' => 'required'
        );
    }
}
