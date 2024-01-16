<<<<<<< HEAD
<?php

class Forums
{
    private $pdo;

    public function __construct()
    {
        // Connect to your database (replace with your database credentials)
        $host = 'localhost';
        $username = 'm18wq_admin';
        $password = 'ktxkVURHF2mt4pk';
        $database = 'melodytown';

        $this->pdo = new mysqli('mysql:host=' . $host . ';m18wq_admin=' . $username . ';ktxkVURHF2mt4pk=' . $password . ';dbname=melodytown' . $database);

        // Check the connection
        if ($this->pdo->connect_error) {
            die("Connection failed: " . $this->pdo->connect_error);
        }
    }

    public function createThread($tag, $title, $content)
    {
        // Insert the new thread into the database
        $query = "INSERT INTO `a8yk4_topics`( `title`, `content`, `publicationDate`, `id_users`) VALUES (:title,:content,Now(),1)'";
        $statement = $this->pdo->prepare($query);

        // Bind parameters
        $statement->bind_param("sss", $tag, $title, $content);

        // Execute the query
        $statement->execute();

        // Close the statement
        $statement->close();
    }

    // Function to save thread data to the database (you need to implement this)
    function saveThreadToDatabase($data)
    {
        // Implement the database save logic here
        // For example, you can use PDO or any other database connection method

        // Sample PDO code (replace with your actual database connection)
        $pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'ktxkVURHF2mt4pk');

        $tag = $data['tag'];
        $title = $data['title'];
        $content = $data['content'];

        $stmt = $pdo->prepare("INSERT INTO `a8yk4_topics`( `tag`,`title`, `content`, `publicationDate`, `id_users`) VALUES (:tag,:title,:content,Now(),1)'");
        $stmt->execute([$tag, $title, $content]);
    }
}
=======
<?php

class Forums
{
    private $pdo;

    public function __construct()
    {
        // Connect to your database (replace with your database credentials)
        $host = 'localhost';
        $username = 'm18wq_admin';
        $password = 'ktxkVURHF2mt4pk';
        $database = 'melodytown';

        $this->pdo = new mysqli('mysql:host=' . $host . ';m18wq_admin=' . $username . ';ktxkVURHF2mt4pk=' . $password . ';dbname=melodytown' . $database);

        // Check the connection
        if ($this->pdo->connect_error) {
            die("Connection failed: " . $this->pdo->connect_error);
        }
    }

    public function createThread($tag, $title, $content)
    {
        // Insert the new thread into the database
        $query = "INSERT INTO `a8yk4_topics`( `title`, `content`, `publicationDate`, `id_users`) VALUES (:title,:content,Now(),1)'";
        $statement = $this->pdo->prepare($query);

        // Bind parameters
        $statement->bind_param("sss", $tag, $title, $content);

        // Execute the query
        $statement->execute();

        // Close the statement
        $statement->close();
    }

    // Function to save thread data to the database (you need to implement this)
    function saveThreadToDatabase($data)
    {
        // Implement the database save logic here
        // For example, you can use PDO or any other database connection method

        // Sample PDO code (replace with your actual database connection)
        $pdo = new PDO('mysql:host=localhost;dbname=melodytown;charset=utf8', 'm18wq_admin', 'ktxkVURHF2mt4pk');

        $tag = $data['tag'];
        $title = $data['title'];
        $content = $data['content'];

        $stmt = $pdo->prepare("INSERT INTO `a8yk4_topics`( `tag`,`title`, `content`, `publicationDate`, `id_users`) VALUES (:tag,:title,:content,Now(),1)'");
        $stmt->execute([$tag, $title, $content]);
    }
}
>>>>>>> 19db88153d4fb2b0737212ded8e024505fda031c
