<?php

namespace Domain\Auth\UseCases;

use Domain\Auth\Entity\User;
use Domain\Auth\Interfaces\UserRepositoryInterface;

class AuthenticatedUser
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->userRepository = $repository;
    }

    public function authenticate(array $userData): bool
    {
       return $this->userRepository->login($userData);

    }
}