<?php

use Adapter\PDOUserRepository;
use Domain\Auth\Entity\User;
use Domain\Auth\UseCases\CreateUser;
use function PHPUnit\Framework\assertInstanceOf;

it( 'create a user', function () {

      $repository = new PDOUserRepository();
      $usecase = new CreateUser($repository);
      $usecase->truncateUserTable('user');
      $post = $usecase->execute([
           'prenom'=>'Assane',
           'nom'=>'Dione',
           'login'=>'admin',
           'password'=>password_hash('admin', PASSWORD_DEFAULT),
           'createdAt'=>new DateTime('2020-01-01 14:01:01')
       ]);
      assertInstanceOf(User::class, $post);
});
