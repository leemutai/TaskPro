<?php
session_start();
include "../DB_connection.php";

function validate_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}

if (isset($_POST['user_name']) && isset($_POST['password'])) {
  $user_name = validate_input($_POST['user_name']);
  $password = validate_input($_POST['password']);

  if (empty($user_name) || empty($password)) {
    $msg = empty($user_name) ? "Username is required" : "Password is required";
    header("Location: ../login.php?error=$msg");
    exit();
  }

  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->execute([$user_name]);

  if ($stmt->rowCount() === 1) {
    $user = $stmt->fetch();
    if (password_verify($password, $user['password'])) {
      $_SESSION['role'] = $user['role'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['id'] = $user['id'];
      header("Location: ../index.php");
      exit();
    }
  }

  header("Location: ../login.php?error=Invalid username or password");
  exit();
} else {
  header("Location: ../login.php?error=Invalid request");
  exit();
}
?>
