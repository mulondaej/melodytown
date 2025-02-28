<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

class Users  
{
    private $pdo;
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private string $location;
    private string $birthdate;
    private string $registerDate;
    private string $avatar;
    private string $coverpicture;
    private int $id_usersRoles;
    private int $points;

    private string $token;
    private int $verified;
    private string $file_name;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'Ox)x_2sosDuTXn-i'); // Connexion à MySQL database
        } catch (PDOException $e) {
            header('Location: /accueil');
            exit(); // Exit pour empecher des nouvelles executions au cas où il y'a une erreur
        }
    }

    public function create(): bool
    {
        $sql = "INSERT INTO a8yk4_users (username, email, password, registerDate, `id_usersRoles`) 
              VALUES (:username, :email, :password, NOW(), 1)";
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $req->execute();
    }


    public function updateUserInfos(): bool
    {
        $query = "UPDATE a8yk4_users SET username = :username, email = :email, location = :location, birthdate = :birthdate WHERE id = :id";
        $req = $this->pdo->prepare($query);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':location', $this->location, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);

        $success = $req->execute();

        return $success;
    }

    // Méthode de récuper les données d'utilisateur dès database
    public function fetchUserData($userId): void
    {
        $query = "SELECT * FROM a8yk4_users WHERE id = :id";
        $req = $this->pdo->prepare($query);
        $req->execute(['id' => $userId]);
        $user = $req->fetch(PDO::FETCH_ASSOC);

        // Assigner les données récuperé aux objects properties
        $this->id = $user['id'];
        $this->username = $user['username'];
        $this->email = $user['email'];
        $this->password = $user['password'];
        $this->location = $user['location'];
        $this->birthdate = $user['birthdate'];
        $this->registerDate = $user['registerDate'];
        $this->avatar = $user['avatar'];
        $this->coverpicture = $user['coverpicture'];
        $this->id_usersRoles = $user['id_usersRoles'];
        $this->points = $user['points'];
        $this->token = $user['token'];
        // $this->verified = $user['verified'];
    }

    /**
     * Vérifie si un utilisateur existe dans la base de données avec l'email
     * @param string $email L'adresse email
     * @return bool
     */
    public function checkIfExistsByEmail(): int
    {
        $sql = 'SELECT COUNT(`email`) 
        FROM `a8yk4_users` 
        WHERE `email` = :email';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Vérifie si un utilisateur existe dans la base de données avec le nom d'utilisateur
     * @param string $username Le nom d'utilisateur
     * @return bool
     */
    public function checkIfExistsByUsername(): int
    {
        $sql = 'SELECT COUNT(`username`) 
            FROM `a8yk4_users` 
            WHERE `username` = :username';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->execute();
        return (int) $req->fetchColumn();
    }

    public function checkIfExistsByLocation(): int
    {
        $sql = 'SELECT COUNT(`location`) 
            FROM `a8yk4_users` 
            WHERE `location` = :location';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':location', $this->location, PDO::PARAM_STR);
        $req->execute();
        return (int) $req->fetchColumn();
    }

    // Getter methods
    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    // public function getPassword(): string
    // {
    //     return $this->password;
    // }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function getCoverPicture(): string
    {
        return $this->coverpicture;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getId_usersRoles(): int
    {
        return $this->id_usersRoles;
    }

    public function getPoints(): string
    {
        return $this->points;
    }

    public function getToken(): string
    {
        if (!$this->token) {
            $this->token = bin2hex(random_bytes(32));
        }
        return $this->token;
        ;
    }

    public function getVerified(): int
    {
        return $this->verified;
    }


    //setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    public function setRegisterDate(string $registerDate): void
    {
        $this->registerDate = $registerDate;
    }

    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    public function setCoverpicture(string $coverpicture): void
    {
        $this->coverpicture = $coverpicture;
    }

    public function setIdUsersRoles(int $id_usersRoles): void
    {
        $this->id_usersRoles = $id_usersRoles;
    }

    public function setPoints(int $points): void
    {
        $this->points = $points;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }


    public function setVerified(int $verified): void
    {
        $this->verified = $verified;
    }

    /**
     * Ajoute un utilisateur dans la base de données
     * @param string $username Le nom d'utilisateur
     * @param string $email L'adresse email
     * @param string $password Le mot de passe hashé
     * @param string $birthdate La date de naissance au format YYYY-MM-DD
     * @return bool
     */

    // public function create() // ajout d'un utilisateur dans la base de données
    // {
    //     $sql = 'INSERT INTO `a8yk4_users`(`username`, `email`, `password`, `registerDate`, `id_usersRoles`) 
    //     VALUES (:username,:email,:password, NOW(), 1)'; // calling the specific table request
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':username', $this->username, PDO::PARAM_STR);
    //     $req->bindValue(':email', $this->email, PDO::PARAM_STR);
    //     $req->bindValue(':password', $this->password, PDO::PARAM_STR);
    //     return $req->execute();
    // }

    public function getInfosByEmail(): ?array
    {
        $sql = 'SELECT `id`, `username`, `id_usersRoles` FROM `a8yk4_users` WHERE `email`= :email ;';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getPassword(): ?string
    {
        $sql = 'SELECT `password` FROM `a8yk4_users` WHERE `email`= :email';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchColumn();
    }

    // public function getEmail(): ?string
    // {
    //     $sql = 'SELECT `email` FROM `a8yk4_users` WHERE `email`= :email';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':email', $this->email, PDO::PARAM_STR);
    //     $req->execute();
    //     return $req->fetchColumn();
    // }

    public function delete(): bool
    {
        $sql = 'DELETE FROM `a8yk4_users` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `username`, `email`, `location`, DATE_FORMAT(`birthdate`, "%d/%m/%y") 
        AS `birthdateFr`, `birthdate` , DATE_FORMAT(`registerDate`, "%M %Y") AS `registerDate`,
        `avatar`, `coverpicture`, `name` AS `roleName` , `verified`
        FROM `a8yk4_users`
        INNER JOIN `a8yk4_usersroles` ON id_usersRoles = `a8yk4_usersroles`.`id`
        WHERE `a8yk4_users`.`id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getLatestUser()
    {
        $sql = 'SELECT id, username, 
        DATE_FORMAT(`registerDate`, "%d/%m /%Y") AS `registerDate` 
        FROM `a8yk4_users` 
        ORDER BY `registerDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getList()
    {
        $sql = 'SELECT `u`.`id`, `u`.`username`, `u`.`email`, `u`.`location`, DATE_FORMAT(`u`.`birthdate`, "%d/%m/%y") 
        AS `birthdateFr`, `birthdate` , DATE_FORMAT(`u`.`registerDate`, "%M %Y") AS `registerDate`, 
        `u`.`avatar`, `u`.`coverpicture`, `name` AS `roleName` 
        FROM `a8yk4_users` AS `u`
        INNER JOIN `a8yk4_usersroles` ON id_usersRoles = `a8yk4_usersroles`.`id`';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function verificationEmail($email, $username)
    {
        $mail = new PHPMailer(true);


        try {
            // parametres de serveur
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // serveur SMTP  (e.g., Gmail SMTP)
            $mail->SMTPAuth = true;              // autorisation de SMTP authentication
            $mail->Username = 'mtjosue31@gmail.com';  // mon email address
            $mail->Password = 'cwfbylwtvmnzghej';   // mon email password (considerer que je l'utilise)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // autorisation de TLS encryption, `ssl` est aussi accepte
            $mail->Port = 587;               // port TCP 
            // TCP port to connect to
            // Disable SSL certificate verification (quick fix)
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            // Recipients
            $mail->setFrom('mtjosue31@gmail.com', 'MelodyTown');
            $mail->addAddress($email, $username);  // email de l'utilisateur

            // Content
            $mail->isHTML(true);  // remettre le format d'email en html
            $mail->Subject = 'Verify Your Email';

            // Creer un token unique
            $this->token = uniqid();

            // Sauvegarde de token

            $verificationLink = "http://melodytown/verification?code=$this->token?account verified?";
            $mail->Body = "Hi $username,<br><br>Merci de nous avoir rejoint. Maintenant connectez vous pour completer votre nouvelle aventure:<br><br>
                              <a href='$verificationLink'><br>Bienvenu(e)!</a>";

            // envoie d'email
            $mail->send();
            echo 'Verification email sent.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function tokenInsert()
    {
        // Fetch user by token
        $sql = 'UPDATE a8yk4_users SET token = :token WHERE id = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':token', $this->token, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function emailVerified()
{
    $sql = 'UPDATE a8yk4_users SET verified = 1 WHERE id = :id';
    $req = $this->pdo->prepare($sql);
    $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $req->execute();
}

    // // updates
    /**
     * Mettre à jour le nom d'utilisateur, l'adresse ,le mail et la date de naissance 
     * @param string $username Le nom d'utilisateur
     * @param string $email L'adresse email
     * @param int $id le id de l'utilisateur
     * @param string $birthdate La date de naissance au format YYYY-MM-DD
     * @return objet
     */


    // les functions sql updates de location, email, username, password et avatar
    public function updateLocation(): bool
    {
        $sql = 'UPDATE `a8yk4_users` SET `location`=:location WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':location', $this->location, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function updateUsername(): bool
    {
        $sql = 'UPDATE `a8yk4_users` SET `username`=:username WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function updateEmail(): bool
    {
        $sql = 'UPDATE `a8yk4_users` SET `email`=:email WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function updateAvatar(): bool
    {
        $sql = 'UPDATE `a8yk4_users` SET `avatar`=:avatar WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':avatar', $this->avatar, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function updateCoverPicture(): bool
    {
        $sql = 'UPDATE `a8yk4_users` SET `coverpicture`=:coverpicture WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':coverpicture', $this->coverpicture, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function updatePassword(): bool
    {
        $sql = 'UPDATE `a8yk4_users` SET `password`=:password WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }


    public function updateMedia() // update de media
    {
        $sql = 'UPDATE `a8yk4_media` SET `file_name`=:file_name
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':file_name', $this->file_name, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    //points 
    // public function setPoints()
    // {
    //     $sql = 'UPDATE `a8yk4_users` SET `points`=:points
    //     WHERE `id` = :id';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':points', $this->points, PDO::PARAM_INT);
    //     $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    //     return $req->execute();
    // }

    // public function reducePoints() {
    //     $sql = 'DELETE FROM `a8yk4_users` WHERE `points`= :points ;';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    //     return $req->execute();
    // }

    public function searchUsers($keyword)
    {
        $sql = 'SELECT u.`id`, u.`content`, `u`.`username`
        FROM `a8yk4_users` AS u
        WHERE u.`username` LIKE :keyword
        ORDER BY u.`publicationDate` DESC';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function save()
    {
        if (!isset($this->id)) {
            return $this->create();
        } else {
            return $this->updateUserInfos();
        }
    }
}
