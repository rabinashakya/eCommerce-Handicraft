<?php 
   echo ' id = '.$_COOKIE['id'];
   if(!isset($_COOKIE['id'])){
    header("location:index.php"); 
   }else if(isset($_POST['Log_out'])){
        setcookie("id","",time()-86400,"/");
        setcookie("role","",time()-86400,"/");
        setcookie("name","",time()-86400,"/");
        echo "<script> alert('Log out successfully') </script>";
        echo "<script> window.location.href = 'login.php' </script>";
     }
?>
