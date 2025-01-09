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
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

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

        <!-- home -->
        <section class="container" style="margin-top: 4rem;">
            <!-- carousel images -->
            <div class="carousel-container">
                <div class="carousel-item">
                    <img src="../images_bg/glassStupa/24.png" alt="Image 2">
                </div>
                <div class="carousel-item">
                    <img src="../images_bg/3.png" alt="Image 3">
                </div>
                <div class="carousel-item">
                    <img src="../images_bg/2.png" alt="Image 5">
                </div>
                <div class="carousel-item">
                    <img src="../images_bg/7.png" alt="Image 4">
                </div>
                <div class="carousel-item">
                    <img src="../images_bg/5.png" alt="Image 5">
                </div>
                <div class="carousel-item">
                    <img src="../images_bg/wooden/17.png" alt="Image 7">
                </div>
                <div class="carousel-item">
                    <img src="../images_bg/wooden/15.png" alt="Image 7">
                </div>
            </div> 
             <!-- slogan/description -->
             <div class="text-container">
                <h1>Hand Crafted</h1>
                <p>Welcome to Luja Handicraft! We offer beautiful, handmade products like wooden frames, glass stupas, and colorful paper masks, all reflecting traditional Nepali artistry. Each item is crafted with care and skill by talented artisans. Discover the unique and special pieces at Luja Handicraft, perfect for adding a touch of Nepali tradition and creativity to your home.  </p>
            </div>
        </section>
        <!-- home -->

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
                                <h1 class="cname" style="color:#5E3023;"><?=$item['ctitle']?></h1>
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
        <!-- categories -->


    <!-- products -->
    <section id="products" class="page-products">
    <h2 class="heading">Our Products</h2>
    
    <div class="swiper product-slider">
        <div class="swiper-wrapper">
            <?php
                // Check if a category is selected
                if (isset($_GET['categories'])) {
                    $selected_category = $_GET['categories'];
                    $product_query = "SELECT * FROM product WHERE categories = '$selected_category'";
                } else {
                    // If no category is selected, fetch all products
                    $product_query = "SELECT * FROM product";
                }

                $product_result = mysqli_query($con, $product_query);

                if ($product_result->num_rows > 0) {
                    while ($product_data = $product_result->fetch_assoc()) {
            ?>
            <div class="swiper-slide box">
                <img src="../images_bg/<?= $product_data['image'] ?>" alt="images">
                <h1><?= $product_data['product_title'] ?></h1>
                <div class="price">Rs.<?= $product_data['product_price'] ?></div>
                <a href="single-product-details.php?id=<?= $product_data['product_id'] ?>" class="btn">View Details</a>
            </div>
            <?php 
                    }
                } else {
                    echo "No Product Found.";
                }
            ?>
        </div>
        
        <!-- Add Arrows -->
        <div class="swiper-button-next" style="color: #5e3023;"></div>
        <div class="swiper-button-prev" style="color: #5e3023;"></div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>
    <!-- product -->

        
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="script.js"></script>

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