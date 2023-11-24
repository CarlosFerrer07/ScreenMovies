<?php

class Movies {

    private int $id;
    private string $title;
    private int $year;
    private string $director;
    private string $cast;
    private string $synopsis;
    private string $image;
    private string $trailer;


    public function __construct(int $id,string $titulo, int $año, string $director, string $reparto, string $sinopsis, string $imagen, string $trailer)
    {
        $this->id = $id;
        $this->title = $titulo;
        $this->year = $año;
        $this->director = $director;
        $this->cast = $reparto;
        $this->synopsis = $sinopsis;
        $this->image = $imagen;
        $this->trailer = $trailer;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Get the value of year
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * Get the value of director
     */
    public function getDirector(): string
    {
        return $this->director;
    }

    /**
     * Get the value of cast
     */
    public function getCast(): string
    {
        return $this->cast;
    }

    /**
     * Get the value of synopsis
     */
    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    /**
     * Get the value of image
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Get the value of trailer
     */
    public function getTrailer(): string
    {
        return $this->trailer;
    }

}