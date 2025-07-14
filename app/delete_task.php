<?php
require_once '../DB_connection.php';
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tasks WHERE id = $id");
header("Location: ../tasks/view_all.php");
