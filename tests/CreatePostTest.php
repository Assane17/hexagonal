<?php

use Domain\Forum\Actions\CreatePost;
use Domain\Forum\Entity\Post;
use Test\Adapters\InMemoryPostRepository;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;

it('create a post', function () {

      $repository = new InMemoryPostRepository;
      $usecase = new CreatePost($repository);
      $post = $usecase->execute([
           'titre'=>'le titre',
           'description'=>'la description',
           'createdAt'=>new DateTime('2020-01-01 14:36:32'),
           'published'=> true
       ]);
      assertInstanceOf(Post::class, $usecase);
      assertEquals($post, $repository->findOne($post->uuid));
});
