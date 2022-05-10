<?php
namespace Domain\Auth\Interfaces;

use Domain\Auth\Entity\User;


interface UserRepositoryInterface
{
    public function save(User $post);

    public function findOne(string $uuid): ?User;

    public function login(array $data): bool;

    public function truncateTable(string $tableName);

}