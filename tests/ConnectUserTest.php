<?php

use Adapter\PDOUserRepository;
use Domain\Auth\Entity\User;
use Domain\Auth\UseCases\AuthenticatedUser;
use Domain\Auth\UseCases\CreateUser;
use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertTrue;

it( 'authenticate a user', function () {

      $repository = new PDOUserRepository();
      $usecase = new AuthenticatedUser($repository);
      $post = $usecase->authenticate([
           'login'=>'admin',
           'password'=> 'admin'
       ]);
      assertTrue($post, 'user authenticated successfully');
});
