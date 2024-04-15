
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
    // public function getPassword()
    // {
    //     $sql = 'SELECT `password` FROM `a8yk4_users` WHERE `email`= :email ;';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':email', $this->email, PDO::PARAM_STR);
    //     $req->execute();
    //     return $req->fetch(PDO::FETCH_COLUMN);
    // }

    // public function getEmail()
    // {
    //     $sql = 'SELECT `email` FROM `a8yk4_users` WHERE `email`= :email ;';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':email', $this->email, PDO::PARAM_STR);
    //     $req->execute();
    //     return $req->fetch(PDO::FETCH_COLUMN);
    // }

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

    // // updates
    // /**
    //  * Mettre à jour le nom d'utilisateur, l'adresse ,le mail et la date de naissance 
    //  * @param string $username Le nom d'utilisateur
    //  * @param string $email L'adresse email
    //  * @param int $id le id de l'utilisateur
    //  * @param string $birthdate La date de naissance au format YYYY-MM-DD
    //  * @return objet
    //  */
    public function setUserInfos()
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

    // // les functions sql updates de location, email, username, password et avatar
    // public function setLocation()
    // {
    //     $sql = 'UPDATE `a8yk4_users` SET `location`=:location WHERE `id` = :id';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':location', $this->location, PDO::PARAM_STR);
    //     $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    //     return $req->execute();
    // }

    // public function setUsername()
    // {
    //     $sql = 'UPDATE `a8yk4_users` SET `username`=:username WHERE `id` = :id';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':username', $this->username, PDO::PARAM_STR);
    //     $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    //     return $req->execute();
    // }

    // public function setEmail()
    // {
    //     $sql = 'UPDATE `a8yk4_users` SET `email`=:email WHERE `id` = :id';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':email', $this->email, PDO::PARAM_STR);
    //     $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    //     return $req->execute();
    // }

    // public function setAvatar()
    // {
    //     $sql = 'UPDATE `a8yk4_users` SET `avatar`=:avatar WHERE `id` = :id';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':avatar', $this->avatar, PDO::PARAM_STR);
    //     $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    //     return $req->execute();
    // }

    // public function setCoverPicture()
    // {
    //     $sql = 'UPDATE `a8yk4_users` SET `coverpicture`=:coverpicture WHERE `id` = :id';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':coverpicture', $this->coverpicture, PDO::PARAM_STR);
    //     $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    //     return $req->execute();
    // }

    // public function setPassword()
    // {
    //     $sql = 'UPDATE `a8yk4_users` SET `password`=:password WHERE `id` = :id';
    //     $req = $this->pdo->prepare($sql);
    //     $req->bindValue(':password', $this->password, PDO::PARAM_STR);
    //     $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    //     return $req->execute();
    // }

    public function verifyAccount()
    {
        if (empty($this->token)) {
            throw new \Exception("Le token est vide");
        }
    
        // Vérification si le token existe dans la base de données
        $req = $this->pdo->prepare('SELECT * FROM `a8yk4_emailvalidations` WHERE `id_users` = ? AND `token` = ?');
        $req->execute([$this->id, sha1($this->token)]);
    
        // Si il n'y a pas d'enregistrement correspondant au token et à l'utilisateur, on renvoie false
        if ($data = $req->fetch()) {
            // On supprime l'enregistrement de validation pour éviter une utilisation multiple du même token
            $delete = $this->pdo->prepare('DELETE FROM `a8yk4_emailvalidations` WHERE `id_users` = ? AND `token` = ?');
            $delete->execute([$data['id'], $data['token']]);
            
            
            $update = $this->pdo->prepare('UPDATE `a8yk4_users` SET `verified` = 1 WHERE `id` = ?');
            $update->execute([$this->id]);
    
            return true; 
        }
        
        return false; 
    }
    

    // public function setToken()
    // {
    //     $this->token = bin2hex(random_bytes(64));
    //     $date = date('Y-m 00:00:00');
    //     $expirationDate = date('Y-m-d H:i:s', strtotime('+ 7 days'));

    //     $req = $this->pdo->prepare('INSERT INTO `a8yk4_emailvalidations` (`id_users`, `token`, `creationDate`, `expirationDate`) VALUES (:id_users, :token, :creationDate, :expirationDate)');
    //     $req->bindValue(':id_users', $this->id);
    //     $req->bindValue(':token', hash('sha512', $this->token . $date), \PDO::PARAM_STR);
    //     $req->bindValue(':creationDate', $date);
    //     $req->bindValue(':expirationDate', $expirationDate);
    //     $req->execute();
    // }

    public function save() {
        if (!isset($this->id)){ 
            return $this->create(); 
        } else{  
            return $this->setUserInfos();  
        }                        
    }
}
