<?php require 'google.php';?>
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
    p{
      font-size: 40px;
    }
  </style>
</head>
<body>
  <p>Please try again with your official email address by clicking <a href="<?= htmlspecialchars($authUrl) ?>">here</a>.</p>
</body>
</html>