<?php 

    $investment_amount = $_POST['investment-amount'];
    $yearly_rate = $_POST['yearly-rate'];
    $number_years = $_POST['number-years'];

    if($investment_amount <= 0 ){
        $investment_amount = "Don't calculate";
    } 

    if($yearly_rate > 15 || $yearly_rate <= 0 ){
        $yearly_rate = "Interest rate must be less than or equal to 15";
    } 

    if($number_years <= 0 ){
        $number_years = "Don't calculate";
    } 

    $total_rate = $investment_amount * $yearly_rate * 0.01;
    $year_rate = $number_years * $total_rate;
    $future_value = $investment_amount + $year_rate;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="futere.html">
        <h1>Future Value Caculator</h1>
        <div>
            <label for="">Investment amount: </label>
            <label for=""><?php echo "$".$investment_amount ?></label>
        </div>

        <div>
            <label for="">Yearly Interest Rate: </label>
            <label for=""><?php echo $year_rate."%" ?></label>
        </div>

        <div>
            <label for="">Number of years: </label>
            <label for=""><?php echo $number_years ?></label>
        </div>

        <div>
            <label for="">Investment amount: </label>
            <label for=""><?php echo "$".$future_value ?></label>
        </div>

        <div>
            <input type="submit" value="Return">
        </div>
    </form>
</body>

</html>