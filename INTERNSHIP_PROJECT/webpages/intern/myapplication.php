<?php
    require("../internnavbar.php");
    require("../../dbconn.php");

    if(!isset($_SESSION["EMAIL"]) || !isset($_SESSION["PHONE"])) {
        echo "<script> alert('Your session has been expired, please login again'); </script>";
        echo "<script> window.location.href = '../../index.php'; </script>";
        exit();
    }
    else {

        $phone = $_SESSION["PHONE"];
        $email = $_SESSION["EMAIL"];
        $sql = "SELECT * FROM APPLIERS WHERE PHONE = '$phone' AND EMAIL = '$email';";

        $result = $conn->query($sql);

        if($result->num_rows == 0) {
            echo "<script> alert('You haven't applied for any internships yet'); </script>";
            echo "<script> window.location.href = './apply.php'; </script>";
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>My Applications</title>
  <link rel="stylesheet" href="../../styles/myapplication.css"/> 
  <link rel="icon" href="/INTERNSHIP_PROJECT/assets/amul_logo.png">
  <style>
    .withdraw-btn {
        display: block;
        width: fit-content;
        margin: 30px auto;
        padding: 10px 20px;
        background-color: #ffe6e6;
        color: red;
        border: 1px solid red;
        border-radius: 8px;
        text-align: center;
        font-weight: bold;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .withdraw-btn:hover {
        background-color: red;
        color: white;
    }
  </style>

</head>
<body>

<!-- Assuming your navbar.php outputs a <nav> element -->

<main>
  <h2>My Internship Applications</h2>

  <?php while ($row = $result->fetch_assoc()) { ?>
      <div class="application">
          <div class="info"><span>Name:</span> <?php echo ($row['FIRSTNAME'] . ' ' . $row['MIDDLENAME'] . ' ' . $row['LASTNAME']); ?></div>
          <div class="info"><span>Age:</span> <?php echo ($row['AGE']); ?></div>
          <div class="info"><span>Gender:</span> <?php echo ($row['GENDER']); ?></div>
          <div class="info"><span>City:</span> <?php echo ($row['CITY']); ?></div>
          <div class="info"><span>State:</span> <?php echo ($row['STATE']); ?></div>
          <div class="info"><span>Graduation Year:</span> <?php echo ($row['GRADYEAR']); ?></div>
          <div class="info"><span>University:</span> <?php echo ($row['UNIVERSITY']); ?></div>
          <div class="info"><span>Experience:</span> <?php echo($row['EXPEREINCE']); ?></div>
          <div class="info"><span>Motivation:</span> <?php echo ($row['DESCRIPTION']); ?></div>
          <div class="info"><span>JobTitle:</span> <?php echo ($row['JOBTITLE']); ?></div>
          <div class="info"><span>Status:</span> <?php echo ($row['STATUS']); ?></div>
          <div class="info">
            <span>Resume:</span> 
            <a href="/INTERNSHIP_PROJECT/backend/<?php echo htmlspecialchars($row['RESUME_PATH']); ?>"  rel="noopener noreferrer">View Resume</a>
          </div>
          <div class="info">
            <span>College Letter:</span> 
            <a href="/INTERNSHIP_PROJECT/backend/<?php echo htmlspecialchars($row['COLLEGE_LETTER_PATH']); ?>"  rel="noopener noreferrer">View Letter</a>
          </div>
      </div>
  <?php } ?>
    <a href="/INTERNSHIP_PROJECT/backend/withdraw.php?email=<?php echo urlencode($email); ?>" class="withdraw-btn">
      Withdraw my Application
    </a>

</main>

</body>
</html>
