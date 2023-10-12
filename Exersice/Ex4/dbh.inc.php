<?php
    $dsn = 'mysql:host=localhost;dbname=phpmyadmin';
   
    $username = 'root';
    $password = '';

    try{
        $db = new PDO($dsn,$username,$password);

    } catch(PDOException $e){
        echo "Myfail" .$e->getMessage();
    }
?>