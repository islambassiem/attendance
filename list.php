<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


$db = new PDO("mysql:host=156.67.221.50;dbname=". $_ENV['DB_NAME'] . ";charset=utf8mb4", $_ENV['DB_USER'], $_ENV['DB_PASS']);
$stmt = $db->query('SELECT * FROM attendance');
$attendees = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Singed at</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attendees as $attendee): ?>
                <tr>
                    <td><?= $attendee['user_name'] ?></td>
                    <td><?= $attendee['email'] ?></td>
                    <td><?= $attendee['created_at'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>