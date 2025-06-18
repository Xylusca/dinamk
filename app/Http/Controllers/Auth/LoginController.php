<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard')
                ->with('success', 'Login realizado com sucesso!');

        }

        return back()
            ->withErrors(['email' => 'Credenciais inválidas.'])
            ->withInput($request->only('email'));
    }
}
