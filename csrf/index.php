<?php

session_start();

$_SESSION['user_id'] = 1;

$db = new PDO("mysql:host=127.0.0.1;dbname=test", 'root');

// Protection
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['_token']) or $_POST['_token'] !== $_SESSION['_token']) {
        die('Invalid CSRF token');
    }
}
$_SESSION['_token'] = bin2hex(random_bytes(32)); // PHP 7
//$_SESSION['_token'] = bin2hex(openssl_random_pseudo_bytes(32)); // PHP 5

//die($_SESSION['_token']);


$delete = $db->prepare("UPDATE users SET active = 0 WHERE id = :user_id");
$delete->execute([
    'user_id' => $_SESSION['user_id'],
]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSRF</title>
</head>
<body>
    <form action="delete.php" method="post">
        <input type="hidden" name="_token" value="<?php echo $_SESSION['_token'] ?>">
        <button type="submit">Delete my account</button>
    </form>
</body>
</html>