<?php
require 'google.php';
require 'connect.php';

$stmt = $db->prepare("SELECT * FROM workshops WHERE date >= CURDATE() AND date < CURDATE() + INTERVAL 1 DAY");
$stmt->execute();
$workshop = $stmt->fetch(PDO::FETCH_ASSOC);
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
  <?php if (!$workshop) :?>
    <p>No workshops found today</p>
  <?php else :?>
    <h1><?= $workshop['name'] ?></h1>
    <img 
    src="https://api.qrserver.com/v1/create-qr-code/?data=<?= getUrl($workshop['id']) ?>&size=500x500" 
    alt="QR code for Google sign-in"
    />
  <?php endif; ?>

</body>
</html>
