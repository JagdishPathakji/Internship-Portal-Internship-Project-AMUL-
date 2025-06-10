<?php
    session_start();
    require("../dbconn.php");
    require("../webpages/recruiternavbar.php");
    
    if(isset($_GET["jobtitle"])) {
        $jobtitle = urldecode($_GET["jobtitle"]);
        $_SESSION["jobtitle"] = $jobtitle;
    }

    if(!isset($_POST["submit"])) {
        
        $sql = "SELECT * FROM JOB_VACANCY WHERE JOBTITLE = '$jobtitle'";
        $result = $conn->query($sql);
    
        if($result->num_rows == 0) {
            echo "<script> alert('No such job vacancy exists in the database'); </script>";
            echo "<script> window.location.href = '../webpages/recruiter/managejobvacancy.php'; </script>";
            exit();
        }
    
        $row = $result->fetch_assoc();
        $vacancy = $row["VACANCY"];
        $expreq = $row["EXPEREINCE"];
        $stipend = $row["EXPECTEDSTIPEND"];
        $jobtype = $row["JOBTYPE"];
        $elig = $row["ELIGIBILITY"];
        $date = $row["DEADLINEDATE"];
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
                    <h1>Edit Information for  Job Vacancy</h1>
                </div>
                <p>Job Title : <?php echo $jobtitle ?></p>
            </div>

            <form class="job-form" id="jobForm" action="edit.php" method="POST">
                <div class="form-grid">
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
                            value="<?php echo $vacancy ?>"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="experience" class="form-label">
                            Experience Required <span class="required">*</span>
                        </label>
                        <select id="experience" name="experience" class="form-select" required>
                            <option value="">Select Experience Level</option>
                            <option value="0" <?php if($expreq == 0) echo "selected" ?> >Fresher (0 years)</option>
                            <option value="1"  <?php if($expreq == 1) echo "selected" ?>>1 years</option>
                            <option value="2"  <?php if($expreq == 2) echo "selected" ?>>2 years</option>
                            <option value="3"  <?php if($expreq == 3) echo "selected" ?>>3 years</option>
                            <option value="4"  <?php if($expreq == 4) echo "selected" ?>>4 years</option>
                            <option value="5"  <?php if($expreq >= 5) echo "selected" ?>>5 or 5+ years</option>
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
                            value="<?php echo $stipend ?>"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="jobType" class="form-label">
                            Job Type <span class="required">*</span>
                        </label>
                        <select id="jobType" name="jobtype" class="form-select" required>
                            <option value="">Select Job Type</option>
                            <option value="full-time" <?php if($jobtype === "full-time") echo "selected" ?>>Full Time</option>
                            <option value="part-time" <?php if($jobtype === "part-time") echo "selected" ?>>Part Time</option>
                            <option value="internship" <?php if($jobtype === "internship") echo "selected" ?>>Internship</option>
                            <option value="contract" <?php if($jobtype === "contract") echo "selected" ?>>Contract</option>
                            <option value="remote" <?php if($jobtype === "remote") echo "selected" ?>>Remote</option>
                            <option value="hybrid" <?php if($jobtype === "hybrid") echo "selected" ?>>Hybrid</option>
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
                            value="<?php echo $date ?>"
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
                            value="<?php echo $elig ?>"
                            required
                        ></textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="reset" class="btn btn-secondary">
                        Reset Form
                    </button>
                    <button type="submit" class="btn btn-primary" name="submit">
                        Confirm Edit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php

        if(isset($_POST["submit"])) {

            $jobtitle = $_SESSION["jobtitle"];
            $vacancies = $_POST["vacancy"];
            $expreq = $_POST["experience"];
            $stipend =  $_POST["stipend"];
            $jobtype =  $_POST["jobtype"];  
            $deadline = $_POST["deadline"];
            $eligibility = $_POST["eligibility"];

            $sql = "UPDATE JOB_VACANCY SET VACANCY = '$vacancies', EXPEREINCE = '$expreq', EXPECTEDSTIPEND = '$stipend', JOBTYPE = '$jobtype', DEADLINEDATE = '$deadline', ELIGIBILITY = '$eligibility' WHERE JOBTITLE = '$jobtitle';";

            $result = $conn->query($sql);
            if($result === TRUE) {
                echo "<script> alert('Data Edited successfully'); </script>";
                echo "<script> window.location.href = '../webpages/recruiter/managejobvacancy.php'; </script>";
                exit();
            }
            else {
                echo "<script> alert('Failed to edit the job vacancy data'); </script>";
                echo "<script> window.location.href = '../webpages/recruiter/managejobvacancy.php'; </script>";
                exit();        
            }

        }

    ?>

</body>
</html>