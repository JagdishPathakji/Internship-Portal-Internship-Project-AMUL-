<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMUL - Internship Portal Signup</title>
    <link rel="stylesheet" href="/INTERNSHIP_PROJECT/styles/main.css">
    <link rel="stylesheet" href="/INTERNSHIP_PROJECT/styles/signup.css">
    <link rel="icon" href="/INTERNSHIP_PROJECT/assets/amul_logo.png">
    <title> Internship - AMUL (The Taste of India) </title>
</head>
<body>
    <div class="container">
        <div class="signup-wrapper">
            <div class="signup-left">
                <div class="signup-left-content">
                    <img src="/INTERNSHIP_PROJECT/assets/character.png" class="bg-image">
                    <div class="overlay"></div>
                    <div class="signup-left-text">
                        <h2>AMUL</h2>
                        <p>The Taste of India</p>
                        <div class="tagline">
                            <p>Begin Your Journey with India's Dairy Giant</p>
                            <p>Creating opportunities across the nation</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="signup-right">
                <div class="signup-header">
                    <img src="/INTERNSHIP_PROJECT/assets/amul_logo_2.svg" alt="Amul Logo" class="logo">
                    <h1>Create Account</h1>
                    <p>Join the Amul Internship Program</p>
                </div>
                
                <form class="signup-form" action="../backend/signupbackend.php" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" id="firstname" placeholder="Enter first name" name="firstname">
                        </div>
                        
                        <div class="form-group">
                            <label for="middlename">Middle Name</label>
                            <input type="text" id="middlename" placeholder="Enter middle name" name="middlename">
                        </div>
                        
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" id="lastname" placeholder="Enter last name" name="lastname">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" placeholder="Enter your email" name="email">
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" placeholder="Enter phone number" name="phone">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="text" id="dob" name="dob" placeholder="DD/MM/YYYY">
                        </div>
                        
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" id="age" placeholder="Enter age" name="age">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="city">City</label>    
                            <input type="text" id="city" placeholder="Enter city" name="city">
                        </div>
                        
                        <div class="form-group">
                            <label for="state">State</label>    
                            <input type="text" id="state" placeholder="Enter state" name="state">
                        </div>
                    </div>
                    
                    <div class="user-type-selector">
                        <div>Gender</div>
                        <div class="selector-options">
                            <label class="user-type">
                                <input type="radio" name="gender" value="male">
                                <span class="checkmark"></span>
                                <span class="label-text">Male</span>
                            </label>
                            <label class="user-type">
                                <input type="radio" name="gender" value="female">
                                <span class="checkmark"></span>
                                <span class="label-text">Female</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-input-wrapper">
                            <input type="password" id="password" placeholder="Create password" name="password">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <div class="password-input-wrapper">
                            <input type="password" id="confirm-password" placeholder="Confirm password" name="confirmpassword">
                        </div>
                    </div>
                    
                    <button type="submit" class="signup-button">
                        <span>Create Account</span>
                    </button>
                </form>
                
                <div class="login-option">
                    <p>Already have an account? <a href="/INTERNSHIP_PROJECT/index.php">Log in</a></p>
                </div>
                
                <div class="footer">
                    <p>&copy; 2025 AMUL - Gujarat Cooperative Milk Marketing Federation Ltd.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>