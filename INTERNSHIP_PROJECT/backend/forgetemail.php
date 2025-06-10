<?php
    session_start();

    unset($_SESSION["email"]);
    unset($_SESSION["phone"]);
    unset($_SESSION["user"]);
    unset($_SESSION["otp"]);

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Include PHPMailer files
    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';


    if (empty($_POST["email"])) {
        echo "<script> alert('Email field is empty'); </script>";
        echo "<script> window.location.href = '../webpages/forgetpasswordemail.php'; </script>";
        exit();
    }
    if(empty($_POST["user-type"])) {
        echo "<script> alert('Please select User Type field (Intern / Recruiter) '); </script>";
        echo "<script> window.location.href = '../webpages/forgetpasswordemail.php'; </script>";
        exit();
    }

    if (isset($_POST["email"]) && isset($_POST["user-type"])) {

        function isValidEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        $email = $_POST["email"];
        $usertype = $_POST["user-type"];

        if (!isValidEmail($email)) {
            echo "<script> alert('Please enter a valid email address'); </script>";
            echo "<script> window.location.href = '../webpages/forgetpasswordemail.php'; </script>";
            exit();
        }

        require("../dbconn.php");

        if($usertype == "intern") {
            $sql = "SELECT * FROM INTERN_INFO WHERE EMAIL = '$email'";
        }
        else if($usertype == "recruiter") {
            $sql = "SELECT * FROM RECRUITER_INFO WHERE EMAIL = '$email'";
        }

        $result = $conn->query($sql);
        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            $otp = rand(100000, 999999); 
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email; 
            $_SESSION["user"] = $usertype;
           
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();                                           
                $mail->Host       = 'smtp.gmail.com';                     
                $mail->SMTPAuth   = true;                                  
                $mail->Username   = 'pathakjijagdish1@gmail.com';          
                $mail->Password   = 'zvxm trad exuu nbxe';                 
                $mail->SMTPSecure = 'tls';                                  
                $mail->Port       = 587;                                    

                //Recipients
                $mail->setFrom('pathakjijagdish1@gmail.com', 'ON BEHALF OF AMUL');      
                $mail->addAddress($email);                  

                // Content
                $mail->isHTML(true);                                       
                $mail->Subject = 'OTP Verification through Email';
                $mail->Body    = '<b>Your One Time Password (OTP) is : ' . $otp . '</b>';
                $mail->AltBody = 'This OTP is valid only form 2 minutes!';

               if($mail->send()) {
                    echo "<script> alert('OTP sent successfully'); </script>";
                    echo "<script> window.location.href = '../webpages/otpverify.php'; </script>";
                    exit();
                }
                else {
                    echo "<script> alert('Error in sending the OTP to your mail, Please try again'); </script>";
                    echo "<script> window.location.href = '../webpages/forgetpasswordemail.php'; </script>";
                    exit();        
                }

            }   
            catch (Exception $e) {
                echo "<script> alert('Error in sending the OTP to your mail, Please try again'); </script>";
                echo "<script> window.location.href = '../webpages/forgetpasswordemail.php'; </script>";
                exit();
            }
        }
        else {
            echo "<script> alert('No such registered email address'); </script>";
            echo "<script> window.location.href = '../webpages/forgetpasswordemail.php'; </script>";
            exit();
        }
    }
?>


