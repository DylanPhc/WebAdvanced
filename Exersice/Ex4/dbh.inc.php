<?php
    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
   
    $username = 'root';
    $password = '';

    try{
        $db = new PDO($dsn,$username,$password);

    } catch(PDOException $e){
        echo "Myfail" .$e->getMessage();
    }
?>

<!-- ON my_guitar_shop1.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word'; -->