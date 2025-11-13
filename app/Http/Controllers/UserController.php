<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar la vista de login
    public function showLoginForm()
    {
        return view('login');
    }

    // Procesar el inicio de sesión
    public function login(Request $request)
    {
        // Validar campos
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticación
        if (Auth::attempt($credentials)) {
            // Regenerar sesión por seguridad
            $request->session()->regenerate();

            // Aquí puedes redirigir según rol si quieres
            // if (Auth::user()->role === 'admin') { ... }

            return redirect()->route('home');
        }

        // Si falla, volver al login con error
        return back()->withErrors([
            'email' => 'Credenciales incorrectas.',
        ])->withInput($request->only('email'));
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
