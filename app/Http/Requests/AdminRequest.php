<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Validator;
use Hash;
class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
    }
    public function  addValidator() {
        //验证原始密码
        Validator::extend('check_password',function ($attribute, $value, $parameters, $validator){
            return Hash::check($value, Auth::guard('admin')->user()->password);
        });
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->addValidator();
        // sometimes 如果有即必须, confirmed确认前后一致, validator判断原始密码
        return [
            'password' => 'sometimes|required|confirmed',
            'password_confirmation' => 'sometimes|required',
            'original_password' => 'sometimes|required|check_password'
        ];
    }
    public function messages()
    {
        return  [
            'password.required' => '密码不能为空',
            'password.confirmed' => '两次输入密码不一致',
            'original_password.check_password' => '原始密码错误',
            'password_confirmation.required' => '请确认您的密码',
            'original_password.required' => '原始密码不能为空',
        ];
    }
}
