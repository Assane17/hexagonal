<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreatePostController
{
    public function handleRequest(Request $request)
    {
        if($request->isMethod('GET')){
            ob_start();
            include __DIR__.'../templates/form.html.php';
            return new Response(ob_get_clean());
        }



    }
}