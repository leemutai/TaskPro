<?php
require_once '../DB_connection.php';
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
$id = $_GET['id'];
$task = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tasks WHERE id = $id"));
$users = mysqli_query($conn, "SELECT id, username FROM users");
?>

<h2>Edit Task</h2>
<form action="../app/update_task.php" method="POST">
    <input type="hidden" name="id" value="<?= $task['id'] ?>">
    <input name="title" value="<?= $task['title'] ?>" required>
    <textarea name="description"><?= $task['description'] ?></textarea>
    <select name="assigned_to">
        <?php while($user = mysqli_fetch_assoc($users)) { ?>
        <option value="<?= $user['id'] ?>" <?= $user['id'] == $task['assigned_to'] ? 'selected' : '' ?>>
            <?= $user['username'] ?>
        </option>
        <?php } ?>
    </select>
    <select name="status">
        <option <?= $task['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
        <option <?= $task['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
        <option <?= $task['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
    </select>
    <input type="date" name="deadline" value="<?= $task['deadline'] ?>">
    <button type="submit" name="update_task">Update Task</button>
</form>
