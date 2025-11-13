<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ============================
    //  VISTAS
    // ============================

    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('registro');
    }

    // ============================
    //  REGISTRO (VERSIÓN SIMPLE)
    // ============================

    public function register(Request $request)
    {
        // Puedes descomentar esto para comprobar que llega:
        // dd($request->all());

        // Validación básica
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:4',
        ]);

        // Crear usuario en BD
        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->role     = 'user'; // si tu tabla tiene este campo
        $user->save();

        // Opcional: iniciar sesión automáticamente
        Auth::login($user);

        // Redirigir al home o al login
        return redirect()->route('home');
        // return redirect()->route('login')->with('ok', 'Cuenta creada, inicia sesión');
    }

    // ============================
    //  LOGIN
    // ============================

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas.',
        ])->withInput($request->only('email'));
    }

    // ============================
    //  LOGOUT
    // ============================

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
