<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';
    require("../dbconn.php");


    if(!isset($_SESSION["NAME"]) || !isset($_SESSION["EMAIL"]) || !isset($_SESSION["USERTYPE"])) {
        echo "<script> window.location.href = '../../index.php'; </script>";
        exit();
    }
?>

<?php
    
    if(isset($_GET["email"])) {
        $email = urldecode($_GET["email"]);
    }

    $sql = "SELECT * FROM APPLIERS WHERE EMAIL = '$email'";
    $result = $conn->query($sql);

    if($result->num_rows == 0) {
        echo "<script> alert('No such applier exists in the database'); </script>";
        echo "<script> window.location.href = '../webpages/recruiter/manageapplication.php'; </script>";
        exit();
    }

    if($result->num_rows == 1) {

        $sql = "UPDATE APPLIERS SET STATUS = 'SELECTED' WHERE EMAIL = '$email';";
        $result = $conn->query($sql);
        if($result === TRUE) {
            echo "<script> alert('Successfully updated the status of applier to selected.'); </script>";
        }
        else {
            echo "<script> alert('Failed to update internship status of applier'); </script>";
            echo "<script> window.location.href = '../webpages/recruiter/manageapplication.php'; </script>";
            exit();
        }

        $sql = "SELECT * FROM APPLIERS WHERE EMAIL = '$email';";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $mail = new PHPMailer(true);

        $firstname = $row["FIRSTNAME"];
        $lasttname = $row["FIRSTNAME"];
        $jobtitle = $row["JOBTITLE"];

        $sql = "SELECT VACANCY FROM JOB_VACANCY WHERE JOBTITLE = '$jobtitle';";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $vacant = $row["VACANCY"];
        $vacant = $vacant - 1;
        $sql = "UPDATE JOB_VACANCY SET VACANCY = '$vacant' WHERE JOBTITLE = '$jobtitle';";  
        $result = $conn->query($sql);
        if($result === TRUE) {
            echo "<script> alert('Successfully updated the vacancy'); </script>";
        }

        try {
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                      
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'pathakjijagdish1@gmail.com';         
            $mail->Password   = 'zvxm trad exuu nbxe';                 
            $mail->SMTPSecure = 'tls';                                 
            $mail->Port       = 587;                                    

            $mail->setFrom('pathakjijagdish1@gmail.com', 'ON BEHALF OF AMUL');        
            $mail->addAddress($email);                  
            $mail->isHTML(true);                                       
            $mail->Subject = '';
            $mail->Body = 
                "<b> Dear $firstname $lastname <br> 
                <br>
                We are pleased to inform you that you have been selected for the internship position at Amul as $jobtitle. Congratulations on this achievement!
                We were impressed by your skills and enthusiasm, and we believe you will be a valuable addition to our team. Your internship will provide you with excellent opportunities to learn, grow, and contribute to our exciting projects.
                Further details regarding your internship start date, onboarding process, and other formalities will be shared with you shortly.
                Once again, congratulations and welcome to Amul!
                <br>
                <br>
                Warm regards, <br>
                AMUL (Gujarat Co-operative Milk Marketing Federation Ltd) </b>";
            $mail->AltBody = 'You are selected as an intern';

            if($mail->send()) {                  
                echo "<script> alert('Applier has been notified successfully'); </script>"; 
                echo "<script> window.location.href = '../webpages/recruiter/manageapplication.php'; </script>";
                exit();
            }
            else {
                echo "<script> alert('Failed to notify Applier via email'); </script>";
                echo "<script> window.location.href = '../webpages/recruiter/manageapplication.php'; </script>";
                exit();
            }
        }   
        catch (Exception $e) {
            echo "<script> alert('Error in sending mail regarding the internship, Please try again'); </script>";
            echo "<script> window.location.href = '../webpages/recruiter/manageapplication.php'; </script>";
            exit();
        }
    }

?>