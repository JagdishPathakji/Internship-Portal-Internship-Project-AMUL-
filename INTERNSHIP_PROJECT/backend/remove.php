<?php
    session_start();
    require("../dbconn.php");
    
    if(isset($_GET["jobtitle"])) {
        $jobtitle = urldecode($_GET["jobtitle"]);
    }

    $sql = "SELECT * FROM JOB_VACANCY WHERE JOBTITLE = '$jobtitle'";
    $result = $conn->query($sql);

    if($result->num_rows == 0) {
        echo "<script> alert('No such job vacancy exists in the database'); </script>";
        echo "<script> window.location.href = '../webpages/recruiter/managejobvacancy.php'; </script>";
        exit();
    }

    if($result->num_rows == 1) {

       $sql = "DELETE FROM JOB_VACANCY WHERE JOBTITLE = '$jobtitle';";
       $result = $conn->query($sql);

        if($result === TRUE) {
            echo "<script> alert('Job vacancy removed successfully'); </script>";
            echo "<script> window.location.href = '../webpages/recruiter/managejobvacancy.php'; </script>";
            exit();
        }
        else {
            echo "<script> alert('Failed to remove Job vacancy'); </script>";
            echo "<script> window.location.href = '../webpages/recruiter/managejobvacancy.php'; </script>";
            exit();    
        }
    }
?>