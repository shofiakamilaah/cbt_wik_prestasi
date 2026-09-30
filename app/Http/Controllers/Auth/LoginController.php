<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->isTeacher()) {
                return redirect()->route('admin.dashboard')->with('success', 'Berhasil login.');
            }

            return redirect()->route('home')->with('success', 'Berhasil login.');
        }

        return back()
            ->withErrors(['email' => 'Email atau password yang dimasukkan tidak sesuai.'])
            ->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with(
            'success',
            'Berhasil logout.'
        );;
    }

}
