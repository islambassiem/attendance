<?php

$db = new PDO("mysql:host=156.67.221.50;dbname=". $_ENV['DB_NAME'] . ";charset=utf8mb4", $_ENV['DB_USER'], $_ENV['DB_PASS']);