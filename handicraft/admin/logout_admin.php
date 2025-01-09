<?php include '../include/config.php'; 

session_start();
session_unset();
session_destroy();

$location = 'http://localhost/revised_handicraft/handicraft/user/index.php'; // Specify the location here

header('Location: ' . $location); // Redirect to the specified location
?>