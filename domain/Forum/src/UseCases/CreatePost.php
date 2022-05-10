<?php

namespace Domain\Forum\UseCases;

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
            $postData['published'],
            $postData['createdAt'],
            null
        );
        $this->postRepository->save($post);
        return $post;
    }
    public function truncatePostTable(string $tableName)
    {
        $this->postRepository->truncateTable($tableName);
    }
}