<?php
    require("../recruiternavbar.php");
    require("../../dbconn.php");

    $sql = "SELECT * FROM APPLIERS WHERE STATUS = 'UNDER CONSIDERATION'";

    $result = $conn->query($sql);
    $no_data = null;
    if($result->num_rows == 0) {
        $no_data = "There no applications recieved for the internship till now";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Applications</title>
    <link rel="stylesheet" href="../../styles/manageapp_.css">
    <link rel="icon" href="/INTERNSHIP_PROJECT/assets/amul_logo.png">
</head>
<body>

    <h3>The list of all the applicants is provided below</h3>

    <?php if ($no_data): ?>
    <div class="no-data"><?php echo $no_data; ?> </div>
    <?php else: ?>
        <div class="scroll-container">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="applicant-card">
                    <h4><?php echo htmlspecialchars($row['FIRSTNAME'] . " " . $row['MIDDLENAME'] . " " . $row['LASTNAME']); ?></h4>
                    <p><strong>Age:</strong> <?php echo $row['AGE']; ?></p>
                    <p><strong>Phone:</strong> <?php echo $row['PHONE']; ?></p>
                    <p><strong>Email:</strong> <?php echo $row['EMAIL']; ?></p>
                    <p><strong>Graduation Year:</strong> <?php echo $row['GRADYEAR']; ?></p>
                    <p><strong>University:</strong> <?php echo $row['UNIVERSITY']; ?></p>
                    <p><strong>Experience:</strong> <?php echo $row['EXPEREINCE']; ?></p>
                    <p><strong>Job Title:</strong> <?php echo $row['JOBTITLE']; ?></p>
                    <p><strong>Status:</strong> <?php echo $row['STATUS']; ?></p>
                    <p><strong>Description:</strong><br> <?php echo ($row['DESCRIPTION']); ?></p>
                    <div class="info">
                        <span>Resume:</span> 
                        <a href="/INTERNSHIP_PROJECT/backend/<?php echo htmlspecialchars($row['RESUME_PATH']); ?>"  rel="noopener noreferrer">View Resume</a>
                    </div>
                    <div class="info">
                        <span>College Letter:</span> 
                        <a href="/INTERNSHIP_PROJECT/backend/<?php echo htmlspecialchars($row['COLLEGE_LETTER_PATH']); ?>" rel="noopener noreferrer">View Letter</a>
                    </div>
                    <div class="action-buttons">
                        <a href="/INTERNSHIP_PROJECT/backend/accept.php?email=<?php echo urlencode($row['EMAIL']); ?>" class="accept-btn">Accept</a>
                        <a href="/INTERNSHIP_PROJECT/backend/reject.php?email=<?php echo urlencode($row['EMAIL']); ?>" class="accept-btn">Reject</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>



</body>
</html>