<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Login\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check())
        {
            return view('admin.index.index');
        } else
        {
            return view('admin.login.index');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }

    public function postLogin(LoginRequest $request)
    {
        $username = $request->username;
        $password = $request->password;
        if (Auth::attempt(['username' => $username, 'password' => $password])) {

            return redirect()->route('admin.index.index');
        } else {
            
            return redirect()->intended(route('login'));
        }
    }
}
