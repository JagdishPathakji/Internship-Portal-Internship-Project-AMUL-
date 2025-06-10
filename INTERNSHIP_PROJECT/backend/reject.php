<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';
    require("../dbconn.php");
    
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

        $sql = "UPDATE APPLIERS SET STATUS = 'REJECTED' WHERE EMAIL = '$email';";
        $result = $conn->query($sql);
        if($result === TRUE) {
            echo "<script> alert('Successfully updated the status of applier to rejected.'); </script>";
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
                We appreciate your interest in applying for the internship opportunity at AMUL.
                After careful consideration, we regret to inform you that your application has not been selected for this internship round.
                We encourage you to apply again in the future for any upcoming opportunities at AMUL.
                <br> <br> 
                Wishing you all the best in your future endeavors.
                <br>
                <br>
                Best Wishes, <br>
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