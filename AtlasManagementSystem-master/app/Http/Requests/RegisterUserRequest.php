<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|regex:/\A[ァ-ヴー]+\z/u|max:30',
            'under_name_kana' => 'required|string|regex:/\A[ァ-ヴー]+\z/u|max:30',
            'mail_address' => 'required|email:strict,dns|unique:users,mail_address|max:100',
            'sex' => 'required|in:1,2,3',
            'birth_day' => 'required|date|after_or_equal:2000-01-01|before_or_equal:'.date('Y-m-d'),
            'role' => 'required|in:1,2,3,4',
            'password' => 'required|string|between:8,30|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
{
    return [
        'over_name.required' => '苗字は必ず入力してください。',
        'over_name.string' => '苗字は文字列で入力してください。',
        'over_name.max' => '苗字は10文字以内で入力してください。',
        'under_name.required' => '名前は必ず入力してください',
        'under_name.string' => '名前は文字列で入力してください。',
        'under_name.max' => '名前は10文字以内で入力してください。',
        'over_name_kana.required' => '苗字（カナ）は必ず入力してください。',
        'over_name_kana.string' => '苗字（カナ）は文字列で入力してください。',
        'over_name_kana.regex' => '苗字（カナ）はカタカナで入力してください。',
        'over_name_kana.max' => '苗字（カナ）は30文字以内で入力してください。',
        'under_name_kana.required' => '名前（カナ）は必ず入力してください。',
        'under_name_kana.string' => '名前（カナ）は文字列で入力してください。',
        'under_name_kana.regex' => '名前（カナ）はカタカナで入力してください。',
        'under_name_kana.max' => '名前（カナ）は30文字以内で入力してください。',
        'mail_address.required' => 'メールアドレスは必ず入力してください。',
        'mail_address.email' => '有効なメールアドレスを入力してください。',
        'mail_address.unique' => '入力されたメールアドレスは既に使用されています。',
        'mail_address.max' => 'メールアドレスは100文字以内で入力してください。',
        'sex.required' => '性別を選択してください。',
        'sex.in' => '性別の値が無効です。',
        'birth_day.required' => '生年月日は必ず入力してください。',
        'birth_day.date' => '有効な日付を入力してください。',
        'birth_day.after_or_equal' => '生年月日は2000年1月1日以降で入力してください。',
        'birth_day.before_or_equal' => '生年月日は現在の日付以下で入力してください。',
        'role.required' => '権限を選択してください。',
        'role.in' => '権限の値が無効です。',
        'password.required' => 'パスワードは必ず入力してください。',
        'password.string' => 'パスワードは文字列で入力してください。',
        'password.between' => 'パスワードは8文字以上30文字以内で入力してください。',
        'password.confirmed' => 'パスワードが一致しません。',
        'password_confirmation.required' => 'パスワード確認は必須です。',
    ];
}
}
