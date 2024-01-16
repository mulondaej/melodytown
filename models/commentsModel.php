<?php 

class Comments {

    private $pdo;
    public int $id;
    public int $content;
    public int $publicationDate;
    public int $id_status;
    public int $id_users;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'ktxkVURHF2mt4pk'); //connect to databASe sql
        } catch (PDOException $e) {
            header('Location: /accueil');
        }
    }

    public function checkIfExistsByReply()
        {
            $sql = 'SELECT COUNT(content) FROM `a8yk4_comments` WHERE `reply` = :reply';
            $req = $this->pdo->prepare($sql);
            $req->bindValue(':content', $this->content, PDO::PARAM_STR);
            $req->execute();
            return $req->fetch(PDO::FETCH_COLUMN);

        }

    public function create()
    {
        $sql = 'INSERT INTO `a8yk4_comments`( `content`,`publicationDate`, `id_status`,`id_users` ) 
        VALUES (:content, NOW(), :id_users, :id_status)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':publicationDate', $this->publicationDate, PDO::PARAM_STR);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->bindValue(':id_status', $this->id_status, PDO::PARAM_INT);
        $req->execute();
    }

    public function deleteAnswer()
    {
        $sql = 'DELETE `id` FROM `a8yk4_comments` WHERE `content`= :content ;';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT DATE_FORMAT(`publicationDate`, "%d/%m/%y") AS `publicationDate`, `content`
                FROM `a8yk4_topicComments`
                INNER JOIN `a8yk4_users` ON `a8yk4_topicComments`.`id_users` = `a8yk4_users`.`id`
                WHERE `a8yk4_users`.`id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function getList()
    {
    }

    public function updateAnswer()
    {
        $sql = 'UPDATE `a8yk4_topicComments` SET `publicationDate` = :publicationDate, `content`=:content  WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':publicationDate', $this->publicationDate, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
}