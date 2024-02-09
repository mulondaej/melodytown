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
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'ktxkVURHF2mt4pk'); //connect to databASe sql
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

    public function create()
    {
        $sql = 'INSERT INTO `a8yk4_topicreplies`( `content`,`publicationDate`,`updateDate`, `id_users`, `id_topics`) 
        VALUES (:content, NOW(), NOW(), :id_users, :id_topics)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->bindValue(':id_topics', $this->id_topics, PDO::PARAM_INT);
        $req->execute();
    }

    public function delete()
    {
        $sql = 'DELETE FROM `a8yk4_topicreplies` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `content`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate` 
        FROM `a8yk4_topicreplies` AS `r`
        INNER JOIN `a8yk4_users` ON `r`.`id_users` = `a8yk4_users`.`id`';
        $req = $this->pdo->prepare($sql);
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

    public function update()
    {
        $sql = 'UPDATE `a8yk4_topicreplies` SET `content`=:content , `publicationDate` = :publicationDate 
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':publicationDate', $this->publicationDate, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
}