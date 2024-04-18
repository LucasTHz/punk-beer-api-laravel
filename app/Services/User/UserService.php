<?php

namespace App\Services\User;

use App\Models\User;

class UserService
{
    public function store(array $userData): User
    {
        return User::create([
            'name'          => $userData['name'],
            'email'         => $userData['email'],
            'password'      => bcrypt($userData['password']),
            'date_of_birth' => $userData['dateOfBirth'],
            'document'      => $userData['document'],
        ]);
    }

    public function update(array $userData, User $user): bool
    {
        return $user::update([
            'name'          => $userData['name'],
            'email'         => $userData['email'],
            'date_of_birth' => $userData['dateOfBirth'],
        ]);
    }
}
