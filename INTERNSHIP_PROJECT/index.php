<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Internship - AMUL (The Taste of India) </title>
    <link rel="icon" href="/INTERNSHIP_PROJECT/assets/amul_logo.png">
    <link rel="stylesheet" href="/INTERNSHIP_PROJECT/styles/index.css">
    <link rel="stylesheet" href="/INTERNSHIP_PROJECT/styles/main.css">
</head>
<body>
     <div class="container">
        <div class="login-wrapper">
            <div class="login-left">
                <div class="login-left-content">
                    <img src="/INTERNSHIP_PROJECT/assets/character.png" alt="Dairy Farm" class="bg-image">
                    <div class="overlay"></div>
                    <div class="login-left-text">
                        <h2>AMUL</h2>
                        <p>The Taste of India</p>
                        <div class="tagline">
                            <p>Join India's Largest Dairy Cooperative</p>
                            <p>Over 3.6 million milk producers across 18,700 villages</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-right">
                <div class="login-header">
                    <img src="/INTERNSHIP_PROJECT/assets/amul_logo_2.svg" alt="Amul Logo" class="logo">
                    <h1>Internship Portal</h1>
                    <p>Log in to your account</p>
                </div>
                
                <form class="login-form" method="POST" action="/INTERNSHIP_PROJECT/backend/loginbackend.php">
                    <div class="user-type-selector">
                        <div class="selector-header">Login as:</div>
                        <div class="selector-options">
                            <label class="user-type">
                                <input type="radio" name="user-type" value="intern">
                                <span class="checkmark"></span>
                                <span class="label-text">Intern</span>
                            </label>
                            <label class="user-type">
                                <input type="radio" name="user-type" value="recruiter">
                                <span class="checkmark"></span>
                                <span class="label-text">Recruiter</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" placeholder="Enter your email" name="email">
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-input-wrapper">
                            <input type="password" id="password" placeholder="Enter your password" name="password">
                        </div>
                    </div>
                    
                    <div class="form-options">
                        <a href="/INTERNSHIP_PROJECT/webpages/forgetpasswordemail.php" class="forgot-password">Forgot password?</a>
                    </div>
                    
                    <button type="submit" class="login-button">
                        <span>Log In</span>
                    </button>
                </form>
                
                <div class="register-option">
                    <p>Don't have an account? <a href="/INTERNSHIP_PROJECT/webpages/signup.php">Register now as Intern</a></p>
                </div>
                
                <div class="footer">
                    <p>&copy; 2025 AMUL - Gujarat Cooperative Milk Marketing Federation Ltd.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>