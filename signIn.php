<?php

declare(strict_types=1);

include_once __DIR__ . "/vendor/autoloader.php";

if (count($_POST) > 0) {

    try {
        $userRepository = new UserRepository;

        $data = [
            'name' => $_POST['name'],
            'sureName' => $_POST['sureName'],
            'userAccount' => $_POST['userAccount'],
            'password' => $_POST['password'],
            'email' => $_POST['email']
        ];

        $securePassword = $userRepository->encriptPassword($data);

        $userRepository->insertUser($data, $securePassword);
        header("location:login.php");
    } catch (PDOException $e) {
        echo "Se ha producido un error". $e->getMessage();
        /* header('location:error.php'); */
    }
}

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
                        <h1>SIGN IN</h1>
                        <label for="nombre" class="user">Introduzca su nombre:</label><br>
                        <input type="text" name="name" id="nombre" placeholder="nombre"><br>
                        <label for="apellidos">Introduzca sus apellidos:</label><br>
                        <input type="text" name="sureName" id="apellidos" placeholder="apellidos"><br>
                        <label for="usuario">Introduzca su nombre de usuario:</label><br>
                        <input type="text" name="userAccount" id="usuario" placeholder="usuario"><br>
                        <label for="contraseña">Introduzca su contraseña:</label><br>
                        <input type="password" name="password" id="contraseña" placeholder="contraseña"><br>
                        <label for="email">Introduzca su email</label><br>
                        <input type="email" name="email" id="email" placeholder="email"><br>
                        <input class="submit" type="submit" value="REGISTRARSE">
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>