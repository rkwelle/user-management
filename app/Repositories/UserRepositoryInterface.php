<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function getAllUsers();
    public function findUserById(int $id);
    public function createUser(array $data);
    public function updateUser(int $id, array $data);
    public function deleteUser(int $id);

}
