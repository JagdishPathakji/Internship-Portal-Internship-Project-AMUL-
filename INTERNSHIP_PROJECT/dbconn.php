<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "INTERN_RECORD";

    $conn = new mysqli($servername,$username,$password,$database);

    if($conn->connect_error) {
        echo "<script> alert('Error in the database connection'); </script>";
    }

?>