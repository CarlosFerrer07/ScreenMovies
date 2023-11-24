DROP DATABASE IF EXISTS screenmovies;

CREATE DATABASE screenmovies;

USE screenmovies;

DROP TABLE IF EXISTS pelicula;

CREATE TABLE pelicula (
  id INT PRIMARY KEY,
  titulo VARCHAR(30),
  año INT,
  director VARCHAR(30), 
  reparto VARCHAR(250),
  sinopsis VARCHAR(500), 
  imagen VARCHAR(50), 
  trailer VARCHAR(500)
);

DROP TABLE IF EXISTS usuario;

CREATE TABLE usuario (
  id INT PRIMARY KEY,
  nombre VARCHAR(30),
  apellidos VARCHAR(30),
  usuario VARCHAR(30),
  contraseña VARCHAR(15),
  email VARCHAR(30),
  securePassword VARCHAR(200)
);

DROP TABLE IF EXISTS comentario;

CREATE TABLE comentario (
  idComentario INT PRIMARY KEY,
  NomUsuario VARCHAR(30),
  idPelicula INT,
  comentario VARCHAR(1000),
  FOREIGN KEY (NomUsuario) REFERENCES usuario(usuario),
  FOREIGN KEY (idPelicula) REFERENCES pelicula(id)
);







