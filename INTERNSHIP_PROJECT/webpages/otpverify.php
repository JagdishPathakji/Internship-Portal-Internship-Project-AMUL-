<?php
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $userOtp = $_POST['otp_input'];
      $actualOtp = $_SESSION['otp'] ?? null;

      if($actualOtp && $userOtp == $actualOtp) {
        echo "<script> alert('OTP Verified successfully'); </script>";
        echo "<script> window.location.href = './changepassword.php'; </script>";
        exit();
      }
      else {
        echo "<script> alert('OTP does not matches'); </script>";
        echo "<script> window.location.href = 'otpverify.php'; </script>";
        exit();
      }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Verify OTP</title>
  <link rel="icon" href="/INTERNSHIP_PROJECT/assets/amul_logo.png">

<style>
  :root {
    --amul-red: #DA291C;
    --white: #fff;
    --gray-light: #f8f8f8;
    --gray-dark: #333;
  }

  /* Reset and basics */
  * {
    box-sizing: border-box;
  }

  body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: var(--gray-light);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
  }

  .otp-container {
    background-color: var(--white);
    padding: 2.5rem 2rem;
    border-radius: 12px;
    width: 100%;
    max-width: 400px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    text-align: center;
  }

  h2 {
    color: var(--amul-red);
    font-size: 2.2rem;
    margin-bottom: 1.8rem;
    font-weight: 700;
    letter-spacing: 1px;
  }

  input[type="text"] {
    width: 100%;
    padding: 14px 15px;
    font-size: 1.4rem;
    border: 2px solid var(--amul-red);
    border-radius: 8px;
    color: var(--gray-dark);
    font-weight: 600;
    text-align: center;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }

  input[type="text"]:focus {
    border-color: #b2241b;
    outline: none;
    box-shadow: 0 0 8px #b2241b;
  }

  button {
    margin-top: 2rem;
    width: 100%;
    padding: 14px 0;
    font-size: 1.6rem;
    font-weight: 700;
    background-color: var(--amul-red);
    color: var(--white);
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  button:hover {
    background-color: #b2241b;
  }

  /* Responsive tweaks */
  @media (max-width: 480px) {
    h2 {
      font-size: 1.8rem;
    }
    input[type="text"] {
      font-size: 1.2rem;
      padding: 12px 12px;
    }
    button {
      font-size: 1.4rem;
      padding: 12px 0;
    }
  }
</style>
</head>
<body>

<div class="otp-container">
  <h2>Verify OTP</h2>
  <form method="POST" autocomplete="off">
    <input type="text" name="otp_input" placeholder="Enter OTP" maxlength="6" required />
    <button type="submit">Verify</button>
  </form>
</div>

</body>
</html>
