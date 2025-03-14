<?php

class Subcategories {
    private $pdo;
    public string $name;
    public int $id;
    
    //constructeur de la class
    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'Ox)x_2sosDuTXn-i');//connect to databASe sql
        } catch(PDOException $e){
            header('Location: /accueil');
        }
    }

    public function checkIfExistsById() {
        $sql = 'SELECT COUNT(*) FROM `a8yk4_subcategories` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    public function getList() {
        $sql = 'SELECT `id`, `name` FROM `a8yk4_subcategories`';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSubcategorie() {
        $sql = 'SELECT `a8yk4_subcategories`.`id`, `a8yk4_subcategories`.`name` AS `subCategorie` FROM `a8yk4_subcategories`
        INNER JOIN `a8yk4_topics` ON `a8yk4_subcategories`.`id` = `a8yk4_topics`.`subcategorie_id`';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById() {
        $sql = 'SELECT `id`, `name` FROM `a8yk4_subcategories`
                WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }
    

}