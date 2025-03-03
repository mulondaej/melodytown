<?php
class messageNotif
{
    private $pdo;
    public int $id;
    public string $link;
    public string $message;
    public string $created_at;
    public int $is_read = 0;
    public int $id_users = 0;
    public int $id_messages = 0;
    public int $id_textback = 0;
  
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
     * @param string $link Le titre
     * @return bool
     */
    // 

    public function checkIfExistsById()
    {
        $sql = 'SELECT COUNT(*) FROM `a8yk4_messagenotif` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    // /**
    //  * Vérifie si un utilisateur existe dans la bASe de données avec le nom d'utilisateur
    //  * @param string $is_read Le nom d'utilisateur
    //  * @return bool
    //  */
    // public function checkIfExistsByContent()
    // {
    //     $sql = 'SELECT COUNT(`is_read`) FROM `a8yk4_messagenotif` WHERE `is_read` = :is_read';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':is_read', $this->is_read, PDO::PARAM_STR);
    //     $req->execute();
    //     return $req->fetch(PDO::FETCH_COLUMN);
    // }

    public function checkIfExistsByIdMessages()
{

$sql = "SELECT COUNT(*) FROM a8yk4_messages WHERE id = :id_messages";
$req = $this->pdo->prepare($sql);
$req->bindValue(':id_messages', $this->id_messages, PDO::PARAM_INT);
$req->execute();

if ($req->fetchColumn() == 0) {
    // Message ID does not exist, prevent insertion
    throw new Exception("Error: id_messages {$this->id_messages} does not exist in a8yk4_messages.");
}
}

public function checkIfExistsByIdReplies()
{

$sql = "SELECT COUNT(*) FROM a8yk4_textback WHERE id = :id_textback";
$req = $this->pdo->prepare($sql);
$req->bindValue(':id_textback', $this->id_textback, PDO::PARAM_INT);
$req->execute();

if ($req->fetchColumn() == 0) {
    // Message ID does not exist, prevent insertion
    throw new Exception("Error: id_textback {$this->id_textback} does not exist in a8yk4_tex.");
}
}
    /**
     * Ajoute un utilisateur dans la bASe de données
     * @param string $link Le titre du thread
     * @param string $is_read Le contenu ne contient pAS des discriminations ni explicites
     * @param string $created_at La date de la publication au format YYYY-MM-DD
     * @return bool
     */
    public function create() {
        $sql = 'INSERT INTO `a8yk4_messagenotif` (`message`, `link`, `is_read`, `created_at`, `id_messages`, `id_users`) 
                VALUES (:message, :link, :is_read, NOW(), :id_messages, :id_users)';
        
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':message', $this->message, PDO::PARAM_STR);
        $req->bindValue(':link', $this->link, PDO::PARAM_STR);
        $req->bindValue(':is_read', $this->is_read, PDO::PARAM_INT);
        $req->bindValue(':id_messages', $this->id_messages, PDO::PARAM_INT);
        // $req->bindValue(':id_textback', $this->id_textback, PDO::PARAM_INT);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
    
        return $req->execute();
    }
    
    public function createReply() {
        $sql = 'INSERT INTO `a8yk4_messagenotif` (`message`, `link`, `is_read`, `created_at`, , `id_messages`, `id_textback`, `id_users`) 
                VALUES (:message, :link, :is_read, NOW(), :id_messages, :id_textback, :id_users)';
        
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':message', $this->message, PDO::PARAM_STR);
        $req->bindValue(':link', $this->link, PDO::PARAM_STR);
        $req->bindValue(':is_read', $this->is_read, PDO::PARAM_INT);
        $req->bindValue(':id_messages', $this->id_messages, PDO::PARAM_INT);
        $req->bindValue(':id_textback', $this->id_textback, PDO::PARAM_INT);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
    
        return $req->execute();
    }

    public function delete() // suppression de topic dans la BDD
    {
        $sql = 'DELETE FROM `a8yk4_messagenotif` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT *
        FROM `a8yk4_messagenotif` AS `n`
        INNER JOIN `a8yk4_messages` AS `m` ON `n`.`id_messages` = `m`.`id`
        INNER JOIN `a8yk4_users` AS `u` ON `n`.`id_users` = `u`.`id`
        WHERE `n`.`id` = :id ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getListByIdUsers()
    {
        $sql = 'SELECT n.`id`, n.`message`, n.`link`, n.`is_read`, n.`created_at`, u.`username`, m.`title`, m.`sender_id` AS senderid, m.`receiver_id` AS receiverid 
        FROM `a8yk4_messagenotif` AS `n`
        INNER JOIN `a8yk4_messages` AS `m` ON `n`.`id_messages` = `m`.`id`
        INNER JOIN `a8yk4_users` AS `u` ON `n`.`id_users` = `u`.`id`';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getList()
    {
        $sql = 'SELECT n.`id`, n.`message`, n.`link`, n.`is_read`, n.`created_at`, u.`username`, m.`title`, m.`sender_id` AS senderid, m.`receiver_id` AS receiverid 
        FROM `a8yk4_messagenotif` AS `n`
        INNER JOIN `a8yk4_messages` AS `m` ON `n`.`id_messages` = `m`.`id`
        INNER JOIN `a8yk4_users` AS `u` ON `n`.`id_users` = `u`.`id`
        ORDER BY `created_at` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserNotifs()
    {
        $sql = 'SELECT * FROM `a8yk4_messagenotif` WHERE id_users = :id_users
        ORDER BY `created_at` DESC ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_users', $this->id_users);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNotifByTopics()
    {
        $sql = 'SELECT n.`id`, n.`link
        FROM `a8yk4_messagenotif` AS n
        INNER JOIN `a8yk4_topics` AS c ON n.`id_topics` = c.`id`
        WHERE topics = :topics
        ORDER BY `created_at` DESC ';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // public function getNotifByChats()
    // {
    //     $sql = 'SELECT n.`id`, n.`link
    //     FROM `a8yk4_messagenotif` AS n
    //     INNER JOIN `a8yk4_inbox` AS c ON n.`id_inbox` = c.`id`
    //     WHERE id = :id
    //     ORDER BY `created_at` DESC ';
    //     $req = $this->pdo->prepare($sql);
    //     $req->execute();
    //     return $req->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function getNotifByMessages()
    {
        $sql = 'SELECT n.`id`, n.`link
        FROM `a8yk4_messagenotif` AS n
        INNER JOIN `a8yk4_messages` AS c ON n.`id_messages` = c.`id`
        WHERE id = :id
        ORDER BY `created_at` DESC ';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getNotifByStatus()
    {
        $sql = 'SELECT n.`id`, n.`link
        FROM `a8yk4_messagenotif` AS n
        INNER JOIN `a8yk4_status` AS c ON n.`id_status` = c.`id`
        WHERE status = :status
        ORDER BY `created_at` DESC ';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLatestNotif()
    {
        $sql = 'SELECT id, username, 
        DATE_FORMAT(`registerDate`, "%d/%m /%Y") AS `registerDate` 
        FROM `a8yk4_users` 
        ORDER BY `registerDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getNotifications() {
        $sql = "SELECT n.`id`, n.`message`, n.`link`, u.`username`, 
                DATE_FORMAT(n.`created_at`, '%d/%m/%y') AS `created_at`
                FROM `a8yk4_messagenotif` AS n
                INNER JOIN `a8yk4_users` AS u ON n.`id_users` = u.`id`
                ORDER BY created_at DESC";

        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
    
    
    // public function addNotification($id_users, $id_inbox, $link = null) {
    //     $req = $this->pdo->prepare("INSERT INTO notifications (user_id, id_inbox, link) VALUES (?, ?, ?)");
    //     $req->bind_param("iss", $id_users, $id_inbox, $link);
    //     return $req->execute();
    // }

    public function markAsRead(int $id) 
    {
        $this->id = $id; // Ensure id is set
        $sql = 'UPDATE `a8yk4_messagenotif` SET `is_read` = 1 WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':is_read', $this->is_read, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

}