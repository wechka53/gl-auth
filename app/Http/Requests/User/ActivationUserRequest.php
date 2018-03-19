<?php


namespace App\Http\Requests\User;


use App\Http\Requests\BaseRequest;

/**
 * Class ActivationUserRequest
 * @package App\Http\Requests\User
 */
class ActivationUserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'uuid|required',
            'token' => 'string|required'
        ];
    }
}