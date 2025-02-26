<?php 

class replyback {

    private $pdo;
    public int $id;
    public string $content;
    public string $publicationDate;
    public string $updateDate;
    public string $username;
    public int $id_users;
    public int $id_chats;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'Ox)x_2sosDuTXn-i'); //connect to databASe sql
        } catch (PDOException $e) {
            header('Location: /accueil');
        }
    }

    public function checkIfExistsByContent()
        {
            $sql = 'SELECT COUNT(content) FROM `a8yk4_chatreplies` WHERE `content` = :content';
            $req = $this->pdo->prepare($sql);
            $req->bindValue(':content', $this->content, PDO::PARAM_STR);
            $req->execute();
            return $req->fetch(PDO::FETCH_COLUMN);
        }

    public function create() // ajout de réponses pour le topic dans la base de données
    {
        $sql = 'INSERT INTO `a8yk4_chatreplies`( `content`,`publicationDate`,`updateDate`, `id_users`, `id_chats`) 
        VALUES (:content, NOW(), NOW(), :id_users, :id_chats)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->bindValue(':id_chats', $this->id_chats, PDO::PARAM_INT);
        $req->execute();
    }

    public function delete() // suppression de réponses pour le topic dans la BDD
    {
        $sql = 'DELETE FROM `a8yk4_chatreplies` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `cr`.`id`, `cr`.`content`, 
        DATE_FORMAT(`cr`.`publicationDate`, "%d/%m/%y") AS `publicationDate`, 
        `u`.`username`, `u`.`avatar`, `cr`.`id_users`, `cr`.`id_chats`
        FROM `a8yk4_chatreplies` AS `cr`
        INNER JOIN `a8yk4_users` AS `u` ON `cr`.`id_users` = `u`.`id`
        INNER JOIN `a8yk4_inbox` AS `t` ON `cr`.`id_chats` = `t`.`id`
        WHERE `cr`.id = :id ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    } 
    
    public function getReply()
    {
        $sql = 'SELECT *, `u`.`username`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`
        FROM  `a8yk4_chatreplies` 
        INNER JOIN `a8yk4_users` AS `u` ON `id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getUserReply()
    {
        $sql = 'SELECT `content`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate` 
        FROM `a8yk4_chatreplies` AS `cr`
        INNER JOIN `a8yk4_users` ON `cr`.`id_users` = `a8yk4_users`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    
    public function getRepliesByChats()
    {
        $sql = 'SELECT `cr`.`id`,`content`, 
        DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`, 
        `u`.`username`, `u`.`avatar`, `id_users`
        FROM `a8yk4_chatreplies` AS `cr`
        INNER JOIN `a8yk4_users` AS `u` ON `cr`.`id_users` = `u`.`id`
        WHERE `id_chats` = :id_chats
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_chats', $this->id_chats, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getList()
    {
        $sql = 'SELECT `cr`.`id`, SUBSTR(`cr`.`content`, 1, 500) AS `content`,
        DATE_FORMAT(`cr`.`publicationDate`, "%d/%m/%y") AS `publicationDate`,
        DATE_FORMAT(`cr`.`updateDate`, "%d/%m/%y") AS `updateDate`,
        `u`.`username`, `cr`.`id_users`, `cr`.`id_chats`
        FROM `a8yk4_chatreplies` AS `cr`
        INNER JOIN `a8yk4_users` AS `u` ON `cr`.`id_users` = `u`.`id`
        INNER JOIN `a8yk4_inbox` AS `t` ON `cr`.`id_chats` = `t`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function update() // update de la réponse
    {
        $sql = 'UPDATE `a8yk4_chatreplies` SET `content`=:content , `updateDate` = NOW() 
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

}