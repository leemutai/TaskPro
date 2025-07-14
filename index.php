<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['role'];
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <input type="checkbox" id="checkbox" />
  <header class="header">
    <h2 class="u-name">
      TASK <b>PRO</b>
      <label for="checkbox">
        <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
      </label>
    </h2>
    <i class="fa-solid fa-bell"></i>
  </header>

  <div class="body">
    <nav class="side-bar">
      <div class="user-p">
        <img src="img/user.jpg" alt="user" />
        <h4>@<?= htmlspecialchars($username) ?></h4>
      </div>

      <?php if ($user == "employee") { ?>
        <!-- Employee Navigation -->
        <ul>
          <li><a href="#"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
          <li><a href="#"><i class="fa fa-tasks"></i><span>My Task</span></a></li>
          <li><a href="#"><i class="fa fa-user"></i><span>Profile</span></a></li>
          <li><a href="#"><i class="fa fa-bell"></i><span>Notifications</span></a></li>
          <li><a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
        </ul>
      <?php } else { ?>
        <!-- Admin Navigation -->
        <ul>
          <li><a href="#"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
          <li><a href="#"><i class="fa fa-users"></i><span>Manage Users</span></a></li>
          <li><a href="#"><i class="fa fa-plus"></i><span>Create Tasks</span></a></li>
          <li><a href="#"><i class="fa fa-tasks"></i><span>All Tasks</span></a></li>
          <li><a href="#"><i class="fa fa-bell"></i><span>Notifications</span></a></li>
          <li><a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
        </ul>
      <?php } ?>
    </nav>
    <section class="section-1">
      <!-- Main content here -->
    </section>
  </div>
</body>
</html>
