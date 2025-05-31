<?php

namespace App\Services\User;

use App\Models\User;

class UserService
{
    public function store(array $userData): User
    {
        return User::create($userData);
    }

    public function update(array $userData, User $user): bool
    {
        return $user->update($userData);
    }
}