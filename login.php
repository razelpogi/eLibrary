<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../eLibrary/img/title_logo.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/login.css">
  <title>eLibrary / Login</title>
  <style>
    body {
      background-image: url('./img/background.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
    }

    /* Back button styling */
    .back_button {
      position: absolute;
      top: 10px;
      left: 10px;
      background-color: #007BFF;
      color: white;
      padding: 10px 15px;
      text-decoration: none;
      font-size: 14px;
      border-radius: 5px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .back_button:hover {
      background-color: #0056b3;
    }

    /* Form container styling */
    .form_container {
      background: #ffffff;
      padding: 30px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      max-width: 400px;
      width: 100%;
      text-align: center;
      border: 1px solid #ddd;
    }

    #login_btn {
      width: 90%;
      padding: 10px;
      font-size: 16px;
      background-color: #007BFF;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin: -10px;
    }

    #login_btn:hover {
      background-color: #0056b3;
    }

    .multicolour {
      text-align: center;
      font-size: 2.5em;
      background: linear-gradient(to right, blue, indigo, orange, red, yellow, green, skyblue);
      -webkit-background-clip: text;
      color: transparent;
      margin-bottom: 1px;
    }

    .form_container form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .link_container {
      display: flex;
      justify-content: space-between;
      width: 80%;
      margin-top: -10px;
    }

  </style>
</head>

<body>
  <!-- Back Button -->
  <a href="landing.php" class="back_button">&larr; Back</a>

  <!-- Main Container -->
  <div class="container">
    <!-- Form Container -->
    <div class="form_container">
      <!-- Multicolour Gradient Title inside the Form Container -->
      <div class="multicolour">
        E-Library User <br> Login
      </div>
      <form action="./backend/login.php" method="post">
        <div class="email_cont">
          <i class="fa fa-envelope-o"></i>
          <input type="email" name="email" class="form-control" placeholder="Enter email or phone number" required>
        </div><br />
        <div class="email_cont">
          <i class="fa fa-eye"></i>
          <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div><br /><br />
        <input type="submit" name="btn" value="Login" id="login_btn" /><br /><br />
        <center>
          <a href="http://localhost/elibrary/createAccount.php">New to the site ?</a>
        </center>
      </form>
    </div>
  </div>

  <!-- JS CDN -->
  <script src="https://use.fontawesome.com/8af7dff76b.js"></script>
</body>

</html>

