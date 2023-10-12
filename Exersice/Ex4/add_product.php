<?php
    include_once 'dbh.inc.php';
    $category_id = filter_input(INPUT_POST,'category_id',FILTER_VALIDATE_INT);
    $product_code = filter_input(INPUT_POST,'product_code');
    $product_name = filter_input(INPUT_POST,'product_name');
    $product_price = filter_input(INPUT_POST,'product_price', FILTER_VALIDATE_FLOAT);


    if($category_id == null || $category_id == false || $product_code == null
        || $product_name == null || $product_price == null || $product_price == false){
            echo 'The value you entered is not valid';
    }else{
        $query = 'INSERT INTO products (categoryID, productCode, productName, listPrice)
                    VALUES (:category_id,:code, :name, :price);';
        $stat = $db -> prepare($query);
        $stat -> bindValue(':category_id',$category_id);
        $stat -> bindValue(':code',$product_code);
        $stat -> bindValue(':name',$product_name);
        $stat -> bindValue(':price',$product_price);
        $stat -> execute();
        $stat -> closeCursor(); 
    }

    include'index.php';

?>