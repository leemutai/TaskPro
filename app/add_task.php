<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

require_once "../DB_connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $assigned_to = intval($_POST['assigned_to']);
    $deadline = $_POST['deadline'];

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO tasks (title, description, assigned_to, deadline) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $description, $assigned_to, $deadline]);

    // Optionally, redirect with success message
    header("Location: ../tasks/create.php?success=Task Assigned");
    exit();
}
?>
