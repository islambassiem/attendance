<?php
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new Google\Client();
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($_ENV['GOOGLE_REDIRECT_URI']);
$client->addScope("email");
$client->addScope("profile");


$state = http_build_query(['workshop_id' => 1]);
$client->setState($state);


$authUrl = $client->createAuthUrl();
$encodedAuthUrl = urlencode($authUrl);
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
