<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register()
    {
    }

    public function store()
    {
    }

    public function login()
    {
        return view("auth.login-admin");
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            "email" => "required|email:rfc,dns",
            'password' => 'required',
        ]);

        // Remember
        $remember = false;
        if ($request->remember == "on") {
            $remember = true;
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            switch (Auth::user()->roles[0]->name) {
                case Role::SUPER_ADMIN:
                case Role::ADMIN:
                    $request->session()->regenerate();
                    return redirect()->route('admin.dashboard');
                    break;
                default:
                    $request->session()->regenerate();
                    return redirect()->route('login');
                    break;
            }
        } else {
            return back()->withErrors(["invalid_credential" => "Invalid credential !"])->onlyInput("invalid_credential");
        }
    }

    // Logout user
    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('login')->with("success", "Logged out!");
    }
}
