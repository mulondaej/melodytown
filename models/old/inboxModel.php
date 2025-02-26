<?php
class Chats
{
    private $pdo;
    public int $id;
    public int $username;
    public string $title;
    public string $content;
    public string $publicationDate;
    public string $updateDate;
    public int $id_users;
    public int $categories;
  
    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'Ox)x_2sosDuTXn-i'); //connect to databASe sql
        } catch (PDOException $e) {
            header('Location: /accueil');
        }
    }

    /**
     * Vérifie si le titre existe dans la bASe de données
     * @param string $title Le titre
     * @return bool
     */
    // 

    public function checkIfExistsById()
    {
        $sql = 'SELECT COUNT(*) FROM `a8yk4_inbox` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }
    

    public function checkIfExistsByTitle()
    {
        $sql = 'SELECT COUNT(`title`) FROM `a8yk4_inbox` WHERE `title` = :title';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':title', $this->title, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Vérifie si un utilisateur existe dans la bASe de données avec le nom d'utilisateur
     * @param string $content Le nom d'utilisateur
     * @return bool
     */
    public function checkIfExistsByContent()
    {
        $sql = 'SELECT COUNT(`content`) FROM `a8yk4_inbox` WHERE `content` = :content';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Ajoute un utilisateur dans la bASe de données
     * @param string $title Le titre du thread
     * @param string $content Le contenu ne contient pAS des discriminations ni explicites
     * @param string $publicationDate La date de la publication au format YYYY-MM-DD
     * @return bool
     */

    public function create() // Ajout de topic dans la base de données
    {
        $sql = 'INSERT INTO `a8yk4_inbox`(`username`, `title`, `content`, `publicationDate`,
         `updateDate`, `id_users`) 
        VALUES (:username, :title,:content, NOW(), NOW(), :id_users)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_INT);
        $req->bindValue(':title', $this->title, PDO::PARAM_STR);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        return $req->execute();
    }


    public function delete() // suppression de topic dans la BDD
    {
        $sql = 'DELETE FROM `a8yk4_inbox` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `i`.`id`, `i`.`title`, `i`.`content`, 
        DATE_FORMAT(`i`.`publicationDate`, "%d/%m/%y") AS `publicationDate`, `u`.`username`, `u`.`avatar`, `i`.`id_users`
        FROM `a8yk4_inbox` AS `i`
        INNER JOIN `a8yk4_users` AS `u` ON `i`.`id_users` = `u`.`id`
        WHERE `i`.`id` = :id ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getListByIdUsers()
    {
        $sql = 'SELECT `title`, `content`, 
        DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate` 
        FROM `a8yk4_inbox` AS `i`
        INNER JOIN `a8yk4_users` ON `i`.`id_users` = `a8yk4_users`.`id`';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getList()
    {
        $sql = 'SELECT `i`.`id`,`title`, SUBSTR(`content`, 1, 500) AS `content`, 
        DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`, 
        DATE_FORMAT(`updateDate`, "%d/%m/%y") AS `updateDate`, `u`.`username` AS `username`, `id_users`
        FROM `a8yk4_inbox` AS `i`
        INNER JOIN `a8yk4_users` AS `u` ON `i`.`id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserChats()
    {
        $sql = 'SELECT * FROM `a8yk4_inbox` WHERE id_users = :id_users
        ORDER BY `publicationDate` DESC ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_users', $this->id_users);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChatsByCategories()
    {
        $sql = 'SELECT i.`id`, i.`title, i.`content`
        FROM `a8yk4_inbox` AS i
        INNER JOIN `a8yk4_categories` AS c ON i.`categories` = c.`id`
        WHERE categories = :categories
        ORDER BY `publicationDate` DESC ';
        $req = $this->pdo->prepare($sql);
        
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMessagesByUserId($userId) {
        $sql = "SELECT id, username, title, content, publicationDate 
                FROM a8yk4_inbox 
                WHERE id_users = :userId 
                ORDER BY publicationDate DESC";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChat()
    {
        $sql = 'SELECT i.`id`, i.`title`, `u`.`username`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`
        FROM  `a8yk4_inbox` AS `i`
        INNER JOIN `a8yk4_users` AS `u` ON `i`.`id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getCategorie()
    {
        $sql = 'SELECT c.`id`, c.`name`, i.`id`, i.`title`, `u`.`username`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`
        FROM  `a8yk4_inbox` AS `i`
        INNER JOIN `a8yk4_users` AS `u` ON `i`.`id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }
    

    public function changeUsers()
    {
        $sql = "UPDATE `a8yk4_inbox` SET `id_users` = :id_users WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
    }

    public function update() //update de topic dans la BDD
    {
        $sql = 'UPDATE `a8yk4_inbox` SET `title`=:title,`content`=:content, `updateDate` = NOW() WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':title', $this->title, PDO::PARAM_STR);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function updateContent() //update de contenu dans la BDD sans toucher au reste des champs
    {
        $sql = 'UPDATE `a8yk4_inbox` SET `content`=:content, `updateDate` = NOW()
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
}