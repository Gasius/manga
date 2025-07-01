<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function show()
    {
        return inertia('Auth/Login');
    }
    public function showRegister()
    {
        return inertia('Auth/Register');
    }
}

