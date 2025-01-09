<?php 
session_start();
include '../include/config.php'; 
include '../include/function.php'; 

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

     <!-- categories -->
     <section id="categories" class="categories" style="margin-top: 9rem;">
        <h2 class="heading">Categories</h2>
        
        <div class="categories-container">
        <?php
                    $categories = getAll("categories");

                    if(mysqli_num_rows($categories) > 0)
                    {
                        foreach($categories as $item)
                        {
                            ?>
                            <div class="box">
                                <img src="../images_bg/<?=$item['cimage']?>" alt="images" class="image">
                                <h1 class="cname" style="color: var(--clr-secondary);  line-height: 1.5;"><?=$item['ctitle']?></h1>
                                <a href="products-by-categories.php?id=<?php echo $item['id']?>" class="btn">View Details</a>
                            </div>
                            <?php
                        }
                    }
                else{
                    echo"No data available.";
                }

                ?>
        </div>
    </section>


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