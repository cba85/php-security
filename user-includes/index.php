<?php

if (!isset($_GET['show'])) {
    die();
}
$show = $_GET['show'];
//die("content/{$show}.php");

// Meh
$allowed = ['test'];

if (in_array($show, $allowed)) {
    $content = file_get_contents("content/{$show}.php");
}

// Try
// ?show=../app/db
// View page source

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File includes</title>
</head>
<body>
    <?php echo $content ?>
</body>
</html>