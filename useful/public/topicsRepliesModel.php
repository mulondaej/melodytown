<?php 

class Replies {

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
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'Ox)x_2sosDuTXn-i'); //connect to databASe sql
        } catch (PDOException $e) {
            header('Location: /accueil');
        }
    }

    public function checkIfExistsByContent()
        {
            $sql = 'SELECT COUNT(content) FROM `a8yk4_topicreplies` WHERE `content` = :content';
            $req = $this->pdo->prepare($sql);
            $req->bindValue(':content', $this->content, PDO::PARAM_STR);
            $req->execute();
            return $req->fetch(PDO::FETCH_COLUMN);
        }

    public function create() // ajout de réponses pour le topic dans la base de données
    {
        $sql = 'INSERT INTO `a8yk4_topicreplies`( `content`,`publicationDate`,`updateDate`, `id_users`, `id_topics`) 
        VALUES (:content, NOW(), NOW(), :id_users, :id_topics)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->bindValue(':id_topics', $this->id_topics, PDO::PARAM_INT);
        $req->execute();
    }

    public function delete() // suppression de réponses pour le topic dans la BDD
    {
        $sql = 'DELETE FROM `a8yk4_topicreplies` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `r`.`id`, `r`.`content`, 
        DATE_FORMAT(`r`.`publicationDate`, "%d/%m/%y") AS `publicationDate`, 
        `u`.`username`, `u`.`avatar`, `r`.`id_users`, `r`.`id_topics`
        FROM `a8yk4_topicreplies` AS `r`
        INNER JOIN `a8yk4_users` AS `u` ON `r`.`id_users` = `u`.`id`
        INNER JOIN `a8yk4_topics` AS `t` ON `r`.`id_topics` = `t`.`id`
        WHERE `r`.id = :id ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    } 
    
    public function getReply()
    {
        $sql = 'SELECT *, `u`.`username`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`
        FROM  `a8yk4_topicreplies` 
        INNER JOIN `a8yk4_users` AS `u` ON `id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getUserReply()
    {
        $sql = 'SELECT `content`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate` 
        FROM `a8yk4_topicreplies` AS `r`
        INNER JOIN `a8yk4_users` ON `r`.`id_users` = `a8yk4_users`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    
    public function getRepliesByTopics()
    {
        $sql = 'SELECT `r`.`id`,`content`, 
        DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`, 
        `u`.`username`, `u`.`avatar`, `id_users`
        FROM `a8yk4_topicreplies` AS `r`
        INNER JOIN `a8yk4_users` AS `u` ON `r`.`id_users` = `u`.`id`
        WHERE `id_topics` = :id_topics
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_topics', $this->id_topics, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getList()
    {
        $sql = 'SELECT `r`.`id`, SUBSTR(`r`.`content`, 1, 500) AS `content`,
        DATE_FORMAT(`r`.`publicationDate`, "%d/%m/%y") AS `publicationDate`,
        DATE_FORMAT(`r`.`updateDate`, "%d/%m/%y") AS `updateDate`,
        `u`.`username`, `r`.`id_users`, `r`.`id_topics`
        FROM `a8yk4_topicreplies` AS `r`
        INNER JOIN `a8yk4_users` AS `u` ON `r`.`id_users` = `u`.`id`
        INNER JOIN `a8yk4_topics` AS `t` ON `r`.`id_topics` = `t`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function update() // update de la réponse
    {
        $sql = 'UPDATE `a8yk4_topicreplies` SET `content`=:content , `updateDate` = NOW() 
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

}