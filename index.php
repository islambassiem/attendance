<?php
require 'google.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Workshop Attendance</title>
</head>
<body>
  <img 
    src="https://api.qrserver.com/v1/create-qr-code/?data=<?= $encodedAuthUrl ?>&size=300x300" 
    alt="QR code for Google sign-in"
  />
</body>
</html>
