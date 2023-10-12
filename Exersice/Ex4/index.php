<?php
    include_once 'dbh.inc.php';
    
    if(!isset($category_id)){
        $category_id = filter_input(INPUT_GET,'category_id', FILTER_VALIDATE_INT);
        if($category_id == null || $category_id == false){
            $category_id = 1;
        }
    }
    try{
        
        $query = 'SELECT categoryName FROM categories WHERE categoryID = :categoryId;';
        $statement = $db -> prepare($query);
        $statement -> bindValue(':categoryId', $category_id);
        $statement -> execute();
        $product_name = $statement -> fetch();
        $statement -> closeCursor();

        $statement = null;
        $query = null;
        
        
        $query = 'SELECT * FROM categories;';
        $statement = $db -> prepare($query);
        $statement -> execute();
        $category = $statement -> fetchAll();
        $statement -> closeCursor();

        $statement = null;
        $query = null;

        $query = 'SELECT * FROM products WHERE categoryID = :categoryId;';
        $statement = $db -> prepare($query);
        $statement ->bindValue(':categoryId',$category_id); 
        $statement -> execute();
        $product = $statement -> fetchAll();
        $statement -> closeCursor();
       
       } catch(PDOException $e){
           echo "Faile: ".$e->getMessage();
       }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <style>
    a {
        text-decoration: none;
        color: black;
        display: inline;
    }

    a:hover {
        color: aqua;
    }

    table {
        border: 1px solid black;
    }

    th,
    td {
        border: 1px dashed black;
        padding: 5px;
    }

    .form {
        display: flex;
    }
    </style>
</head>

<body>
    <h1>Product Lists</h1>
    <!-- <form action="" method=""> -->
    <div class="form">
        <div style="display: flex;flex-direction:column;width:150px; margin-right:100px
        ">
            <h2>Categories</h2>
            <?php foreach($category as $category){ ?>
            <a href=".?category_id=<?php echo $category['categoryID'] ?>"><?php echo $category['categoryName']; ?></a>
            <?php } ?>
        </div>
        <div>
            <h2><?php echo $product_name['categoryName'] ?></h2>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                <?php foreach($product as $product){?>
                <tr>
                    <td><?php echo $product['productCode']; ?></td>
                    <td><?php echo $product['productName']; ?></td>
                    <td><?php echo $product['listPrice']; ?></td>
                    <td>
                        <form action="delete_product.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $product['categoryID']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php }?>
            </table>
            <ul>
                <li><a href="add_product_form.php">Add product</a></li>
                <li><a href="list_categories.php">List Categories</a></li>
            </ul>
        </div>
        <!-- </form> -->
    </div>
</body>

</html>