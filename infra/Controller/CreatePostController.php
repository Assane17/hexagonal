<?php

namespace App\Controller;
use DateTime;
use Domain\Forum\Actions\CreatePost;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreatePostController
{
    protected CreatePost $createPost;

    /**
     * @param CreatePost $createPost
     */
    public function __construct(CreatePost $createPost)
    {
        $this->createPost = $createPost;
    }

    public function handleRequest(Request $request)
    {
        if($request->isMethod('GET')){
            ob_start();
            include __DIR__.'/../templates/form.html.php';
            return new Response(ob_get_clean());
        }

      $post =  $this->createPost->execute([
          'titre' => $request->request->get('titre'),
          'description' => $request->request->get('description'),
          'createdAt' =>new DateTime('now'),
          'published' => (int)$request->request->get('published') == 1,
      ]);

        return new Response("<h1>{$post->titre}</h1>");
    }
}