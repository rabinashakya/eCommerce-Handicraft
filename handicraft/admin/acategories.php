<?php include '../include/config.php'; 
include '../include/function.php';

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

<!-- categories -->

<main>
    <div class="main-content">
    <div class="wrapper1">
        <h1 style="color: #574a41">Categories</h1>
        <div class="cate-body">
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <!-- <th>Edit</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $categories = getAll("categories");

                        if(mysqli_num_rows($categories)>0)
                        {
                            foreach($categories as $items)
                            {
                                ?>
                                <tr>
                                    <td><?=$items['id'];?></td>
                                    <td><?=$items['ctitle'];?></td>
                                    <td style="padding: 0 5rem">
                                        <img src="../images_bg/<?=$items['cimage']?>" width= "100rem" height="100rem" alt="<?=$items['ctitle'];?>">
                                    </td>
                                    <td>
                                        <a href="edit_categories.php?id=<?=$items['id'];?>" class="btn">Update</a>
                                        <a href="edit_categories.php?id=<?=$items['id'];?>" class="btn">Delete</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else{
                            echo "No records found.";
                        }

?>
                   
                </tbody>
    </table>
        </div>

</div>
</div>
</main>
