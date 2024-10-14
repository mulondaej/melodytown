<?php

class Media
{

    private $pdo;
    public int $id;
    public string $file_name;
    public string $publicationDate;
    public string $updateDate;
    public string $username;
    public int $id_users;
    public int $id_topics;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'ktxkVURHF2mt4pk'); //connect to databASe sql
        } catch (PDOException $e) {
            header('Location: /accueil');
        }
    }

    public function checkIfExistsByFile_name()
    {
        $sql = 'SELECT COUNT(file_name) FROM `a8yk4_media` WHERE `file_name` = :file_name';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':file_name', $this->file_name, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    public function create() // ajout de media
    {
        $sql = 'INSERT INTO `a8yk4_media`(`file_name`, publicationDate`, `id_users`) 
        VALUES (:file_name, NOW(), :id_users)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':file_name', $this->file_name, PDO::PARAM_STR);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->execute();
    }

    public function delete() // suppression de réponses pour le topic dans la BDD
    {
        $sql = 'DELETE FROM `a8yk4_media` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `m`.`id`, `m`.`file_name`, 
        DATE_FORMAT(`t`.`publicationDate`, "%d/%m/%y") AS `publicationDate`,
        `u`.`username`, `u`.`avatar`, `m`.`id_users`
        FROM `a8yk4_media` AS `m`
        INNER JOIN `a8yk4_users` AS `u` ON `m`.`id_users` = `u`.`id`
        WHERE `m`.id = :id ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getMedia()
    {
        $sql = 'SELECT *, `u`.`username` 
        FROM  `a8yk4_media` 
        INNER JOIN `a8yk4_users` AS `u` ON `id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getUserMedia()
    {
        $sql = 'SELECT `file_name`
            FROM `a8yk4_media` AS `m`
            INNER JOIN `a8yk4_users` ON `m`.`id_users` = `a8yk4_users`.`id`';
        $req = $this->pdo->query($sql);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }



    public function getMediaByTopics()
    {
        $sql = 'SELECT `m`.`id`,`file_name`, 
        , `u`.`username`, `u`.`avatar`, `id_users`
        FROM `a8yk4_media` AS `m`
        INNER JOIN `a8yk4_users` AS `u` ON `m`.`id_users` = `u`.`id`
        WHERE `id_topics` = :id_topics
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_topics', $this->id_topics, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getList()
    {
        $sql = 'SELECT `m`.`id`, `m`.`file_name`,`u`.`username`, `m`.`id_users`
        FROM `a8yk4_media` AS `m`
        INNER JOIN `a8yk4_users` AS `u` ON `m`.`id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function setMedia() // update de la réponse
    {
        $sql = 'UPDATE `a8yk4_media` SET `file_name`=:file_name 
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':file_name', $this->file_name, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

}