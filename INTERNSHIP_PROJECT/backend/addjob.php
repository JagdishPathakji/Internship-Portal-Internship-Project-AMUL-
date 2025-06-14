<?php
    require("../dbconn.php");
    require("../webpages/recruiternavbar.php");
?>

<?php

    if(isset($_POST["submit"])) {

        $jt = $_POST["jobtitle"];
        $vacancies = $_POST["vacancy"];
        $expreq = $_POST["experience"];
        $stipend =  $_POST["stipend"];
        $jobtype =  $_POST["jobtype"];
        $deadline = $_POST["deadline"];
        $eligibility = $_POST["eligibility"];

        $sql = "INSERT INTO JOB_VACANCY (JOBTITLE,VACANCY,EXPEREINCE,EXPECTEDSTIPEND,JOBTYPE,DEADLINEDATE,ELIGIBILITY) VALUES (
        '$jt','$vacancies','$expreq','$stipend','$jobtype','$deadline','$eligibility');";

        $result = $conn->query($sql);
        if($result === TRUE) {
            echo "<script> alert('Job Vacancy added successfully'); </script>";
            echo "<script> window.location.href = '../webpages/recruiter/managejobvacancy.php'; </script>";
            exit();
        }
        else {
            echo "<script> alert('Failed to add the job vacancy'); </script>";
            echo "<script> window.location.href = '../webpages/recruiter/managejobvacancy.php'; </script>";
            exit();        
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Job Vacancy - Amul Intern Portal</title>
    <link rel="stylesheet" href="../styles/job-form.css">
    <link rel="icon" href="/INTERNSHIP_PROJECT/assets/amul_logo.png">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <div class="form-header">
                <div class="logo-section">
                    <h1>Add New Job Vacancy</h1>
                </div>
                <p class="form-subtitle">Create a new internship opportunity for candidates</p>
            </div>

            <form class="job-form" id="jobForm" action="addjob.php" method="POST">
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="jobTitle" class="form-label">
                            Job Title <span class="required">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="jobTitle" 
                            name="jobtitle" 
                            class="form-input" 
                            placeholder="e.g., Software Development Intern"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="vacancy" class="form-label">
                            Number of Vacancies <span class="required">*</span>
                        </label>
                        <input 
                            type="number" 
                            id="vacancy" 
                            name="vacancy" 
                            class="form-input" 
                            placeholder="e.g., 5"
                            min="1"
                            max="100"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="experience" class="form-label">
                            Experience Required <span class="required">*</span>
                        </label>
                        <select id="experience" name="experience" class="form-select" required>
                            <option value="">Select Experience Level</option>
                            <option value="0">Fresher (0 years)</option>
                            <option value="1">1 years</option>
                            <option value="2">2 years</option>
                            <option value="3">3 years</option>
                            <option value="4">4 years</option>
                            <option value="5">5 or 5+ years</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="stipend" class="form-label">
                            Expected Stipend (₹) <span class="required">*</span>
                        </label>
                        <input 
                            type="number" 
                            id="stipend" 
                            name="stipend" 
                            class="form-input" 
                            placeholder="e.g., 15000"
                            min="0"
                            step="1000"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="jobType" class="form-label">
                            Job Type <span class="required">*</span>
                        </label>
                        <select id="jobType" name="jobtype" class="form-select" required>
                            <option value="">Select Job Type</option>
                            <option value="full-time">Full Time</option>
                            <option value="part-time">Part Time</option>
                            <option value="internship">Internship</option>
                            <option value="contract">Contract</option>
                            <option value="remote">Remote</option>
                            <option value="hybrid">Hybrid</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="deadline" class="form-label">
                            Application Deadline <span class="required">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="deadline" 
                            name="deadline" 
                            class="form-input"
                            placeholder="DD/MM/YYYY" 
                            required
                        >
                    </div>

                    <div class="form-group full-width">
                        <label for="eligibility" class="form-label">
                            Eligibility Criteria <span class="required">*</span>
                        </label>
                        <textarea 
                            id="eligibility" 
                            name="eligibility" 
                            class="form-textarea" 
                            placeholder="e.g., Bachelor's degree in Computer Science, Engineering, or related field. Strong programming skills in Java, Python, or JavaScript. Good communication skills."
                            rows="4"
                            required
                        ></textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="reset" class="btn btn-secondary">
                        Reset Form
                    </button>
                    <button type="submit" class="btn btn-primary" name="submit">
                        Create Job Vacancy
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>