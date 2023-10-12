<?php 
    $categoryId = filter_input(INPUT_POST,'categoryID',FILTER_VALIDATE_INT);

    if($categoryId == null || $categoryId == false){
        echo 'Co con cac';
    } else {
        include_once 'dbh.inc.php';
        $query = 'DELETE FROM categories WHERE categoryID = :cateId';
        $stat = $db -> prepare($query);
        $stat -> bindValue(':cateId',$categoryId);
        $stat -> execute();
        $stat -> closeCursor();
    }

    include 'list_categories.php';
?>