<?php
require_once '../DB_connection.php';
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

$sql = "SELECT tasks.*, users.username FROM tasks JOIN users ON tasks.assigned_to = users.id";
$result = mysqli_query($conn, $sql);
?>
<h2>All Tasks</h2>
<table border="1">
    <tr>
        <th>Title</th><th>Description</th><th>Assigned To</th><th>Status</th><th>Deadline</th><th>Actions</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['description']) ?></td>
        <td><?= htmlspecialchars($row['username']) ?></td>
        <td><?= $row['status'] ?></td>
        <td><?= $row['deadline'] ?></td>
        <td>
            <a href="edit_task.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="../app/delete_task.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
