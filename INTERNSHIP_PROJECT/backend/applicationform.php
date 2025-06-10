<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';
    require("../dbconn.php");

    if(isset($_POST["submit"])) {

        $firstname = $_SESSION["FIRSTNAME"];
        $middlename = $_SESSION["MIDDLENAME"];
        $lastname = $_SESSION["LASTNAME"];
        $age = $_SESSION["AGE"];
        $phone = $_POST["phoneNumber"];
        $email = $_SESSION["EMAIL"];
        $gradyear = $_POST["graduationYear"];
        $university = $_POST["university"];
        $exp = $_POST["experience"];
        $description = $_POST["motivation"];
        if(!isset($_SESSION["jobtitle"])) {
            echo "<script> alert('Job title is not defined'); </script>";
            echo "<script> window.location.href = '../webpages/intern/apply.php'; </script>";
            exit();
        }
        $jobtitle = $_SESSION["jobtitle"];
        

        $sql = "SELECT PHONE,EMAIL FROM APPLIERS WHERE PHONE = '$phone' OR EMAIL = '$email'";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            echo "<script> alert('The EMAIL or PHONE is already registered. Multiple registrations not allowed !'); </script>";
            echo "<script> window.location.href='../webpages/intern/apply_form.php'; </script>";
            exit();
        }
        
        // Create user-specific folder
        $uploadFolder = 'uploads/' . $phone . '/';
        if (!is_dir($uploadFolder)) {
            mkdir($uploadFolder, 0755, true);
        }

        $resumeFileName = 'resume_' . $phone .  '_' . basename($_FILES['resume']['name']);
        $collegeFileName = 'letter_' . $phone . '_' . basename($_FILES['collegeLetter']['name']);

        $resumePath = $uploadFolder . $resumeFileName;
        $collegePath = $uploadFolder . $collegeFileName;

        $file1 = move_uploaded_file($_FILES['resume']['tmp_name'], $resumePath);
        $file2 = move_uploaded_file($_FILES['collegeLetter']['tmp_name'], $collegePath);

        if($file1 && $file2) {

            $sql = "INSERT INTO APPLIERS (FIRSTNAME,MIDDLENAME,LASTNAME,AGE,PHONE,EMAIL,GRADYEAR,UNIVERSITY,EXPEREINCE,DESCRIPTION,RESUME_PATH,COLLEGE_LETTER_PATH,STATUS,JOBTITLE) VALUES ('$firstname','$middlename','$lastname','$age','$phone','$email','$gradyear','$university','$exp','$description','$resumePath','$collegePath','UNDER CONSIDERATION','$jobtitle');";
            
            $result = $conn->query($sql);

            if($result === TRUE) {
                echo "<script> alert('Applied successfully for the role'); </script>";
                
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
                    $mail->Subject = ' Acknowledgment of Your Internship Application at AMUL';
                    $mail->Body    = 
                    "<b> Dear $firstname $lastname <br> 
                    <br>
                    Thank you for applying for the $jobtitle intern position at AMUL. We have received your application and appreciate your interest in joining one of India’s most iconic dairy cooperatives.
                    Our team is currently reviewing all applications thoroughly. If your qualifications match our current internship requirements, we will get in touch with you shortly for the next steps in the selection process.
                    In the meantime, if you have any questions or need to update your application details, please feel free to contact us at [your contact email].
                    We appreciate your enthusiasm and interest in AMUL and look forward to possibly working with you.
                    <br>
                    <br>
                    Warm regards, <br>
                    AMUL (Gujarat Co-operative Milk Marketing Federation Ltd) </b>";
                    $mail->AltBody = 'Thank you for applying at AMUL.';

                if($mail->send()) {
                        echo "<script> alert('You have been notified via Email'); </script>";
                    }
                    else {
                        echo "<script> alert('Failed to notify you via email'); </script>";
                        echo "<script>window.location.href = '../webpages/intern/apply.php';</script>";
                        exit();
                    }

                }   
                catch (Exception $e) {
                    echo "<script> alert('Error in sending mail regarding the application, Please try again'); </script>";
                    echo "<script>window.location.href = '../webpages/intern/apply.php';</script>";
                    exit();
                }

                echo "<script> window.location.href = '../webpages/intern/myapplication.php'; </script>";
                exit();
            }
            else {
                echo "<script>alert('Error saving application to database.');</script>";
                echo "<script>window.location.href = '../webpages/intern/apply.php';</script>";
                exit();
            }
        }
        else {
            echo "<script>alert('Error uploading files.');</script>";
            echo "<script>window.location.href = '../webpages/intern/apply.php';</script>";
            exit();
        }
        
    }
?> 