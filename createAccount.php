<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <link rel="icon" href="../eLibrary/img/title_logo.png" type="image/x-icon">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js" integrity="sha512-chZc2Mx8B1GzGSNMfJRH63jW7uYZXzX0a/UlWRrTvl4kxxYqUHNMtyTTA5IDQ7gTl4ATLoXlZthsialW3muS0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <link rel="stylesheet" href="./css/createAccount.css">
 <title>Signup</title>
 <style>
  body {
    background-image: url('./img/background.jpg'); /* Replace with the correct path to background.png */
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
</style>

</head>
<body>
 <!-- page logo -->
 <img src="./img/logo.png" onclick="redirectHomepage()" />
 <!-- main container -->
 <div class="container">
  <div class="form pt-3 pb-5 pl-2 pe-4">
   <h5 class="py-2 my-3 mx-2">Signup Form</h5>
   <!-- signup form container -->
   <form id="formData" method="post" action="./backend/createAccount.php" enctype="multipart/form-data" name="form">
    <!-- username input -->
    <div class="mb-3">
     <input type="text" id="username" name="username" class="form-control" placeholder="Enter username" required />
    </div>
    <!-- phone number input -->
    <div class="mb-3">
     <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter phone number" required />
    </div>
    <!-- email input -->
    <div class="mb-3">
     <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required />
    </div>
    <!-- password input -->
    <div class="mb-3">
     <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Enter password" required />
    </div>
    <div class="mb-3">
     <input type="password" id="re_password" name="re_password" class="form-control" placeholder="Reenter password" onkeyup="checkPassword()" required />
    </div>
    <!-- image file input -->
    <div class="mb-3">
     <input type="file" id="file_inp" name="file_inp" class="form-control" required />
    </div>
    <!-- submit button -->
    <center>
     <span class="text-danger" id="error_board"></span><br />
     <input type="submit" name="create_btn" class="btn btn-primary px-5 rounded-0" id="submit_btn" value="Create a new Account"><br />
    </center><br />
    <center>
     <a href="http://localhost/elibrary/login.php" id="redirect_link">Already have an account?</a>
    </center>
   </form>
  </div>
 </div>
</body>
<script>
 // is necessary field valid 
 var isValid = false;

 //disable the button until all form fields are valid
 $("#formData #submit_btn").prop("disabled", true);

 //validate re-password
 function checkPassword() {
  let oldpassword = $("#formData #new_password").val();
  let newpassword = $("#formData #re_password").val();
  if (oldpassword === newpassword) {
   isValid = true;
   $("#formData #error_board").text("");
   $("#formData #submit_btn").prop("disabled", false);
  } else {
   isValid = false;
   $("#formData #error_board").text("Passwords do not match");
   $("#formData #submit_btn").prop("disabled", true);
  }
 }
</script>

</html>