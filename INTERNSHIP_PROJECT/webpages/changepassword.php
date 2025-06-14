<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Reset Password</title>
<link rel="icon" href="/INTERNSHIP_PROJECT/assets/amul_logo.png">
<style>
  :root {
    --amul-red: #DA291C;
    --white: #fff;
    --gray-light: #f8f8f8;
    --gray-dark: #333;
    --red-hover: #b2241b;
  }

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

  .password-container {
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
    margin-bottom: 2rem;
    font-weight: 700;
    letter-spacing: 1px;
  }

  label {
    display: block;
    text-align: left;
    font-weight: 600;
    color: var(--amul-red);
    margin-bottom: 0.6rem;
    font-size: 1.1rem;
  }

  input[type="password"] {
    width: 100%;
    padding: 14px 15px;
    font-size: 1.4rem;
    border: 2px solid var(--amul-red);
    border-radius: 8px;
    color: var(--gray-dark);
    font-weight: 600;
    box-sizing: border-box;
    margin-bottom: 1.6rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }

  input[type="password"]:focus {
    border-color: var(--red-hover);
    outline: none;
    box-shadow: 0 0 8px var(--red-hover);
  }

  button {
    margin-top: 0.5rem;
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
    background-color: var(--red-hover);
  }

  /* Responsive tweaks */
  @media (max-width: 480px) {
    h2 {
      font-size: 1.8rem;
    }
    input[type="password"] {
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

<div class="password-container">
  <h2>Reset Password</h2>
    <form method="POST" autocomplete="off" action="/INTERNSHIP_PROJECT/backend/changepassworduser.php">

    <label for="new-password">New Password</label>
    <input type="password" id="new-password" name="new_password" placeholder="Enter new password" required />

    <label for="confirm-password">Confirm Password</label>
    <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm new password" required />

    <button type="submit">Reset Password</button>
  </form>
</div>

</body>
</html>
