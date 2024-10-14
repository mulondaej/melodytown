<?php

class Replies
{

    private $pdo;
    private int $id;
    private string $content;
    private string $publicationDate;
    private string $updateDate;
    private string $username;
    private int $id_users;
    private int $id_topics;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'ktxkVURHF2mt4pk'); //connect to databASe sql
        } catch (PDOException $e) {
            header('Location: /accueil');
        }
    }

    public function fetchRepliesData($repliesId): void
{
    $sql = 'SELECT * FROM `a8yk4_topics` WHERE `id` = :id';
    $req = $this->pdo->prepare($sql);
    $req->bindValue(':id', $repliesId, PDO::PARAM_INT); // Correct binding of parameter
    $req->execute();
    $topic = $req->fetch(PDO::FETCH_ASSOC); // Use FETCH_ASSOC to fetch as an associative array

    // Check if the topic exists
    if ($topic) {
        $this->id = $topic['id'];
        $this->username = $topic['username'];
        $this->content = $topic['content'];
        $this->publicationDate = $topic['publicationDate'];
        $this->updateDate = $topic['updateDate'];
        $this->id_users = $topic['id_users'];
        $this->id_topics = $topic['id_topics'];
    } else {
        // Handle case where topic with provided ID is not found
        // For example, throw an exception or set appropriate error flags
        throw new Exception("Topic not found with ID: $repliesId");
    }
}

    // Getter methods
    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getId_Topics(): string
    {
        return $this->id_topics;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getId_Users(): int
    {
        return $this->id_users;
    }


    //setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function setUpdateDate(string $updateDate): void
    {
        $this->updateDate = $updateDate;
    }

    public function setPublicationDate(string $publicationDate): void
    {
        $this->publicationDate = $publicationDate;
    }

    public function setIdTopics(int $id_topics): void
    {
        $this->id_topics = $id_topics;
    }

    public function setIdUsers(int $id_users): void
    {
        $this->id_users = $id_users;
    }

    public function checkIfExistsByContent(): int
    {
        $sql = 'SELECT COUNT(content) FROM `a8yk4_topicreplies` WHERE `content` = :content';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    public function create(): bool // ajout de réponses pour le topic dans la base de données
    {
        $sql = 'INSERT INTO `a8yk4_topicreplies`( `content`,`publicationDate`,`updateDate`, `id_users`, `id_topics`) 
        VALUES (:content, NOW(), NOW(), :id_users, :id_topics)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->bindValue(':id_topics', $this->id_topics, PDO::PARAM_INT);
        return $req->execute();
    }

    public function delete(): bool // suppression de réponses pour le topic dans la BDD
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