<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()   
    {
        return User::all();
    }

    public function findUserById(int $id)
    {
        return User::findOrFail($id);
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function updateUser(int $id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser(int $id)
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }


}