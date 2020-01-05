<?php

require 'functions.php';

// Generate a cookie
/*
$date = new DateTime('+ 1 week');
setcookie('session', 'abc', $date->getTimestamp());
*/

$db = new PDO("mysql:host=127.0.0.1;dbname=test", 'root');

if (!isset($_GET['username'])) {
    die();
}

$user = $db->prepare("SELECT * FROM users WHERE username = :username");
$user->execute(['username' => $_GET['username']]);

$user = $user->fetchObject();
//print_r($user);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XSS</title>
</head>
<body>
    <h2><?php echo e($user->username) ?></h2>
    <p><?php echo e($user->bio) ?></p>
</body>
</html>