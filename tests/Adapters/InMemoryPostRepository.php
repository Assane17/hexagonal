<?php

namespace Test\Adapters;

use Domain\Forum\Entity\Post;
use Domain\Forum\Interfaces\PostRepositoryInterface;

class InMemoryPostRepository implements PostRepositoryInterface
{
    public array $posts = [];

    public function findOne(string $uuid): ?Post
    {
        return $this->posts[$uuid] ?? null ;
    }

    public function save(Post $post): Post
    {
        $this->posts[$post->uuid] = $post;
        return $post;
    }
}