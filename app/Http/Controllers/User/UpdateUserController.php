<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;

class UpdateUserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {}

    public function __invoke(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $this->userService->updateUser($user, $request->validated());

        return redirect()->route('users.index')
            ->with('success', 'Usuário atualizado com sucesso!');
    }
}
