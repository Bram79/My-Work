<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginName' => 'required',
            'loginPassword' => 'required'
        ]);

        if (auth()->attempt(['name' => $incomingFields['loginName'], 'password' => $incomingFields['loginPassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:2', 'max:20', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'max:200']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']); //hashed de wachtwoord
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }
}
