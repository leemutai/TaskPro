<!-- tasks/create.php -->
<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

require_once "../DB_connection.php";

// Fetch employees to assign task to
$stmt = $conn->prepare("SELECT id, full_name FROM users WHERE role = 'employee'");
$stmt->execute();
$employees = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create Task</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <h2>Assign New Task</h2>
  <?php if (isset($_GET['success'])): ?>
  <p style="color: green;"><?= htmlspecialchars($_GET['success']) ?></p>
<?php endif; ?>

  <form method="POST" action="../app/add_task.php">
    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" rows="5" cols="30"></textarea><br><br>

    <label>Assign To:</label><br>
    <select name="assigned_to" required>
      <option value="">-- Select Employee --</option>
      <?php foreach ($employees as $emp): ?>
        <option value="<?= $emp['id'] ?>"><?= htmlspecialchars($emp['full_name']) ?></option>
      <?php endforeach; ?>
    </select><br><br>

    <label>Deadline:</label><br>
    <input type="date" name="deadline" required><br><br>

    <button type="submit">Assign Task</button>
  </form>
</body>
</html>
