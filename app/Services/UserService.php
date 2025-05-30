<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Models\User;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function createUser(array $data)
    {
        // you can apply business logic here
        return $this->userRepo->create($data);
    }

    public function updateUser(User $user, array $data)
    {
        return $this->userRepo->update($user, $data);
    }

     public function getAllUsers()
    {
        return $this->userRepo->getAll();
    }

    // Add other methods as needed
}
