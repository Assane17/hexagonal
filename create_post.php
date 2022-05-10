<?php

use Adapter\PDOPostRepository;
use App\Controller\CreatePostController;
use Domain\Forum\UseCases\CreatePost;
use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/vendor/autoload.php';
define('BASE_DB_PATH',dirname(__DIR__).DIRECTORY_SEPARATOR.'DB'.DIRECTORY_SEPARATOR );

$request = Request::createFromGlobals();
$repository = new PDOPostRepository();
$action = new CreatePost($repository);
$controller =  new CreatePostController($action);
$response = $controller->handleRequest($request);
$response->send();