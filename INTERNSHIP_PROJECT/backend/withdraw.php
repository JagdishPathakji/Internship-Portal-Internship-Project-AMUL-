<?php
    require("../dbconn.php");

    if (isset($_GET['email'])) {
        $email = $_GET['email'];

        $stmt = $conn->prepare("DELETE FROM APPLIERS WHERE EMAIL = ?");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            echo "<script>alert('Application withdrawn successfully.');</script>";
            echo "<script> window.location.href = '../webpages/intern/apply.php'; </script>";
            exit();
        } 
        else {
            echo "<script>alert('Failed to withdraw application.');</script>";
            echo "<script> window.location.href = '../webpages/intern/myapplication.php'; </script>";
            
            exit();
        }

        $stmt->close();
    }
    else {
        echo "<script>alert('No email provided.');</script>";
        echo "<script> window.location.href = '../webpages/intern/myapplication.php'; </script>";
        exit();
    }
?>
