<?php

namespace Domain\Forum\Interfaces;

use Domain\Forum\Entity\Post;

interface PostRepositoryInterface
{
    public function save(Post $post);

    public function findOne(string $uuid): ?Post;
}