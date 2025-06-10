<?php
  session_start();
  $name = $_SESSION["NAME"];
  $email = $_SESSION["EMAIL"];
  $usertype = $_SESSION["USERTYPE"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" href="/INTERNSHIP_PROJECT/assets/amul_logo.png">
  <style>
    :root {
      --red-primary: red;
      --red-dark: red;
      --red-light: #ef9a9a;
      --white: #ffffff;
      --gray-light: #fafafa;
      --transition-speed: 0.3s;
      --navbar-height: 90px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--gray-light);
      color: var(--red-dark);
    }

    /* NAVBAR */
    .navbar {
      background-color: var(--white);
      box-shadow: 0 2px 8px rgba(179, 28, 28, 0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .navbar-container {
      max-width: 12500px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 1.5rem;
      height: var(--navbar-height);
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .navbar-brand img {
      width: 60px;
      height: 60px;
      border-radius: 6px;
      border: 2px solid black;
      padding: 2px;
    }

    .brand-title {
      font-size: 1.4rem;
      font-weight: bold;
      color: red;
      white-space: nowrap;
    }

    .navbar-nav {
      display: flex;
      align-items: center;
      gap: 1.5rem;
      list-style: none;
    }

    .nav-link {
      text-decoration: none;
      padding: 0.55rem 0.9rem;
      font-weight: 600;
      color: var(--red-primary);
      border-radius: 6px;
      transition: all var(--transition-speed);
    }

    .nav-link:hover,
    .nav-link.active {
      background-color: var(--red-primary);
      color: var(--white);
    }

    .nav-link.logout {
      border: 2px solid var(--red-primary);
      padding: 0.5rem 1rem;
      font-weight: 700;
    }

    .nav-link.logout:hover {
      background-color: var(--red-dark);
      color: var(--white);
    }

    .notification-item {
      position: relative;
    }

    /* HAMBURGER */
    .menu-toggle {
      display: none;
      flex-direction: column;
      justify-content: space-between;
      width: 25px;
      height: 20px;
      cursor: pointer;
      line-height: 20px;
    }

    .menu-toggle span {
      height: 3px;
      background-color: var(--red-primary);
      border-radius: 2px;
      transition: 0.3s ease;
    }

    .menu-toggle.active span:nth-child(1) {
      transform: rotate(45deg) translate(5px, 5px);
    }

    .menu-toggle.active span:nth-child(2) {
      opacity: 0;
    }

    .menu-toggle.active span:nth-child(3) {
      transform: rotate(-45deg) translate(5px, -5px);
    }

    @media (max-width: 1280px) {
      .menu-toggle {
        display: flex;
      }

      img {
        display: none;
      }

      
      .name {
        display: none;
      }

      .navbar-nav {
        position: fixed;
        top: var(--navbar-height);
        left: 0;
        width: 100%;
        height: calc(100vh - var(--navbar-height));
        background-color: var(--white);
        flex-direction: column;
        align-items: flex-start;
        padding-top: 2rem;
        padding-left: 1.5rem;
        gap: 2.5rem;
        transform: translateX(-100%);
        transition: transform 0.3s ease-in-out;
        z-index: 999;
      }

      .navbar-nav.active {
        transform: translateX(0);
      }

      .nav-link,
      .nav-link.logout {
        width: 90%;
        padding: 1rem;
        font-size: 1.1rem;
      }

      .nav-link.logout {
        text-align: center;
        margin-top: 1rem;
      }

      @media (max-width: 1150px) {
        .menu-toggle {
            display: flex;
        }


        .navbar-nav {
            position: fixed;
            top: var(--navbar-height);
            left: 0;
            width: 100%;
            height: calc(100vh - var(--navbar-height));
            background-color: var(--white);
            flex-direction: column;
            align-items: stretch;  /* Make nav items fill width */
            padding-top: 2rem;
            padding-left: 0;       /* Remove left padding for better alignment */
            gap: 1rem;
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            z-index: 999;
        }

        .navbar-nav.active {
            transform: translateX(0);
        }

        .navbar-nav li {
            width: 100%;           /* Full width for each item */
        }

        .nav-link,
        .nav-link.logout {
            display: block;        /* Make links block to fill li */
            width: 100%;
            padding: 1rem 1.5rem;  /* Adequate padding */
            font-size: 1.1rem;
            box-sizing: border-box;
        }

        .nav-link.logout {
            text-align: center;
            margin-top: 1rem;
        }

    }

    }
  </style>
</head>
<body>

<?php
$current_page = strtolower(basename($_SERVER['PHP_SELF'], '.php'));
?>

<nav class="navbar">
  <div class="navbar-container">
    <div class="navbar-brand">
      <img src="/INTERNSHIP_PROJECT/assets/amul_logo_3.png" alt="Logo" style="width: 67px; height: 67px;">
      <span class="brand-title">Recruiter Portal</span>
    </div>

    <div class="menu-toggle" onclick="toggleMenu()">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <ul class="navbar-nav" id="navMenu">
      <li><a href="/INTERNSHIP_PROJECT/webpages/recruiter/dashboard.php" class="nav-link <?= $current_page == 'dashboard' ? 'active' : '' ?>">Dashboard</a></li>
      <li><a href="/INTERNSHIP_PROJECT/webpages/recruiter/managejobvacancy.php" class="nav-link <?= $current_page == 'managejobvacancy' ? 'active' : '' ?>">Manage Job Vacancy</a></li>
      <li><a href="/INTERNSHIP_PROJECT/webpages/recruiter/manageapplication.php" class="nav-link <?= $current_page == 'manageapplication' ? 'active' : '' ?>">Manage Applications</a></li>
      <li><a href="/INTERNSHIP_PROJECT/webpages/recruiter/logout.php" class="nav-link logout <?= $current_page == 'logout' ? 'active' : '' ?>">Logout</a></li>
      <a href="/INTERNSHIP_PROJECT/webpages/recruiter/dashboard.php" class="name" style="color: red;"> <?php echo $name ?> </a>
    </ul>
  </div>
</nav>

<script>
  function toggleMenu() {
    const menu = document.getElementById("navMenu");
    const toggle = document.querySelector(".menu-toggle");
    menu.classList.toggle("active");
    toggle.classList.toggle("active");
  }
</script>

</body>
</html>