-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-11-2023 a las 18:05:08
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `screenmovies`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `comentario` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idComentario`, `idPelicula`, `idUsuario`, `comentario`) VALUES
(1, 3, 1, 'peliculote'),
(2, 3, 2, 'buena peli por chris01'),
(3, 4, 3, 'Es mi pelicula favorita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) DEFAULT NULL,
  `año` int(11) DEFAULT NULL,
  `director` varchar(30) DEFAULT NULL,
  `reparto` varchar(250) DEFAULT NULL,
  `sinopsis` varchar(500) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `trailer` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `titulo`, `año`, `director`, `reparto`, `sinopsis`, `imagen`, `trailer`) VALUES
(1, 'El Diario de Noa', 2004, 'Nick Cassavetes', 'Ryan Gosling, Rachel McAdams, James Garner', 'Una historia de amor inolvidable entre un joven y una chica adinerada que se conocen en los años 40 y se reencuentran años después.', 'el_diario_de_noa.png', 'https://www.youtube.com/watch?v=ABCDEFG'),
(2, 'Expediente Warren', 2013, 'James Wan', 'Patrick Wilson, Vera Farmiga, Lili Taylor', 'Basada en hechos reales, la película sigue a los investigadores paranormales Ed y Lorraine Warren mientras se enfrentan a un caso aterrador de actividad sobrenatural en una casa embrujada.', 'expediente_warren.png', 'https://www.youtube.com/watch?v=ABCDEFG'),
(3, 'Shutter Island', 2010, 'Martin Scorsese', 'Leonardo DiCaprio, Mark Ruffalo, Ben Kingsley', 'Dos agentes federales investigan la desaparición de una paciente en un hospital psiquiátrico en una remota isla.', 'shutter_island.png', 'https://www.youtube.com/watch?v=5iaYLCiq5RM'),
(4, 'Hombres de Honor', 2000, 'George Tillman Jr.', 'Cuba Gooding Jr., Robert De Niro, Charlize Theron', 'Basada en una historia real, narra la vida del primer buzo afroamericano de la Armada de los Estados Unidos y su lucha contra el racismo y la adversidad.', 'hombres_de_honor.png', 'https://www.youtube.com/watch?v=ABCDEFG'),
(5, 'Interestelar', 2014, 'Christopher Nolan', 'Matthew McConaughey, Anne Hathaway, Jessica Chastain', 'Un grupo de astronautas emprende un viaje interestelar en busca de un nuevo hogar para la humanidad mientras lidian con fenómenos científicos desconocidos.', 'interestelar.png', 'https://www.youtube.com/watch?v=ABCDEFG'),
(6, 'Los sospechosos habituales', 1995, 'Bryan Singer', 'Kevin Spacey, Gabriel Byrne, Chazz Palminteri', 'Un grupo de delincuentes aparentemente desconectados se encuentran en una comisaría de Nueva York, donde se cruzan las historias de cada uno mientras investigan un misterioso crimen.', 'los_sospechosos_habituales.png', 'https://www.youtube.com/watch?v=ABCDEFG'),
(7, 'La pantera rosa', 2006, 'Shawn Levy', 'Steve Martin, Jean Reno, Emily Mortimer', 'El Inspector Jacques Clouseau se une a una investigación internacional para encontrar al ladrón que ha robado la famosa joya conocida como \"La pantera rosa\".', 'la_pantera_rosa.png', 'https://www.youtube.com/watch?v=ABCDEFG'),
(8, 'Se nos fue de las manos', 2010, 'Todd Phillips', 'Robert Downey Jr., Zach Galifianakis, Michelle Monaghan', 'Dos amigos deben cruzar el país en un viaje caótico mientras lidian con situaciones hilarantes y problemas inesperados.', 'se_nos_fue_de_las_manos.png', 'https://www.youtube.com/watch?v=ABCDEFG'),
(9, 'The Mechanic', 2011, 'Simon West', 'Jason Statham, Ben Foster, Donald Sutherland', 'Un asesino a sueldo veterano se une a un joven aprendiz para llevar a cabo una serie de asesinatos, pero pronto descubre una conspiración que pone en peligro su vida.', 'the_mechanic.png', 'https://www.youtube.com/watch?v=ABCDEFG'),
(10, 'Homefront', 2013, 'Gary Fleder', 'Jason Statham, James Franco, Winona Ryder', 'Un exagente de la DEA se muda a un tranquilo pueblo para comenzar una nueva vida, pero se encuentra en conflicto con un narcotraficante local que amenaza a su familia.', 'homefront.png', 'https://www.youtube.com/watch?v=ABCDEFG'),
(11, 'Memento', 2000, 'Christopher Nolan', 'Guy Pearce, Carrie-Anne Moss, Joe Pantoliano', 'Leonard Shelby sufre de amnesia anterógrada y busca venganza por el asesinato de su esposa. Con la ayuda de sus notas y tatuajes, intenta desentrañar la verdad en una narrativa no lineal.', 'memento.png', 'https://www.youtube.com/watch?v=ABCDEFG'),
(12, 'Mulholland Drive', 2001, 'David Lynch', 'Naomi Watts, Laura Harring, Justin Theroux', 'Una mujer amnésica y una joven aspirante a actriz se unen en un viaje por Los Ángeles en busca de respuestas y desentrañar los misterios ocultos tras sus identidades y sueños.', 'mulholland_drive.png', 'https://www.youtube.com/watch?v=ABCDEFG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `contraseña` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `securePassword` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `usuario`, `contraseña`, `email`, `securePassword`) VALUES
(1, 'Carlos', 'Ferrer', 'cafema01', '1234', 'carlos@gmail.com', '$2y$10$NxyLNaXX9CpoTG9NWvAIl.rBOKEgyWM5HJqRQgsfv0w3gyTFTcsba'),
(2, 'Christian', 'Regatero', 'chris01', '4567', 'chris@gmail.com', '$2y$10$Ymwdn85FoIRLJQlm39RnXeyUeRftTBqY0ZFHTkIGrTAQ70q1w.lsG'),
(3, 'David', 'Villa', 'villa7', '6789', 'villa@gmail.com', '$2y$10$CgnzR.2n.DYyCWGKj5LwWO4/5iTmjHjpP72013HViSfXFgY0LEIkK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`,`idPelicula`,`idUsuario`),
  ADD KEY `idPelicula` (`idPelicula`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idPelicula`) REFERENCES `pelicula` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
