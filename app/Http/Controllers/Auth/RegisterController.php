<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {}

    public function __invoke(RegisterRequest $request): RedirectResponse
    {
        $user = $this->userService->createUser($request->validated());

        Auth::login($user);

        return redirect()->route('dashboard')
            ->with('success', 'Conta criada com sucesso! Bem-vindo!');
    }
}
