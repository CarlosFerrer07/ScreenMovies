<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoloader.php";

$idMovie = isset($_GET['id']) ? (int) $_GET['id'] : ""; //tres

/* var_dump($newComment); */

$moviesRepository = new MoviesRepository;

$movies = $moviesRepository->getMovie($idMovie);

$security = new Security;

$security->checkLoggedIn();

$nameUser = $security->getUserData();

$userRepository = new UserRepository;

$userId = $userRepository->getUserId($nameUser); //1

$idUser = $userId['id'];
/* var_dump($idUser);
exit; */

//logica para el comentario

if (count($_POST) > 0) {
    try {
        $commentRepository = new CommentsRepository;
        
        $newComment = $_POST['comment'];

        $rowsAffected = $commentRepository->insertComment($idMovie,$idUser,$newComment);

        echo $rowsAffected;

    } catch (PDOException $e) {
        echo "Se ha producido un error". $e->getMessage();
    }
    
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/ficha.css">
</head>

<body>

    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-sm navbar-light bg-dark text-white">
                        <!-- logo -->
                        <a class="navbar-brand" href="inicio.php">
                            <img src="assets/images/logo.png" width="30" height="40" alt="logo-movies">
                        </a>

                        <form class="d-flex me-auto" role="search" action="filteredMovie.php" method="post">
                            <input class="form-control me-2" type="search" name="title" placeholder="Search by title" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>

                        <div class="navbar-text text-white" style="margin-right: 20px;">
                            <p>Hola <?= $nameUser ?> / <a href="destruirSesion.php" style="color: white;">Cerrar Sesion</a></p>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="col-lg-6">
                    <img src="./assets/images/<?= $movies->getImage() ?>" alt="peli" style="max-width: 100%; max: height 100px;">
                </div>
                <div class="col-lg-6 text-success">

                    <h1><?= $movies->getTitle() ?></h1>
                    <hr>
                    <h3>AÑO: </h3>
                    <p><?= $movies->getYear() ?></p>
                    <hr>
                    <h3>DIRECTOR: </h3>
                    <p><?= $movies->getDirector() ?></p>
                    <hr>
                    <h3>REPARTO: </h3>
                    <p><?= $movies->getCast() ?></p>
                    <hr>
                    <h3>SINOPSIS: </h3>
                    <p><?= $movies->getSynopsis() ?></p>
                    <hr>
                    <h3>TRAILER: </h3>
                    <a class="btn btn-success" href="<?= $movies->getTrailer() ?>" target="_blank" role="button">Ver trailer</a>
                    <hr>
                    <h3>DEJE SU COMENTARIO: </h3>
                    <form action="" method="post">
                        <p><textarea name="comment" placeholder="Comparte tu opinión sobre la peli!"></textarea></p>
                        <p><input type="submit" value="Enviar opinión" style="background-color:green"></p>
                    </form>

                    <p><a href="viewComments.php?id=<?= $movies->getId() ?>">Ver comentarios</a></p>

                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>