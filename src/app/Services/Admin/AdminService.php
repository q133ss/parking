<?php

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Http\Request;

class AdminService
{
    public function index(Request $request)
    {
        $users = User::withFilter($request)->where('id', '!=', Auth()->id())->get();
        return view('admin.index', compact('users'));
    }
}
