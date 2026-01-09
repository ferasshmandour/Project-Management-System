<?php

namespace App\Services;

use App\Models\User;
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
}
