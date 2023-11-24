<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoloader.php";

$security = new Security;

$message = $security->doLogin();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScreenMovies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="" method="post">
                        <h1>LOGIN</h1>
                        <p><?= $message ?></p>
                        <label for="usuario" class="user">Introduzca su nombre de usuario:</label><br>
                        <input type="text" name="userAccount" id="usuario" placeholder="usuario"><br>
                        <label for="contraseña">Introduzca su contraseña:</label><br>
                        <input type="password" name="password" id="contraseña" placeholder="contraseña"><br>
                        <input class="submit" type="submit" value="ACCEDER">
                        <p>¿Aún no estás registrado?<a href="signIn.php">Registrarse</a></p>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>