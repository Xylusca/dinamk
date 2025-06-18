<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use App\Events\UserCreated;

class UserService
{
    public function createUser(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        event(new UserCreated($user));

        return $user;
    }

    public function updateUser(User $user, array $data): User
    {
        $updateData = [
            'name' => $data['name'],
            'email' => $data['email'],
        ];

        if (!empty($data['password'])) {
            $updateData['password'] = Hash::make($data['password']);
        }

        $user->update($updateData);

        return $user;
    }

    public function getUsersPaginated(?string $search = null): LengthAwarePaginator
    {
        $query = User::query()
            ->select('id', 'name', 'email', 'created_at');

        if ($search) {
            $query->search($search);
        }

        return $query->orderBy('created_at', 'desc')->paginate(5);
    }

    public function deleteUser(User $user): bool
    {
        return $user->delete();
    }
}
