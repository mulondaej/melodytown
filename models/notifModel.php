<?php
class Notifications
{
    private $pdo;
    public int $id;
    public string $link;
    public string $message;
    public string $created_at;
    public string $is_read;
    public int $id_users;
    public int $id_chats;
    public int $id_chatreplies;
    public int $id_topics;
    public int $id_topicreplies;
    public int $id_status;
    public int $id_comments;
    public int $id_likes;
  
    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;pdoname=melodytown;charset=utf8', 'm18wq_admin', 'ktxkVURHF2mt4pk'); //connect to databASe sql
        } catch (PDOException $e) {
            header('Location: /accueil');
        }
    }

    /**
     * Vérifie si le titre existe dans la bASe de données
     * @param string $link Le titre
     * @return bool
     */
    // 

    public function checkIfExistsById()
    {
        $sql = 'SELECT COUNT(*) FROM `a8yk4_notifications` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }
    

    // public function checkIfExistsByTitle()
    // {
    //     $sql = 'SELECT COUNT(`link`) FROM `a8yk4_notifications` WHERE `link` = :link';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':link', $this->link, PDO::PARAM_STR);
    //     $req->execute();
    //     return $req->fetch(PDO::FETCH_COLUMN);
    // }

    // /**
    //  * Vérifie si un utilisateur existe dans la bASe de données avec le nom d'utilisateur
    //  * @param string $is_read Le nom d'utilisateur
    //  * @return bool
    //  */
    // public function checkIfExistsByContent()
    // {
    //     $sql = 'SELECT COUNT(`is_read`) FROM `a8yk4_notifications` WHERE `is_read` = :is_read';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':is_read', $this->is_read, PDO::PARAM_STR);
    //     $req->execute();
    //     return $req->fetch(PDO::FETCH_COLUMN);
    // }

    /**
     * Ajoute un utilisateur dans la bASe de données
     * @param string $link Le titre du thread
     * @param string $is_read Le contenu ne contient pAS des discriminations ni explicites
     * @param string $created_at La date de la publication au format YYYY-MM-DD
     * @return bool
     */
    public function create() // Ajout de topic dans la base de données
    {
        $sql = 'INSERT INTO `a8yk4_notifications`(`message`, `link`, `is_read`, `created_at`, `id_chats`,
        `id_chatreplies`, `id_status`, `id_comments`, `id_likes`, `id_topics`, `id_topicreplies`, `id_users`) 
        VALUES (:link,:is_read, NOW(), :id_chats, :id_chatreplies, :id_status, :id_comments
        , :id_likes, :id_topics, :id_topicreplies, :id_users)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':message', $this->message, PDO::PARAM_STR);
        $req->bindValue(':link', $this->link, PDO::PARAM_STR);
        $req->bindValue(':is_read', $this->is_read, PDO::PARAM_STR);
        $req->bindValue(':id_chats', $this->id_chats, PDO::PARAM_INT);
        $req->bindValue(':id_chatreplies', $this->id_chatreplies, PDO::PARAM_INT);
        $req->bindValue(':id_status', $this->id_status, PDO::PARAM_INT);
        $req->bindValue(':id_comments', $this->id_comments, PDO::PARAM_INT);
        $req->bindValue(':id_likes', $this->id_likes, PDO::PARAM_INT);
        $req->bindValue(':id_topics', $this->id_topics, PDO::PARAM_INT);
        $req->bindValue(':id_topicreplies', $this->id_topicreplies, PDO::PARAM_INT);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        return $req->execute();
    }

    public function delete() // suppression de topic dans la BDD
    {
        $sql = 'DELETE FROM `a8yk4_notifications` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `n`.`id`, `n`.`link`,
        DATE_FORMAT(`n`.`created_at`, "%d/%m/%y") AS `created_at`, `n`.`id_users`
        FROM `a8yk4_notifications` AS `n`
        INNER JOIN `a8yk4_users` AS `u` ON `n`.`id_users` = `u`.`id`
        WHERE `n`.`id` = :id ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getListByIdUsers()
    {
        $sql = 'SELECT `link`, 
        DATE_FORMAT(`created_at`, "%d/%m/%y") AS `created_at` 
        FROM `a8yk4_notifications` AS `n`
        INNER JOIN `a8yk4_users` ON `n`.`id_users` = `a8yk4_users`.`id`';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getList()
    {
        $sql = 'SELECT `n`.`id`,`link`, 
        DATE_FORMAT(`created_at`, "%d/%m/%y") AS `created_at`, 
        DATE_FORMAT(, "%d/%m/%y") AS , `u`. AS , `id_users`
        FROM `a8yk4_notifications` AS `n`
        INNER JOIN `a8yk4_users` AS `u` ON `n`.`id_users` = `u`.`id`
        ORDER BY `created_at` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserNotifs()
    {
        $sql = 'SELECT * FROM `a8yk4_notifications` WHERE id_users = :id_users
        ORDER BY `created_at` DESC ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_users', $this->id_users);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNotifByTopics()
    {
        $sql = 'SELECT n.`id`, n.`link
        FROM `a8yk4_notifications` AS n
        INNER JOIN `a8yk4_topics` AS c ON n.`id_topics` = c.`id`
        WHERE topics = :topics
        ORDER BY `created_at` DESC ';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNotifByChats()
    {
        $sql = 'SELECT n.`id`, n.`link
        FROM `a8yk4_notifications` AS n
        INNER JOIN `a8yk4_inbox` AS c ON n.`id_chats` = c.`id`
        WHERE topics = :chats
        ORDER BY `created_at` DESC ';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getNotifByStatus()
    {
        $sql = 'SELECT n.`id`, n.`link
        FROM `a8yk4_notifications` AS n
        INNER JOIN `a8yk4_status` AS c ON n.`id_status` = c.`id`
        WHERE status = :status
        ORDER BY `created_at` DESC ';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNotifications()
    {
        $sql = 'SELECT n.`id`, n.`message`, n.`link`, u.`username`, DATE_FORMAT(n.`created_at`, "%d/%m/%y") AS `created_at`
                FROM `a8yk4_notifications` AS n
                INNER JOIN `a8yk4_users` AS `u` ON n.`id_users` = u.`id`
                ORDER BY n.`created_at` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
    
    
    // public function addNotification($id_users, $id_chats, $link = null) {
    //     $stmt = $this->pdo->prepare("INSERT INTO notifications (user_id, id_chats, link) VALUES (?, ?, ?)");
    //     $stmt->bind_param("iss", $id_users, $id_chats, $link);
    //     return $stmt->execute();
    // }

    public function markAsRead() 
    {
        $sql = 'UPDATE `a8yk4_notifications` SET `is_read` = 1 WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':is_read', $this->is_read, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

}