<?php
session_start();
include '../include/config.php';


if (isset($_GET['oid'])) {
    $order_id = $_GET['oid'];
    
    // Query to get the order details
    $sql = "SELECT * FROM userorder WHERE id = '$order_id'";
    $result = mysqli_query($con, $sql);
    
    if ($result && mysqli_num_rows($result) == 1) {
        $order = mysqli_fetch_assoc($result);
        $name = $order['name'];
        $number = $order['number'];
        $email = $order['email'];
        $address = $order['address'];
        $city = $order['city'];
        $payment = $order['payment'];
        $price_total = $order['total_price'];
    } else {
        echo 'Order not found or you do not have permission to view this order.';
        exit;
    }
} else {
    echo 'No order ID provided.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #B1A08D;
            border-radius: 10px;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        }

        .container-form h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #5E3023;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #5E3023;


        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="email"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #CCC1AE;

        }

        .form-group select {
            cursor: pointer;
        }

        .order-message-container{
            position: fixed;
            top: 0; left: 0;
            min-height: 100vh;
            overflow-y: scroll;
            overflow-x: hidden;
            padding:2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1100;
            background-color: #B1A08D;
            width: 100%;
        }

        .order-message-container .message-container{
            width: 30rem;
            background-color: #CCC1AE;
            border-radius: .5rem;
            padding: 2rem;
            text-align: center;

        }

        .order-message-container .message-container h3{
            font-size: 2.5rem;
            color: #5E3023;
        } 

        .order-message-container .message-container .order-detail{
            border-radius: .5rem;
            padding: 1rem;
            margin: 1rem 0;
            color: #5E3023;

        }

        .order-message-container .message-container .order-detail span{
            border-radius: .5rem;
            font-size: 2rem;
            display: inline-block;
            padding: 1rem 1.5rem;
            margin: 1rem;
        }

        .order-message-container .message-container .order-detail span .total{
            display: block;

        }

        .order-message-container .message-container  .customer-details{
            margin: 1rem 0;
        }       

        .order-message-container .message-container  .customer-details p{
            padding: 1rem 0;
            font-size:1.2rem;
            color: #5E3023;
        }

        .order-message-container .message-container  .customer-details p span{
            color: black;
            padding: 0.5rem;
            text-transform: none;
        }

    </style>
</head>
<body>
    <?php
    echo "
    <div class='order-message-container'>
        <div class='message-container'>
            <h3>Thank you for shopping!</h3>
            <div class='order-detail'>
                <span class='total'>Total: Rs. ".$price_total."</span>
            </div>
            <div class='customer-details'>
                <p>Your Name: <span>".$name."</span></p>
                <p>Your Number: <span>".$number."</span></p>
                <p>Your Email: <span>".$email."</span></p>
                <p>Your Address: <span>".$address.", ".$city."</span></p>
                <p>Your Payment mode: <span>".$payment."</span></p>
            </div>
            <a href='product.php' class='btn'>Continue Shopping</a>
        </div>
    </div>
    ";
    ?>
</body>
</html>
