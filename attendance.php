<?php
$name = $_GET['name'] ?? 'Guest';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Attendance Marked</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    h2 {
      font-size: 60px;
      margin-bottom: 20px;
    }

    p{
      font-size: 40px;
    }
  </style>
</head>
<body>
  <h2>Thank you, <?= htmlspecialchars($name) ?>!</h2>
  <p>Your attendance has been successfully recorded.</p>
</body>
</html>
