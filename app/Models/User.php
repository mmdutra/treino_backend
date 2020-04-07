<?php

namespace App\Models;

use Firebase\JWT\JWT;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Auth\Authorizable;

class User
{
    use Authenticatable, Authorizable;

    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct(string $name = '', string $email = '', string $password = '')
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): User
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): User
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;

        return $this;
    }

    public function verifyPassword(string $password)
    {
        return Hash::check($password, $this->password);
    }

    public function getToken()
    {
        $payload = [
            'iss' => "lumen-jwt",
            'sub' => $this->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + 60*60 // Expiration time
        ];

        return JWT::encode($payload, env('JWT_SECRET'));
    }
}
