<?php

use Adapter\PDOPostRepository;
use Domain\Forum\UseCases\CreatePost;
use Domain\Forum\Entity\Post;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;

it('create a post', function () {

      $repository = new PDOPostRepository();
      $usecase = new CreatePost($repository);
      $usecase->truncatePostTable('post');
      $post = $usecase->execute([
           'titre'=>'le titre',
           'description'=>'la description',
           'createdAt'=>new DateTime('2020-01-01 14:01:01'),
           'published'=> 1
       ]);
      assertInstanceOf(Post::class, $post);
      assertEquals($post, $repository->findOne($post->getUuid()));
});
