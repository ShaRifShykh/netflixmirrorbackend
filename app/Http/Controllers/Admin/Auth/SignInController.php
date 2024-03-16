<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function signInView()
    {
        if (Auth::guard("admin")->check())
        {
            return redirect()->route("admin.dashboard");
        }
        return view("admin.pages.auth.signin.signin");
    }
}
