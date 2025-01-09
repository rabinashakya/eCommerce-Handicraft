<?php

include 'config.php'; 

    function redirect($url, $message)
    {
        $_SESSION['message'] = $message;
        header('Location: '.$url);
        exit();
    }

    function getAll($table)
    {
        global $con;
            $query = "SELECT * from $table";
            return $query_run = mysqli_query($con, $query);
    }

    function getbyId($table, $id) {
        global $con;
        $query = "SELECT * FROM $table WHERE product_id='$id' LIMIT 1";
        return mysqli_query($con, $query);
    }
    
    
    


?>