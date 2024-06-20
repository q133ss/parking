<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return (new AdminService())->index($request);
    }
}
