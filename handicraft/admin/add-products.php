<?php include '../include/config.php'; 
include '../include/function.php';

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
    <div class="content">
        <h1 style="color: #574a41">Add Products</h1>
        <div class="cate-body">
            <form action="code.php"method="POST"enctype="multipart/form-data">
            <div class="row">
                <div class="cate1">
                    <label for="">Select Category</label>
                    <select name="category_id">
                    <option selected>Select Category</option>
                    <?php 
                        $categories = getAll("categories");

                        if(mysqli_num_rows($categories)>0)
                        {
                            foreach($categories as $item)
                            {
                                ?>
                                    <option value="<?=$item['id'];?>"><?=$item['ctitle'];?></option>
                            
                                <?php
                                }
                        }
                        else{
                            echo"No category available";
                        }
                    ?>
                    </select>
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="form-control" size="30">
                    <label for="name">Product Description</label>
                    <textarea rows="3" name="description" class="form-control" size="30"> </textarea>
                    <label for="name">Product Price</label>
                    <input type="text" name="price" class="form-control" size="30">
                    <label for="image">Upload Image</label>
                    <input type="file" name="image" class="form-control" size="30"><br><br>
                    <button type= "submit" class="btn" name=add_product_btn>Save</button>
                    
                </div>
            </div>
            </form>
        </div>
    </div>
        
            
            