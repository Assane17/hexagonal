<?php

use App\Controller\CreatePostController;
use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/vendor/autoload.php';
$request = Request::createFromGlobals();
$controller =  new CreatePostController();
$response = $controller->handleRequest($request);
$response->send();