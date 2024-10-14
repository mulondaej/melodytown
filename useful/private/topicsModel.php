<?php
class Topics
{
    private $pdo;
    private int $id;
    private string $title;
    private string $content;
    private string $publicationDate;
    private string $updateDate;
    private int $id_users;
    private int $id_categories;
    private int $id_tags;

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

    public function checkIfExistsById(): int
    {
        $sql = 'SELECT COUNT(*) FROM `a8yk4_topics` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    public function checkIfExistsByTitle(): int
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
    public function checkIfExistsByContent(): int
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
    public function create(): bool // Ajout de topic dans la base de données
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

    public function delete(): bool // suppression de topic dans la BDD
    {
        $sql = 'DELETE FROM `a8yk4_topics` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function fetchTopicData($topicId): void
{
    $sql = 'SELECT * FROM `a8yk4_topics` WHERE `id` = :id';
    $req = $this->pdo->prepare($sql);
    $req->bindValue(':id', $topicId, PDO::PARAM_INT); // Correct binding of parameter
    $req->execute();
    $topic = $req->fetch(PDO::FETCH_ASSOC); // Use FETCH_ASSOC to fetch as an associative array

    // Check if the topic exists
    if ($topic) {
        $this->id = $topic['id'];
        $this->title = $topic['title'];
        $this->content = $topic['content'];
        $this->publicationDate = $topic['publicationDate'];
        $this->updateDate = $topic['updateDate'];
        $this->id_users = $topic['id_users'];
        $this->id_categories = $topic['id_categories'];
        $this->id_tags = $topic['id_tags'];
    } else {
        // Handle case where topic with provided ID is not found
        // For example, throw an exception or set appropriate error flags
        throw new Exception("Topic not found with ID: $topicId");
    }
}


    // Getter methods
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getIdCategories(): string
    {
        return $this->id_categories;
    }

    public function getIdTags(): string
    {
        return $this->id_tags;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getIdUsers(): int
    {
        return $this->id_users;
    }

    
    //setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
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

    public function setIdCategories(int $id_categories): void
    {
        $this->id_categories = $id_categories;
    }

    public function setIdTags(int $id_tags): void
    {
        $this->id_tags = $id_tags;
    }

    public function setIdUsers(int $id_users): void
    {
        $this->id_users = $id_users;
    }

    public function getById()
    {
        $sql = 'SELECT `t`.`id`, `g`.`name` AS `tag`, `t`.`title`, `t`.`content`, 
        DATE_FORMAT(`t`.`publicationDate`, "%d/%m/%y") AS `publicationDate`, `u`.`username`, `u`.`avatar`, `t`.`id_users`
        FROM `a8yk4_topics` AS `t`
        INNER JOIN `a8yk4_users` AS `u` ON `t`.`id_users` = `u`.`id`
        INNER JOIN `a8yk4_tags` AS `g` ON `t`.`id_tags` = `g`.`id`
        INNER JOIN `a8yk4_categories` AS `c` ON `t`.`id_categories` = `c`.`id`
        WHERE `t`.`id` = :id ';
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
            `t`.`title`, SUBSTR(`t`.`content`, 1, 500) AS `content`, 
            DATE_FORMAT(`t`.`publicationDate`, "%d/%m/%y") AS `publicationDate`, 
            DATE_FORMAT(`t`.`updateDate`, "%d/%m/%y") AS `updateDate`, `u`.`username` AS `username`, `t`.`id_users`
            FROM `a8yk4_topics` AS `t`
            INNER JOIN `a8yk4_tags` AS `g` ON `t`.`id_tags` = `g`.`id`
            INNER JOIN `a8yk4_categories` AS `c` ON `t`.`id_categories` = `c`.`id`
            INNER JOIN `a8yk4_users` AS `u` ON `t`.`id_users` = `u`.`id`
            ORDER BY `t`.`publicationDate` DESC';
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
        $sql = 'SELECT t.`id`, t.`title, t.`content`, c.`name` AS `categorie`
        FROM `a8yk4_topics` AS t
        INNER JOIN `a8yk4_categories` AS c ON t.`id_categories` = c.`id`
        WHERE id_categories = :id_categories
        ORDER BY `publicationDate` DESC ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopicsBySubcategories() 
    {
        $sql = 'SELECT t.`id`, t.`title, t.`content`, `c`.`name` AS `categorie`
        
        SELECT t.*, s.name AS subcategorie 
        FROM `a8yk4_topics` AS t
        INNER JOIN a8yk4_subcategories s ON t.id_subcategories = s.id
        WHERE t.id_subcategories = :id_subcategories;
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

    public function getCategorie()
    {
        $sql = 'SELECT c.`id`, c.`name`, t.`id`, t.`title`, `u`.`username`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`
        FROM  `a8yk4_topics` AS `t`
        INNER JOIN `a8yk4_categories` AS `c` ON `t`.`id_categories` = `c`.`id`
        INNER JOIN `a8yk4_users` AS `u` ON `t`.`id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }
    

    public function setNewUser()
    {
        $sql = "UPDATE `a8yk4_topics` SET `id_users` = :id_users WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
    }

    public function updateTopic(): bool //update de topic dans la BDD
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

    public function updateContent(): bool //update de contenu dans la BDD sans toucher au reste des champs
    {
        $sql = 'UPDATE `a8yk4_topics` SET `content`=:content, `updateDate` = NOW()
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
}