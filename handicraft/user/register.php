<?php
session_start(); 
include '../include/config.php'; 

if(isset($_POST['submit']))
{
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];
    
    $select= "SELECT * from user_db where email = '$email' && password = '$password'";

    $result = mysqli_query($con, $select);

    if(mysqli_num_rows($result) > 0)
    {
        $error[] = 'user already exist!';
    }
    else{
        if($password != $cpassword)
        {
            $error[] = 'password not matched!';
        }
        else{
            $insert = "INSERT INTO user_db(username,email,password,user_type)VALUES('$username','$email','$password','$user_type')";
            mysqli_query($con,$insert);
            echo "<script> alert('Registered successfully');window.location.href = 'login.php' </script>";
        }
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:
        wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>

    <!-- Navbar -->
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
                <li><a href="categories.php">Categories</a>
                </li>
                <li><a href="aboutUs.php">About Us</a>
                </li>
                <li><a href="contactUs.php">Contact us</a></li>
                </ul>
            </div>
        
        
        </header>
        <!-- Navbar -->

    <!-- Register -->
    <div class="container" style="margin-top: 4rem; height: 44rem;">
        <h1 class="title">Register</h1>
            <div class="content">
                <form action="" method="post">

                <?php
                    if(isset($error))
                    {
                        foreach($error as $error)
                        {
                            echo'<span class="error-msg">'.$error.'</span>';
                        }
                    }
                ?>

                    <label for="username">Full Name:</label><br>
                    <input type="text" id="username" name="username" size="30"><br>
                    <label for="Email">Email:</label><br>
                    <input type="text" id="email" name="email" size="30"><br>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" size="30"><br>
                    <label for="cpassword">Confirm password:</label><br>
                    <input type="password" id="cpassword" name="cpassword" size="30"><br>
                    <label for="user_type">User type</label><br>
                    <select name="user_type" id="user_type">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    <br>
                    <input type="submit" name="submit" value="Register now"class="btn">
                    <a href="login.php" class="btn">Login Now</a>
                </form>


    <!-- Register -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="script.js"></script>


    <!-- <section class="footer">
        <div class="box-container">
            <div class="box">
                <h2>Newsletters</h2>
                <p>Sign up with your email to get updates about new products releases and special offers.</p>
                <input type="text"placeholder="Your Email" class="email">
                <input type="submit" class="btn">
            </div>
            
            <div class="box">
                <h2>Contact Info</h2>
                <a href="#" class="links"><i class="bx bx-phone"></i> 9841391930</a>
                <a href="#" class="links"><i class="bx bx-phone"></i> 9841391930</a>
                <a href="#" class="links"><i class="bx bx-envelope"></i>lujaHandicraft@gmail.com</a>
                <a href="#" class="links"><i class="bx bx-map"></i>Nardevi, Kathmandu</a>
                
            </div>

            <div class="box">
                <h2>Quick Links</h2>
                    <a href="#" class="links"><i class="bx bxs-right-arrow"></i>FAQs</a></li>
                    <a href="#" class="links"><i class='bx bxs-right-arrow'></i>Shipping & Return Policy</a></li>
                    <a href="#" class="links"><i class='bx bxs-right-arrow'></i>Terms and Condition</a></li>
                    <a href="#" class="links"><i class='bx bxs-right-arrow'></i>Cashback Offer</a></li>
                    <a href="#" class="links"><i class='bx bxs-right-arrow'></i>My Account</a></li>
                 
            </div>

            <div class="box">
                <h2>Secure Payment with</h2>
                <img src="images/esewa_logo.png">
                <img src="images/khalti.png">
                <div class="pp">
                    <img src="images_bg/cc.png">
                </div>
                
            </div>
        
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Handicraft Shop. All rights reserved.</p>
        </div>
    </section>    -->

   
</body>
</html>