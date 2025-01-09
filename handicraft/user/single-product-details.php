<?php 
session_start();
include '../include/config.php'; 
include '../include/function.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM `product` WHERE `product_id` = $id";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
}

if(isset($_POST['addToCartBtn'])){
    if(!isset($_SESSION['id'])) {
        // If the user is not logged in, redirect to the login page with a redirect parameter
        header("Location: login.php?redirect=".urlencode($_SERVER['REQUEST_URI']));
        exit;
    } else {
        // If the user is logged in, proceed to add the item to the cart
        $userId = $_SESSION['id'];
        $productId = $data['product_id'];
        $producttitle = $data['product_title'];
        $image = $data['image'];
        $productprice = $data['product_price'];
        $quantity = 1; // Assuming the quantity added to the cart is always 1

        // Check if the product is already in the cart for the specific user
        $select_cart = mysqli_query($con, "SELECT * FROM cart WHERE product_id = $productId AND user_id = $userId");

        if(mysqli_num_rows($select_cart) > 0){
            echo "<script>alert('Product already added to cart');window.location.href = 'product.php'</script>";
        }
        else{
            // Insert the product into the cart table
            $insertSql =  mysqli_query($con, "INSERT INTO cart (user_id, product_id,product_title, image, product_price, Quantity) VALUES ('$userId','$productId', '$producttitle', '$image','$productprice', '$quantity')");
            echo "<script>alert('Product added to cart successfully');window.location.href = 'cart.php'</script>";
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
            <style>
        html {
            scroll-behavior: smooth;
        }

        #section1 {
            height: 600px;
        }

        #myBtn {
            display: none;
            position: fixed;
            bottom: 25px;
            right: 35px;
            z-index: 99;
            font-size: 20px;
            border: none;
            outline: none;
            background-color: red;
            color: white;
            cursor: pointer;
            padding: 20px;
            border-radius: 50%;
            width: 60px;
            scroll-behavior: smooth;
        }

        #myBtn:hover {
            background-color: #555;
        }

        .price{
            color: black;
            margin-top: 50px;
            font-size: 22px;
            font-weight: bold;
        }

        .add-to-cart-btn{
            width: 100px;
            height: 40px;
            margin-top: 15px;
        }

        .add-to-cart-btn:hover{
            background: rgb(220, 218, 218);
            color: black;
            border: none;
        }

        .variants {
            margin-top: 20px;
            font-weight: bold;
        }


        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            padding-top: 200px;
        }

        /* Modal Content */
        .modal-content {
            background-color: #CCC1AE;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
            height: 300px;
        }

        .modal-content p{
            margin-top: 60px;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modalpopup {
            display: inline-block;
            padding: 35px;
        }

        .continue{
            margin-left: 180px;
        }

        .gotocart{
            margin-left: 90px;
        }

        .continue:hover, .gotocart:hover{
            background-color: rgb(220, 218, 218);
            color: black;
            border: none;
        }

    </style>
    
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
                                
                                    <div class="button-container">
                                        <a href="login.php" class="btn">Login</a>
                                        <a href="register.php" class="btn">Register</a>
                                    </div>
                                    <div class="button-container">
                                    <a href="index.php" class="btn">Logout</a>
                                    </div>
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

    <!-- singleproducts -->
    <div class="container" style="margin-top:4rem; margin-bottom:10rem;" >
        <div class="single-product" >
            <form action="" method = "post">
            <div class="row">
                <div class="col-6">
                    <div class="product-image">
                        <div class="product-image-main">
                            <img src="../images_bg/<?=$data['image']?>" alt="" id="product-main-image">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="sproduct">
                        <div class="product-title">
                            <h2><?=$data['product_title'] ?></h2>
                        </div>
                        
                        <div class="product-price">
                            <span class="offer-price">Rs.<?=$data['product_price']?></span>
                        </div>

                        <div class="product-details">
                            <h3>Description</h3>
                            <p><?=$data['product_description']?></p>
                        </div>
                       
                        <span class="divider"></span>


                        <div class="product-btn-group">
                            <input type= "submit" class="btn" name="addToCartBtn" value="Add to Cart">
                        </div>
                    </div>  
                </div>
            </div>
        </form>   
    </div>
</div>
    <!--script-->
    <script src="script.js"></script>


    <!-- singleproducts -->
            
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        // Get the button
        let mybutton = document.getElementById("btn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () { scrollFunction() };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("addToCartBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function () {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function redirectToPage1() {
            window.location.href = "product.php";
        }

        function redirectToPage2() {
            window.location.href = "cart.php";
        }
    </script>


</script>

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