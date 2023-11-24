<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoloader.php";

$idMovie = isset($_GET['id']) ? (int) $_GET['id'] : "";

$security = new Security;

$security->checkLoggedIn();

$moviesRepository = new MoviesRepository;

$movie = $moviesRepository->getMovie($idMovie);

$commentRepository = new CommentsRepository;

$dataComments = $commentRepository->getCommentsByIdMovie($idMovie);

/* echo "<pre>";
var_dump($dataComments);
echo "</pre>";
exit; */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/comments.css">
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
                            <p>Hola <?= $security->getUserData() ?> / <a href="destruirSesion.php" style="color: white;">Cerrar Sesion</a></p>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                       <img src="./assets/images/<?= $movie->getImage() ?>" alt="peli"> 
                    </div>
                    <div class="col-lg-6">
                        <?= $commentRepository->drawComments($dataComments) ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>