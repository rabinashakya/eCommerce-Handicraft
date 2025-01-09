<?php
session_start();
include '../include/config.php'; // Include your database configuration file
if(isset($_POST['contact_form'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Insert data into the database
    $insert_sql = "INSERT INTO contactus (name, email, message) VALUES (?, ?, ?)";
    $insert_stmt = mysqli_prepare($con, $insert_sql);
    mysqli_stmt_bind_param($insert_stmt, "sss", $name, $email, $message);

    if(mysqli_stmt_execute($insert_stmt)) {
        echo "<script>alert('Data inserted successfully')</script>";
    } else {
        $error_message = "Error in data insertion: " . mysqli_error($con);
        echo "<script>alert('$error_message')</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Luja Handicraft | Contact Us</title>

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
    
    <div class="container" style="margin-top: 4rem;">
    <h1 class="title">Contact Us</h1>
        <div class="content">
        <form method="post">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required size="30"><br>
                <label for="name">Full Name:</label><br>
                <input type="text" id="name" name="name" required size="30"><br>
                <label for="message">Your message:</label><br>
                <textarea name="message" id="message" rows="10" cols="40" required></textarea><br>
                <input type="submit" class="btn" name="contact_form" value="Send">
            </form>
        <div class="contact-content">
            <h3>Contact</h3>
            <p>If you would like to know more about iMartNepal products and services, Please don’t hesitate to contact our global team via the details below, or simply fill out our Enquiry Form.</p>
            <ul>
                <li>Luja Handicraft</li>
                <li>(Manufacturer & Wholesaler)</li>
                <li>Showroom-Jyabahal-21</li>
                <li>Shop- Nardevi, Kathmandu</li>
                <li>www.lujahandicraft.com</li>
            </ul>
            <ul>
                <li>Ramesh Shakya</li>
                <li>+977-9841391930</li>
                <li>ramesh@handicraft.com</li>
            </ul>
            <ul>
                <li>Rabin Shakya</li>
                <li>+977-984873927</li>
                <li>rabin@handicraft.com</li>
                <li>www.lujahandicraft.com</li>
            </ul>
        </div>


        </div>



    </div>




    <section class="footer">
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
                <img src="../images/esewa_logo.png">
                <img src="../images/khalti.png">
                <div class="pp">
                    <img src="../images_bg/cc.png">
                </div>
                
            </div>
        
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Handicraft Shop. All rights reserved.</p>
        </div>
    </section> 
    
</body>
</html>