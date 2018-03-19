<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

/**
 * Class UserRegistrationRequest
 *
 * @package App\Http\Requests
 */
class RegistrationRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|exists:roles,type'
        ];
    }

}
