<?php

namespace App\Services\Auth\LoginController;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login(array $data)
    {
        $user = User::where('email', $data['email'])->first();
        $remember = false;
        if(isset($data['remember'])){
            $remember = true;
        }
        Auth::login($user, $remember);
        return to_route('lk.index');
    }
}
