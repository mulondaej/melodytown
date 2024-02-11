<?php
class Contact
{
    private $pdo;
    public int $id;
    public string $username;
    public string $email;
    public string $message;
    public string $publicationDate;
    public int $id_users;

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
        $sql = 'SELECT COUNT(`email`) FROM `a8yk4_contact` WHERE `email` = :email';
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

    /**
     * Ajoute un utilisateur dans la base de données
     * @param string $username Le nom d'utilisateur
     * @param string $email L'adresse email
     * @param string $message Le mot de passe hashé
     * @return bool
     */
    public function create()
    {
        $sql = 'INSERT INTO `a8yk4_contact`(`username`, `email`, `message`, `publicationDate`, `publicationDate`, `id_users`) 
        VALUES (:username,:email,:message,:publicationDate, NOW(), 1)'; // calling the specific table request
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':message', $this->message, PDO::PARAM_STR);
        $req->bindValue(':publicationDate', $this->publicationDate, PDO::PARAM_STR);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getInfosByEmail()
    {
        $sql = 'SELECT `id`, `username`, `id_users` FROM `a8yk4_contact` WHERE `email`= :email ;';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function delete()
    {
        $sql = 'DELETE FROM `a8yk4_contact` WHERE `id`= :id ;';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `username`, `email`, `location`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") 
        AS `publicationDateFr`, `publicationDate` ,
        FROM `a8yk4_contact`
        INNER JOIN `a8yk4_users` ON id_users = `a8yk4_users`.`id`
        WHERE `a8yk4_contact`.`id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getMessage()
    {
        $sql = 'SELECT * ,DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate` 
        FROM  `a8yk4_contact` ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getList()
    {
        $sql = 'SELECT `c`.`id`, `c`.`username`, `c`.`email`,
        DATE_FORMAT(`publicationDate`, "%d/%m/%y") 
        AS `publicationDateFr`, `publicationDate`
        FROM `a8yk4_contact` AS `c`
        INNER JOIN `a8yk4_users` ON id_users = `a8yk4_users`.`id`';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Mettre à jour le nom d'utilisateur; l'email et le message
     * @param string $username Le nom d'utilisateur
     * @param string $email L'adresse email
     * @param int $id le id de l'utilisateur
     * @param string $publicationDate La date de naissance au format YYYY-MM-DD
     * @return objet
     */
    public function update() 
    {
        $sql = 'UPDATE `a8yk4_contact` SET `username`=:username,`email`=:email,
         `publicationDate` = :publicationDate
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':publicationDate', $this->publicationDate, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

}
