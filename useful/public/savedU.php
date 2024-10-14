
<?php
class Users
{
    private $pdo;
    public int $id;
    public string $username;
    public string $email;
    public string $password;
    public string $location;
    public string $birthdate;
    public string $registerDate;
    public string $avatar;
    public string $coverpicture;
    public int $id_usersRoles;
    public int $points;

    public string $token;

    public int $verified;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'ktxkVURHF2mt4pk'); // Connect to the MySQL database
        } catch (PDOException $e) {
            header('Location: /accueil');
            exit(); // Exit to prevent further execution if there's an error
        }
    }

public function create() // ajout d'un utilisateur dans la base de données
    {
        $sql = 'INSERT INTO `a8yk4_users`(`username`, `email`, `password`, `registerDate`, `id_usersRoles`) 
        VALUES (:username,:email,:password, NOW(), 1)'; // calling the specific table request
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $req->execute();
    }

    public function getInfosByEmail()
    {
        $sql = 'SELECT `id`, `username`, `id_usersRoles` FROM `a8yk4_users` WHERE `email`= :email ;';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getPassword()
    {
        $sql = 'SELECT `password` FROM `a8yk4_users` WHERE `email`= :email ;';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    public function getEmail()
    {
        $sql = 'SELECT `email` FROM `a8yk4_users` WHERE `email`= :email ;';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    public function delete() // suppression d'un utilisateur dans la base de données
    {
        $sql = 'DELETE FROM `a8yk4_users` WHERE `id`= :id ;';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }


    public function getById()
    {
        $sql = 'SELECT `username`, `email`, `location`, DATE_FORMAT(`birthdate`, "%d/%m/%y") 
        AS `birthdateFr`, `birthdate` , DATE_FORMAT(`registerDate`, "%M %Y") AS `registerDate`,
        `avatar`, `coverpicture`, `name` AS `roleName` 
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

    //  * Mettre à jour le nom d'utilisateur, l'adresse ,le mail et la date de naissance 
    //  * @param string $username Le nom d'utilisateur
    //  * @param string $email L'adresse email
    //  * @param int $id le id de l'utilisateur
    //  * @param string $birthdate La date de naissance au format YYYY-MM-DD
    //  * @return objet
    //  */
    public function updateUserInfos()
    {
        $sql = 'UPDATE `a8yk4_users` SET `username`=:username,`email`=:email,
         `birthdate` = :birthdate, `location` =:location
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $req->bindValue(':location', $this->location, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    // les functions sql updates de location, email, username, password et avatar
    public function updateLocation()
    {
        $sql = 'UPDATE `a8yk4_users` SET `location`=:location WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':location', $this->location, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function updateUsername()
    {
        $sql = 'UPDATE `a8yk4_users` SET `username`=:username WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function updateEmail()
    {
        $sql = 'UPDATE `a8yk4_users` SET `email`=:email WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function updateAvatar()
    {
        $sql = 'UPDATE `a8yk4_users` SET `avatar`=:avatar WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':avatar', $this->avatar, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function updateCoverPicture()
    {
        $sql = 'UPDATE `a8yk4_users` SET `coverpicture`=:coverpicture WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':coverpicture', $this->coverpicture, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function updatePassword()
    {
        $sql = 'UPDATE `a8yk4_users` SET `password`=:password WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute(); 
    }

    public function save() {
        if (!isset($this->id)){ 
            return $this->create(); 
        } else{  
            return $this->updateUserInfos();  
        }                        
    }
}

 //




?>