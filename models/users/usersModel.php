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
    public string $avatar = '';
    public int $id_usersRoles;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'ktxkVURHF2mt4pk'); //connect to database sql
        } catch (PDOException $e) {
            header('Location: /accueil');
        }
    }

    /**
     * Vérifie si un utilisateur existe dans la base de données avec l'email
     * @param string $email L'adresse email
     * @return bool
     */
    public function checkIfExistsByEmail()
    {
        $sql = 'SELECT COUNT(`email`) FROM `a8yk4_users` WHERE `email` = :email';
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
    public function checkIfExistsByUsername()
    {
        $sql = 'SELECT COUNT(`username`) FROM `a8yk4_users` WHERE `username` = :username';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    // public function checkIfExistsByLocation()
    // {
    //     $sql = 'SELECT COUNT(`location`) FROM `a8yk4_users` WHERE `location` = :location';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':location', $this->location, PDO::PARAM_STR);
    //     $req->execute();
    //     return $req->fetch(PDO::FETCH_COLUMN);
    // }

    /**
     * Ajoute un utilisateur dans la base de données
     * @param string $username Le nom d'utilisateur
     * @param string $email L'adresse email
     * @param string $password Le mot de passe hashé
     * @param string $birthdate La date de naissance au format YYYY-MM-DD
     * @return bool
     */
    public function create()
    {
        $sql = 'INSERT INTO `a8yk4_users`(`username`, `email`, `password`, `birthdate`, `registerDate`, `id_usersRoles`) VALUES (:username,:email,:password,:birthdate, NOW(), 1)'; // calling the specific table request
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
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

    public function delete()
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
        `avatar`, `name` AS `roleName` 
        FROM `a8yk4_users`
        INNER JOIN `a8yk4_usersroles` ON id_usersRoles = `a8yk4_usersroles`.`id`
        WHERE `a8yk4_users`.`id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getUser()
    {
        $sql = 'SELECT * FROM  `a8yk4_users` ORDER BY `registerDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getList()
    {
        $sql = 'SELECT `u`.`id`, `u`.`username`, `email`, `location`, DATE_FORMAT(`birthdate`, "%d/%m/%y") 
        AS `birthdateFr`, `birthdate` , DATE_FORMAT(`registerDate`, "%M %Y") AS `registerDate`, 
        `avatar`, `name` AS `roleName` 
        FROM `a8yk4_users` AS `u`
        INNER JOIN `a8yk4_usersroles` ON id_usersRoles = `a8yk4_usersroles`.`id`';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Mettre à jour le nom d'utilisateur; l'adresse ,qil et la date de naissance 
     * @param string $username Le nom d'utilisateur
     * @param string $email L'adresse email
     * @param int $id le id de l'utilisateur
     * @param string $birthdate La date de naissance au format YYYY-MM-DD
     * @return objet
     */
    public function update() #`location` = :location,, `avatar`=:avatar
    {
        $sql = 'UPDATE `a8yk4_users` SET `username`=:username,`email`=:email, `birthdate` = :birthdate, `avatar` = :avatar WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        // $req->bindValue(':location', $this->location, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $req->bindValue(':avatar', $this->avatar, PDO::PARAM_STR);
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
}
