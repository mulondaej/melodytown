<?php
class Messages
{
    private $pdo;
    public int $id;
    private int $id_users = 0;
    public int $receiver_id;
    public int $sender_id;
    public string $title;
    public string $message;
    public string $timestamp;
  
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
        $sql = 'SELECT COUNT(*) FROM `a8yk4_messages` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }
    

    // public function checkIfExistsByTitle()
    // {
    //     $sql = 'SELECT COUNT(`title`) FROM `a8yk4_messages` WHERE `title` = :title';
    //     $req = $this->pdo->prepare($sql);
    //     
    //     $req->execute();
    //     return $req->fetch(PDO::FETCH_COLUMN);
    // }

    /**
     * Vérifie si un utilisateur existe dans la bASe de données avec le nom d'utilisateur
     * @param string $message Le nom d'utilisateur
     * @return bool
     */
    public function checkIfExistsByMessage()
    {
        $sql = 'SELECT COUNT(`message`) FROM `a8yk4_messages` WHERE `message` = :message';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':message', $this->message, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Ajoute un utilisateur dans la bASe de données
     * @param string $title Le titre du thread
     * @param string $message Le contenu ne contient pAS des discriminations ni explicites
     * @param string $timestamp La date de la publication au format YYYY-MM-DD
     * @return bool
     */

    public function create() // Ajout de topic dans la base de données
    {
        $sql = 'INSERT INTO `a8yk4_messages`(`sender_id`, `receiver_id`, `title`, `message`, `timestamp`) 
        VALUES (:sender_id, :receiver_id, :title, :message, NOW())';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':sender_id', $this->sender_id, PDO::PARAM_INT);
        $req->bindValue(':receiver_id', $this->receiver_id, PDO::PARAM_INT);
        $req->bindValue(':title', $this->title, PDO::PARAM_STR);
        $req->bindValue(':message', $this->message, PDO::PARAM_STR);

        if ($req->execute()) {
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        
        return false;
    }


    public function delete() // suppression de topic dans la BDD
    {
        $sql = 'DELETE FROM `a8yk4_messages` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `i`.`id`, `i`.`message`, 
        DATE_FORMAT(`i`.`timestamp`, "%d/%m/%y") AS `timestamp`, `u1`.`username` AS `sendername`, `u1`.`avatar`, `u2`.`username` AS `receivername`, `u2`.`avatar`, `sender_id`, `receiver_id`, `title`
        FROM `a8yk4_messages` AS `i`
        INNER JOIN `a8yk4_users` AS `u1` ON `i`.`sender_id` = `u1`.`id`
        INNER JOIN `a8yk4_users` AS `u2` ON `i`.`receiver_id` = `u2`.`id`
        WHERE `i`.`id` = :id ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getMessageById($id) {
        $query = $this->pdo->prepare("SELECT * FROM a8yk4_messages WHERE id = :id");
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
        
        return $query->fetch(PDO::FETCH_OBJ); // Return object instead of array
    }
    

    public function getListByIdUsers()
    {
        $sql = 'SELECT `title`, `message`, 
        DATE_FORMAT(`timestamp`, "%d/%m/%y") AS `timestamp` 
        FROM `a8yk4_messages` AS `i`
        INNER JOIN `a8yk4_users` ON `i`.`id_users` = `a8yk4_users`.`id`';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getList()
    {
        $sql = 'SELECT `i`.`id`,`u1`.`username` AS `sendername`, `u1`.`avatar`, `u2`.`username` AS `receivername`, `u2`.`avatar`, `sender_id`, `receiver_id`,`title`, `timestamp`, SUBSTR(`message`, 1, 500) AS `message`
        FROM `a8yk4_messages` AS `i`
        INNER JOIN `a8yk4_users` AS `u1` ON `i`.`sender_id` = `u1`.`id`
        INNER JOIN `a8yk4_users` AS `u2` ON `i`.`receiver_id` = `u2`.`id`
        ORDER BY `timestamp` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserChats()
    {
        $sql = 'SELECT * FROM `a8yk4_messages` WHERE id_users = :id_users
        ORDER BY `timestamp` DESC ';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_users', $this->id_users);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }


//     // Function to send a message
// function sendMessage($sender_id, $receiver_id, $message) {
//     global $conn;
//     $sql = "INSERT INTO a8yk4_messages (sender_id, receiver_id, message) VALUES (?, ?, ?)";
//     $req = $conn->prepare($sql);
//     $req->bind_param("iis", $sender_id, $receiver_id, $message);
//     return $req->execute();
// }

// Function to get messages for the logged-in user
public function getMessages($user_id) {
    if (!isset($this->id_users)) {
        $this->id_users = $user_id; // Ensure it's initialized
    }

    $sql = 'SELECT m.id, m.message, m.sender_id, m.receiver_id, DATE_FORMAT(m.timestamp, "%d/%m/%y") AS timestamp, 
                   u1.username AS sendername, u1.avatar AS senderavatar, u2.username AS receivername, u2.avatar AS receiveravatar
            FROM a8yk4_messages AS m
            INNER JOIN a8yk4_users AS u1 ON m.sender_id = u1.id
            INNER JOIN a8yk4_users AS u2 ON m.receiver_id = u2.id
            WHERE m.sender_id = :user_id OR m.receiver_id = :user_id
            ORDER BY m.timestamp DESC';
    $req = $this->pdo->prepare($sql);
    $req->bindValue(':user_id', $this->id_users, PDO::PARAM_INT);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}


    public function getChat()
    {
        $sql = 'SELECT i.`id`, `u`.`sender_id`, DATE_FORMAT(`timestamp`, "%d/%m/%y") AS `timestamp`
        FROM  `a8yk4_messages` AS `i`
        INNER JOIN `a8yk4_users` AS `u` ON `i`.`id_users` = `u`.`id`
        ORDER BY `timestamp` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }
    

    public function changeUsers()
    {
        $sql = "UPDATE `a8yk4_messages` SET `id_users` = :id_users WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
    }

    public function update() //update de topic dans la BDD
    {
        $sql = 'UPDATE `a8yk4_messages` SET `message`=:message, `timestamp` = NOW() WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        
        $req->bindValue(':message', $this->message, PDO::PARAM_STR);
        
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function updateMessage() //update de contenu dans la BDD sans toucher au reste des champs
    {
        $sql = 'UPDATE `a8yk4_messages` SET `title`, `message`=:message, `timestamp` = NOW()
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':title', $this->title, PDO::PARAM_STR);
        $req->bindValue(':message', $this->message, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
}