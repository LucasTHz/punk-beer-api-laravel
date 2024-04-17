<?php

namespace App\Services\User;

use App\DataTransferObjects\User\UserDTO;
use App\Models\User;

class UserService
{
    public function store(array $userData)
    {
        return User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => bcrypt($userData['password']),
            'date_of_birth' => $userData['dateOfBirth'],
            'document' => $userData['document'],
        ]);
    }
}
