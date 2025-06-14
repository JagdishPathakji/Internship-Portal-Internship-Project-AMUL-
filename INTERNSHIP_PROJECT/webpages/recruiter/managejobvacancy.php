<?php
    require("../recruiternavbar.php");
    require("../../dbconn.php");

    $sql = "SELECT * FROM job_vacancy";

    $result = $conn->query($sql);
    $no_data = null;
    if($result->num_rows == 0) {
        $no_data = "There no job vacancies are available for now.";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Job Vacancy</title>
    <link rel="stylesheet" href="../../styles/manageapp_.css">
    <link rel="icon" href="/INTERNSHIP_PROJECT/assets/amul_logo.png">
    <style>
        /* Add New Job Button Styles */
        .add-job-section {
            text-align: center;
            margin: 20px 0 30px 0;
            padding: 20px;
        }
        
        .add-job-btn {
            display: inline-block;
            background: linear-gradient(135deg, red 0%, red 100%);
            color: #fff;
            text-decoration: none;
            padding: 15px 35px;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            cursor: pointer;
            position: relative;
        }
        
        .add-job-btn::before {
            content: '+ ';
            font-size: 1.3rem;
            font-weight: bold;
            margin-right: 8px;
        }
        
        .add-job-btn:hover {
            background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
        }
        
        .add-job-btn:active {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }
        
        .add-job-btn:focus {
            outline: 3px solid rgba(40, 167, 69, 0.3);
            outline-offset: 2px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .add-job-section {
                margin: 15px 0 25px 0;
                padding: 15px;
            }
            
            .add-job-btn {
                padding: 12px 28px;
                font-size: 1rem;
            }
        }
        
        @media (max-width: 480px) {
            .add-job-btn {
                padding: 10px 24px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

    <h3>The list of all the available job vacancies are provided below</h3>
    
    <div class="add-job-section">
        <a href="/INTERNSHIP_PROJECT/backend/addjob.php" class="add-job-btn">
            Add New Job Vacancy
        </a>
    </div>
    
    <?php if ($no_data): ?>
    <div class="no-data"><?php echo $no_data; ?> </div>
    <?php else: ?>
        <div class="scroll-container">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="applicant-card">
                    <h4><?php echo htmlspecialchars($row['JOBTITLE']); ?></h4>
                    <p><strong>Vacancy:</strong> <?php echo $row['VACANCY']; ?></p>
                    <p><strong>Experience Required:</strong> <?php echo $row['EXPEREINCE']; ?></p>
                    <p><strong>Expected Stipend:</strong> <?php echo $row['EXPECTEDSTIPEND']; ?></p>
                    <p><strong>Job Type:</strong> <?php echo $row['JOBTYPE']; ?></p>
                    <p><strong>Eligibility:</strong> <?php echo $row['ELIGIBILITY']; ?></p>
                    <p><strong>Deadline Date:</strong> <?php echo $row['DEADLINEDATE']; ?></p>
                    <div class="action-buttons">
                        <a href="/INTERNSHIP_PROJECT/backend/remove.php?jobtitle=<?php echo urlencode($row['JOBTITLE']); ?>" class="accept-btn">Remove this job</a>
                        <a href="/INTERNSHIP_PROJECT/backend/edit.php?jobtitle=<?php echo urlencode($row['JOBTITLE']); ?>" class="accept-btn">Edit</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

</body>
</html>