<?php

use App\Controller\CreatePostController;
use Domain\Forum\Actions\CreatePost;
use Symfony\Component\HttpFoundation\Request;
use Test\Adapters\InMemoryPostRepository;

require __DIR__.'/vendor/autoload.php';
$request = Request::createFromGlobals();
$repository = new InMemoryPostRepository();
$action = new CreatePost($repository);
$controller =  new CreatePostController($action);
$response = $controller->handleRequest($request);
$response->send();