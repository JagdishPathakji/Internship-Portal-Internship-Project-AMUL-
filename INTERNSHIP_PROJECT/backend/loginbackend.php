<?php

    session_start();
    require("../dbconn.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if(empty($_POST["user-type"])) {
            echo "<script> alert('Please select User-type'); </script>";
            echo "<script> window.location.href = '../index.php'; </script>";
            exit();
        }
        if(empty($_POST["email"])) {
            echo "<script> alert('Please enter the email'); </script>";
            echo "<script> window.location.href = '../index.php'; </script>";
            exit();
        }
        if(empty($_POST["password"])) {
            echo "<script> alert('Please enter the password'); </script>";
            echo "<script> window.location.href = '../index.php'; </script>";
            exit();
        }

        function isValidEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        if(isset($_POST["user-type"]) && isset($_POST["email"]) and isset($_POST["password"])) {
            $user_type = $_POST["user-type"];
            $email =  $_POST["email"];
            $password = $_POST["password"];

            if (!isValidEmail($email)) {
                echo "<script> alert('Please enter a valid email address'); </script>";
                echo "<script> window.location.href = '../index.php'; </script>";
                exit();
            }

            if($user_type == "intern") {
                $sql = "SELECT * FROM INTERN_INFO WHERE EMAIL = '$email' AND PASSWORD = '$password'";
                $result = $conn->query($sql);
                
                if($result->num_rows == 1) {
                    echo "<script> alert('Welcome back $email'); </script>";
                    $row = $result->fetch_assoc();
                    $_SESSION["FIRSTNAME"] = $row["FIRSTNAME"];
                    $_SESSION["LASTNAME"] = $row["LASTNAME"];
                    $_SESSION["NAME"] = $row["FIRSTNAME"] . " " . $row["LASTNAME"];
                    $_SESSION["EMAIL"] = $row["EMAIL"];
                    $_SESSION["MIDDLENAME"] = $row["MIDDLENAME"];
                    $_SESSION["USERTYPE"] = "INTERN";
                    $_SESSION["DOB"] = $row["DOB"];
                    $_SESSION["AGE"] = $row["AGE"];
                    $_SESSION["PHONE"] = $row["PHONE"];
                    $_SESSION["GENDER"] = $row["GENDER"];
                    $_SESSION["CITY"] = $row["CITY"];
                    $_SESSION["STATE"] = $row["STATE"];
                    echo "<script> window.location.href = '../webpages/intern/dashboard.php' </script>";
                    exit();
                }
                else {
                    echo "<script> alert('No such exists, maybe email or password is wrong'); </script>";
                    echo "<script> window.location.href = '../index.php'; </script>";
                    exit();
                }                
            }
            else {
                $sql = "SELECT FIRSTNAME, LASTNAME, EMAIL, PASSWORD FROM RECRUITER_INFO WHERE EMAIL = '$email' AND PASSWORD = '$password'";
                $result = $conn->query($sql);
                
                if($result->num_rows == 1) {
                    echo "<script> alert('Welcome back $email'); </script>";
                    $row = $result->fetch_assoc();
                    $_SESSION["NAME"] = $row["FIRSTNAME"] . " " . $row["LASTNAME"];
                    $_SESSION["EMAIL"] = $row["EMAIL"];
                    $_SESSION["USERTYPE"] = "INTERN";
                    echo "<script> window.location.href = '../webpages/recruiter/dashboard.php' </script>";
                    exit();
                }
                else {
                    echo "<script> alert('No such exists, maybe email or password is wrong'); </script>";
                    echo "<script> window.location.href = '../index.php'; </script>";
                    exit();
                }
            }

        }
        else {
            echo "<script> alert('Please enter all the fields'); </script>";
            echo "<script> window.location.href = '../index.php'; </script>";
            exit();
        }
    }
?>