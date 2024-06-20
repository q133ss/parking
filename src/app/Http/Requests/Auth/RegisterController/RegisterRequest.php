<?php

namespace App\Http\Requests\Auth\RegisterController;

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
            'name'       => 'required|string',
            'email'      => 'required|email|unique:users,email',
            'car_number' => 'required|string|regex:/^[А-Я]{1}[0-9]{3}[А-Я]{2}[0-9]{2,3}$/u',
            'password'   => 'required|string|min:8|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите имя',
            'name.string'   => 'Имя должно быть строкой',

            'email.required' => 'Введите email',
            'email.email'    => 'Неверный формат email',
            'email.unique'   => 'Пользователь с таким email уже существует',

            'car_number.required' => 'Введите номер авто',
            'car_number.string'   => 'Номер авто должен быть строкой',
            'car_number.regex'    => 'Неверный формат номера авто',

            'password.required'  => 'Введите пароль',
            'password.string'    => 'Пароль должен быть строкой',
            'password.min'       => 'Пароль должен содержать не меньше 8 символов',
            'password.confirmed' => 'Пароли не совпадают',
        ];
    }
}
