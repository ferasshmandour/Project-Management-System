<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function getUsers(): Collection
    {
        return User::all();
    }

    public function getUser($id): User
    {
        return User::findOrFail($id);
    }

    public function createUser(StoreUserRequest $request): void
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function deleteUser(int $id): void
    {
        User::destroy($id);
    }
}
