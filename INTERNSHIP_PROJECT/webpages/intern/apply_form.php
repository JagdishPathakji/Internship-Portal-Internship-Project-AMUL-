<?php
    require("../internnavbar.php");
    require("../../dbconn.php");
    $jobtitle = urldecode($_GET["jobtitle"]);
    $_SESSION["jobtitle"] = $jobtitle;
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amul Internship Application Form</title>
    <link rel="stylesheet" href="../../styles/apply_form.css">
    <link rel="icon" href="/INTERNSHIP_PROJECT/assets/amul_logo.png">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <img src="../../assets/amul_logo_3.png" alt="Amul Dairy" class="header-image">
            <div class="header-content">
                <h1 class="form-title">Amul Internship Application</h1>
                <p class="form-subtitle">Join India's Leading Dairy Cooperative</p>
            </div>
        </div>

        <form class="application-form" id="applicationForm" method="POST" action="../../backend/applicationform.php"  enctype="multipart/form-data">
            <div class="form-section">
                <h2 class="section-title">Personal Information</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName" class="form-label">First Name *</label>
                        <input type="text" id="firstName" name="firstName" class="form-input" required readonly value='<?php echo $_SESSION["FIRSTNAME"] ?>'>
                    </div>
                    
                    <div class="form-group">
                        <label for="middleName" class="form-label">Middle Name</label>
                        <input type="text" id="middleName" name="middleName" class="form-input" required readonly value='<?php echo $_SESSION["MIDDLENAME"] ?>'>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastName" class="form-label">Last Name *</label>
                        <input type="text" id="lastName" name="lastName" class="form-input" required readonly value='<?php echo $_SESSION["LASTNAME"] ?>'>
                    </div>
                </div>

                <div class="form-row">                    
                    <div class="form-group">
                        <label for="age" class="form-label">Age *</label>
                        <input type="number" id="age" name="age" class="form-input" min="18" max="35" required readonly value='<?php echo $_SESSION["AGE"] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="form-label">Gender *</label>
                        <input type="text" id="gender" name="gender" class="form-input" required readonly value='<?php echo $_SESSION["GENDER"] ?>'>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="city" class="form-label">City *</label>
                        <input type="text" id="city" name="city" class="form-input" required readonly value='<?php echo $_SESSION["CITY"] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="state" class="form-label">State *</label>
                        <input type="text" id="state" name="state" class="form-input" required readonly value='<?php echo $_SESSION["STATE"] ?>'>
                    </div>
                </div>

            

                <div class="form-row">
                    <div class="form-group">
                        <label for="phoneNumber" class="form-label">Phone Number *</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" class="form-input" pattern="[0-9]{10}" required readonly value='<?php echo $_SESSION["PHONE"] ?>'>
                        <small class="form-hint">Enter 10-digit mobile number</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address *</label>
                        <input type="email" id="email" name="email" class="form-input" required readonly value='<?php echo $_SESSION["EMAIL"] ?>'>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">Educational Background</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="graduationYear" class="form-label">Graduation Year *</label>
                        <select id="graduationYear" name="graduationYear" class="form-input" required>
                            <option value="">Select Year</option>
                            <option value="2024">2027</option>
                            <option value="2024">2026</option>
                            <option value="2024">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="university" class="form-label">University/College *</label>
                        <input type="text" id="university" name="university" class="form-input" required>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">Professional Details</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="experience" class="form-label">Years of Experience *</label>
                        <select id="experience" name="experience" class="form-input" required>
                            <option value="">Select Experience</option>
                            <option value="0">Fresher (0 years)</option>
                            <option value="1">1 year</option>
                            <option value="2">2 years</option>
                            <option value="3">3 years</option>
                            <option value="4">4 years</option>
                            <option value="5+">5+ years</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">Required Documents</h2>
                
                <div class="form-row">
                    <div class="form-group file-group">
                        <label for="resume" class="form-label">Resume/CV *</label>
                        <div class="file-input-wrapper">
                            <input type="file" id="resume" name="resume" class="file-input" accept=".pdf,.doc,.docx" required>
                            <label for="resume" class="file-label">
                                <span class="file-icon">📄</span>
                                <span class="file-text">Choose Resume File</span>
                            </label>
                        </div>
                        <small class="form-hint">Accepted formats: PDF, DOC, DOCX (Max 5MB)</small>
                    </div>
                    
                    <div class="form-group file-group">
                        <label for="collegeLetter" class="form-label">College Recommendation Letter</label>
                        <div class="file-input-wrapper">
                            <input type="file" id="collegeLetter" name="collegeLetter" class="file-input" accept=".pdf,.doc,.docx" required>
                            <label for="collegeLetter" class="file-label">
                                <span class="file-icon">📋</span>
                                <span class="file-text">Choose Letter File</span>
                            </label>
                        </div>
                        <small class="form-hint">Optional: PDF, DOC, DOCX (Max 5MB)</small>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">Tell Us About Yourself</h2>
                
                <div class="form-group">
                    <label for="motivation" class="form-label">Why do you want to join Amul as an intern? *</label>
                    <textarea id="motivation" name="motivation" class="form-textarea" rows="6" required 
                              placeholder="Describe your motivation, career goals, and what you hope to achieve during this internship at Amul. Share your passion for the dairy industry and how this opportunity aligns with your aspirations."></textarea>
                    <div class="character-count">
                        <span id="charCount">0</span>/500 characters
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="checkbox-group">
                    <input type="checkbox" id="terms" name="terms" class="checkbox-input" required>
                    <label for="terms" class="checkbox-label">
                        I agree to the <a href="#" class="terms-link">Terms and Conditions</a> and confirm that all information provided is accurate and complete.
                    </label>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="submit-btn" name="submit">
                    <span class="btn-text">Submit Application</span>
                    <span class="btn-icon">→</span>
                </button>
            </div>
        </form>
    </div>

    <script>
        document.querySelectorAll(".file-input").forEach(input => {
            input.addEventListener("change", function () {
                const fileName = this.files[0]?.name || "No file chosen";
                this.nextElementSibling.querySelector(".file-text").textContent = fileName;
            });
        });
    </script>

</body>
</html>