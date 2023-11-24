<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoloader.php";

$moviesRepository = new MoviesRepository;

$arrMovies = $moviesRepository->getAllMovies();

$security = new Security;

$security->checkLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/inicio.css">
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

    <section class="d-flex justify-content-center align-items-center">
        <div id="carouselExampleCaptions" class="carousel slide" style="width: 75%;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/images/banner1.png" class="d-block w-100" alt="WALLE">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>WALLE</h5>
                        <p>Tras cientos de años haciendo aquello para lo que fue construido: limpiar el planeta de basura, el pequeño robot Wall-e tiene una nueva misión cuando conoce a Eva.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./assets/images/banner2.png" class="d-block w-100" alt="TOY STORY">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>TOY STORY</h5>
                        <p>Los juguetes de Andy, un niño de seis años, temen que un nuevo regalo les sustituya en el corazón de su dueño. Woody, un vaquero que ha sido hasta ahora el juguete favorito, trata de tranquilizarlos hasta que aparece Buzz Lightyear.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./assets/images/banner3.png" class="d-block w-100" alt="NEMO">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>BUSCANDO A NEMO</h5>
                        <p>Nemo, un pequeño pececillo, muy querido y protegido por su padre, se pierde fuera de la gran barrera del arrecife australiano, después de ser capturado por este arrecife, Nemo terminará en una pecera en Sidney. </p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <main>
        <section class="pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-3 text-success">PELICULAS</h3>
                    </div>
                    <div class="col-6 text-right">
                        <a class="btn  mb-3 mr-1" href="#carouselExampleIndicators1" role="button" data-bs-slide="prev">
                            <i class="fa fa-arrow-left text-success"></i>
                        </a>
                        <a class="btn  mb-3 mr-1" href="#carouselExampleIndicators1" role="button" data-bs-slide="next">
                            <i class="fa fa-arrow-right text-success"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">

                                <?= $moviesRepository->drawMovies($arrMovies) ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>