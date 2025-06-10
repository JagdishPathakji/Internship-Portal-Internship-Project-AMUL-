<?php

    session_start();
    require("../dbconn.php");
    
    if(empty($_POST["new_password"])) {
        echo "<script> alert('New Password field is empty'); </script>";
        echo "<script> window.location.href = './webpages/changepassword.php'; </script>";
        exit();
    }   
    if(empty($_POST["confirm_password"])) {
        echo "<script> alert('Confirm Password field is empty'); </script>";
        echo "<script> window.location.href = './webpages/changepassword.php'; </script>";
        exit();
    }

    if(isset($_POST["new_password"]) && isset($_POST["confirm_password"])) {
        $newpassword = $_POST["new_password"];
        $confirmpassword = $_POST["confirm_password"];

        if($newpassword != $confirmpassword) {
            echo "<script> alert('Confirm password is wrong please try again'); </script>";
            echo "<script> window.location.href = '../webpages/changepassword.php'; </script>";
            exit();
        }
        
        if(isset($_SESSION["phone"])) {
            $phone = $_SESSION["phone"];
            if($_SESSION["user"] == "intern") {
                $sql =  "UPDATE INTERN_INFO SET PASSWORD = '$newpassword' WHERE PHONE = '$phone'";
            }
            else if($_SESSION["user"] == "recruiter") {
                $sql =  "UPDATE RECRUITER_INFO SET PASSWORD = '$newpassword' WHERE PHONE = '$phone'";
            }
        }
        else if(isset($_SESSION["email"])) {
            $email = $_SESSION["email"];
            if($_SESSION["user"] == "intern") {
                $sql =  "UPDATE INTERN_INFO SET PASSWORD = '$newpassword' WHERE EMAIL = '$email'";
            }
            else if($_SESSION["user"] == "recruiter") {
                $sql =  "UPDATE RECRUITER_INFO SET PASSWORD = '$newpassword' WHERE EMAIL = '$email'";
            }    
        }

        $result = $conn->query($sql);
        if($result === TRUE) {
            session_unset();
            session_destroy();
            echo "<script> alert('Password reset successfull'); </script>";
            echo "<script> window.location.href = '../index.php'; </script>";
            exit();
        }
        else {
            echo "<script> alert('Error in password reset'); </script>";
            echo "<script> window.location.href = './webpages/changepassword.php' </script>";
        }
    }

?>