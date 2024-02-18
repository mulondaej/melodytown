<?php
class Topics
{
    private $pdo;
    public int $id;
    public string $title;
    public string $content;
    public string $publicationDate;
    public string $updateDate;
    public int $id_users;
    public int $id_categories;
    public int $id_tags;

    public string $replies;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'ktxkVURHF2mt4pk'); //connect to databASe sql
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
        $sql = 'SELECT COUNT(*) FROM `a8yk4_topics` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    public function checkIfExistsByTitle()
    {
        $sql = 'SELECT COUNT(`title`) FROM `a8yk4_topics` WHERE `title` = :title';
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
        $sql = 'SELECT COUNT(`content`) FROM `a8yk4_topics` WHERE `content` = :content';
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
        $sql = 'INSERT INTO `a8yk4_topics`(`title`, `content`, `publicationDate`,
         `updateDate`, `id_users`, `id_categories`, `id_tags`) 
        VALUES (:title,:content, NOW(), NOW(), :id_users, :id_categories, :id_tags)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':title', $this->title, PDO::PARAM_STR);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->bindValue(':id_tags', $this->id_tags, PDO::PARAM_INT);
        return $req->execute();
    }

    public function delete() // suppression de topic dans la BDD
    {
        $sql = 'DELETE FROM `a8yk4_topics` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT t.`id`, `g`.`name` AS `tag`, `t`.`title`, `t`.`content`, 
        DATE_FORMAT(`t`.`publicationDate`, "%d/%m/%y") AS `publicationDate`, `u`.`username`, `t`.`id_users`
        FROM `a8yk4_topics` AS `t`
        INNER JOIN `a8yk4_users` AS `u` ON `t`.`id_users` = `u`.`id`
        INNER JOIN `a8yk4_tags` AS `g` ON `t`.`id_tags` = `g`.`id`
        INNER JOIN `a8yk4_categories` AS `c` ON `t`.`id_categories` = `c`.`id`
        WHERE `t`.`id` = :id ;';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getListByIdUsers()
    {
        $sql = 'SELECT `a8yk4_tags`.`name` AS `tag`, `title`, `content`, 
        DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate` 
        FROM `a8yk4_topics` AS `t`
        INNER JOIN `a8yk4_users` ON `t`.`id_users` = `a8yk4_users`.`id` 
        INNER JOIN `a8yk4_categories` ON `t`.`id_categories` = `a8yk4_categories`.`id`
        INNER JOIN `a8yk4_tags` ON `t`.`id_tags` = `a8yk4_tags`.`id` ';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getList()
    {
        $sql = 'SELECT `t`.`id`, `g`.`name` AS `tag`, `c`.`name` AS `categorie`,
        `title`, SUBSTR(`content`, 1, 500) AS `content`, 
        DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`, 
        DATE_FORMAT(`updateDate`, "%d/%m/%y") AS `updateDate`, `u`.`username` AS `username`, `id_users`
        FROM `a8yk4_topics` AS `t`
        INNER JOIN `a8yk4_tags` AS `g` ON `t`.`id_tags` = `g`.`id`
        INNER JOIN `a8yk4_categories` AS `c` ON `t`.`id_categories` = `c`.`id`
        INNER JOIN `a8yk4_users` AS `u` ON `t`.`id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserTopics()
    {
        $sql = 'SELECT * FROM `a8yk4_topics` WHERE id_users = :id_users
        ORDER BY `publicationDate` DESC ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_users', $this->id_users);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopicsByCategories()
    {
        $sql = 'SELECT t.`id`, t.`content`, `c`.`name` AS `categorie`
        FROM `a8yk4_topics` AS t
        INNER JOIN `a8yk4_categories` AS `c` ON t.`id_categories` = `c`.`id`
        WHERE id_categories = :id_categories
        ORDER BY `publicationDate` DESC ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopic()
    {
        $sql = 'SELECT t.`id`, t.`title`, `u`.`username`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`
        FROM  `a8yk4_topics` AS `t`
        INNER JOIN `a8yk4_users` AS `u` ON `t`.`id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }
    

    public function changeUsers()
    {
        $sql = "UPDATE `a8yk4_topics` SET `id_users` = :id_users WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
    }

    public function update() //update de topic dans la BDD
    {
        $sql = 'UPDATE `a8yk4_topics` SET `title`=:title,`content`=:content, `updateDate` = NOW(),
        `id_categories`=:id_categories, `id_tags`=:id_tags WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':title', $this->title, PDO::PARAM_STR);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $req->bindValue(':id_tags', $this->id_tags, PDO::PARAM_INT);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function updateContent()
    {
        $sql = 'UPDATE `a8yk4_topics` SET `content`=:content, `updateDate` = :updateDate 
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
}