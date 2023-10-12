<?php

include_once 'dbh.inc.php';
$category_id = filter_input(INPUT_POST,'category_id',FILTER_VALIDATE_INT);
$product_Id = filter_input(INPUT_POST,'product_id',FILTER_VALIDATE_INT);

    if( $category_id != false && $product_Id != false){
        
    
        
        $query = 'DELETE FROM products WHERE productID = :prId;';
        $stat = $db -> prepare($query);
        $stat -> bindValue(':prId',$product_Id);
        $stat -> execute();
        $stat -> closeCursor();
    }

    include 'index.php';
?>