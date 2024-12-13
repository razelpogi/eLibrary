<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Library Management System</title>
  <style>
    /* Global Styles */
    body {
      margin: 0;
      padding: 0;
      font-family: 'Helvetica Neue', Arial, sans-serif;
      background: linear-gradient(135deg, #87CEEB, #4CAF50, #FF6347); /* Sky blue, Green, Red */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
      color: #ecf0f1; /* Light text color for contrast */
      position: relative;
      animation: fadeInBackground 2s ease-in-out;
    }

    /* Fade-in background effect */
    @keyframes fadeInBackground {
      0% {
        opacity: 0;
      }
      100% {
        opacity: 1;
      }
    }

    /* Book-like effect container */
    .container {
      position: relative;
      text-align: center;
      max-width: 1000px;
      padding: 50px;
      background-color: rgba(44, 62, 80, 0.7);
      border-radius: 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
      z-index: 1;
      animation: fadeIn 2s ease-in-out, scaleUp 2s ease-in-out, slideUp 2s ease-in-out;
      transform-style: preserve-3d;
      transform: rotateX(-5deg);
    }

    /* Book fold effect */
    .container:before, .container:after {
      content: "";
      position: absolute;
      top: 0;
      width: 50%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.15);
      transform-origin: center;
      transition: transform 1s ease;
    }

    .container:before {
      left: 0;
      transform: rotateY(-30deg);
    }

    .container:after {
      right: 0;
      transform: rotateY(30deg);
    }

    .container:hover:before {
      transform: rotateY(0deg);
    }

    .container:hover:after {
      transform: rotateY(0deg);
    }

    /* Fade-in effect */
    @keyframes fadeIn {
      0% {
        opacity: 0;
      }
      100% {
        opacity: 1;
      }
    }

    /* Scale-up effect for container */
    @keyframes scaleUp {
      0% {
        transform: scale(0.8);
      }
      100% {
        transform: scale(1);
      }
    }

    /* Slide-up effect for container */
    @keyframes slideUp {
      0% {
        transform: translateY(30px);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }

    /* Main heading with transition */
    h1 {
      font-size: 5rem;
      margin-bottom: 20px;
      font-weight: 700;
      text-transform: uppercase;
      text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);
      color: #ffffff;
    }

    /* Subheading */
    p {
      font-size: 1.5rem;
      margin-bottom: 30px;
      letter-spacing: 1px;
      font-weight: 300;
      color: #f0f0f0;
    }

    /* Login button */
    .login-btn {
      background-color: #ff7043;
      color: #ecf0f1;
      font-size: 1.2rem;
      padding: 18px 35px;
      border: none;
      border-radius: 30px;
      cursor: pointer;
      position: absolute;
      top: 20px;
      right: 20px;
      transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease, filter 0.3s ease;
      z-index: 2;
    }

    /* Hover effect */
    .login-btn:hover {
      background-color: #00796b;
      transform: scale(1.05);
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.3);
      filter: brightness(1.2);
    }

    /* Bouncing animation */
    @keyframes bounce {
      0% {
        transform: translateY(0);
      }
      25% {
        transform: translateY(-10px);
      }
      50% {
        transform: translateY(0);
      }
      75% {
        transform: translateY(-5px);
      }
      100% {
        transform: translateY(0);
      }
    }

    /* Add bounce animation to the login button when clicked */
    .bounce {
      animation: bounce 0.5s ease-in-out;
    }

    /* Dropdown menu for login options */
    .dropdown {
      position: absolute;
      top: 70px;
      right: 20px;
      display: none;
      background-color: #34495e;
      color: #ecf0f1;
      border-radius: 10px;
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
      width: 220px;
      z-index: 3;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .dropdown button {
      background: none;
      color: inherit;
      padding: 12px;
      width: 100%;
      text-align: left;
      border: none;
      cursor: pointer;
    }

    .dropdown button:hover {
      background-color: #f39c12;
      transform: translateX(5px);
    }

    .show-dropdown {
      display: block;
      opacity: 1;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>E-Library Management</h1>
    <p>Discover a world of knowledge, just within your reach</p>

    <!-- Login Button -->
    <button class="login-btn" onclick="toggleDropdown(); bounceButton()">Login</button>

    <!-- Dropdown Menu for Login Options -->
    <div class="dropdown" id="loginDropdown">
      <button onclick="window.location.href='login.php'">User Login</button>
      <button onclick="window.location.href='admin_login.php'">Admin Login</button>
      <button onclick="window.location.href='member_login.php'">Member Login</button>
    </div>
  </div>

  <script>
    // Function to toggle dropdown menu visibility
    function toggleDropdown() {
      const dropdown = document.getElementById('loginDropdown');
      dropdown.classList.toggle('show-dropdown');
    }

    // Function to add bounce effect on button click
    function bounceButton() {
      const loginBtn = document.querySelector('.login-btn');
      loginBtn.classList.add('bounce');

      // Remove bounce class after animation completes
      setTimeout(function() {
        loginBtn.classList.remove('bounce');
      }, 500); // Duration of bounce animation
    }

    // Close the dropdown if clicked anywhere outside the dropdown or button
    window.addEventListener('click', function(event) {
      const dropdown = document.getElementById('loginDropdown');
      const loginBtn = document.querySelector('.login-btn');

      if (!dropdown.contains(event.target) && !loginBtn.contains(event.target)) {
        dropdown.classList.remove('show-dropdown');
      }
    });
  </script>
</body>
</html>



