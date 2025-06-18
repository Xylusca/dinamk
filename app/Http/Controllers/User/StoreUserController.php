<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;

class StoreUserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {}

    public function __invoke(StoreUserRequest $request): RedirectResponse
    {
        $this->userService->createUser($request->validated());

        return redirect()->route('users.index')
            ->with('success', 'Usuário criado com sucesso! E-mail de boas-vindas enviado.');
    }
}
