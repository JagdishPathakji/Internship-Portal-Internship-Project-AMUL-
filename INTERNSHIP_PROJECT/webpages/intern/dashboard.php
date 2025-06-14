<?php
    require("../internnavbar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMUL - Intern Dashboard</title>
    <link rel="stylesheet" href="../../styles/dashboard.css">
    <link rel="icon" href="/INTERNSHIP_PROJECT/assets/amul_logo.png">
</head>
<body>

    <p class="dashboard-intro">
        We’re excited to have you at the AMUL Intern Portal. Here, you can explore available internship opportunities and apply in the different roles which are available.
    </p>
    <br>
    <div class="dashboard-features">
        <div class="feature-card">
            <h3>🧾 Apply for Internship</h3>
            <p>Submit your application for open internship roles across various departments at AMUL.</p>
        </div>
        <div class="feature-card">
            <h3>📄 My Applications</h3>
            <p>Track your submitted applications, check interview schedules, and see status updates in real-time.</p>
        </div>
    </div>

    <div class="intern-overview">
        <h2>🧠 About the Internship</h2>
        <p>
            At AMUL, we offer structured internship programs that provide hands-on industrial exposure in departments such as Quality Assurance, Production, IT, Finance, and HR. Gain real-world experience, work with industry professionals, and enhance your technical and interpersonal skills while contributing to one of India's most trusted brands.
        </p>
    </div>
    
    <section class="quick-actions">
        <button class="action-btn apply-btn" onclick="location.href='/INTERNSHIP_PROJECT/webpages/intern/apply.php'">
        Apply for Internship
        </button>
        <button class="action-btn profile-btn" onclick="location.href='/INTERNSHIP_PROJECT/webpages/intern/myapplication.php'">
        My Application
        </button>
    </section>

    <section class="internship-tips">
        <h2>Internship Tips & FAQs</h2>
        <div class="faq-item">
            <h3>How do I apply for an internship?</h3>
            <p>Simply click on the "Apply" menu and fill out the application form with your details and resume.</p>
        </div>
        <div class="faq-item">
            <h3>What documents are required?</h3>
            <p>You need to upload your resume, academic transcripts, and a valid ID proof.</p>
        </div>
        <div class="faq-item">
            <h3>How will I know if I’m selected?</h3>
            <p>Selected candidates will be notified through the notifications section on your dashboard and via email.</p>
        </div>
        <div class="faq-item">
            <h3>Can I apply for multiple internships?</h3>
            <p>Yes, you can apply for multiple internships, but make sure to meet the eligibility criteria for each.</p>
        </div>
    </section>

</body>
</html>
