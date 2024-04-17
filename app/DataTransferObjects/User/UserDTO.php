<?php
namespace App\DataTransferObjects\User;

use Illuminate\Http\Request;



readonly class UserDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly string $dateOfBirth,
        public readonly string $document,
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            password: $request->validated('password'),
            dateOfBirth: $request->validated('dateOfBirth'),
            document: $request->validated('document'),
        );
    }
}
