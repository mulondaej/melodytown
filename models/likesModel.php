<?php
class Likes
{
    private $pdo;
    public int $id;
    public string $id_topics;
    public string $id_topicreplies;
    public string $id_comments;
    public string $id_status;
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
        $sql = 'SELECT COUNT(*) FROM `a8yk4_likes` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Vérifie si un utilisateur existe dans la bASe de données avec le nom d'utilisateur
     * @param string $id_topics Le nom d'utilisateur
     * @return bool
     */
    public function checkIfExistsByContent()
    {
        $sql = 'SELECT COUNT(`id_topics`) FROM `a8yk4_likes` WHERE `id_topics` = :id_topics';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_topics', $this->id_topics, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Ajoute un utilisateur dans la bASe de données
     * @param string $id_topics Le contenu ne contient pAS des discriminations ni explicites
     * @param string $id_comments La date de la publication au format YYYY-MM-DD
     * @return bool
     */
    public function create() // insertion du id_comments dans la base de données
    {
        $sql = 'INSERT INTO `a8yk4_likes`(`id_topics`,`id_topicreplies`, `id_status`, `id_comments`,
          `id_users`) 
        VALUES (:id_topics, :id_topicreplies, :id_status, :id_comments, :id_users)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_topics', $this->id_topics, PDO::PARAM_INT);
        $req->bindValue(':id_topicreplies', $this->id_topicreplies, PDO::PARAM_INT);
        $req->bindValue(':id_status', $this->id_status, PDO::PARAM_INT);
        $req->bindValue(':id_comments', $this->id_comments, PDO::PARAM_INT);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        return $req->execute();
    }

    public function delete() // supprimer le id_comments de l'utilisateur
    {
        $sql = 'DELETE FROM `a8yk4_likes` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function removeLikedComment() // supprimer le id_comments de l'utilisateur
    {
        $sql = 'DELETE FROM `a8yk4_likes` WHERE `id_comments`= :id_comments';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function removeLikedStatus() // supprimer le id_comments de l'utilisateur
    {
        $sql = 'DELETE FROM `a8yk4_likes` WHERE `id_status`= :id_status';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function removeLikedTopic() // supprimer le id_comments de l'utilisateur
    {
        $sql = 'DELETE FROM `a8yk4_likes` WHERE `id_topics`= :id_topics';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function removeLikedReply() // supprimer le id_comments de l'utilisateur
    {
        $sql = 'DELETE FROM `a8yk4_likes` WHERE `id_topicreplies`= :id_topicreplies';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById() // recuperer le id_comments de l'utilisateur par son id
    {
        $sql = 'SELECT `p`.`id`, `p`.`id_topics`, `id_comments`, `u`.`username`
        FROM `a8yk4_likes` AS `p`
        INNER JOIN `a8yk4_users` AS `u` ON `p`.`id_users` = `u`.`id`
        WHERE `p`.id = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getListByIdUsers()
    {
        $sql = 'SELECT `p`.`id`, `p`.`id_topics`, `id_comments`, `u`.`username`
        FROM `a8yk4_likes`  AS `p`
        INNER JOIN `a8yk4_users` AS `u` ON `p`.`id_users` = `u`.`id`
        WHERE `p`.`id_users` = :id_users
        ORDER BY `id_comments` DESC';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getLikesByUser()
    {
        $sql = 'SELECT `p`.`id`, `id_topics`, `id_topicreplies`, `id_status`, `id_comments`, 
        `u`.`username`, `id_users`
        FROM `a8yk4_likes` AS `p`
        INNER JOIN `a8yk4_users` AS `u` ON `p`.`id_users` = `u`.`id`
        WHERE `id_users` = :id_users';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserLikes()
    {
        $sql = 'SELECT p.id_topics,  `id_topicreplies`, `id_status`, u.username, `id_comments`, p.id_users
        FROM a8yk4_likes AS p
        INNER JOIN a8yk4_users AS u ON p.id_users = u.id';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getLikes()
    {
        $sql = 'SELECT *, `u`.`username`
        FROM  `a8yk4_likes` 
        INNER JOIN `a8yk4_users` AS `u` ON `id_users` = `u`.`id`';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getList()
    {
        $sql = 'SELECT `p`.`id`, 
        `id_topics`, `id_topicreplies`, `id_status`, `id_comments`,
         `u`.`username` AS `username`, `id_users`
        FROM `a8yk4_likes` AS `p`
        INNER JOIN `a8yk4_users` AS `u` ON `p`.`id_users` = `u`.`id`';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function update()
    {
        $sql = 'UPDATE `a8yk4_likes` SET `id_topics`=:id_topics, `id_status` = :id_status
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_topics', $this->id_topics, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

}