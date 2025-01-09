<?php
  session_start(); 
    include '../include/config.php'; 
    
    if(isset($_POST['update_update_btn']))
    {
        $update_value = $_POST['update_quantity'];
        $update_id = $_POST['update_quantity_id'];
        $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET Quantity = '$update_value' where product_id = '$update_id'");
        if($update_quantity_query)
        {
            header('location:cart.php');
        }

    };

    if(isset($_GET['remove']))
    {
        $remove_id = $_GET['remove'];
        mysqli_query($con, "DELETE FROM `cart` where product_id = '$remove_id'");
        header('location:cart.php');
    };

    if(isset($_GET['delete_all']))
    {
        mysqli_query($con, "DELETE FROM `cart`");
        header('location:cart.php');
    }

    if (isset($_POST['check_out'])) {
        if (!isset($_SESSION['id'])) {
            // Redirect the user to the login page with a redirect parameter
            header("Location: login.php?redirect=".urlencode("checkout.php"));
            exit; // Stop further execution
        }else{
            header('location:checkout.php');
        }
    }
    
?>


<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Luja Handicraft | Cart</title>

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
                

                .table th {
                    padding-left: 100px; 
                    padding-right: 15px; 
                    font-size: 20px;
                    background-color: #574a41;
                    color: #CCC1AE;
                }
                td{
                    padding-top: 25px;
                    color: #5E3023;
                }

                .table th, .table td {
                    border: 1px solid #5E3023; /* Set border for table header cells and data cells */
                    padding: 30px 20px; /* Add padding to cells */
                    
                }
                .check-out{
                    /* border: .1rem solid var(--clr-secondary); */
                    /* margin-top: .2rem;
                    margin-bottom: 1rem;
                    margin-left: 50rem; */
                    margin: 3rem 45rem;
                    display: inline-block;
                    padding: .5rem 1rem;
                    font-size: 1.5rem;
                    border-radius: .5rem;
                    cursor: pointer;
                    color: var(--clr-secondary);
                    background: var(--clr-primary);
                    width: auto;
                }
                .check-out:hover{
                    color: var(--clr-secondary);
                    background: var(--clr-primary);
                }

                /* .check-out .disabled{
                    pointer-events: none;
                    opacity: 0.5;
                    user-select: none;
                } */


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


    <!-- -----------------------------------------------------------------cart----------------------------------------------------------------- -->

    <body>
        <section class="header-background">
            <div class="aboutus-pic" style="margin-top:20px;">
                <h1 style="text-align:center; color: #5E3023; font-size: 45px; margin-top:145px;">Cart</h1>
            </div>
        </section>

        <div class="container-mycart">
            
        <div class="row">


                <div class="col-lg-9">
                    <table class="table" style="padding:0 5%; text-align: center; z-index: 999;width: 100%; ">
                        <thead class="text-center">
                            <tr>
                                
                                <th scope="col">Product Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                                include '../include/config.php'; 
                                // Check if user is logged in
                                if(isset($_SESSION['id'])) {
                                    // User is logged in
                                    // Fetch cart items from the database and display them
                                    $userId = $_SESSION['id'];
                                    $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = $userId");
                                    // Process and display cart items
                                    
                                    // Initialize total quantity and total amount variables
                                    $totalAmount = 0;

                                    if(mysqli_num_rows($select_cart) > 0){
                                        while($fetch_cart = mysqli_fetch_assoc($select_cart)){ 
                                            // Calculate subtotal for the current item
                                            $sub_total = $fetch_cart['product_price'] * $fetch_cart['Quantity'];
                                            $totalAmount += $sub_total; // Accumulate subtotal to total amount
                            ?>
                            <tr>
                                <td><?php echo $fetch_cart['product_title'];?></td>
                                <td><img src="../images_bg/<?php echo $fetch_cart['image']; ?>" height="100" alt="images"></td>
                                <td>Rs. <?php echo $fetch_cart['product_price'];?></td>
                                <td>
                                    <form action="" method="post"> <!-- Specify correct action URL -->
                                        <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['product_id'];?>">
                                        <input type="number" style="padding:1rem 2rem; font-size: 1rem; border:#5E3023; width: 10rem; background-color: #B1A08D;" name="update_quantity" min="1" value="<?php echo $fetch_cart['Quantity'];?>">
                                        <input type="submit" class="btn" value="Update" name="update_update_btn">
                                    </form>
                                </td>
                                <td>Rs. <?php echo number_format($sub_total); ?></td>
                                <td><a href="cart.php?remove=<?php echo $fetch_cart['product_id']; ?>" onclick="return confirm('Remove item from cart?')" class="btn"><i class="fas fa-trash"></i>Remove</a></td>
                            </tr>
                            <?php
                                        }
                                    }
                            ?>
                            <tr style="background-color: #574a41; color: #CCC1AE;">
                                <td><a href="product.php" class="btn" style="margin-top: 0;">Continue Shopping</a></td>
                                <td colspan="3" style="color: #CCC1AE; font-size: 25px;">Grand Total</td>
                                <td style="color: #CCC1AE; font-size: 25px;">Rs. <?php echo number_format($totalAmount); ?></td>
                                <td><a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all?');" class="btn"><i class="fas fa-trash"></i>Delete All</a></td>
                            </tr>
                            <?php
                                } else {
                                    // User is not logged in
                                    echo "<tr><td colspan='6'>Please log in to view your cart.</td></tr>";
                                }
                            ?>
                        </tbody>


                        
                    </table>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="check-out">
                            <input type="submit" name="check_out" value="Check out" style="font-size: 1.3rem;" class="btn<?= ($totalAmount > 1) ? '' : ' disabled'; ?>" />
                       </div>
                   </form>
                   
                    
                </div>

            </div>
        </div>
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