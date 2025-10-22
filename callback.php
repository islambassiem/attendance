<?php
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new Google\Client();
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($_ENV['GOOGLE_REDIRECT_URI']);

if (!isset($_GET['code'])) {
    die('Invalid request');
}

$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
$client->setAccessToken($token['access_token']);

$oauth = new Google\Service\Oauth2($client);
$userInfo = $oauth->userinfo->get();

$email = $userInfo->email;
$name  = $userInfo->name;

// Example: restrict only company emails
if (!str_ends_with($email, '@yourcompany.com')) {
    die('Please use your official email address.');
}

// Mark attendance
$file = __DIR__ . '/attendance.txt';
$entry = date('Y-m-d H:i:s') . " - $name ($email)" . PHP_EOL;
file_put_contents($file, $entry, FILE_APPEND);

header('Location: attendance.php?name=' . urlencode($name));
exit;
