<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{
    public function __construct()
    {
        $this->table = 'users';
    }

    public function buildUser($result): User
    {
        $user = new User($result->name, $result->email, $result->password);
        $user->setId($result->id);

        return $user;
    }

    public function find(int $id)
    {
        $result = $this->createQueryBuilder()->find($id);

        if ($result) return $this->buildUser($result);

        return null;
    }

    public function findUserByEmail(string $email): ?User
    {
        $result = $this->createQueryBuilder()->where('email', $email)->first();

        if (!is_null($result)) return $this->buildUser($result);

        return null;
    }
}
