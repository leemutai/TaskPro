<?php
require_once '../DB_connection.php';
session_start();

$id = $_POST['id'];
$title = $_POST['title'] ?? null;
$description = $_POST['description'] ?? null;
$assigned_to = $_POST['assigned_to'] ?? null;
$status = $_POST['status'];
$deadline = $_POST['deadline'] ?? null;

if ($_SESSION['role'] == 'admin') {
    $query = "UPDATE tasks SET title='$title', description='$description', assigned_to='$assigned_to', status='$status', deadline='$deadline' WHERE id=$id";
} else {
    // Employee can only update status
    $query = "UPDATE tasks SET status='$status' WHERE id=$id AND assigned_to=".$_SESSION['user_id'];
}

if (mysqli_query($conn, $query)) {
    header("Location: ../tasks/" . ($_SESSION['role'] == 'admin' ? "view_all.php" : "my_tasks.php"));
} else {
    echo "Update failed: " . mysqli_error($conn);
}
