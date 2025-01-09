<?php include '../include/config.php'; 
    //Start Session
    // if(!isset($_SESSION['username'])){
    //     header('location:login.php');
    // }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">



</head>
<body style="background-color: #CCC1AE">
<section id="main">
<aside>
    <nav class="nav1">

            <div class="nav-links" id="navLinks">
            
                <!-- <i class="fa-sharp fa-solid fa-xmark" onclick="hideMenu()"></i>   -->
                <p style="color:#CCC1AE; margin:5px; margin:2rem">WELCOME </p>
                <ul>
                    <li><a href="admin_dashboard.php"> Dashboard</a></li>
                    <li><a href="acategories.php"> Categories</a></li>
                    <li><a href="add_categories.php">Add Categories</a></li>
                    <li><a href="aproducts.php"> Products</a></li>
                    <li><a href="add-products.php"> Add Products</a></li>
                    <!-- <li><a href="orders.php"> Orders</a></li> -->
                    <li><a href="logout_admin.php">Logout</a></li>
                </ul>
            </div>
            <!-- <i class="fa-solid fa-bars" onclick="showMenu()"></i> -->
            
        </nav>
</aside>
<!-- Main content -->
<main>
    <div class="main-content">
    <div class="wrapper1" style="margin:15rem 8rem; color: #5E3023;">
        <h1>Welcome to the Admin Dashboard!!!</h1>
</div>

</div>
</main>
</section>
<!-- <script>

var navLinks = document.getElementById("navLinks");
function showMenu(){
    navLinks.style.left="0"
}

function hideMenu(){
    navLinks.style.left="-200px"
}
</script> -->
<script src="https://kit.fontawesome.com/6fd8a997cb.js" crossorigin="anonymous"></script>
</body>

</html>
