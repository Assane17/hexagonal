<?php

namespace Adapter;

use DateTime;
use Domain\Forum\Entity\Post;
use Domain\Forum\Interfaces\PostRepositoryInterface;
use PDO;

class PDOPostRepository extends DB implements PostRepositoryInterface
{

    public function __construct()
    {
        parent::__construct();
    }


    public function save(Post $post)
    {
        $sql = $this->getPdo()->prepare(
            'INSERT INTO post SET
                     titre= :titre, 
                     description = :description, 
                     created_at = :created_at, 
                     published = :published,
                     uuid = :uuid'
        );

        $sql->execute([
            'titre'=>$post->getTitre(),
            'description'=>$post->getDescription(),
            'created_at'=>$post->getCreatedAt()->format('Y-m-d H:m:s'),
            'published'=>$post->isPublished() ,
            'uuid'=>$post->getUuid()
        ]);
    }

    /**
     * @throws \Exception
     */
    public function findOne(string $uuid): ?Post
    {
        $sql = $this->getPdo()->prepare('SELECT p.* FROM post AS p WHERE uuid = :uuid');
        $sql->execute(['uuid'=>$uuid]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            return null;
        }
        return new Post($result['titre'],$result['description'],$result['published'],new DateTime($result['created_at']),$result['uuid']);
    }

    public function truncateTable(string $tableName)
    {
        $sql = $this->getPdo()->prepare("DELETE FROM $tableName");
        $sql->execute();
    }
}