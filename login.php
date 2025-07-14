<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | TaskPro System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body class="login-body">
  <div class="login-container">
    <form method="POST" action="app/login.php" class="p-4 shadow rounded bg-white">
      <h2 class="mb-4 text-center text-primary">Login</h2>

      <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
      <?php endif; ?>

      <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_GET['success']) ?></div>
      <?php endif; ?>

      <div class="mb-3">
        <label for="email" class="form-label">Username</label>
        <input type="text" class="form-control" name="user_name" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <p class="mt-3 text-center">Don't have an account? <a href="register.php">Register</a></p>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>
</body>
</html>
