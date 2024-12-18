<?php
  include "auth.php";
  $visible = json_decode($_COOKIE["user_data"])[3] === 'admin' ? 'block' : 'none';
?>

<div id="mySidenav" class="sidenav">
  <div id="avatar" class="mt-4 mb-2">
    <img src="./backend/uploads/<?php echo json_decode($_COOKIE["user_data"])[2]; ?>" height="100%" width="100%" onclick="redirectHomepage()" />
  </div>
  <center>
    <span>
      <?php
        if ($visible === "block") {
          echo "Admin Panel";
          $issue_type = "Issued";
          $issue_url = "issued.php";
          $display_user_issued = "none";
        } else if (json_decode($_COOKIE["user_data"])[3] === 'member') {
          echo "Member Panel";
          $issue_type = "Reserved";
          $issue_url = "reserved.php";
          $display_user_issued = "block";
        } else {
          echo "User Panel";
          $issue_type = "Reserved";
          $issue_url = "reserved.php";
          $display_user_issued = "block";
        }
      ?>
    </span>
  </center>
  <hr />
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php"> <i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
  <a href="loginout.php" class="d-<?php echo $visible; ?>"> <i class="fa fa-users" aria-hidden="true"></i> Login/out</a>
  <a href="members.php" class="d-<?php echo $visible; ?>"> <i class="fa fa-users" aria-hidden="true"></i> Members</a>
  <a href="users.php" class="d-<?php echo $visible; ?>"> <i class="fa fa-users" aria-hidden="true"></i> Users</a>
  <a href="books.php"> <i class="fa fa-book" aria-hidden="true"></i> Books</a>
  <a href="<?php echo $issue_url; ?>"> <i class="fa fa-rocket" aria-hidden="true"></i> <?php echo $issue_type; ?></a>
  <a href="reserved.php" class="d-<?php echo $visible; ?>"> <i class="fa fa-book" aria-hidden="true"></i> Reserved Books</a>
  <a href="user_issued_books.php" class="d-<?php echo $display_user_issued; ?>"> <i class="fa fa-undo" aria-hidden="true"></i> Issued Book</a>
  <a href="returned.php" class="d-<?php echo $visible; ?>"> <i class="fa fa-undo" aria-hidden="true"></i> Returned</a>
  <a href="delay.php" class="d-<?php echo $visible; ?>"> <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Not Returned</a>
  <a href="setting.php"> <i class="fa fa-cogs" aria-hidden="true"></i> Setting</a>
</div>

<!-- Navbar -->
<div class="fixed-top" id="navbar">
  <div id="rightNav">
    <i onclick="openNav()" class="fa fa-bars" aria-hidden="true"></i>
    <img src="./img/logo.png" onclick="redirectHomepage()" />
  </div>
  <div id="leftNav">
    <?php
      if (json_decode($_COOKIE["user_data"])[3] === "admin") {
    ?>
      <!-- Removed the 'Add new book' icon -->
    <?php } ?>
    <img id="avatar" src="./backend/uploads/<?php echo json_decode($_COOKIE["user_data"])[2]; ?>" height="100%" width="100%" onclick="showProfile_nav()" draggable="false" />
  </div>
</div>

<script>
  // Function to open the side navigation
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px"; // Set width of the sidenav
    document.getElementById("content").style.marginLeft = "250px"; // Shift content to the right
    document.getElementById("content").style.zIndex = "1"; // Ensure the content is covered behind the sidenav
    document.getElementById("navbar").classList.add('hide-elements'); // Hide the logo and menu
  }

  // Function to close the side navigation
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0"; // Close the sidenav by setting width to 0
    document.getElementById("content").style.marginLeft = "0"; // Reset content margin
    document.getElementById("content").style.zIndex = "0"; // Reset the z-index to make content visible
    document.getElementById("navbar").classList.remove('hide-elements'); // Show the logo and menu
  }

  // Function to redirect to the homepage
  function redirectHomepage() {
    location.assign("http://localhost/elibrary/");
  }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../eLibrary/img/title_logo.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Logbook</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/navbar.css">
  <link rel="stylesheet" href="./css/issued.css">
  <link rel="stylesheet" href="./css/index.css">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    .header {
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      text-align: center;
      margin-top: 0;
    }

    .form-container {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .table-container {
      margin-top: 20px;
      overflow-x: auto;
    }

    .footer {
      background-color: #343a40;
      color: white;
      text-align: center;
      padding: 10px;
    }

    .search-input {
      margin-bottom: 15px;
    }

    #content {
      transition: margin-left 0.3s ease;
      margin-left: 0;
      z-index: 0;
    }

    #navbar {
      box-shadow: none;
      border: none;
      background-color: transparent;
    }

    #navbar.hide-elements #rightNav {
      display: none;
    }

    #navbar.hide-elements #leftNav {
      display: none;
    }

    #mySidenav {
      position: fixed;
      z-index: 1000;
    }
  </style>
</head>
<body>

  <!-- Main Content -->
  <div id="content">
    <div class="header">
      <h1>Library Logbook</h1>
      <p>Manage Library Attendance</p>
    </div>

    <div class="container mt-4">
      <div class="row">
        <div class="col-md-4">
          <div class="form-container">
            <h4 class="text-center mb-4">Insert a New Log</h4>
            <form action="#" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" required>
              </div>
              <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" required>
              </div>
              <div class="mb-3">
                <label for="time_in" class="form-label">Time In</label>
                <input type="time" class="form-control" id="time_in" required>
              </div>
              <div class="mb-3">
                <label for="time_out" class="form-label">Time Out</label>
                <input type="time" class="form-control" id="time_out" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
          </div>
        </div>

        <div class="col-md-8">
          <h4 class="mb-3">Log Entries</h4>
          <input type="text" id="search" class="form-control search-input" placeholder="Search by name, email, or date..." onkeyup="searchLogs()">

          <div class="table-container">
            <table class="table table-striped" id="logTable">
              <thead class="table-dark">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Rocella Condiman</td>
                  <td>rocellacondiman@gmail.com</td>
                  <td>2024-12-18</td>
                  <td>8:00 AM</td>
                  <td>12:00 PM</td>
                  <td>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jamal</td>
                  <td>camonirazel01@gmail.com</td>
                  <td>2022-12-18</td>
                  <td>9:15 AM</td>
                  <td>1:30 PM</td>
                  <td>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Mika</td>
                  <td>mikaela@gmail.com</td>
                  <td>2023-12-18</td>
                  <td>10:30 AM</td>
                  <td>3:00 PM</td>
                  <td>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

 

  <script>
    // Function to search logs dynamically
    function searchLogs() {
      var input = document.getElementById('search');
      var filter = input.value.toUpperCase();
      var table = document.getElementById('logTable');
      var rows = table.getElementsByTagName('tr');

      for (var i = 1; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName('td');
        var match = false;

        for (var j = 1; j < cells.length - 1; j++) { // Skip the action column
          if (cells[j].textContent.toUpperCase().indexOf(filter) > -1) {
            match = true;
            break;
          }
        }

        rows[i].style.display = match ? '' : 'none';
      }
    }
  </script>
</body>
</html>

