<?php 
    session_start();
    include '../include/config.php'; 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Luja Handicraft | About Us</title>

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
        <h1 class="title">About Us</h1>
        <div class="content">
            <div class="about-image">
                <img src="../images_bg/handi.jpg" alt="Handicraft">
            </div>
            <div class="about-content">
                <p>
                    Luja Handicraft is an online e-store to promote the skilled hand-made crafts from Nepal internationally. We are passionate about preserving traditional craftsmanship and celebrating the beauty of handmade wooden creations.
                     With a focus on artisanal excellence and sustainability, we curate a diverse collection of meticulously crafted wooden items, ranging from elegant home decor to functional kitchenware. 
                     Our commitment to quality, authenticity, and fair trade practices ensures that each piece tells a story of skillful artistry and cultural heritage. Join us in supporting
                     local artisans and embracing the timeless charm of wooden handicrafts.
                </p>
                    
                <h4>Luja Handicraft’s Social Responsibilities:</h4>  
                <ol>
                        <li style="font-weight: 600;">1. We are responsible to the artists and artisans</li>
                        <p>Not only do we support artists by show-casing their products, we also plan to help them improve their productivity through training and awareness. We want to make their profession reputable, and make their earning commensurate with any other occupation in Nepal.</p>
                        <li style="font-weight: 600;">2. We are responsible for our community</li>
                        <p>We are an active supporter of HelpMyStudy Nepal, an not-for-profit educational organization working to bridge the educational accessibility gap between the rich and poor in Nepal. Differences in educational and economic standards are exceptionally high in Nepal and cause of much of social unrest and tormoil.</p>
                    </ol>
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