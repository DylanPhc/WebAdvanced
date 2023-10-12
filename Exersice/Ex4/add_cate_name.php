<?php 
    $categoryName = filter_input(INPUT_POST,'categoryName');

    if($categoryName == null){
        echo "Loi me no roi";
    } else {
        include_once 'dbh.inc.php';
        $query = 'INSERT INTO categories (categoryName) VALUES (:cateName)';
        $stat = $db -> prepare($query);
        $stat -> bindValue(':cateName',$categoryName);
        $stat -> execute();
        $stat -> closeCursor();
        
    }

    include 'list_categories.php';
?>