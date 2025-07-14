<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register | TaskPro System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body class="login-body">

<div class="login-container">
  <form method="POST" action="app/register.php" class="p-4 shadow rounded bg-white">
  <h2 class="mb-4 text-center text-success">Register</h2>

  <?php if (isset($_GET['error'])) { ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
  <?php } ?>
  <?php if (isset($_GET['success'])) { ?>
    <div class="alert alert-success"><?php echo htmlspecialchars($_GET['success']); ?></div>
  <?php } ?>

  <div class="mb-3">
    <label for="full_name" class="form-label">Full Name</label>
    <input type="text" class="form-control" name="full_name" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" required>
  </div>
  <div class="mb-3">
    <label for="user_name" class="form-label">Username</label>
    <input type="text" class="form-control" name="user_name" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" required>
  </div>
  <div class="mb-3">
    <label for="role" class="form-label">Role</label>
    <select class="form-control" name="role" required>
      <option value="">Select Role</option>
      <option value="admin">Admin</option>
      <option value="employee">Employee</option>
    </select>
  </div>

  <div class="d-grid">
    <button type="submit" class="btn btn-success">Register</button>
  </div>
  <p class="mt-3 text-center">Already have an account? <a href="login.php">Login</a></p>
</form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
