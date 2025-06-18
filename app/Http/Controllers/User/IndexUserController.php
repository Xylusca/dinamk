<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexUserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {}

    public function __invoke(Request $request): View
    {
        $users = $this->userService->getUsersPaginated($request->get('search'));

        return view('users.index', compact('users'));
    }
}
