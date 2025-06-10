<?php
    require("../internnavbar.php");
    require("../../dbconn.php");
?>
<?php
    class Internship {
        
        public $jobtitle;
        public $vacancy;
        public $expereince;
        public $expectedstipend;
        public $jobtype;
        public $eligibility;
        public $deadlinedate;

        public function __construct($jt, $vc, $exp, $expectedsal,$jbtype,$elig,$deaddate) {
            $this->jobtitle = $jt;
            $this->vacancy = $vc;
            $this->expereince = $exp;
            $this->expectedstipend = $expectedsal;
            $this->jobtype = $jbtype;
            $this->eligibility = $elig;
            $this->deadlinedate = $deaddate;
        }

    }

    $sql = "SELECT * FROM JOB_VACANCY ORDER BY EXPEREINCE";
    $result = $conn->query($sql);

    $nojob = null;
    $internships = [];

    if($result->num_rows == 0) {
        $nojob = "No Job/Intern Roles available for now. <br> You will be notified here when job vacancies are available";
    }
    else {
        while($row = $result->fetch_assoc()) {
            $internships[] = new Internship($row['JOBTITLE'],$row['VACANCY'],$row['EXPEREINCE'],$row['EXPECTEDSTIPEND'],$row['JOBTYPE'],$row['ELIGIBILITY'],$row['DEADLINEDATE']);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMUL - Intern Dashboard</title>
    <link rel="stylesheet" href="../../styles/apply.css">
    <link rel="icon" href="/INTERNSHIP_PROJECT/assets/amul_logo.png">
</head>
<body>

    <section class="apply-header">
        <h1>Apply for Internship at AMUL</h1>
        <p class="apply-subtext">Find the latest internship openings below and apply for your desired role.</p>
    </section>

    <section class="intern_roles">
        <?php if ($nojob): ?>
            <p class="no-jobs"><?php echo $nojob; ?></p>
        <?php else: ?>
            <?php foreach ($internships as $intern): ?>
                <div class="intern-card">
                    <h2><?php echo $intern->jobtitle; ?></h2>
                    <p><strong>Vacancy:</strong> <?php echo $intern->vacancy; ?></p>
                    <p><strong>Experience Required:</strong> <?php echo $intern->expereince; ?> years</p>
                    <p><strong>Expected Stipend:</strong> ₹<?php echo $intern->expectedstipend; ?></p>
                    <p><strong>Job Type:</strong> <?php echo $intern->jobtype; ?></p>
                    <p><strong>Eligibility:</strong> <?php echo $intern->eligibility; ?></p>
                    <p><strong>Deadline:</strong> <?php echo $intern->deadlinedate; ?></p>
                    <a class="apply-btn" href='./apply_form.php?jobtitle=<?php echo urlencode($intern->jobtitle) ?>' style="text-decoration: none; margin-top:20px;" >Apply Here</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

    
</body>
</html>