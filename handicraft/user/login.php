<?php 
include '../include/config.php'; 
session_start();
$erroFlag = false;
$redirect = null;

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $select= "SELECT * from user_db where username = '$username' && password = '$password'";
    $result = mysqli_query($con, $select);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['name'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['user_type'];
        if($row['user_type'] == 'admin') { 
            clearCart();
            echo "<script> alert('Login successfully');window.location.href = '../admin/admin_dashboard.php' </script>";
        } elseif($row['user_type'] == 'user') {
            updateCart();
            echo "<script> alert('Login successfully'); </script>";
            $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : "index.php";
            header("Location:$redirect");
   
        } 
    }else {
        $erroFlag = true;

    }
}

function clearCart() {
    unset($_SESSION['cart']);
}

function updateCart() {
    global $con;
    $user_id = $_SESSION['id'];
    $cart_query = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = '$user_id'");

    if(mysqli_num_rows($cart_query) > 0) {
        $cart_data = array();
        while($row = mysqli_fetch_assoc($cart_query)) {
            $cart_data[] = $row;
        }
        $_SESSION['cart'] = $cart_data;
    } else {
        $_SESSION['cart'] = array();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luja Handicraft</title>

    <!--CSS link-->
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>

<header>
    <div class="logo">
        <div class="logo-header">
            <img src="../images_bg/lujaHandicraft-01.png" alt="logo">
        </div>
        <div class="logo-details">
            <li>Manufacturer & Wholesaler</li>
            <li>Showroom - Jyabahal-21, Kathmandu</li>
            <li>Shop - Nardevi, Kathmandu</li>
            <li>www.lujahandicraft.com</li>
        </div>
        <div class="nav">
            <div class="login-form">
                <a href="#"><i class='bx bxs-user'></i></a>
                <form action="" method="post">
                            <?php include('../include/profile.php'); ?>
                </form>
            </div>
            <div class="cart">
                <?php
                if(isset($_SESSION['id'])) {
                    // If the user is logged in, retrieve the number of items in the cart from the database
                    $userId = $_SESSION['id'];
                    $select_rows = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = $userId") or die('query failed');
                    $row_count = mysqli_num_rows($select_rows);
                } else {
                    // If the user is logged out, set the cart count to 0
                    $row_count = 0;
                }
                ?>
                <a href="cart.php"><i class='bx bx-cart'><sup><?php echo $row_count; ?></sup></i></a>
            </div>
        </div>
    </div>

    <div class="menu-bar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="product.php">Products</a></li>
            <li><a href="categories.php">Categories</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.php">Contact us</a></li>
        </ul>
    </div>
</header>

<div class="container" style="margin-top: 4rem; height: 33rem;">
    <h1 class="title">Login</h1>
    <div class="content">
        <form action="" method="post">
            <label for="username">Full Name:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" name="submit" value="Login now" class="btn">
            <p>Don't have an account? <a href="register.php">Register now</a></p>
             <p style="color:red;font-size:18px"><?php if($erroFlag) echo "Invalid username or password !! "?></p>
             <p>Path: <?php echo $redirect; ?></p>
        </form>
    </div>
</div>

</body>
</html>
