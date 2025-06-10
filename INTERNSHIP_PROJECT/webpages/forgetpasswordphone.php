<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forgot Password - Amul Dairy</title>
  <link rel="icon" href="/INTERNSHIP_PROJECT/assets/amul_logo.png">
    <style>
        :root {
            --amul-red: #DA291C;
            --amul-blue: #0066B3;
            --amul-blue-light: #4a99e9;
            --amul-white: #FFFFFF;
            --neutral-50: #F9FAFB;
            --neutral-100: #F3F4F6;
            --neutral-200: #E5E7EB;
            --neutral-300: #D1D5DB;
            --neutral-400: #9CA3AF;
            --neutral-500: #6B7280;
            --neutral-600: #4B5563;
            --neutral-700: #374151;
            --neutral-800: #1F2937;
            --neutral-900: #111827;
            
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            
            --border-radius: 0.375rem;
            --border-radius-lg: 0.75rem;
            
            --font-family: 'Poppins', sans-serif;
            
            --spacing-1: 0.25rem;
            --spacing-2: 0.5rem;
            --spacing-3: 0.75rem;
            --spacing-4: 1rem;
            --spacing-5: 1.25rem;
            --spacing-6: 1.5rem;
            --spacing-8: 2rem;
            
            --transition-fast: 150ms;
            --transition-normal: 300ms;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-family);
            background-color: var(--neutral-100);
            color: var(--neutral-800);
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: var(--spacing-4);
        }

        .form-box {
            width: 100%;
            max-width: 500px;
            background-color: var(--amul-white);
            padding: var(--spacing-8);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-lg);
            transition: transform var(--transition-normal) ease;
        }

        .form-box:hover {
            transform: translateY(-2px);
        }

        .form-box h2 {
            text-align: center;
            margin-bottom: var(--spacing-8);
            color: var(--neutral-900);
            font-size: 1.75rem;
            font-weight: 600;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-5);
        }

        .selector-options {
            display: flex;
            gap: var(--spacing-4);
            margin-bottom: var(--spacing-6);
        }

        .user-type {
            display: flex;
            align-items: center;
            position: relative;
            cursor: pointer;
            flex: 1;
            padding: var(--spacing-4);
            background-color: var(--neutral-50);
            border: 2px solid var(--neutral-200);
            border-radius: var(--border-radius);
            transition: all var(--transition-normal) ease;
        }

        .user-type:hover {
            background-color: var(--neutral-100);
        }

        .user-type input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .user-type input:checked ~ .checkmark {
            background-color: var(--amul-red);
            border-color: var(--amul-red);
        }

        .user-type input:checked ~ .checkmark:after {
            display: block;
        }

        .user-type input:checked ~ .label-text {
            color: var(--neutral-900);
            font-weight: 500;
        }

        .checkmark {
            position: relative;
            height: 20px;
            width: 20px;
            background-color: var(--amul-white);
            border: 2px solid var(--neutral-400);
            border-radius: 50%;
            margin-right: var(--spacing-3);
            flex-shrink: 0;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
            top: 5px;
            left: 5px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--amul-white);
        }

        .label-text {
            color: var(--neutral-700);
            font-size: 1rem;
            transition: color var(--transition-fast) ease;
        }

        label {
            display: block;
            margin-bottom: var(--spacing-2);
            font-weight: 500;
            color: var(--neutral-700);
            font-size: 1rem;
        }

        input[type="email"], input[type="text"] {
            width: 100%;
            padding: var(--spacing-3) var(--spacing-4);
            font-size: 1rem;
            border: 1px solid var(--neutral-300);
            border-radius: var(--border-radius);
            transition: border-color var(--transition-fast) ease, box-shadow var(--transition-fast) ease;
        }

        input[type="email"]:focus, input[type="text"]:focus {
            outline: none;
            border-color: var(--amul-blue);
            box-shadow: 0 0 0 3px rgba(0, 102, 179, 0.2);
        }

        button[type="submit"] {
            width: 100%;
            padding: var(--spacing-3) var(--spacing-4);
            font-size: 1rem;
            font-weight: 500;
            background-color: var(--amul-red);
            color: var(--amul-white);
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: background-color var(--transition-fast) ease, transform var(--transition-fast) ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--spacing-2);
        }

        button[type="submit"]:hover {
            background-color: #b9231b;
        }

        button[type="submit"]:active {
            transform: scale(0.98);
        }

        .alternative {
            margin-top: var(--spacing-6);
            text-align: center;
            padding: var(--spacing-4);
            background-color: var(--neutral-50);
            border-radius: var(--border-radius);
            border: 1px solid var(--neutral-200);
        }

        .alternative a {
            color: var(--amul-blue);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: color var(--transition-fast) ease;
        }

        .alternative a:hover {
            color: var(--amul-blue-light);
        }

        @media (max-width: 767px) {
            .form-box {
                padding: var(--spacing-6);
                margin: var(--spacing-4);
            }
            
            .selector-options {
                flex-direction: column;
                gap: var(--spacing-3);
            }
            
            .form-box h2 {
                font-size: 1.5rem;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-box {
            animation: fadeIn var(--transition-normal) ease;
        }
    </style>
</head>
<body>

<div class="form-box">
    <h2>Forgot Password</h2>
    <form action="../backend/forgetphone.php" method="POST">
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
        <label for="phone">Enter your registered email </label>
        <input type="text" name="phone" id="phone" placeholder="registered phone number" />
        <button type="submit">Send OTP</button>
    </form>
    <div class="alternative">
        <a href="./forgetpasswordphone.php">Verify with Email instead</a>
    </div>
</div>

</body>
</html>