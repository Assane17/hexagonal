<?php

namespace Domain\Forum\Actions;

use Domain\Forum\Entity\Post;
use Domain\Forum\Interfaces\PostRepositoryInterface;

class CreatePost
{

    protected PostRepositoryInterface $postRepository;
    public function __construct(PostRepositoryInterface $repository)
    {
        $this->postRepository = $repository;
    }

    public function execute(array $postData): ?Post
    {
        $post= new Post(
            $postData['titre'],
            $postData['description'],
            null,
            $postData['createdAt'],
            $postData['published']
        );
        $this->postRepository->save($post);
        return $post;
    }
}