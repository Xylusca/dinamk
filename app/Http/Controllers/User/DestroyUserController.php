<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;

class DestroyUserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {}

    public function __invoke(User $user): RedirectResponse
    {
        $this->userService->deleteUser($user);

        return redirect()->route('users.index')
            ->with('success', 'Usuário excluído com sucesso!');
    }
}
