<?php

namespace Domain\Auth\UseCases;

use Domain\Auth\Entity\User;
use Domain\Auth\Interfaces\UserRepositoryInterface;

class CreateUser
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->userRepository = $repository;
    }

    public function execute(array $userData): ?User
    {
        $user= new User(
            null,
            $userData['prenom'],
            $userData['nom'],
            $userData['login'],
            $userData['password'],
            $userData['createdAt']
        );
        $this->userRepository->save($user);
        return $user;
    }

    public function truncateUserTable(string $tableName)
    {
        $this->userRepository->truncateTable($tableName);
    }
}