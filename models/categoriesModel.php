<?php
class Categories
{
    private $pdo;
    public int $id;
    public string $name;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'ktxkVURHF2mt4pk');//connect to databASe sql
        } catch(PDOException $e){
            header('Location: /accueil');
        }
    }

    public function getList() {
        $sql = 'SELECT `id`, `name` FROM `a8yk4_categories`';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

}