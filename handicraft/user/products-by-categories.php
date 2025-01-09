<?php
session_start();
// Include your database configuration file
include '../include/config.php'; 
include '../include/function.php'; 

// Check if category ID is provided in the URL
if(isset($_GET['id'])) {
    // Retrieve the category ID from the URL
    $category_id = $_GET['id'];
    
    // Construct SQL query to fetch products based on category ID
    $query = "SELECT * FROM product WHERE id = $category_id";
    
    // Execute the query
    $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Luja Handicraft | Products</title>

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


    <!-- products -->
    <section id="products" class="page-products" style="margin-top: 9rem;">
        <h2 class="heading">Products by category</h2>
        
        <div class="page-products-container">
    <?php
        // Check if there are any products in the selected category
        if(mysqli_num_rows($result) > 0) {
            // Loop through the fetched products and display them
            while($row = mysqli_fetch_assoc($result)) {
    ?>
   <div class="box">
                    <img src="../images_bg/<?= $row['image'] ?>" alt="images">
                    <h1><?= $row['product_title'] ?></h1>
                    <div class="price">Rs.<?= $row['product_price'] ?></div>
                    <a href="single-product-details.php?id=<?= $row['product_id'] ?>" class="btn">View Details</a>
                </div>
    <?php
            }
        } else 
        {
            echo "No products found in this category.";
        }
    ?>
</div>

</body>
</html>

<?php
    // Close the database connection
    mysqli_close($con);
} else {
    echo "Category ID not provided.";
}
?>







            

