<?php
    require("../recruiternavbar.php");
    require("../../dbconn.php");

    $totalApps = "SELECT COUNT(*) as total FROM APPLIERS";
    $totalJobs = "SELECT COUNT(*) as total FROM JOB_VACANCY";
    $pendingApps = "SELECT COUNT(JOBTITLE) as total FROM APPLIERS WHERE STATUS = 'UNDER CONSIDERATION';";
    $acceptedApps = "SELECT COUNT(JOBTITLE) as total FROM APPLIERS WHERE STATUS = 'ACCEPTED';";
    $rejectedApps = "SELECT COUNT(JOBTITLE) as total FROM APPLIERS WHERE STATUS = 'REJECTED';";
    
    $result1 = $conn->query($totalApps)->fetch_assoc()['total'];
    $result2 = $conn->query($totalJobs)->fetch_assoc()['total'];
    $result3 = $conn->query($pendingApps)->fetch_assoc()['total'];
    $result4 = $conn->query($acceptedApps)->fetch_assoc()['total'];
    $result5 = $conn->query($rejectedApps)->fetch_assoc()['total'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMUL - Intern Dashboard</title>
    <link rel="stylesheet" href="../../styles/dashboard_.css">
    <link rel="icon" href="/INTERNSHIP_PROJECT/assets/amul_logo.png">
</head>
<body style="padding : 0px;">

    <p class="dashboard-intro">
        We’re excited to have you at the AMUL Recruiter Portal. Here, you can explore available job vacancies and reject or select the applicant in the different roles which are available.
    </p>
    <br>
    <div class="dashboard-features">
        <div class="feature-card">
            <h3>🧾Add new job vacancies for Internship</h3>
            <p>Here, You can Add/Remove the job vacancies of different roles and see the updates in real time.</p>
        </div>
        <div class="feature-card">
            <h3>📄 Accept/Reject Applicants for different roles</h3>
            <p>Track the submitted applications, check their resumes and personal details and see status updates in real-time.</p>
        </div>
    </div>
    
    <section class="quick-actions">
        <button class="action-btn apply-btn" onclick="location.href='/INTERNSHIP_PROJECT/webpages/recruiter/managejobvacancy.php'">
        Add/Remove Job Vacancies
        </button>
        <button class="action-btn profile-btn" onclick="location.href='/INTERNSHIP_PROJECT/webpages/recruiter/manageapplication.php'">
        Accept/Reject Applications
        </button>
    </section>

        <!-- Summary Cards -->
    <div class="container mt-4">
        <div class="row text-center">
            <div class="col-md-2">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Jobs</h5>
                        <p class="card-text"><?php echo $result2 ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Applications</h5>
                        <p class="card-text"><?php echo $result1 ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Under Consideration</h5>
                        <p class="card-text"><?php echo $result3 ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Accepted</h5>
                        <p class="card-text"><?php echo $result4 ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Rejected</h5>
                        <p class="card-text"><?php echo $result5 ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>
</html>

