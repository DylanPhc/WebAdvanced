<?php 
    include_once 'dbh.inc.php';

    try{
        $query = 'SELECT * FROM categories';
        $stat = $db -> prepare($query);
        $stat -> execute();
        $category = $stat -> fetchAll();
        $stat -> closeCursor();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table {
        border: 1px solid black;
    }

    th,
    td {
        border: 1px dashed black;
        padding: 5px;
    }

    form {
        margin-bottom: 10px;
    }
    </style>
</head>

<body>
    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
        <?php foreach($category as $category) { ?>
        <tr>
            <td><?php echo $category['categoryName'] ?></td>
            <td>
                <form action="delete_cate_name.php" method="post">
                    <input type="hidden" name="categoryID" value="<?php echo $category['categoryID'] ?> ">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

    <h1>Add Category</h1>
    <form action="add_cate_name.php" method="post">
        <label>Name: </label>
        <input type="text" name="categoryName">
        <input type="submit" value="Add">
    </form>

    <a href="index.php">List Product</a>
</body>

</html>