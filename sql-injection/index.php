<?php
$db = new PDO("mysql:host=127.0.0.1;dbname=test", 'root');

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    // '; DROP TABLE forum; --
    // Bad
    $user = $db->query("SELECT * FROM USERS WHERE email = '{$email}'");
    // Good
    /*
    $user = $db->prepare("SELECT * FROM USERS WHERE email = :email");
    $user->execute(['email' => $email]);
    */
    if ($user->rowCount()) {
        // Send email
        die($email);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SQL injection</title>
</head>
<body>
    <form action="" method="post">
    <label for="email">Email address</label>
    <input type="text" name="email" id="email">
    <button type="submit">Recover</button>
    </form>
</body>
</html>