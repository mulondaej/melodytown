<?php 

class Comments {

    private $pdo;
    public int $id;
    public int $content;
    public int $publicationDate;
    public int $updateDate;
    public int $username;
    public int $id_status;
    public int $id_users;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'ktxkVURHF2mt4pk'); //connect to databASe sql
        } catch (PDOException $e) {
            header('Location: /accueil');
        }
    }

    public function checkIfExistsByReply()
        {
            $sql = 'SELECT COUNT(content) FROM `a8yk4_comments` WHERE `reply` = :reply';
            $req = $this->pdo->prepare($sql);
            $req->bindValue(':content', $this->content, PDO::PARAM_STR);
            $req->execute();
            return $req->fetch(PDO::FETCH_COLUMN);

        }

    public function create()
    {
        $sql = 'INSERT INTO `a8yk4_comments`(`content`,`publicationDate`, 
        `updateDate`, `username`, `id_status`,`id_users` )
        VALUES (:content, NOW(), NOW(), :username, :id_users, :id_status)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->bindValue(':id_Comment', $this->id_status, PDO::PARAM_INT);
        $req->execute();
    }

    public function delete()
    {
        $sql = 'DELETE FROM `a8yk4_comments` WHERE `id`= :id ;';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `content`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`, 
        DATE_FORMAT(`updateDate`, "%d/%m/%y") AS `updateDate`
        FROM `a8yk4_status`
        INNER JOIN `a8yk4_users` ON `a8yk4_comments`.`id_users` = `a8yk4_users`.`id`
        WHERE `a8yk4_users`.`id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getList()
    {
        $sql = 'SELECT `k`.`id`, `k`.`content` AS `comments`, 
        DATE_FORMAT(`k`.`publicationDate`, "%d/%m/%y") 
        AS `publicationDate`, DATE_FORMAT(`k`.`updateDate`, "%d/%m/%y") AS `updateDate`,
        `u`.`username` AS `username`, `k`.`id_users`, `k`.`id_status`
        FROM `a8yk4_comments` AS `k`
        INNER JOIN `a8yk4_users` AS `u` ON `k`.`id_users` = `u`.`id`
        INNER JOIN `a8yk4_status` AS `s` ON `k`.`id_status` = `s`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getListByIdUsers()
    {
        $sql = 'SELECT `k`.`content`, 
        DATE_FORMAT(`k`.`publicationDate`, "%d/%m/%y") AS `publicationDate`, `u`.`username`
        FROM `a8yk4_comments`  AS `k`
        INNER JOIN `a8yk4_users` AS `u` ON `k`.`id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserComments()
    {
        $sql = 'SELECT `k`.`content`, 
        DATE_FORMAT(`publicationDate`, "%d/%m/%Y") AS `publicationDate`, `u`.`username`
        FROM `a8yk4_comments` AS `k`
        INNER JOIN `a8yk4_users` AS `u` ON `k`.`id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getComment()
    {
        $sql = 'SELECT * FROM  `a8yk4_comments` ORDER BY `publicationDate` DESC LIMIT 1';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function update()
    {
        $sql = 'UPDATE `a8yk4_comments` SET `content`=:content,`updateDate` = :updateDate 
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':updateDate', $this->updateDate, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
}