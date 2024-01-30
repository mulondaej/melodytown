<?php 

class Answers {

    private $pdo;
    public int $id;
    public string $content;
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

    public function checkIfExistsByContent()
        {
            $sql = 'SELECT COUNT(content) FROM `a8yk4_topicanswers` WHERE `content` = :content';
            $req = $this->pdo->prepare($sql);
            $req->bindValue(':content', $this->content, PDO::PARAM_STR);
            $req->execute();
            return $req->fetch(PDO::FETCH_COLUMN);
        }

    public function create()
    {
        $sql = 'INSERT INTO `a8yk4_topicanswers`( `content`,`publicationDate`,`updateDate`, 
        `username`, `id_users`, `id_topics`) 
        VALUES (:content, NOW(), NOW(), :username, :id_users, :id_topics)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->bindValue(':id_topics', $this->id_topics, PDO::PARAM_INT);
        $req->execute();
    }

    public function delete()
    {
        $sql = 'DELETE FROM `a8yk4_topicanswers` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getAnswer()
    {
        $sql = 'SELECT * FROM  `a8yk4_topicanswers` ORDER BY `publicationDate` DESC LIMIT 1';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getById()
    {
        $sql = 'SELECT `content`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate` 
        FROM `a8yk4_topicanswers`
        INNER JOIN `a8yk4_users` ON `a8yk4_topicanswers`.`id_users` = `a8yk4_users`.`id`
        WHERE `a8yk4_users`.`id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getList()
    {
        $sql = 'SELECT `a`.`id`, SUBSTR(`a`.`content`, 1, 500) AS `content`,
        DATE_FORMAT(`a`.`publicationDate`, "%d/%m/%y") AS `publicationDate`,
        DATE_FORMAT(`a`.`updateDate`, "%d/%m/%y") AS `updateDate`,
        `u`.`username`, `a`.`id_users`, `a`.`id_topics`
        FROM `a8yk4_topicanswers` AS `a`
        INNER JOIN `a8yk4_users` AS `u` ON `a`.`id_users` = `u`.`id`
        INNER JOIN `a8yk4_topics` AS `t` ON `a`.`id_topics` = `t`.`id`';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function update()
    {
        $sql = 'UPDATE `a8yk4_topicanswers` SET `content`=:content , `publicationDate` = :publicationDate 
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':publicationDate', $this->publicationDate, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
}