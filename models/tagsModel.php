<?php
class Tags
{
    private $pdo;
    public int $id;
    public string $name;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'Ox)x_2sosDuTXn-i');//connect to databASe sql
        } catch(PDOException $e){
            header('Location: /accueil');
        }
    }

    public function checkIfExistsById()
    {
        $sql = 'SELECT COUNT(`id`) FROM `a8yk4_tags` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    public function getList() {
        $sql = 'SELECT `id`, `name` FROM `a8yk4_tags`';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

}