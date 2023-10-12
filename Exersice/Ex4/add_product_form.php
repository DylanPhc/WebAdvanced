<?php 
    include_once 'dbh.inc.php';
    try{
        $query = 'SELECT * FROM categories;';
        $stat = $db -> prepare($query);
        $stat -> execute();
        $category = $stat -> fetchAll();
        $stat -> closeCursor();
    } catch (PDOException $e){
        $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    div {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 300px;
        margin-top: 10px;
    }

    form {
        display: flex;
        flex-direction: column;
    }
    </style>
</head>

<body>
    <h1>Add Product</h1>
    <hr>
    <form action="add_product.php" method="post">
        <div>
            <label>Category: </label>
            <select name="category_id">
                <?php foreach($category as $category){ ?>
                <option value="<?php echo $category['categoryID']?>"><?php echo $category['categoryName'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="">Code: </label>
            <input type="text" name="product_code" required>
        </div>
        <div>
            <label>Name: </label>
            <input type="text" name="product_name" required>
        </div>
        <div>
            <label>Price: </label>
            <input type="text" name="product_price" required>
        </div>
        <div style="margin-left: 130px;">
            <input type="submit" value="Add product">
        </div>
    </form>
    <a href="index.php">View ProducList</a>
</body>

</html>