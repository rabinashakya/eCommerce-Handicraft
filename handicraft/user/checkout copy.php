<?php 
session_start();
include '../include/config.php';

// if (!isset($_SESSION['id'])) {
//     // Redirect the user to the login page with a redirect parameter
//     header("Location: login.php?redirect=".urlencode("checkout.php"));
//     exit; // Stop further execution
// }

if(isset($_POST['submit'])) 
{
  $name=$_POST['name'];
  $number=$_POST['number'];
  $email=($_POST['email']);
  $address=($_POST['address']);
  $city=($_POST['city']);
  $payment=($_POST['payment']);
  
  $price_total = 0;
  $cart_query = mysqli_query($con, "SELECT * FROM `cart`"); 
  
  if(mysqli_num_rows($cart_query) > 0){
      while($fetch_cart = mysqli_fetch_assoc($cart_query)){ 
          // Calculate subtotal for the current item
          $sub_total = $fetch_cart['product_price'] * $fetch_cart['Quantity'];
          $price_total += $sub_total; // Accumulate subtotal to total amount
  
      }
  
  $detail_query =mysqli_query($con, "INSERT into userorder (name, number, email, address, city, payment, total_price) VALUES ('$name','$number','$email','$address','$city','$payment','$price_total')") or die('query failed');
  if($cart_query && $detail_query){
   echo" 
   <div class='order-message-container'>
        <div class='message-container'>
            <h3>Thank you for shopping!</h3>
            <div class='order-detail'>
                <span class= 'total'>Total: Rs. ".$price_total." </span>
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

  } 
}
}

?>





<!DOCTYPE html>
<html lang="en">

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

        <div class="container-form" style="margin-top:11rem; margin-bottom: 15px;">
            <h1>Checkout</h1>
            <form action="#" method="post">
                <div class="flex">
               
                <div class="form-group">
                    <label for="fullname">Name:</label>
                    <input type="text" id="fullname" name="name" required>
                </div>
                <div class="form-group">
                    <label for="number">Phone Number:</label>
                    <input type="number" id="number" name="number" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for= "address">Address:</label>
                    <input type="text" id="address" name="address"required></textarea>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" required>
                </div>
                <div>
                    <label for="payment" style="display: block;font-weight: bold;margin-bottom: 5px;color: #5E3023;">Pay with: </label><br>
                    <!-- <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                        <input type="hidden" id="amount" name="amount" value="<?php echo $price_total;?>" required>
                        <input type="hidden" id="tax_amount" name="tax_amount" value ="0" required>
                        <input type="hidden" id="total_amount" name="total_amount" value="<?php echo $price_total;?>" required>
                        <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="<?php echo $id;?>"required>
                        <input type="hidden" id="product_code" name="product_code" value ="EPAYTEST" required>
                        <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
                        <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
                        <input type="hidden" id="success_url" name="success_url" value="https://revised_handicraft/handicraft/user/success.php" required>
                        <input type="hidden" id="failure_url" name="failure_url" value="https://revised_handicraft/handicraft/user/failed.php " required>
                        <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
                        <input type="hidden" id="signature" name="signature" required>
                        <input type="image" src="../images/esewa_logo.png" style="width: 4rem; height: auto;">
                        </form> -->
                    <!-- <label for="payment">Payment Method</label> -->

                    <select id="payment" name="payment" style="width: 100%;border: 1px solid #ccc;border-radius: 5px;font-size: 16px;background-color: #CCC1AE;" required>
                        <option value="">Select method</option>
                        <option value="esewa">Esewa </option>
                        <option value="khalti">Khalti</option>
                        <option value="mobile banking">Mobile Banking</option>
                        <option value="cash">Cash on Delivery</option>
                 
                    </select>       

                </div>     
                </div>
                <div class="form-group" style="text-align: center;">
                    <button type="submit" name="submit" class="btn" style="padding: 5px;">Place Order</button>
                </div>
            </form>
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





      