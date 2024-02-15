<?php
class Status
{
    private $pdo;
    public int $id;
    public string $content;
    public string $publicationDate;
    public string $updateDate;
    public string $username;
    public int $id_users;

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
        $sql = 'SELECT COUNT(*) FROM `a8yk4_status` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
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
        $sql = 'SELECT COUNT(`content`) FROM `a8yk4_status` WHERE `content` = :content';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Ajoute un utilisateur dans la bASe de données
     * @param string $content Le contenu ne contient pAS des discriminations ni explicites
     * @param string $publicationDate La date de la publication au format YYYY-MM-DD
     * @return bool
     */
    public function create()
    {
        $sql = 'INSERT INTO `a8yk4_status`(`content`, `publicationDate`,
         `updateDate`, `id_users`) 
        VALUES (:content, NOW(), NOW(), :id_users)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        return $req->execute();
    }

    public function delete()
    {
        $sql = 'DELETE FROM `a8yk4_status` WHERE `id= :id ;';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `s`.`content`, 
        DATE_FORMAT(`s`.`publicationDate`, "%d/%m/%y") AS `publicationDate`, `u`.`username`
        FROM `a8yk4_status` AS `s`
        INNER JOIN `a8yk4_users` AS `u` ON `s`.`id_users` = `u`.`id`
        WHERE `s`.id = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getListByIdUsers()
    {
        $sql = 'SELECT `s`.`content`, 
        DATE_FORMAT(`s`.`publicationDate`, "%d/%m/%y") AS `publicationDate`, `u`.`username`
        FROM `a8yk4_status`  AS `s`
        INNER JOIN `a8yk4_users` AS `u` ON `s`.`id_users` = `u`.`id`
        WHERE `s`.`id_users` = :id_users
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserStatus()
    {
        $sql = 'SELECT s.content, u.username, DATE_FORMAT(s.publicationDate, "%d/%m/%Y") AS `publicationDate`, s.id_users
        FROM a8yk4_status AS s
        INNER JOIN a8yk4_users AS u ON s.id_users = u.id
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getStatus()
    {
        $sql = 'SELECT *, DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`, `u`.`username`
        FROM  `a8yk4_status` 
        INNER JOIN `a8yk4_users` AS `u` ON `id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getList()
    {
        $sql = 'SELECT `s`.`id`, SUBSTR(`content`, 1, 500) AS `content`, 
        DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`, 
        DATE_FORMAT(`updateDate`, "%d/%m/%y") AS `updateDate`, `u`.`username` AS `username`, `id_users`
        FROM `a8yk4_status` AS `s`
        INNER JOIN `a8yk4_users` AS `u` ON `s`.`id_users` = `u`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function update()
    {
        $sql = 'UPDATE `a8yk4_status` SET =`content`=:content, `updateDate` = NOW()
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

}