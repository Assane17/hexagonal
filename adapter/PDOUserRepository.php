<?php

namespace Adapter;

use DateTime;
use Domain\Auth\Interfaces\UserRepositoryInterface;
use Exception;
use PDO;
use PDOException;
use Domain\Auth\Entity\User;


class PDOUserRepository extends DB implements UserRepositoryInterface
{
    protected ?PDO $pdn = null;

    public function __construct()
    {
        parent::__construct();
    }

    public function save(User $user)
    {
        $sql = $this->getPdo()->prepare('INSERT INTO user (uuid,prenom,nom, login, password, created_at) VALUES (?,?,?,?,?,?)');
        $sql->execute([
            $user->getUuid(),
            $user->getPrenom(),
            $user->getNom(),
            $user->getLogin(),
            $user->getPassword(),
            $user->getCreatedAt()->format('Y-m-d H:m:s')
        ]);
    }

    /**
     * @throws Exception
     */
    public function findOne(string $uuid): ?User
    {
        $sql = $this->getPdo()->prepare('SELECT u.* FROM user AS u WHERE uuid = :uuid');
        $sql->execute(['uuid'=> $uuid]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            return null;
        }
        return new User($result['uuid'],$result['prenom'],$result['nom'],$result['login'],$result['password'],new DateTime($result['created_at']));

    }

    public function login(array $data): bool
    {
        $sql = $this->getPdo()->prepare('SELECT * FROM user  WHERE login = :login');
        $sql->execute(['login'=>$data['login']]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        if(!$result ){
            return false;
        }
       return password_verify($data['password'], $result['password']);
    }

    public function truncateTable(string $tableName)
    {
        $sql = $this->getPdo()->prepare("DELETE FROM $tableName");
        $sql->execute();
    }
}