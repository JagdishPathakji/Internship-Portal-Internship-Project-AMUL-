<?php
    session_start(); 
    session_unset(); 
    session_destroy(); 
    echo "<script> alert('Logout successfull'); </script>";
    header("Location: ../../index.php"); 
    exit();
?>

