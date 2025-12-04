<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // 1. Validate form fields
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);

        // 2. Hash password before saving
        $fields['password'] = bcrypt($fields['password']);

        // 3. Create user
        $user = User::create($fields);

        // 4. Log the user in
        Auth::login($user);

        // 5. Redirect to home page
        return redirect()->route('posts.index');

    }
   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email', 'max:255'],
        'password' => ['required', 'min:3'],
    ]);

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended(route('posts.index'));

    }

    return back()->withErrors([
        'auth' => 'Invalid email or password.',
    ])->onlyInput('email');
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
   return redirect()->route('posts.index');

}

}
