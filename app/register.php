<?php
session_start();
include "../DB_connection.php";

// Validation helper
function validate_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}

if (isset($_POST['full_name'], $_POST['user_name'], $_POST['password'], $_POST['role'])) {
  $full_name = validate_input($_POST['full_name']);
  $username = validate_input($_POST['user_name']);
  $password = validate_input($_POST['password']);
  $role = validate_input($_POST['role']);

  if (empty($full_name) || empty($username) || empty($password) || empty($role)) {
    $error = "All fields are required";
    header("Location: ../register.php?error=$error");
    exit();
  }

  // Check if user already exists
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->execute([$username]);

  if ($stmt->rowCount() > 0) {
    $error = "Username already taken!";
    header("Location: ../register.php?error=$error");
    exit();
  }

  // Hash password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Insert new user
  $stmt = $conn->prepare("INSERT INTO users (full_name, username, password, role) VALUES (?, ?, ?, ?)");
  $result = $stmt->execute([$full_name, $username, $hashed_password, $role]);

  if ($result) {
    header("Location: ../login.php?success=Account created! You can now log in.");
    exit();
  } else {
    header("Location: ../register.php?error=Registration failed. Try again.");
    exit();
  }

} else {
  header("Location: ../register.php?error=Invalid access.");
  exit();
}
