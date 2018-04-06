-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-04-2018 a las 15:29:25
-- Versión del servidor: 10.1.26-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `liga_fut`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbitros`
--

CREATE TABLE `arbitros` (
  `id_arbitro` int(10) NOT NULL,
  `nom_arbitro` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `arbitros`
--

INSERT INTO `arbitros` (`id_arbitro`, `nom_arbitro`, `fecha_nac`, `telefono`, `descripcion`, `imagen`) VALUES
(1, 'Carlos Ulloa', '2017-06-10', '123456700', 'Antes de la fundación reinaba el caos y las cárceles estaban llenas, de manera que han ideado una manera de evitar esto.\r\nDurante una noche al año, durante 12 horas, el crimen está permitido. ', 'eca48ffc791b97f97cd3fc571aab3067.png'),
(2, 'Carlos Pinto', '1976-10-10', '12345689', 'Aqui Descripcion', '1cbe1f0c34e9012fa2363ed38aa27b58.jpeg'),
(3, 'Mario Moreno', '1975-02-02', '12356789', 'Datos Relevantes', '2357da1d2effb087435872aceda52bdb.JPG'),
(4, 'Osvaldo Rueda', '1980-12-01', '123456789', 'aqui sus Datos', 'e1427a9de2d9622b620b7967cc56ac73.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arb_prog`
--

CREATE TABLE `arb_prog` (
  `id_arb_prog` int(5) NOT NULL,
  `id_arbitro` int(5) NOT NULL,
  `id_fixture` int(5) NOT NULL,
  `id_serie` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arb_prog`
--

INSERT INTO `arb_prog` (`id_arb_prog`, `id_arbitro`, `id_fixture`, `id_serie`) VALUES
(1, 2, 1, 1),
(2, 1, 1, 2),
(3, 2, 1, 3),
(4, 1, 1, 4),
(5, 2, 2, 1),
(6, 1, 2, 2),
(7, 2, 2, 3),
(8, 1, 2, 4),
(13, 1, 3, 1),
(14, 2, 3, 2),
(15, 1, 3, 3),
(16, 2, 3, 4),
(17, 2, 4, 1),
(18, 1, 4, 2),
(19, 2, 4, 3),
(20, 1, 4, 4),
(21, 2, 5, 1),
(22, 1, 5, 2),
(23, 2, 5, 3),
(24, 1, 5, 4),
(25, 2, 6, 1),
(26, 1, 6, 2),
(27, 2, 6, 3),
(28, 1, 6, 4),
(29, 1, 7, 1),
(30, 1, 7, 2),
(31, 1, 7, 3),
(32, 1, 7, 4),
(33, 4, 8, 1),
(34, 3, 8, 2),
(35, 4, 8, 3),
(36, 3, 8, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canchas`
--

CREATE TABLE `canchas` (
  `id_cancha` int(10) NOT NULL,
  `nombre_cancha` varchar(50) NOT NULL,
  `direc_cancha` varchar(50) NOT NULL,
  `img_cancha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `canchas`
--

INSERT INTO `canchas` (`id_cancha`, `nombre_cancha`, `direc_cancha`, `img_cancha`) VALUES
(1, 'Fusco', 'los fuscos 2323', 'cancha_1.jpg'),
(2, 'La Estrella', 'av. La estrella 7887', 'f0ce27288018d80f44b2bd28fb918527.jpg'),
(3, 'Calama', 'Departamental al Final', 'a07b817377cca6b91e45ccc9fd3c448a.jpg'),
(4, 'La Cuca', 'Departamental 1441', '958c767153a2b9c6109102e3ca8ca2ae.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delegados`
--

CREATE TABLE `delegados` (
  `id_delegado` int(5) NOT NULL,
  `nombre_delegado` varchar(50) NOT NULL,
  `fono_delegado` varchar(20) NOT NULL,
  `id_equipo` int(5) NOT NULL,
  `img_delegado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `delegados`
--

INSERT INTO `delegados` (`id_delegado`, `nombre_delegado`, `fono_delegado`, `id_equipo`, `img_delegado`) VALUES
(1, 'Pangasius Leivasssss', '123564700', 3, '4694508cf2bb5ab080b8f9c1f4355187.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directiva`
--

CREATE TABLE `directiva` (
  `id_directiva` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `directiva`
--

INSERT INTO `directiva` (`id_directiva`, `nombre`, `cargo`, `descripcion`, `imagen`) VALUES
(1, 'Mateo  Zambrano', 'Presidente ', 'Secuela de la película The Purge. La noche de las bestias (2013). En la película original, el gobierno de Estados Unidos permite que, durante una noche, cualquier acto vandálico sea legal. ', '4fd910b24a4f53452260ef28a1261f96.jpg'),
(2, 'Jose Miguel Carrera', 'Tesorero', '\r\n\r\nSecuela de la película The Purge. La noche de las bestias (2013). En la película original, el gobierno de Estados Unidos permite que, durante una noche, cualquier acto vandálico sea legal. De esta forma intentan reducir el número de criminales, ya que las cárceles del país se encuentran saturadas. La idea surge de la teoría de que todo ser humano tiene maldad en su interior, maldad que en algún momento saldrá a la luz. E', 'img_2.jpg'),
(3, 'Manuel Rodriguez', 'Secretario', '\r\n\r\nSecuela de la película The Purge. La noche de las bestias (2013). En la película original, el gobierno de Estados Unidos permite que, durante una noche, cualquier acto vandálico sea legal. De esta forma intentan reducir el número de criminales, ya que las cárceles del país se encuentran saturadas. La idea surge de la teoría de que todo ser humano tiene maldad en su interior, maldad que en algún momento saldrá a la luz. E', 'img_3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(6) NOT NULL,
  `nom_equipo` varchar(200) NOT NULL,
  `desc_equipo` text NOT NULL,
  `direc_equipo` varchar(50) NOT NULL,
  `id_cancha` int(6) NOT NULL,
  `insignia` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nom_equipo`, `desc_equipo`, `direc_equipo`, `id_cancha`, `insignia`) VALUES
(1, 'San Luis', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'Av San Luis 5454', 4, 'equi_1.png'),
(2, 'Deportes Temuco', '', '', 5, 'equi_2.png'),
(3, 'Audax', '', '', 9, 'equi_3.png'),
(4, 'Manshester', '', '', 3, 'equi_4.png'),
(5, 'Los Diseñadores', '', '', 4, 'equi_5.png'),
(6, 'Los Rasca', '', '', 6, 'equi_6.png'),
(7, 'Los Sharsha', '', 'Av. los charshinis 8547', 1, 'equi_7.png'),
(8, 'Los charshas', '', 'loncoche 2345', 0, 'e620da97b58933b358f77293fe5ff617.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas`
--

CREATE TABLE `fechas` (
  `id_fecha` int(10) NOT NULL,
  `nombre_fecha` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `hecha` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fechas`
--

INSERT INTO `fechas` (`id_fecha`, `nombre_fecha`, `fecha`, `status`, `hecha`) VALUES
(1, 'Primera Fecha', '2017-06-04', 2, 0),
(2, 'Segunda Fecha', '2017-06-11', 1, 0),
(3, 'Tercera Fecha', '2018-03-11', 1, 0),
(4, 'Cuarta Fecha', '2018-04-23', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fixture`
--

CREATE TABLE `fixture` (
  `id_fixture` int(10) NOT NULL,
  `id_fecha` int(10) NOT NULL,
  `id_cancha` int(10) NOT NULL,
  `id_equipo` int(10) NOT NULL,
  `id_equipo_b` int(10) NOT NULL,
  `arb_prog` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fixture`
--

INSERT INTO `fixture` (`id_fixture`, `id_fecha`, `id_cancha`, `id_equipo`, `id_equipo_b`, `arb_prog`) VALUES
(1, 1, 1, 4, 7, 1),
(2, 1, 3, 1, 5, 1),
(3, 1, 2, 2, 6, 1),
(4, 1, 1, 3, 8, 1),
(5, 2, 3, 1, 3, 1),
(6, 2, 2, 2, 4, 1),
(7, 2, 1, 5, 7, 1),
(8, 2, 4, 6, 8, 1),
(9, 3, 4, 8, 7, 0),
(10, 3, 3, 6, 5, 0),
(11, 3, 2, 4, 3, 0),
(12, 3, 1, 2, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goles`
--

CREATE TABLE `goles` (
  `id_gol` int(10) NOT NULL,
  `id_jugador` int(10) NOT NULL,
  `goles` int(10) NOT NULL,
  `minuto` int(5) NOT NULL,
  `id_serie` int(5) NOT NULL,
  `id_partido` int(5) NOT NULL,
  `id_equipo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id_jugador` int(6) NOT NULL,
  `id_equipo` int(6) NOT NULL,
  `nombre_jug` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `rut` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `foto_jug` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id_jugador`, `id_equipo`, `nombre_jug`, `apellido`, `fecha_nacimiento`, `rut`, `direccion`, `foto_jug`) VALUES
(1, 1, 'Guillermo Antonio', 'Nigote', '2018-02-27', '1234567898', 'Los Muermos 2345', 'a6f06eeb628885b13febbdde6b237a42.jpg'),
(2, 2, 'Renaldo', 'Cifuentes', '0000-00-00', '6', '1', 'img_1.jpg'),
(3, 3, 'Marco Antonio', 'Figueroa', '0000-00-00', '0', '0', 'img_2.jpg'),
(4, 4, 'Jose Marcelo', 'Salas', '0000-00-00', '0', '0', 'img_3.jpg'),
(5, 5, 'Zacarias', 'Flores del Campo', '0000-00-00', '0', '0', 'img_4.jpg'),
(6, 6, 'Aquiles', 'Brinco', '0000-00-00', '0', '0', ''),
(7, 7, 'Rosamel', 'Fierro Delgado', '0000-00-00', '0', '0', ''),
(8, 8, 'Daniel Andres ', 'Rodriguez', '2005-06-10', '12356789-9', 'los filomenos 7878', 'de3b95457e3d5361ccee06159efe7d63.png'),
(9, 1, 'Nikolazz Ignacio', 'Bravo', '0000-00-00', '0', '0', '6ce9a9adcf4ff278dd97df8f5262dbc4.png'),
(10, 2, 'Mario Fernando', 'Contreras', '0000-00-00', '0', '0', ''),
(11, 3, 'Alicio Fernando', 'Perez', '0000-00-00', '0', '0', ''),
(12, 4, 'Pedro \"Heidi\"', 'Gonzalez', '0000-00-00', '0', '0', ''),
(13, 5, 'Armando ', 'Mocha', '0000-00-00', '0', '0', ''),
(14, 6, 'Jose', 'Campora', '0000-00-00', '0', '0', ''),
(15, 7, 'Alan', 'Brito Delgado', '0000-00-00', '0', '0', ''),
(16, 8, 'Elmer', 'Curio', '1963-10-10', '12345678-9', '0', '4c4caf0eb9140107e9dff4aabdb8f00c.jpg'),
(17, 1, 'Mary', 'Conazo', '2018-02-26', '1234567898', '0', '3b97b26b5ffd157cb493aa20503158f7.jpg'),
(18, 2, 'Mario', 'Neta', '0000-00-00', '0', '0', ''),
(19, 3, 'Pato Carlos', 'Bustos de la Vaca', '0000-00-00', '0', '0', 'eaad0c081f77518a11453456806c5598.jpg'),
(20, 4, 'Jorge', 'Nitales', '0000-00-00', '0', '0', ''),
(21, 5, 'Esteban', 'Dido', '0000-00-00', '0', '0', ''),
(69, 1, 'Karol Andres', 'Lucero Enano', '1926-10-10', '12345678-9', 'Ñas papis 8778', '5a95114d1391c0183706762667f7ecc9.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(6) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `sub_titulo` text NOT NULL,
  `contenido` mediumtext NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo`, `sub_titulo`, `contenido`, `imagen`) VALUES
(1, 'Damos el \"Vamos\" a la Liga', 'Este martes comienza con los primeros partidos', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', 'ima_1.jpg'),
(2, 'Se Suspende Fecha', 'A causa de las grandes lluvias', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', 'ima_1.jpg'),
(5, 'Aspirante a Carabinero denuncia maltratos en grupo de formación en Valdivia', 'El joven de 18 años acusa que lo golpearon, resultando con un esguince, problemas al oído medio y hematomas.', 'Sumado a la muerte de dos aspirantes a oficiales de carabineros el pasado martes, tras una serie de actividades, hoy un joven de 18 años denunció maltratos por parte de los funcionarios policiales al interior del grupo de formación en la ciudad de Valdivia.\n\nEl aspirante a carabineros, Nicolás Palavecino (18) llegó desde Santiago a la capital de Los Ríos el pasado martes, día en el que de inmediato comenzaron los maltratos. De acuerdo a lo relatado por el joven a radio Cooperativa, abusaban sicológicamente y físicamente de él.\n\n\"Yo ya estaba  cansado, me pegaban palmetazos en la cara después de pasarme la ropa de campaña, también me dolía la rodilla y me obligaban a seguir caminando\", dijo el aspirante.\n\nEl padre del joven lo llevó hasta el Hospital Regional de Valdivia para constatar lesiones, donde se le diagnosticó un esguince en la rodilla izquierda, hematomas y problemas en el oído medio.\nLa denuncia será estampada hoy a las 15.00 horas en la Fiscalía Militar.', 'ima_1.jpg'),
(9, 'U. de Concepción apabulla a Colo Colo y agudiza la crisis', 'Esta humillante derrota del cuadro albo aumentará las presiones durante la semana para destituir a Caña, quien es criticado por la hinchada que reclama no haber ganado nada y que no tiene un juego vistoso ni ordenado en la cancha.', 'La Universidad de Concepción derrotó este sábado por 5-1 a Colo Colo, apabullando a un cuadro albo que está en crisis por la carencia de triunfos y por el mal desempeño tanto del técnico Diego Cagna y de los jugadores.\r\n\r\nLos del “cacique” realizaron una pobre actuación en su casa y abandonaron el campo de juego en medio de las recriminaciones de los hinchas, especialmente los que integran la Garra Blanca que pedían la salida del estratega argentino y de todos los jugadores.\r\n\r\nLuego del anuncio hecho por Cagna, de realizar varios cambios en el esquema que venía desarrollando en las dos primeras fechas del torneo nacional, no pudo demostrar que es uno de los equipos grandes del campeonato.\r\n\r\nEl técnico dispuso una línea de tres en defensa conformada por Scotti, Alayes y Toro, quienes se vieron sobrepasados en todo el encuentro por una rápida delantera del Campanil.\r\n\r\nA los 21 minutos, Esteban Paredes colocaba el 1-0 para Colo Colo que hacía pensar a los hinchas en la supeeración de la crisis que atraviesan.\r\n\r\nSin embargo, Renato Ramos logró equiparar las cifras a los 34 minutos, pero lo peor estaba por venir, ya que a los 49 el mismo Ramos aumentaba para el cuadro penquista, provocando el descontrol de los barristas colocolinos.\r\n\r\nLa desesperación en el conjunto albo comenzó a hacer estragos, ya que fueron expulsados Álvaro Ormeño y Paredes.\r\n\r\nEl tercer gol para los de la Octava Región vino de los pies de José Luis Jiménez, quien se llevó en velocidad a un lento Alayes y con u globito logró vencer al meta Castillo.\r\n\r\nPosteriormente, el mismo ramos alargaba el marcador con una tripleta con un lanzamiento penal a los 75 minutos y luego la goleada fue cerrada por Jiménez a los 91.\r\n\r\nEsta humillante derrota del cuadro albo aumentará las presiones durante la semana para destituir a Cagna, quien es criticado por la hinchada que reclama no haber ganado nada y que no tiene un juego vistoso ni ordenado en la cancha.', 'ima_1.jpg'),
(8, 'Eliseo Salazar se Retira no corre mas', 'El ex piloto Fórmula 1 se cabreo de video de youtube', 'El formateo del texto, o sea, el formato del texto, son una serie de etiquetas que escribimos en html rodeando la palabra o el texto y que transforman ese texto en el formato que nosotros le hemos querido dar.\n\nAnteriormente ya hemos visto en un pequeño texto introductorio como se ponía la negrita y la itálica. Pero eso era solamente introductorio. A continuación lo vamos a explicar de una forma más detallada.\n\nLas etiquetas deben rodear al texto. Es decir, la etiqueta debe abrirse y cerrarse, conteniendo el texto o la palabra que queramos transformar, entre medias. En el ejemplo de la negrita se abriría  <b> y se cerraría </b>.\n\nSe pueden combinar diferentes formatos, o sea, diferentes etiquetas. Por ejemplo, si queremos que un texto esté en negrita y en cursiva escribiríamos esto:\n\n<b><i>Este texto está escrito en negrita y en cursiva</i></b>.Cuando combines, ten cuidado a la hora de cerrar las etiquetas. Debes cerrar las etiquetas por orden, de la más interior a la más exterior. Por último, recordad que podéis escribir las etiqutes en minúsculas o en mayúsculas.\n\nVamos con los diferentes formateos html que podemos encontrar:\n', 'ima_1.jpg'),
(10, 'Marzo 2010', 'esta es una nueva prueba', 'Secuela de la película The Purge. La noche de las bestias (2013). En la película original, el gobierno de Estados Unidos permite que, durante una noche, cualquier acto vandálico sea legal. De esta forma intentan reducir el número de criminales, ya que las cárceles del país se encuentran saturadas. La idea surge de la teoría de que todo ser humano tiene maldad en su interior, maldad que en algún momento saldrá a la luz. E', '067601fd4feb2b65b14a58f47b0ce236.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `id_partido` int(10) NOT NULL,
  `id_fecha` int(10) NOT NULL,
  `id_serie` int(10) NOT NULL,
  `id_arbitro` int(10) NOT NULL,
  `id_equipo` int(10) NOT NULL,
  `id_equipo_b` int(10) NOT NULL,
  `id_fixture` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id_serie` int(10) NOT NULL,
  `nombre_serie` varchar(100) NOT NULL,
  `desc_serie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id_serie`, `nombre_serie`, `desc_serie`) VALUES
(1, 'Primera \"A\" viejos', 'Así, una pregunta sale a la luz: ¿Cómo poder sobrevivir a los criminales sin convertirse en uno?'),
(2, 'Serie B', 'Así, una pregunta sale a la luz: ¿Cómo poder sobrevivir a los criminales sin convertirse en uno?\r\n		'),
(3, 'Serie Viejos', 'Así, una pregunta sale a la luz: ¿Cómo poder sobrevivir a los criminales sin convertirse en uno?\r\n							'),
(4, 'Dorados', 'hjhk hk hk kh kh hk hk hk kh hk u huk uhk huk huk uh \r\n	   		');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `id_tarjeta` int(2) NOT NULL,
  `nombre_tarjeta` varchar(50) NOT NULL,
  `desc_tarjeta` text NOT NULL,
  `img_tarjeta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetero`
--

CREATE TABLE `tarjetero` (
  `id_tarjetero` int(10) NOT NULL,
  `id_jugador` int(10) NOT NULL,
  `id_arbitro` int(10) NOT NULL,
  `id_tarjeta` int(10) NOT NULL,
  `id_fecha` int(10) NOT NULL,
  `id_partido` int(10) NOT NULL,
  `minuto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tarjetero`
--

INSERT INTO `tarjetero` (`id_tarjetero`, `id_jugador`, `id_arbitro`, `id_tarjeta`, `id_fecha`, `id_partido`, `minuto`) VALUES
(1, 1, 1, 1, 0, 0, 0),
(2, 2, 2, 2, 0, 0, 0),
(3, 1, 1, 0, 0, 0, 0),
(4, 3, 2, 0, 0, 0, 0),
(5, 4, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `perfil` varchar(30) NOT NULL,
  `id_equipo` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `perfil`, `id_equipo`, `username`, `password`) VALUES
(1, 'Administrador', 0, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'Delegado', 1, 'niko', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arbitros`
--
ALTER TABLE `arbitros`
  ADD PRIMARY KEY (`id_arbitro`);

--
-- Indices de la tabla `arb_prog`
--
ALTER TABLE `arb_prog`
  ADD PRIMARY KEY (`id_arb_prog`);

--
-- Indices de la tabla `canchas`
--
ALTER TABLE `canchas`
  ADD PRIMARY KEY (`id_cancha`);

--
-- Indices de la tabla `delegados`
--
ALTER TABLE `delegados`
  ADD PRIMARY KEY (`id_delegado`);

--
-- Indices de la tabla `directiva`
--
ALTER TABLE `directiva`
  ADD PRIMARY KEY (`id_directiva`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `fechas`
--
ALTER TABLE `fechas`
  ADD PRIMARY KEY (`id_fecha`);

--
-- Indices de la tabla `fixture`
--
ALTER TABLE `fixture`
  ADD PRIMARY KEY (`id_fixture`);

--
-- Indices de la tabla `goles`
--
ALTER TABLE `goles`
  ADD PRIMARY KEY (`id_gol`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id_jugador`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id_partido`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id_serie`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`id_tarjeta`);

--
-- Indices de la tabla `tarjetero`
--
ALTER TABLE `tarjetero`
  ADD PRIMARY KEY (`id_tarjetero`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arbitros`
--
ALTER TABLE `arbitros`
  MODIFY `id_arbitro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `arb_prog`
--
ALTER TABLE `arb_prog`
  MODIFY `id_arb_prog` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `canchas`
--
ALTER TABLE `canchas`
  MODIFY `id_cancha` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `delegados`
--
ALTER TABLE `delegados`
  MODIFY `id_delegado` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `directiva`
--
ALTER TABLE `directiva`
  MODIFY `id_directiva` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `fechas`
--
ALTER TABLE `fechas`
  MODIFY `id_fecha` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `fixture`
--
ALTER TABLE `fixture`
  MODIFY `id_fixture` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `goles`
--
ALTER TABLE `goles`
  MODIFY `id_gol` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id_jugador` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id_partido` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id_serie` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `id_tarjeta` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tarjetero`
--
ALTER TABLE `tarjetero`
  MODIFY `id_tarjetero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
