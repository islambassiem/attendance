<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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


if (!str_ends_with($email, '@inaya.edu.sa')) {
    die('Please use your official email address.');
}

$state = $_GET['state'] ?? '';

parse_str($state, $params);
$workshopId = $params['workshop_id'] ?? null;


$db = new PDO("mysql:host=156.67.221.50;dbname=". $_ENV['DB_NAME'] . ";charset=utf8mb4", $_ENV['DB_USER'], $_ENV['DB_PASS']);

$count = $db->prepare("SELECT count(*) AS count FROM attendance WHERE email = ? AND workshop_id = ?;");
$count->execute([$email, $workshopId]);
$x = $count->fetch();


if($x['count'] > 0){
    header('Location: already.php');
    exit;
}else{
    $stmt = $db->prepare("INSERT INTO attendance (email, user_name, workshop_id, created_at) VALUES (:email, :user_name, :workshop_id , NOW())");
    $stmt->execute([ 'email' => $email, 'user_name' => $name ,'workshop_id' => $workshopId]);
    header('Location: attendance.php?name=' . urlencode($name));
    exit;
}

