<?php
require 'google.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Workshop Attendance</title>
</head>
<body>
  <h1>Welcome to Workshop Attendance</h1>
  <p>Please sign in with your Google account to mark your attendance.</p>

  <a href="<?= htmlspecialchars($authUrl) ?>">Sign in with Google</a>

  <p>Or scan this QR code:</p>
  <img 
    src="https://api.qrserver.com/v1/create-qr-code/?data=<?= $encodedAuthUrl ?>&size=300x300" 
    alt="QR code for Google sign-in"
  />
</body>
</html>
