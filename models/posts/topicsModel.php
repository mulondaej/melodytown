<?php
class Topics
{
    private $pdo;
    public int $id;
    public string $title;
    public string $content;
    public string $publicationDate;
    public string $updateDate;
    public string $username;
    public int $id_users;
    public int $id_categories;
    public int $id_tags;

    public string $answers;

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
    public function create()
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

    public function delete()
    {
        $sql = 'DELETE FROM `a8yk4_topics` WHERE `id= :id ;';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `t`.`id`, `t`.`tag`, `t`.`title`, `t`.`content`, 
        DATE_FORMAT(`t`.`publicationDate`, "%d/%m/%y") AS `publicationDate`
        FROM `a8yk4_topics` AS `t`
        INNER JOIN `a8yk4_users` AS `u` ON `t`.`id_users` = `u`.`id`
        INNER JOIN `a8yk4_categories` AS `c` ON `t`.`id_categories` = `c.`id`
        WHERE `t`.`id` = :id';
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

    public function getUserTopics()
    {
        $sql = 'SELECT `t`.`title`, DATE_FORMAT(`publicationDate`, "%d/%m/%Y") AS `publicationDate` 
        FROM `a8yk4_topics` AS `t`
        INNER JOIN `a8yk4_users` ON `t`.`id_users` = `a8yk4_users`.`id`';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    } 

    public function getTopic()
    {
        $sql = 'SELECT *, `u`.`username`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`
        FROM  `a8yk4_topics` AS `t`
        INNER JOIN `a8yk4_users` AS `u` ON `t`.`id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getList()
    {
        $sql = 'SELECT `t`.`id`, `a8yk4_tags`.`name` AS `tag`, `a8yk4_categories`.`name` AS `categorie`,
        `title`, SUBSTR(`content`, 1, 500) AS `content`, 
        DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`, 
        DATE_FORMAT(`updateDate`, "%d/%m/%y") AS `updateDate`, `a8yk4_users`.`username` AS `username`, `id_users`
        FROM `a8yk4_topics` AS `t`
        INNER JOIN `a8yk4_tags` ON `t`.`id_tags` = `a8yk4_tags`.`id`
        INNER JOIN `a8yk4_categories` ON `t`.`id_categories` = `a8yk4_categories`.`id`
        INNER JOIN `a8yk4_users` ON `t`.`id_users` = `a8yk4_users`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function update()
    {
        $sql = 'UPDATE `a8yk4_topics` SET `title`=:title,`content`=:content, `updateDate` = :updateDate,
        `id_categories`=:id_categories, `id_tags`=:id_tags WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':title', $this->title, PDO::PARAM_STR);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':publicationDate', $this->publicationDate, PDO::PARAM_STR);
        $req->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $req->bindValue(':id_tags', $this->id_tags, PDO::PARAM_INT);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
}