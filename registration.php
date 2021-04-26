<?php

include 'database.php';

$msg = '';
if(isset($_POST['submit'])){
    
    $fieldnames = ['username', 'password'];
    $error = false;
    
    foreach($fieldnames as $fieldname){
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
            $error = true; 
            $msg = 'error';
        }

    }

    if(!$error){
        $obj = new database();
        $obj->insertuser($_POST['username'], $_POST['password'],);
    }else{

    }
}    


?>

<!DOCTYPE html>
<head>
    <title>Moneyz opdracht</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form method="post" action="registration.php">
        <input type="text" name="username" placeholder="Username" required/><br>
        <input type="password" name="password" placeholder="Password" required/><br>
        <button type="submit" name="submit" class="btn">Registreren</button><br>
        <a href="login.php">inloggen</a>
    </form>
</body>    
