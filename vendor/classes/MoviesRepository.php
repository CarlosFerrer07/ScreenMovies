<?php

class MoviesRepository extends Connection
{

    public function __construct()
    {
        $this->connect();
    }

    public function getMovie(int $id): movies
    {

        $stmt = $this->conn->prepare("SELECT * FROM pelicula WHERE id=? ");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Movies(...$row);
    }

    public function getAllMovies(): array
    {
        $sql = $this->conn->query("SELECT * FROM pelicula");
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $arrMovies[] = new Movies(...$row);
        }

        return $arrMovies;
    }

    public function drawMovies(array $arrMovies): string
    {
        $output = "";

        $adjust = 1;
        $active = 'active';

        foreach ($arrMovies as $movie) {
            if ($adjust == 1) {
                $output .= "<div class='carousel-item " . $active . "'>";
                $output .= "<div class='row'>";
                $active = "";
            }

            $adjust++;

            $output .= "<div class='col-md-3 mb-3 text-center'>";
            $output .= "<div class='card h-100'>";
            $output .= "<div class='d-flex align-items-center justify-content-center' style='height: 420px;'>";
            $output .= "<img src='./assets/images/" . $movie->getImage() . "' class='card-img-top' alt='movie' style='object-fit: cover; max-height: 100%;'>";
            $output .= "</div>";
            $output .= "<div class='card-body'>";
            $output .= "<h5 class='card-title'>" . $movie->getTitle() . "</h5>";
            $output .= "<a href='fichaPeli.php?id=" . $movie->getId() . "' class='btn btn-outline-success'>DETAILS</a>";
            $output .= "</div>";
            $output .= "</div>";
            $output .= "</div>";

            if ($adjust == 5) {
                $output .= "</div>";
                $output .= "</div>";
                $adjust = 1;
            }
        }
        return $output;
    }

    public function getFilteredMovie(string $title): Movies
    {

        $stmt = $this->conn->prepare("SELECT * FROM pelicula WHERE titulo LIKE ?");
        $titleLike = '%' . $title . '%';
        $stmt->bindParam(1, $titleLike, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Movies(...$row);
    }
}
