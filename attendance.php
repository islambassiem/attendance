<?php
$name = $_GET['name'] ?? 'Guest';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Attendance Marked</title>
</head>
<body>
  <h2>Thank you, <?= htmlspecialchars($name) ?>!</h2>
  <p>Your attendance has been successfully recorded.</p>
</body>
</html>
