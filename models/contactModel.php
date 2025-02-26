<?php
class Contact
{
    private $pdo;
    public int $id;
    public string $username;
    public string $email;
    public string $subject;
    public string $message;
    public string $publicationDate;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'Ox)x_2sosDuTXn-i'); //connect to database sql
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
     * Vérifie si un utilisateur existe dans la base de données avec le nom d'utilisateur
     * @param string $username Le nom d'utilisateur
     * @return bool
     */
    public function checkIfExistsByUsername()
    {
        $sql = 'SELECT COUNT(`username`) FROM `a8yk4_contact` WHERE `username` = :username';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Ajoute un utilisateur dans la base de données
     * @param string $username Le nom d'utilisateur
     * @param string $email L'adresse email
     * @param string $message Le mot de passe hashé
     * @return bool
     */
    public function create()
    {
        $sql = 'INSERT INTO `a8yk4_contact`(`username`, `email`, `subject`, `message`, `publicationDate`) 
        VALUES (:username, :email, :subject, :message, NOW())';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':subject', $this->subject, PDO::PARAM_STR);
        $req->bindValue(':message', $this->message, PDO::PARAM_STR);
        return $req->execute();

    }

    public function getInfosByEmail()
    {
        $sql = 'SELECT `id`, `username`, `` FROM `a8yk4_contact` WHERE `email`= :email ;';
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
        $sql = 'SELECT `username`, `email`, `subject`, DATE_FORMAT(`publicationDate`, "%d/%m/%y") 
        AS `publicationDateFr`, `publicationDate` ,
        FROM `a8yk4_contact`
        INNER JOIN `a8yk4_users` ON  = `a8yk4_users`.`id`
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
        $sql = 'SELECT `c`.`id`, `c`.`username`, `c`.`email`, `c`.`subject`,`c`.`message`,
        DATE_FORMAT(`publicationDate`, "%d/%m/%y") 
        AS `publicationDateFr`, `publicationDate`
        FROM `a8yk4_contact` AS `c`';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

}
