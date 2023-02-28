<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/prueba/access.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register</title>
</head>

<body>
    <h1>Register</h1>

    <form action="" method="post">
        <div>
            <label for="name">Nombre: <input type="text" name="name" id="name"></label>
        </div>
        <div>
        </div>
        <div>
            <label for="email">Email: <input type="text" name="email" id="email"></label>
        </div>
        <div>
            <label for="password">Password: <input type="password" name="password" id="password"></label>
        </div>

        <div>
            <input type="hidden" name="action" value="register">
            <input type="submit" value="Register">
        </div>
    </form>
    <br>
</body>

</html>