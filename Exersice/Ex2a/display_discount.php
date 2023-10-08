<?php
    $product_name = $_POST["product-name"];
    $list_price = $_POST["list-price"];
    $standard_discount = $_POST['discount-percent'];

    $discount_amount = $list_price * $standard_discount * 0.01;
    $discount_price = $list_price - $discount_amount;


    


    
?>





<!DOCTYPE html>
<html>

<head>
    <title>Product Discount Calculator</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>
    <main>
        <form action="index.html" method="post">
            <div class="fill">
                <h1>Product Discount Calculator</h1>
                <div class="line">
                    <label for="">Product Description: </label>
                    <label class="php" for=""><?php echo $product_name ?></label>
                </div>

                <div class="line">
                    <label for="">List Price: </label>
                    <label class="php" for=""><?php echo "$".$list_price ?></label>
                </div>

                <div class="line">
                    <label for="">Standard Discount: </label>
                    <label class="php" for=""><?php echo $standard_discount."%" ?></label>
                </div>

                <div class="line">
                    <label for="">Discount Amount</label>
                    <label class="php" for=""><?php echo $discount_amount."$" ?></label>
                </div>

                <div class="line">
                    <label for="">Discount Price</label>
                    <label class="php" for=""><?php echo $discount_price."$" ?></label>
                </div>



                <a href="index.html">
                    <span>Return</span>
                </a>

            </div>
        </form>
    </main>
</body>

</html>