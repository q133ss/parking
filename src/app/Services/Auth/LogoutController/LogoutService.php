<?php

namespace App\Services\Auth\LogoutController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutService
{
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login');
    }
}
