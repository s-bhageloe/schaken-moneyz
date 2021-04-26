<?php

class database {
    private $host;
    private $dbh;
    private $user;
    private $pass;
    private $db;


    function __construct(){
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db = 'moneyz';

        try{
            $dsn = "mysql:host=$this->host;dbname=$this->db";
            $this->dbh = new PDO($dsn, $this->user, $this->pass); 
        }catch(PDOException $e){
            die("Unable to connect: " . $e->getMessage());
        }
    }

    function insertuser($username, $password){
        $sql = "INSERT INTO tbluser(user_id, username, password) VALUES (:user_id, :username, :password)";

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            'user_id'=>NULL,
            'username'=>$username,
            'password'=>password_hash($password, PASSWORD_DEFAULT)
        ]);

    }


    function loginuser($username, $password){
        $sql="SELECT * FROM tbluser WHERE username = :username";

        $stmt = $this->dbh->prepare($sql); 
        $stmt->execute(['username'=>$username]); 

        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
        if($result){
            if(password_verify($password, $result["password"])) {
                echo "Valid Password!";
                header("Location:schaakbord.php");
            } else {
                echo "Invalid Password!";
            }
        } else {
            echo "Invalid Login";
        }

    }
}

?>