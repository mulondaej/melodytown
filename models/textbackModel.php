<?php 

class textback {

    private $pdo;
    public int $id;
    public string $content;
    public string $publicationDate;
    public string $updateDate;
    public string $username;
    public int $id_users;
    public int $id_texts;

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
            $sql = 'SELECT COUNT(content) FROM `a8yk4_textback` WHERE `content` = :content';
            $req = $this->pdo->prepare($sql);
            $req->bindValue(':content', $this->content, PDO::PARAM_STR);
            $req->execute();
            return $req->fetch(PDO::FETCH_COLUMN);
        }

    public function create() // ajout de réponses pour le topic dans la base de données
    {
        $sql = 'INSERT INTO `a8yk4_textback`( `content`,`publicationDate`,`updateDate`, `id_users`, `id_texts`) 
        VALUES (:content, NOW(), NOW(), :id_users, :id_texts)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->bindValue(':id_texts', $this->id_texts, PDO::PARAM_INT);
        if ($req->execute()) {
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        
        return false;
    }

    public function delete() // suppression de réponses pour le topic dans la BDD
    {
        $sql = 'DELETE FROM `a8yk4_textback` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `cr`.`id`, `cr`.`content`, 
        DATE_FORMAT(`cr`.`publicationDate`, "%d/%m/%y") AS `publicationDate`, 
        `u`.`username` AS username , `u`.`avatar`, `cr`.`id_users`, `cr`.`id_texts`
        FROM `a8yk4_textback` AS `cr`
        INNER JOIN `a8yk4_users` AS `u` ON `cr`.`id_users` = `u`.`id`
        INNER JOIN `a8yk4_messages` AS `t` ON `cr`.`id_texts` = `t`.`id`
        WHERE `cr`.id = :id ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    } 
    
    public function getReply()
    {
        $sql = 'SELECT *, `u`.`username`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`
        FROM  `a8yk4_textback` 
        INNER JOIN `a8yk4_users` AS `u` ON `id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getUserReply()
    {
        $sql = 'SELECT `content`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate` 
        FROM `a8yk4_textback` AS `cr`
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
        FROM `a8yk4_textback` AS `cr`
        INNER JOIN `a8yk4_users` AS `u` ON `cr`.`id_users` = `u`.`id`
        WHERE `id_texts` = :id_texts
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_texts', $this->id_texts, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getList()
    {
        $sql = 'SELECT `cr`.`id`, SUBSTR(`cr`.`content`, 1, 500) AS `content`,
        DATE_FORMAT(`cr`.`publicationDate`, "%d/%m/%y") AS `publicationDate`,
        DATE_FORMAT(`cr`.`updateDate`, "%d/%m/%y") AS `updateDate`,
        `u`.`username` AS username, `cr`.`id_users`, `cr`.`id_texts`
        FROM `a8yk4_textback` AS `cr`
        INNER JOIN `a8yk4_users` AS `u` ON `cr`.`id_users` = `u`.`id`
        INNER JOIN `a8yk4_messages` AS `t` ON `cr`.`id_texts` = `t`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function update() // update de la réponse
    {
        $sql = 'UPDATE `a8yk4_textback` SET `content`=:content , `updateDate` = NOW() 
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function createOrFetchValidId() {
        // Logic to create or fetch a valid textback ID
        // For example, you can create a new record and return its ID
        // or fetch an existing valid ID from the database
        // This is just a placeholder implementation
        $this->id = 1; // Replace with actual logic
        return $this->id;
    }

    public function isValidId($id) {
        // Logic to check if the given ID is valid
        // For example, you can query the database to check if the ID exists
        // This is just a placeholder implementation
        return true; // Replace with actual logic
    }

}