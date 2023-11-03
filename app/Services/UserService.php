<?php

namespace App\Services;

use App\Services\Repositories\User\UserRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService
{
    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers(array $criteria): LengthAwarePaginator
    {
        return $this->userRepository->getAllUsers($criteria);
    }
}
