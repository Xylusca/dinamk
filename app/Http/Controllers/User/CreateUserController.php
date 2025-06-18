<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreateUserController extends Controller
{
    public function __invoke(): View
    {
        return view('users.create');
    }
}
