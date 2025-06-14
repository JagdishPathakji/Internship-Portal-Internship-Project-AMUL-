<?php

    require("../dbconn.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($_POST["firstname"])) {
            echo "<script> alert('Please enter firstname '); </script>";
            echo "<script> window.location.href = '../webpages/signup.php' </script>";
            exit();
        }
        if(empty($_POST["middlename"])) {
            echo "<script> alert('Please enter middlename '); </script>";
            echo "<script> window.location.href = '../webpages/signup.php' </script>";
            exit();
        }
        if(empty($_POST["lastname"])) {
            echo "<script> alert('Please enter lastname '); </script>";
            echo "<script> window.location.href = '../webpages/signup.php' </script>";
            exit();
        }
        if(empty($_POST["email"])) {
            echo "<script> alert('Please enter email '); </script>";
            echo "<script> window.location.href = '../webpages/signup.php' </script>";
            exit();
        }
        if(empty($_POST["phone"])) {
            echo "<script> alert('Please enter phone number '); </script>";
            echo "<script> window.location.href = '../webpages/signup.php' </script>";
            exit();
        }
        if(empty($_POST["dob"])) {
            echo "<script> alert('Please enter dob '); </script>";
            echo "<script> window.location.href = '../webpages/signup.php' </script>";
            exit();
        }
        if(empty($_POST["age"])) {
            echo "<script> alert('Please enter age '); </script>";
            echo "<script> window.location.href = '../webpages/signup.php' </script>";
            exit();
        }
        if(empty($_POST["password"])) {
            echo "<script> alert('Please enter password '); </script>";
            echo "<script> window.location.href = '../webpages/signup.php' </script>";
            exit();
        }
        if(empty($_POST["confirmpassword"])) {
            echo "<script> alert('Please enter confirm password '); </script>";
            echo "<script> window.location.href = '../webpages/signup.php' </script>";
            exit();
        }
        if(empty($_POST["city"])) {
            echo "<script> alert('Please enter city '); </script>";
            echo "<script> window.location.href = '../webpages/signup.php' </script>";
            exit();
        }
        if(empty($_POST["state"])) {
            echo "<script> alert('Please enter state '); </script>";
            echo "<script> window.location.href = '../webpages/signup.php' </script>";
            exit();
        }
        if(empty($_POST["gender"])) {
            echo "<script> alert('Please enter gender  '); </script>";
            echo "<script> window.location.href = '../webpages/signup.php' </script>";
            exit();
        }

        function isValidEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }
        
        if(isset($_POST["firstname"]) && isset($_POST["middlename"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["age"]) && isset($_POST["dob"]) && isset($_POST["password"]) && isset($_POST["confirmpassword"]) && isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["gender"])) {

            $firstname = $_POST["firstname"];
            $middlename = $_POST["middlename"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $age = $_POST["age"];
            $dob = $_POST["dob"];
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirmpassword"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $gender = $_POST["gender"];

            if (!isValidEmail($email)) {
                echo "<script> alert('Please enter a valid email address'); </script>";
                echo "<script> window.location.href = '../webpages/signup.php'; </script>";
                exit();
            }

            if($password != $confirmpassword) {
                echo "<script> alert('Confirm password does not match with password'); </script>";
                echo "<script> window.location.href = '../webpages/signup.php'; </script>";
                exit();
            }

            $sql = "SELECT EMAIL,PHONE FROM INTERN_INFO WHERE EMAIL = '$email' OR PASSWORD = '$password';";
            
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                echo "<script> alert('Email is already registered. Please do login'); </script>";
                echo "<script> window.location.href = '../index.php'; </script>";
                exit();
            }

            $sql = "INSERT INTO INTERN_INFO (FIRSTNAME,MIDDLENAME,LASTNAME,EMAIL,PHONE,AGE,DOB,PASSWORD,GENDER,CITY,STATE) VALUES ('$firstname','$middlename','$lastname','$email','$phone','$age','$dob','$password','$gender','$city','$state');";

            $result = $conn->query($sql);
            if($result === TRUE) {
                echo "<script> alert('Your account created successfully'); </script>";
                echo "<script> window.location.href = '../index.php'; </script>";
                exit();
            }
            else {
                echo "<script> alert('Error in creating your account, please try again !'); </script>";
                echo "<script> window.location.href = '../webpages/signup.php';  </script>";
            }
        }
        else {
            echo "<script> alert('Please enter all the fields'); </script>";
            echo "<script> window.location.href = '../webpages/signup.php'; </script>";
            exit();
        }
        
    }

?>