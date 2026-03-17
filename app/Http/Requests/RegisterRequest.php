<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users,email',
            'password'=>'required|string|min:8|confirmed',
            'role'=>'required|in:Admin,User'
        ];
    }

      public function messages(): array
    {
        return [
            'name.required'    => 'الاسم مطلوب.',
            'email.required'   => 'البريد الإلكتروني مطلوب.',
            'email.unique'     => 'هذا البريد الإلكتروني مستخدم بالفعل.',
            'password.required'=> 'كلمة المرور مطلوبة.',
            'password.confirmed'=> 'تأكيد كلمة المرور غير متطابق.',
            'role.required'    => 'يجب تحديد دور المستخدم.',
            'role.in'          => 'الدور يجب أن يكون أحد القيم: Admin, merchant, User',
        ];
    }
}
