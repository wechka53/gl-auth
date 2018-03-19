<?php


namespace App\Http\Requests\User;


use App\Http\Requests\BaseRequest;

/**
 * Class ActivateUserRequest
 * @package App\Http\Requests\User
 */
class ActivateUserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'email|required'
        ];
    }
}