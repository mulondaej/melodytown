<?php
class Forums
{
    private $pdo;
    public int $id;
    public string $name;
    public string $title;
    public string $content;
    public string $publicationDate;
    public string $updateDate;
    public int $id_users;
    public int $id_categories;
    public int $id_tags;
    public int $id_sections;

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

    public function checkIfExistsBySections()
    {
        $sql = 'SELECT COUNT(`sections`) FROM `a8yk4_sections` WHERE `sections` = :sections';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':sections', $this->id_sections, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    public function checkIfExistsByTag()
    {
        $sql = 'SELECT COUNT(`tag`) FROM `a8yk4_tags` WHERE `tag` = :tag';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':tag', $this->id_tags, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    public function checkIfExistsByCategorie()
    {
        $sql = 'SELECT COUNT(`categorie`) FROM `a8yk4_categories` WHERE `tag` = :categorie';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':categorie', $this->id_categories, PDO::PARAM_STR);
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
        $sql = 'INSERT INTO `a8yk4_topics`(`title`, `content`, `publicationDate`, `updateDate`, `id_users`, `id_categories`, `id_tags`) 
        VALUES (:title,:content,NOW(),NOW(),:id_users,:id_categories, :id_tags)';
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
        $sql = 'DELETE `id` FROM `a8yk4_topics` WHERE `title`= :title ;';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `tag`, `title`, `content`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`
                FROM `a8yk4_topics`
                INNER JOIN `a8yk4_users` ON `a8yk4_topics`.`id_users` = `a8yk4_users`.`id`
                WHERE `a8yk4_users`.`id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getListByIdUsers()
    {
        $sql = 'SELECT `a8yk4_tags`.`name` AS `tag`, `title`, `content`, 
        DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate` FROM `a8yk4_topics` 
        INNER JOIN `a8yk4_users` ON `a8yk4_topics`.`id_users` = `a8yk4_users`.`id` 
        INNER JOIN `a8yk4_categories` ON `a8yk4_topics`.`id_categories` = `a8yk4_categories`.`id`
        INNER JOIN `a8yk4_tags` ON `a8yk4_topics`.`id_tags` = `a8yk4_tags`.`id` 
        WHERE `id_users` = :id_users';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

}
