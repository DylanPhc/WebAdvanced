<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="style.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mg">My Guitar Shop</h1>
        <hr class="mg">
        <?php if(!isset($_GET['action'])){ ?>
        <div>
            <h2 class="mg">Add items</h2>
            <form action="cart-view.php" method="get">
                <div class="item-container">
                    <label>Name: </label>
                    <select name="items" id="items">
                        <option value="trumpet">Trumpet ($199.50)</option>
                        <option value="flute">Flute ($149.50)</option>
                        <option value="clarinet">Clarinet ($299.50)</option>
                    </select>
                </div>

                <div class="quality-container">
                    <label>Quality: </label>
                    <select name="quality" id="qulity">
                        <?php for($i = 1; $i <= 10; $i++){ ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="submit-container">
                    <input class="submit" type="submit" value="Add item">
                </div>
            </form>

            <div class="to-view">
                <a href="?action=show_cart">View Cart</a>
            </div>
        </div>
        <?php } else{
            include 'cart-view.php';

        }?>
    </div>
</body>

</html>