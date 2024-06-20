<?php

namespace App\Services\Auth\RegisterController;

use App\Http\Requests\Auth\RegisterController\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterService
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['role_id'] = Role::where('slug', 'user')->pluck('id')->first();
        $user = User::create($data);
        Auth::login($user, true);
        return to_route('lk.index');
    }
}
