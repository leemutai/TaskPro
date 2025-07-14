<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <input type="checkbox" id="checkbox" />
    <header class="header">
      <h2 class="u-name">
        SIDE <b>BAR</b>
        <label for="checkbox">
          <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
        </label>
      </h2>
      <i class="fa-solid fa-bell"></i>
    </header>

    <div class="body">
      <nav class="side-bar">
        <div class="user-p">
          <img src="img/user.jpg" alt="" />
          <h4>@user</h4>
        </div>
        
         <?php 
          session_start();
         $user = "admin";  
         if ($user == "employee") {
          # code...
         
         ?>
         <!-- User Navigation Bar -->
        <ul>
          <li>
            <a href="#">
              <i class="fa fa-tachometer" aria-hidden="true"></i>
              <span>Dashboard</span>
            </a>
          </li>

          <li>
            <a href="#">
              <i class="fa fa-tasks" aria-hidden="true"></i>
              <span>My Task</span>
            </a>
          </li>

          <li>
            <a href="#">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>Profile</span>
            </a>
          </li>

          <li>
            <a href="#">
              <i class="fa fa-bell" aria-hidden="true"></i>
              <span>Notifications</span>
            </a>
          </li>

          <li>
            <a href="#">
              <i class="fa fa-sign-out" aria-hidden="true"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
        <?php } else { ?>
        <!-- Admin Navigation Bar -->
         <ul>
          <li>
            <a href="#">
              <i class="fa fa-tachometer" aria-hidden="true"></i>
              <span>Dashboard</span>
            </a>
          </li>

          <li>
            <a href="#">
              <i class="fa fa-users" aria-hidden="true"></i>
              <span>Manage Users</span>
            </a>
          </li>

          <li>
            <a href="#">
              <i class="fa fa-plus" aria-hidden="true"></i>
              <span>Create Tasks</span>
            </a>
          </li>

          <li>
            <a href="#">
              <i class="fa fa-tasks" aria-hidden="true"></i>
              <span>All Tasks</span>
            </a>
          </li>

          <li>
            <a href="#">
              <i class="fa fa-bell" aria-hidden="true"></i>
              <span>Notifications</span>
            </a>
          </li>

          <li>
            <a href="#">
              <i class="fa fa-sign-out" aria-hidden="true"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
          <?php } ?>
      </nav>
      <section class="section-1">
        
      </section>
    </div>
  </body>
</html>
