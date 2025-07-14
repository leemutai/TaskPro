<?php
session_start();
include "../DB_connection.php";

function validate_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}

if (
  isset($_POST['full_name'], $_POST['email'], $_POST['user_name'], $_POST['password'], $_POST['role'])
) {
  $full_name = validate_input($_POST['full_name']);
  $email = validate_input($_POST['email']);
  $username = validate_input($_POST['user_name']);
  $password = validate_input($_POST['password']);
  $role = validate_input($_POST['role']);

  if (empty($full_name) || empty($email) || empty($username) || empty($password) || empty($role)) {
    $error = "All fields are required.";
    header("Location: ../register.php?error=$error");
    exit();
  }

  // Check if username or email already exists
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
  $stmt->execute([$username, $email]);

  if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch();
    if ($user['username'] === $username) {
      $error = "Username already taken!";
    } elseif ($user['email'] === $email) {
      $error = "Email already registered!";
    } else {
      $error = "User already exists!";
    }
    header("Location: ../register.php?error=$error");
    exit();
  }

  // Hash password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Insert into database
  $stmt = $conn->prepare("INSERT INTO users (full_name, email, username, password, role) VALUES (?, ?, ?, ?, ?)");
  $result = $stmt->execute([$full_name, $email, $username, $hashed_password, $role]);

  if ($result) {
    header("Location: ../login.php?success=Account created! You can now log in.");
    exit();
  } else {
    header("Location: ../register.php?error=Registration failed. Try again.");
    exit();
  }

} else {
  header("Location: ../register.php?error=Invalid form submission.");
  exit();
}
