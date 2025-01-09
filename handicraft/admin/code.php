<?php 

session_start();
include '../include/config.php'; 
include '../include/function.php';


if(isset($_POST['add_category_btn'])){
        $name = $_POST['name'];
        $filename = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder= "../images_bg/".$filename;

        $cate_query = "INSERT INTO categories(ctitle,cimage)VALUES('$name','$filename')";
    
        $cate_query_run = mysqli_query($con, $cate_query);

         // Add the image to the "image" folder"

         if (move_uploaded_file($tempname, $folder)) {
            echo "<script> alert('Category added successfully.');window.location.href = '../admin/acategories.php' </script>";
            // $msg = "Image uploaded successfully";

        }else{
            echo "<script> alert('Something went wrong.');window.location.href = '../admin/acategories.php' </script>";
            // $msg = "Failed to upload image";

    }
}

   
elseif(isset($_POST['update_category_btn'])){
    $category_id = $_POST['categories_id']; // Get the category ID from the hidden input
    $name = $_POST['name'];
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder= "../images_bg/".$filename;

    // Check if a new image is uploaded
    if(!empty($filename)) {
        // Move the uploaded file to the desired folder
        if (move_uploaded_file($tempname, $folder)) {
            // Update the category with the new image
            $update_query = "UPDATE categories SET ctitle='$name', cimage='$filename' WHERE id='$category_id'";
            $update_result = mysqli_query($con, $update_query);
            if($update_result) {
                echo "<script>alert('Category updated successfully');window.location.href = 'acategories.php'</script>";
            } else {
                echo "<script>alert('Failed to update category');window.location.href = 'acategories.php'</script>";
            }
        } else {
            echo "<script>alert('Failed to move uploaded file');window.location.href = 'acategories.php'</script>";
        }
    } else {
        // Update the category without changing the image
        $update_query = "UPDATE categories SET ctitle='$name' WHERE id='$category_id'";
        $update_result = mysqli_query($con, $update_query);
        if($update_result) {
            echo "<script>alert('Category updated successfully');window.location.href = 'acategories.php'</script>";
        } else {
            echo "<script>alert('Failed to update category');window.location.href = 'acategories.php'</script>";
        }
    }
}


elseif(isset($_POST['delete_category_btn'])) {
    $category_id = $_POST['categories_id'];
    
    // First, delete the category's image file from the server
    // $select_query = "SELECT cimage FROM categories WHERE id='$category_id'";
    // $result = mysqli_query($con, $select_query);
    // if ($result && mysqli_num_rows($result) > 0) {
    //     $row = mysqli_fetch_assoc($result);
    //     $image_path = "../images_bg/" . $row['cimage'];
    //     if (file_exists($image_path)) {
    //         unlink($image_path); // Delete the image file
    //     }
    // }

    // Then, delete the category from the database
    $delete_query = "DELETE FROM categories WHERE id='$category_id'";
    $delete_result = mysqli_query($con, $delete_query);
    if($delete_result) {
        echo "<script>alert('Category deleted successfully');</script>";
    } else {
        echo "<script>alert('Failed to delete category');</script>";
    }

    // Redirect back to the admin dashboard or any other appropriate page
    header("Location: acategories.php");
    exit();
}

elseif(isset($_POST['add_product_btn'])){
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder= "../images_bg/".$filename;

    // Move the uploaded image to the desired folder
    move_uploaded_file($tempname, $folder);

    // Insert the product details into the database
    $query = "INSERT INTO product (id, product_title, product_description, product_price, image) 
              VALUES ('$category_id', '$name', '$description', '$price', '$filename')";

    // Execute the query
    if(mysqli_query($con, $query)) {
        // Product inserted successfully
        echo "<script>alert('Product inserted successfully');window.location.href = 'aproducts.php'</script>";
    } else {
        // Error inserting product
        echo "<script>alert('Error inserting product');window.location.href = 'add-products.php'</script>";
    }
}

if(isset($_POST['update_product_btn'])) {
    $product_id = $_POST['product_id'];
    $id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    // Check if a new image file is uploaded
    if($_FILES['image']['name']) {
        $filename = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder= "../images_bg/".$filename;

        // Move the uploaded image to the desired folder
        move_uploaded_file($tempname, $folder);

        // Update product details with the new image
        $query = "UPDATE product 
                  SET id = '$id', product_title = '$name', product_description = '$description', product_price = '$price', image = '$filename' 
                  WHERE product_id = '$product_id'";
    } else {
        // Update product details without changing the image
        $query = "UPDATE product 
                  SET id = '$id', product_title = '$name', product_description = '$description', product_price = '$price' 
                  WHERE product_id = '$product_id'";
    }

    // Execute the update query
    if(mysqli_query($con, $query)) {
        // Product updated successfully
        echo "<script>alert('Product updated successfully');window.location.href = 'aproducts.php'</script>";
    } else {
        // Error updating product
        echo "<script>alert('Error updating product');window.location.href = 'aproducts.php'</script>";
    }
}

elseif(isset($_POST['delete_product_btn'])) {
    // Check if the product ID is set in the POST data
    if(isset($_POST['product_id'])) {
        // Sanitize the input to prevent SQL injection
        $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

        // Prepare the SQL query to delete the product
        $query = "DELETE FROM product WHERE product_id = '$product_id'";

        // Execute the query
        if(mysqli_query($con, $query)) {
            // Product deleted successfully
            echo "<script>alert('Product deleted successfully');window.location.href = 'aproducts.php'</script>";
        } else {
            // Error occurred while deleting the product
            echo "<script>alert('Error occurred while deleting the product');window.location.href = 'aproducts.php'</script>";
        }
    } else {
        // Product ID is not provided
        echo "Product ID not provided.";
    }
}
?>
  
