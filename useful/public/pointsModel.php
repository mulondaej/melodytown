<?php
class Points
{
    private $pdo;
    public int $id;
    public string $userId;
    public string $points;
    public string $deductedPoints;
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
        $sql = 'SELECT COUNT(*) FROM `a8yk4_points` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Vérifie si un utilisateur existe dans la bASe de données avec le nom d'utilisateur
     * @param string $userId Le nom d'utilisateur
     * @return bool
     */
    public function checkIfExistsByContent()
    {
        $sql = 'SELECT COUNT(`userId`) FROM `a8yk4_points` WHERE `userId` = :userId';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':userId', $this->userId, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Ajoute un utilisateur dans la bASe de données
     * @param string $userId Le contenu ne contient pAS des discriminations ni explicites
     * @param string $points La date de la publication au format YYYY-MM-DD
     * @return bool
     */
    public function create() // insertion du points dans la base de données
    {
        $sql = 'INSERT INTO `a8yk4_points`(`userId`, `points`,
         `deductedPoints`, `id_users`) 
        VALUES (:userId, :points, :deductedPoints, :id_users)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':userId', $this->userId, PDO::PARAM_STR);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        return $req->execute();
    }

    public function delete() // supprimer le points de l'utilisateur
    {
        $sql = 'DELETE FROM `a8yk4_points` WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById() // recuperer le points de l'utilisateur par son id
    {
        $sql = 'SELECT `p`.`id`, `p`.`userId`, `points`, `u`.`username`
        FROM `a8yk4_points` AS `p`
        INNER JOIN `a8yk4_users` AS `u` ON `p`.`id_users` = `u`.`id`
        WHERE `p`.id = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getListByIdUsers()
    {
        $sql = 'SELECT `p`.`id`, `p`.`userId`, `points`, `u`.`username`
        FROM `a8yk4_points`  AS `p`
        INNER JOIN `a8yk4_users` AS `u` ON `p`.`id_users` = `u`.`id`
        WHERE `p`.`id_users` = :id_users
        ORDER BY `points` DESC';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPointsByUser()
    {
        $sql = 'SELECT `p`.`id`, `userId`, `points`, 
        `u`.`username`, `id_users`
        FROM `a8yk4_points` AS `p`
        INNER JOIN `a8yk4_users` AS `u` ON `p`.`id_users` = `u`.`id`
        WHERE `id_users` = :id_users
        ORDER BY `points` DESC';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserPoints()
    {
        $sql = 'SELECT p.userId, u.username, `points`, p.id_users
        FROM a8yk4_points AS p
        INNER JOIN a8yk4_users AS u ON p.id_users = u.id
        ORDER BY `points` DESC';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getPoints()
    {
        $sql = 'SELECT *, `points`, `u`.`username`
        FROM  `a8yk4_points` 
        INNER JOIN `a8yk4_users` AS `u` ON `id_users` = `u`.`id`
        ORDER BY `points` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getList()
    {
        $sql = 'SELECT `p`.`id`, 
        `userId`,
        `points`, 
        `deductedPoints`, `u`.`username` AS `username`, `id_users`
        FROM `a8yk4_points` AS `p`
        INNER JOIN `a8yk4_users` AS `u` ON `p`.`id_users` = `u`.`id`
        ORDER BY `points` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function update()
    {
        $sql = 'UPDATE `a8yk4_points` SET `userId`=:userId, `deductedPoints` = :deductedPoints
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':userId', $this->userId, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

}