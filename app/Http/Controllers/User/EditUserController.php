<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class EditUserController extends Controller
{
    public function __invoke(User $user): View
    {
        return view('users.edit', compact('user'));
    }
}
