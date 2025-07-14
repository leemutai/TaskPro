<?php
require_once '../DB_connection.php';
session_start();
if ($_SESSION['role'] !== 'employee') {
    header("Location: ../login.php");
    exit();
}
$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM tasks WHERE assigned_to = $user_id");
?>

<h2>My Tasks</h2>
<form action="../app/update_task.php" method="POST">
<table border="1">
    <tr><th>Title</th><th>Description</th><th>Status</th><th>Deadline</th><th>Update</th></tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['title'] ?></td>
        <td><?= $row['description'] ?></td>
        <td>
            <select name="status">
                <option <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                <option <?= $row['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                <option <?= $row['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
            </select>
        </td>
        <td><?= $row['deadline'] ?></td>
        <td>
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button type="submit">Update</button>
        </td>
    </tr>
    <?php } ?>
</table>
</form>
