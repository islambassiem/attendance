<?php
require 'google.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Workshop Attendance</title>
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
  </style>
</head>
<body>
  <img 
    src="https://api.qrserver.com/v1/create-qr-code/?data=<?= $encodedAuthUrl ?>&size=300x300" 
    alt="QR code for Google sign-in"
  />
</body>
</html>
