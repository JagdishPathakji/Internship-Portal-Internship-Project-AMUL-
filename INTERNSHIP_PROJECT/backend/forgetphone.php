<?php
    session_start();
?>
<?php
    unset($_SESSION["email"]);
    unset($_SESSION["phone"]);
    unset($_SESSION["user"]);
    unset($_SESSION["otp"]);

    if (empty($_POST["phone"])) {
        echo "<script> alert('Phone number field is empty'); </script>";
        echo "<script> window.location.href = '../webpages/forgetpasswordphone.php'; </script>";
        exit();
    }
    if(empty($_POST["user-type"])) {
        echo "<script> alert('Please select User Type field (Intern / Recruiter) '); </script>";
        echo "<script> window.location.href = '../webpages/forgetpasswordphone.php'; </script>";
        exit();
    }

    if (isset($_POST["phone"])  && isset($_POST["user-type"])) {

        $phone = $_POST["phone"];
        $usertype = $_POST["user-type"];
        if(strlen($phone) != 10) {
            echo "<script> alert('Phone number is invalid'); </script>";
            echo "<script> window.location.href = '../webpages/forgetpasswordphone.php'; </script>";
            exit();
        }

        require("../dbconn.php");

        if($usertype == "intern") {
            $sql = "SELECT * FROM  INTERN_INFO WHERE PHONE = '$phone'";
        }
        else if($usertype == "recruiter") {
            $sql = "SELECT * FROM RECRUITER_INFO WHERE PHONE = '$phone'";
        }

        $result = $conn->query($sql);
        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['phone'] = $phone; 
            $_SESSION["user"] = $usertype;

            $apiKey = "10d54045-4243-11f0-a562-0200cd936042";

            $url = "https://2factor.in/API/V1/$apiKey/SMS/$phone/$otp";

            $response = file_get_contents($url);

            $result = json_decode($response, true);

            if ($result && $result["Status"] == "Success") {
                echo "<script> alert('OTP Sent Successfully'); </script>";
                echo "<script> window.location.href = '../webpages/otpverify.php'; </script>";
                exit();
            }
            else {
                echo "<script> alert('Error sending OTP. Please try again.'); </script>";
                echo "<script> window.location.href = '../webpages/forgetpasswordphone.php'; </script>";
                exit();
            }
        }
        else {
            echo "<script> alert('No such registered phone number'); </script>";
            echo "<script> window.location.href = '../webpages/forgetpasswordphone.php'; </script>";
            exit();
        }
    }
?>
