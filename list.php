<?php 

require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


$db = require 'connect.php';
$stmt = $db->query('SELECT * FROM attendance WHERE created_at >= CURDATE() AND created_at < CURDATE() + INTERVAL 1 DAY ORDER BY created_at DESC');
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
    <?php if(count($attendees) > 0) :?>
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
    <?php else :?>
        <p>No Attendees Yet</p>
    <?php endif ?>
</body>
</html>