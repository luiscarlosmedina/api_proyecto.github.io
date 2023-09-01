-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2023 a las 07:53:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asocivica`
--
CREATE DATABASE IF NOT EXISTS `asocivica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `asocivica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arl`
--

CREATE TABLE `arl` (
  `ID_arl` tinyint(3) NOT NULL,
  `N_arl` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `arl`
--

INSERT INTO `arl` (`ID_arl`, `N_arl`) VALUES
(1, 'Sura'),
(2, 'Colpatria'),
(3, 'Positiva'),
(4, 'Bolívar'),
(5, 'Seguros Sura'),
(6, 'QBE'),
(7, 'Liberty'),
(8, 'Mapfre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_vehiculo`
--

CREATE TABLE `asigna_vehiculo` (
  `ID_AV` int(11) NOT NULL,
  `Fh_Asi` date NOT NULL,
  `id_ve` int(11) NOT NULL,
  `id_em` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `asigna_vehiculo`
--

INSERT INTO `asigna_vehiculo` (`ID_AV`, `Fh_Asi`, `id_ve`, `id_em`) VALUES
(1, '2023-07-23', 1, 1),
(2, '2023-07-22', 2, 3),
(3, '2023-07-21', 3, 2),
(4, '2023-07-20', 4, 5),
(5, '2023-07-19', 5, 6),
(6, '2023-07-18', 6, 6),
(7, '2023-07-17', 7, 7),
(8, '2023-07-16', 8, 7),
(9, '2023-07-15', 9, 8),
(10, '2023-07-14', 10, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cesantias`
--

CREATE TABLE `cesantias` (
  `ID_ces` tinyint(3) NOT NULL,
  `N_ces` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cesantias`
--

INSERT INTO `cesantias` (`ID_ces`, `N_ces`) VALUES
(1, 'Porvenir S.A.'),
(2, 'Protección S.A.'),
(3, 'Colfondos S.A.'),
(4, 'Fondo Nacional del Ahorro'),
(5, 'Old Mutual Colombia'),
(6, 'Skandia Vida S.A.'),
(7, 'Allianz Seguros S.A.'),
(8, 'Seguros Bolívar S.A.'),
(9, 'Liberty Seguros S.A.'),
(10, 'Seguros SURA S.A.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_emergencia`
--

CREATE TABLE `contacto_emergencia` (
  `ID_CEm` int(11) NOT NULL,
  `N_CoE` varchar(40) NOT NULL,
  `Csag` varchar(40) DEFAULT NULL,
  `id_em` int(11) NOT NULL,
  `T_CEm` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto_emergencia`
--

INSERT INTO `contacto_emergencia` (`ID_CEm`, `N_CoE`, `Csag`, `id_em`, `T_CEm`) VALUES
(1, 'Luis González', 'Primo', 1, '3112345678'),
(2, 'María López', 'Madre', 2, '3209876543'),
(3, 'Carlos Ramírez', 'Padre', 3, '3151234567'),
(4, 'Laura Torres', 'Hermana', 4, '3186547890'),
(5, 'Andrés Martínez', 'Tío', 5, '3147896543'),
(6, 'Ana Gómez', 'Prima', 6, '3004567890'),
(7, 'Pedro Sánchez', 'Padre', 7, '3179876543'),
(8, 'Isabel Vargas', 'Tía', 8, '3126547890'),
(9, 'Diego Ramírez', 'Hermano', 9, '3139876543'),
(10, 'Sofía Medina', 'Prima', 10, '3194567890');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_em` int(11) NOT NULL,
  `id_doc` tinyint(3) NOT NULL,
  `documento` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `n_em` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `a_em` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `eml_em` varchar(64) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `f_em` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `barloc_em` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dir_em` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `lic_emp` varchar(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `lib_em` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tel_em` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `contrato` varchar(255) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `id_pens` tinyint(3) NOT NULL,
  `id_eps` tinyint(3) NOT NULL,
  `id_arl` tinyint(3) NOT NULL,
  `id_ces` tinyint(3) NOT NULL,
  `id_rh` tinyint(3) NOT NULL,
  `id_rol` tinyint(3) NOT NULL,
  `estado` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_em`, `id_doc`, `documento`, `n_em`, `a_em`, `eml_em`, `f_em`, `barloc_em`, `dir_em`, `lic_emp`, `lib_em`, `tel_em`, `contrato`, `id_pens`, `id_eps`, `id_arl`, `id_ces`, `id_rh`, `id_rol`, `estado`) VALUES
(1, 10, '12347678', 'Juan', 'Mayorga', 'juan.mayorga@email.com', 'https://example.com/juanmayorga.jpg', 'Tunal, Tunjuelito', 'Calle 52', 'No tiene', 'No tiene', '3323456789', '', 10, 10, 8, 10, 2, 3, '0'),
(2, 1, '1234567890', 'Juan', 'Perez', 'juan.perez@email.com', 'https://example.com/juanerez.jpg', 'Restrepo, Antonio Nariño', 'Calle 123', 'A1', 'Primera clase', '3101234567', '', 1, 1, 1, 1, 1, 1, '0'),
(3, 2, '2345678901', 'Maria', 'Gonzalez', 'maria.gonzalez@email.com', 'https://example.com/mariagonzales.jpg', 'Simón Bolivar, Barrios Unidos', 'Calle 456', 'A2', 'Segunda clase', '3123456789', '', 2, 2, 2, 2, 2, 2, ''),
(4, 3, '3456789012', 'Carlos', 'Lopez', 'carlos.lopez@email.com', 'https://example.com/carloslopez.jpg', 'La independencia, Bosa', 'Calle 789', 'No tiene', 'No tiene', '3156789012', '', 3, 3, 3, 3, 3, 3, ''),
(5, 4, '4567890123', 'Ana', 'Rodriguez', 'ana.rodriguez@email.com', 'https://example.com/anarodriguez.jpg', 'Santa Bárbara, Candelaria', 'Calle 321', 'A1', 'Primera clase', '3178901234', '', 4, 4, 4, 4, 4, 4, ''),
(6, 5, '5678901234', 'Pedro', 'Martinez', 'pedro.martinez@email.com', 'https://example.com/pedromartinez.jpg', 'Chapinero Alto, Chapinero', 'Calle 654', 'A2', 'Segunda clase', '3201234567', '', 5, 5, 5, 5, 5, 2, ''),
(7, 6, '6789012345', 'Sofia', 'Garcia', 'sofia.garcia@email.com', 'https://example.com/sofiagarcia.jpg', 'La igualdad, Kenndy', 'Calle 987', 'No tiene', 'No tiene', '3234567890', '', 6, 6, 6, 6, 6, 1, ''),
(8, 7, '7890123456', 'Luis', 'Fernandez', 'luis.fernandez@email.com', 'https://example.com/luisfernandez.jpg', 'Ricaurte, Los Mártires', 'Calle 135', 'A1', 'Primera clase', '3267890123', '', 7, 7, 7, 7, 7, 3, ''),
(9, 8, '8901234567', 'Laura', 'Sanchez', 'laura.sanchez@email.com', 'https://example.com/laurasanchez.jpg', 'Trinidad, Puente Aranda', 'Calle 246', 'A2', 'Segunda clase', '3290123456', '', 8, 8, 8, 8, 8, 4, ''),
(10, 9, '9012345678', 'Daniel', 'Ramirez', 'daniel.ramirez@email.com', 'https://example.com/danielramirez.jpg', 'La Soledad, Teusaquillo', 'Calle 369', 'No tiene', 'No tiene', '3323456789', '', 9, 9, 6, 1, 9, 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_e` int(11) NOT NULL,
  `Nit_E` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nom_E` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Eml_E` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nom_Rl` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ID_Doc` tinyint(3) NOT NULL,
  `CC_Rl` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefonoGeneral` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Val_E` int(11) NOT NULL,
  `Est_E` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fh_Afi` date NOT NULL,
  `fechaFinalizacion` date NOT NULL,
  `COD_SE` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `COD_AE` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_e`, `Nit_E`, `Nom_E`, `Eml_E`, `Nom_Rl`, `ID_Doc`, `CC_Rl`, `telefonoGeneral`, `Val_E`, `Est_E`, `Fh_Afi`, `fechaFinalizacion`, `COD_SE`, `COD_AE`) VALUES
(1, '123456781', 'Empresa A', 'empresaA@gmail.com', 'Representante Legal 1', 1, '123456789', '', 100, '1', '2022-01-15', '0000-00-00', 'SE-001', 'AE-001'),
(2, '134567892', 'Empresa B', 'empresaB@hotmail.com', 'Representante Legal 2', 1, '134567890', '', 150, '0', '2021-05-24', '0000-00-00', 'SE-002', 'AE-002'),
(3, '145678903', 'Empresa C', 'empresaC@yahoo.com', 'Representante Legal 3', 2, '145678901', '', 200, '1', '2020-02-10', '0000-00-00', 'SE-003', 'AE-003'),
(4, '156789014', 'Empresa D', 'empresaD@outlook.com', 'Representante Legal 4', 10, '156789012', '', 250, '1', '2019-11-01', '0000-00-00', 'SE-004', 'AE-004'),
(5, '167890125', 'Empresa E', 'empresaE@gmail.com', 'Representante Legal 5', 2, '167890123', '', 300, '1', '2018-08-06', '0000-00-00', 'SE-005', 'AE-005'),
(6, '178901236', 'Empresa F', 'empresaF@hotmail.com', 'Representante Legal 6', 2, '178901234', '', 350, '0', '2023-01-12', '0000-00-00', 'SE-006', 'AE-006'),
(7, '189012347', 'Empresa G', 'empresaG@yahoo.com', 'Representante Legal 7', 2, '169352345', '', 400, '0', '2022-05-22', '0000-00-00', 'SE-007', 'AE-007'),
(8, '189012349', 'Empresa I', 'empresaI@yahoo.com', 'Representante Legal 9', 2, '178904345', '', 400, '0', '2022-05-19', '0000-00-00', 'SE-009', 'AE-009'),
(9, '1032676892', 'mapreco', 'mapreco@gmail.com', 'felipe', 10, '19191919', '', 560, '0', '2022-06-30', '0000-00-00', 'SE-002', 'AE-003'),
(10, '190123458', 'Empresa H', 'empresaH@outlook.com', 'Representante Legal 8', 2, '170186456', '', 450, '1', '2021-02-09', '0000-00-00', 'SE-008', 'AE-008'),
(11, '11129965-9', 'Empresa locion', 'locion@mail.co', 'Representante andres', 2, '190126456', '2693658', 500, '1', '2023-08-20', '2024-08-20', 'SE-0010', 'AE-0020'),
(12, '10102939-6', 'cafesito', 'cafesito@mail.com', 'camilo', 1, '10006693322', '2686655', 260, '0', '2023-03-06', '2023-09-10', 'SE-69', 'AE-60'),
(13, '10102939-6', 'cafesito', 'cafesito@mail.com', 'camilo', 1, '10006693322', '2686655', 260, '0', '2023-03-06', '2023-09-10', 'SE-69', 'AE-60');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado`
--

CREATE TABLE `encargado` (
  `ID_En` int(11) NOT NULL,
  `N_En` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `encargado`
--

INSERT INTO `encargado` (`ID_En`, `N_En`) VALUES
(1, 'Juan Perez'),
(2, 'María Rodríguez'),
(3, 'Pedro García'),
(4, 'Laura Martínez'),
(5, 'Carlos Sánchez'),
(6, 'Ana Gómez'),
(7, 'David Fernández'),
(8, 'Carmen Díaz'),
(9, 'José Jiménez'),
(10, 'Lucía López');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado_estado`
--

CREATE TABLE `encargado_estado` (
  `idEncargadoEstado` int(11) NOT NULL,
  `ID_En` int(11) NOT NULL,
  `ID_S` int(11) NOT NULL,
  `Est_en` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encargado_estado`
--

INSERT INTO `encargado_estado` (`idEncargadoEstado`, `ID_En`, `ID_S`, `Est_en`) VALUES
(1, 1, 1, 'Activo'),
(2, 2, 2, 'Activo'),
(3, 3, 3, 'Inactivo'),
(4, 4, 4, 'Activo'),
(5, 5, 5, 'Inactivo'),
(6, 6, 6, 'Activo'),
(7, 7, 7, 'Inactivo'),
(8, 8, 8, 'Inactivo'),
(9, 9, 9, 'Activo'),
(10, 10, 10, 'Inactivo'),
(11, 9, 1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eps`
--

CREATE TABLE `eps` (
  `ID_eps` tinyint(3) NOT NULL,
  `N_eps` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `eps`
--

INSERT INTO `eps` (`ID_eps`, `N_eps`) VALUES
(1, 'EPS SURA'),
(2, 'COMPENSAR EPS'),
(3, 'NUEVA EPS'),
(4, 'SANITAS EPS'),
(5, 'COOMEVA EPS'),
(6, 'SALUD TOTAL EPS'),
(7, 'FAMISANAR EPS'),
(8, 'ASMET SALUD EPS'),
(9, 'ALIANSALUD EPS'),
(10, 'MEDIMÁS EPS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidencia`
--

CREATE TABLE `evidencia` (
  `id_evi` int(11) NOT NULL,
  `adjunto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evidencia`
--

INSERT INTO `evidencia` (`id_evi`, `adjunto`) VALUES
(1, 'adsasdasfs'),
(2, 'asdfasdfsad'),
(3, 'asfsadf'),
(4, 'afdsffasfdfgsd'),
(5, 'jhklkhlhkjhñ'),
(6, 'khñkhhkññ'),
(7, 'sfdasfdsa'),
(8, 'cgfhghjhj'),
(9, 'sdsdadsfdghhjj'),
(10, 'sdfgklñluytdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `ID_log` int(11) NOT NULL,
  `passw` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_em` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`ID_log`, `passw`, `id_em`) VALUES
(1, 'pass', 1),
(2, 'password3', 2),
(3, 'otra cosa', 3),
(4, 'password5', 4),
(5, 'password6', 5),
(6, 'otra cosa', 6),
(7, 'password8', 7),
(8, 'password9', 8),
(9, 'password10', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

CREATE TABLE `novedad` (
  `ID_Nov` int(11) NOT NULL,
  `Fe_Nov` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `T_Nov` int(11) NOT NULL,
  `Dic_Nov` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Des_Nov` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_evi` int(11) DEFAULT NULL,
  `id_em` int(11) NOT NULL,
  `ID_S` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `novedad`
--

INSERT INTO `novedad` (`ID_Nov`, `Fe_Nov`, `T_Nov`, `Dic_Nov`, `Des_Nov`, `id_evi`, `id_em`, `ID_S`) VALUES
(1, '2023-07-29 19:04:06', 3, 'Calle 1 # 123', 'Robo de vehículo', 1, 1, 1),
(2, '2023-07-29 19:04:10', 1, 'Calle 2 # 456', 'Accidente de tráfico', 1, 1, 2),
(3, '2023-07-29 19:04:14', 4, 'Calle 3 # 789', 'Incendio en vivienda', 2, 2, 3),
(4, '2023-07-29 19:04:17', 1, 'Calle 4 # 012', 'Robo a mano armada', 3, 3, 4),
(5, '2023-07-29 19:04:20', 5, 'Calle 5 # 345', 'Inundación en zona residencial', 3, 4, 5),
(6, '2023-07-29 19:04:23', 1, 'Calle 6 # 678', 'Atraco en tienda de conveniencia', 4, 4, 6),
(7, '2023-07-29 19:04:27', 6, 'Calle 7 # 901', 'Explosión en fábrica', 1, 6, 7),
(8, '2023-07-29 19:04:31', 1, 'Calle 8 # 234', 'Hurto en establecimiento comercial', 1, 7, 8),
(9, '2023-07-29 19:04:34', 2, 'Calle 9 # 567', 'Incidente en espacio público', NULL, 9, 9),
(10, '2023-07-29 19:04:39', 1, 'Calle 10 # 890', 'Accidente laboral', 2, 10, 10),
(14, '2023-07-29 19:04:43', 3, NULL, 'asds', 3, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensiones`
--

CREATE TABLE `pensiones` (
  `ID_pens` tinyint(3) NOT NULL,
  `N_pens` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pensiones`
--

INSERT INTO `pensiones` (`ID_pens`, `N_pens`) VALUES
(1, 'COLPENSIONES'),
(2, 'PORVENIR'),
(3, 'PROTECCIÓN'),
(4, 'OLD MUTUAL'),
(5, 'FONDO NACIONAL DEL AHORRO'),
(6, 'FONDO DE PENSIONES DE ANTIOQUIA'),
(7, 'FONDO DE PENSIONES DE CÓRDOBA'),
(8, 'FONDO DE PENSIONES DE TOLIMA'),
(9, 'FONDO DE PENSIONES DE BOYACÁ'),
(10, 'FONDO DE PENSIONES DE NARIÑO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rh`
--

CREATE TABLE `rh` (
  `ID_RH` tinyint(3) NOT NULL,
  `T_RH` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rh`
--

INSERT INTO `rh` (`ID_RH`, `T_RH`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-'),
(9, 'A+'),
(10, 'B-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_rol` tinyint(3) NOT NULL,
  `N_rol` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_rol`, `N_rol`) VALUES
(1, 'ADMIN'),
(2, 'Radio Operador'),
(3, 'Motorizado'),
(4, 'Empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `ID_S` int(11) NOT NULL,
  `Dic_S` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Sec_V` tinyint(3) NOT NULL,
  `id_e` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`ID_S`, `Dic_S`, `Sec_V`, `id_e`) VALUES
(1, 'Calle 1 # 1-1', 1, 1),
(2, 'Carrera 2 # 2-2', 3, 2),
(3, 'Avenida 3 # 3-3', 2, 3),
(4, 'Calle 4 # 4-4', 3, 4),
(5, 'Carrera 5 # 5-5', 3, 5),
(6, 'Avenida 6 # 6-6', 2, 6),
(7, 'Calle 7 # 7-7', 2, 7),
(8, 'Carrera 8 # 8-8', 1, 8),
(9, 'Avenida 9 # 9-9', 1, 9),
(10, 'Calle 10 # 10-10', 3, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono_encargado`
--

CREATE TABLE `telefono_encargado` (
  `id_tel` int(11) NOT NULL,
  `ID_En` int(11) NOT NULL,
  `tel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `telefono_encargado`
--

INSERT INTO `telefono_encargado` (`id_tel`, `ID_En`, `tel`) VALUES
(1, 1, '324355343'),
(2, 2, '234543322'),
(3, 3, '43455463'),
(4, 4, '1223345567'),
(5, 5, '12345673456'),
(6, 6, '78654321'),
(7, 7, '89765435465'),
(8, 8, '23445644'),
(9, 8, '2343454'),
(10, 9, '1234565544');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `ID_Doc` tinyint(3) NOT NULL,
  `N_TDoc` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`ID_Doc`, `N_TDoc`) VALUES
(1, 'Tarjeta de Identidad'),
(2, 'Cédula de Ciudadanía'),
(3, 'Tarjeta de Extranjería'),
(4, 'Cédula de Extranjería'),
(5, 'Pasaporte'),
(6, 'NIT'),
(7, 'Cédula de Extranjería'),
(8, 'Tarjeta de Identidad'),
(9, 'Cédula de Ciudadanía'),
(10, 'Cédula de Extranjería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tp_novedad`
--

CREATE TABLE `tp_novedad` (
  `T_Nov` int(11) NOT NULL,
  `Nombre_Tn` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descrip_Tn` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tp_novedad`
--

INSERT INTO `tp_novedad` (`T_Nov`, `Nombre_Tn`, `descrip_Tn`) VALUES
(1, 'Robo', 'La propiedad de la empresa fue robada.'),
(2, 'Atentado', 'La empresa sufrió un ataque violento.'),
(3, 'Accidente laboral', 'Uno de los trabajadores sufrió un accidente en el lugar de trabajo.'),
(4, 'Ingreso forzado a bodega', 'Se detectó un ingreso no autorizado a la bodega de la empresa.'),
(5, 'Incendio', 'La empresa sufrió un incendio en sus instalaciones.'),
(6, 'Falla en el sistema', 'Uno de los sistemas de la empresa sufrió una falla técnica.'),
(7, 'Amenaza', 'La empresa recibió una amenaza directa.'),
(8, 'Fraude', 'Se detectó un fraude dentro de la empresa.'),
(9, 'Pérdida de documentos', 'Se perdió una importante documentación de la empresa.'),
(10, 'Daño en la propiedad', 'La propiedad de la empresa sufrio daños significativos en el sector de vigilancia.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trazabilidad`
--

CREATE TABLE `trazabilidad` (
  `ID_Tra` int(11) NOT NULL,
  `Fh_Tra` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `T_Tra` bit(1) NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf32 COLLATE utf32_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trazabilidad`
--

INSERT INTO `trazabilidad` (`ID_Tra`, `Fh_Tra`, `T_Tra`, `descripcion`) VALUES
(1, '2023-12-22 19:45:00', b'1', NULL),
(2, '2023-03-02 20:30:00', b'0', NULL),
(3, '2023-03-03 21:15:00', b'1', NULL),
(4, '2023-08-24 22:00:00', b'1', NULL),
(5, '2023-11-05 23:30:00', b'1', NULL),
(6, '2023-10-17 00:45:00', b'0', NULL),
(7, '2023-09-15 01:00:00', b'1', NULL),
(8, '2023-02-11 02:20:00', b'0', NULL),
(9, '2023-01-03 03:05:00', b'1', NULL),
(10, '2023-12-11 04:10:00', b'0', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_rol`
--

CREATE TABLE `user_rol` (
  `ID_UR` int(11) NOT NULL,
  `ID_rol` tinyint(3) NOT NULL,
  `ID_log` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `user_rol`
--

INSERT INTO `user_rol` (`ID_UR`, `ID_rol`, `ID_log`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 1, 5),
(6, 2, 6),
(7, 3, 7),
(8, 4, 8),
(9, 2, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_ve` int(11) NOT NULL,
  `Matricula` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Cilindraje` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Modelo` year(4) DEFAULT NULL,
  `Fecha_Soat` date DEFAULT NULL,
  `Fecha_tecnicomecanica` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_ve`, `Matricula`, `Cilindraje`, `Modelo`, `Fecha_Soat`, `Fecha_tecnicomecanica`) VALUES
(1, 'ABC-12F', '99 C.C', '2010', '2023-03-12', '2023-03-22'),
(2, 'BCD-89V', '150 C.C', '2000', '2023-06-17', '2023-02-19'),
(3, 'DEF-45Q', '100 C.C', '2003', '2023-03-08', '2023-08-12'),
(4, 'GHI-78T', '100 C.C', '2001', '2023-12-02', '2023-02-04'),
(5, 'JKL-01J', '99 C.C', '2015', '2023-10-06', '2023-03-12'),
(6, 'MNO-34D', '150 C.C', '2004', '2023-03-12', '2023-05-01'),
(7, 'PQR-67B', '150 C.C', '2002', '2023-05-20', '2023-12-05'),
(8, 'STU-90H', '200 C.C', '2012', '2023-09-17', '2023-11-12'),
(9, 'VWX-23L', '99 C.C', '2010', '2023-04-28', '2023-09-14'),
(10, 'YZA-56S', '100 C.C', '2003', '2023-03-24', '2023-10-10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arl`
--
ALTER TABLE `arl`
  ADD PRIMARY KEY (`ID_arl`);

--
-- Indices de la tabla `asigna_vehiculo`
--
ALTER TABLE `asigna_vehiculo`
  ADD PRIMARY KEY (`ID_AV`),
  ADD KEY `asigna_vehiculo_ibfk_1` (`id_em`),
  ADD KEY `asigna_vehiculo_ibfk_2` (`id_ve`);

--
-- Indices de la tabla `cesantias`
--
ALTER TABLE `cesantias`
  ADD PRIMARY KEY (`ID_ces`);

--
-- Indices de la tabla `contacto_emergencia`
--
ALTER TABLE `contacto_emergencia`
  ADD PRIMARY KEY (`ID_CEm`),
  ADD KEY `fk_contacto_emergencia` (`id_em`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_em`),
  ADD KEY `empresa_ibfk_1` (`id_doc`),
  ADD KEY `empresa_ibfk_2` (`id_rh`),
  ADD KEY `empresa_ibfk_3` (`id_rol`),
  ADD KEY `empresa_ibfk_4` (`id_eps`),
  ADD KEY `empresa_ibfk_5` (`id_arl`),
  ADD KEY `empresa_ibfk_6` (`id_ces`),
  ADD KEY `empresa_ibfk_7` (`id_pens`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_e`),
  ADD KEY `fk_ID_Doc` (`ID_Doc`);

--
-- Indices de la tabla `encargado`
--
ALTER TABLE `encargado`
  ADD PRIMARY KEY (`ID_En`);

--
-- Indices de la tabla `encargado_estado`
--
ALTER TABLE `encargado_estado`
  ADD PRIMARY KEY (`idEncargadoEstado`),
  ADD KEY `encargado_estado_ibfk_1` (`ID_En`),
  ADD KEY `encargado_estado_ibfk_2` (`ID_S`);

--
-- Indices de la tabla `eps`
--
ALTER TABLE `eps`
  ADD PRIMARY KEY (`ID_eps`);

--
-- Indices de la tabla `evidencia`
--
ALTER TABLE `evidencia`
  ADD PRIMARY KEY (`id_evi`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID_log`),
  ADD KEY `login_ibfk_1` (`id_em`);

--
-- Indices de la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD PRIMARY KEY (`ID_Nov`),
  ADD KEY `novedad_ibfk_1` (`id_em`),
  ADD KEY `novedad_ibfk_2` (`ID_S`),
  ADD KEY `novedad_ibfk_3` (`T_Nov`),
  ADD KEY `novedad_ibfk_4` (`id_evi`);

--
-- Indices de la tabla `pensiones`
--
ALTER TABLE `pensiones`
  ADD PRIMARY KEY (`ID_pens`);

--
-- Indices de la tabla `rh`
--
ALTER TABLE `rh`
  ADD PRIMARY KEY (`ID_RH`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_rol`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`ID_S`),
  ADD KEY `sede_ibfk_1` (`id_e`);

--
-- Indices de la tabla `telefono_encargado`
--
ALTER TABLE `telefono_encargado`
  ADD PRIMARY KEY (`id_tel`),
  ADD KEY `fk_ID_En` (`ID_En`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`ID_Doc`);

--
-- Indices de la tabla `tp_novedad`
--
ALTER TABLE `tp_novedad`
  ADD PRIMARY KEY (`T_Nov`);

--
-- Indices de la tabla `trazabilidad`
--
ALTER TABLE `trazabilidad`
  ADD PRIMARY KEY (`ID_Tra`);

--
-- Indices de la tabla `user_rol`
--
ALTER TABLE `user_rol`
  ADD PRIMARY KEY (`ID_UR`),
  ADD KEY `user_rol_ibfk_1` (`ID_log`),
  ADD KEY `user_rol_ibfk_2` (`ID_rol`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_ve`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arl`
--
ALTER TABLE `arl`
  MODIFY `ID_arl` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `asigna_vehiculo`
--
ALTER TABLE `asigna_vehiculo`
  MODIFY `ID_AV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cesantias`
--
ALTER TABLE `cesantias`
  MODIFY `ID_ces` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `contacto_emergencia`
--
ALTER TABLE `contacto_emergencia`
  MODIFY `ID_CEm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_em` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `encargado`
--
ALTER TABLE `encargado`
  MODIFY `ID_En` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `encargado_estado`
--
ALTER TABLE `encargado_estado`
  MODIFY `idEncargadoEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `eps`
--
ALTER TABLE `eps`
  MODIFY `ID_eps` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `evidencia`
--
ALTER TABLE `evidencia`
  MODIFY `id_evi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `ID_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `novedad`
--
ALTER TABLE `novedad`
  MODIFY `ID_Nov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pensiones`
--
ALTER TABLE `pensiones`
  MODIFY `ID_pens` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `rh`
--
ALTER TABLE `rh`
  MODIFY `ID_RH` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_rol` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `ID_S` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `telefono_encargado`
--
ALTER TABLE `telefono_encargado`
  MODIFY `id_tel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  MODIFY `ID_Doc` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tp_novedad`
--
ALTER TABLE `tp_novedad`
  MODIFY `T_Nov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `trazabilidad`
--
ALTER TABLE `trazabilidad`
  MODIFY `ID_Tra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `user_rol`
--
ALTER TABLE `user_rol`
  MODIFY `ID_UR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_ve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asigna_vehiculo`
--
ALTER TABLE `asigna_vehiculo`
  ADD CONSTRAINT `asigna_vehiculo_ibfk_1` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`),
  ADD CONSTRAINT `asigna_vehiculo_ibfk_2` FOREIGN KEY (`id_ve`) REFERENCES `vehiculo` (`id_ve`);

--
-- Filtros para la tabla `contacto_emergencia`
--
ALTER TABLE `contacto_emergencia`
  ADD CONSTRAINT `contacto_emergencia` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `tipo_doc` (`ID_Doc`),
  ADD CONSTRAINT `empresa_ibfk_2` FOREIGN KEY (`id_rh`) REFERENCES `rh` (`ID_RH`),
  ADD CONSTRAINT `empresa_ibfk_3` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`ID_rol`),
  ADD CONSTRAINT `empresa_ibfk_4` FOREIGN KEY (`id_eps`) REFERENCES `eps` (`ID_eps`),
  ADD CONSTRAINT `empresa_ibfk_5` FOREIGN KEY (`id_arl`) REFERENCES `arl` (`ID_arl`),
  ADD CONSTRAINT `empresa_ibfk_6` FOREIGN KEY (`id_ces`) REFERENCES `cesantias` (`ID_ces`),
  ADD CONSTRAINT `empresa_ibfk_7` FOREIGN KEY (`id_pens`) REFERENCES `pensiones` (`ID_pens`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_ID_Doc` FOREIGN KEY (`ID_Doc`) REFERENCES `tipo_doc` (`ID_Doc`);

--
-- Filtros para la tabla `encargado_estado`
--
ALTER TABLE `encargado_estado`
  ADD CONSTRAINT `encargado_estado_ibfk_1` FOREIGN KEY (`ID_En`) REFERENCES `encargado` (`ID_En`),
  ADD CONSTRAINT `encargado_estado_ibfk_2` FOREIGN KEY (`ID_S`) REFERENCES `sede` (`ID_S`);

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`);

--
-- Filtros para la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD CONSTRAINT `novedad_ibfk_1` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`),
  ADD CONSTRAINT `novedad_ibfk_2` FOREIGN KEY (`ID_S`) REFERENCES `sede` (`ID_S`),
  ADD CONSTRAINT `novedad_ibfk_3` FOREIGN KEY (`T_Nov`) REFERENCES `tp_novedad` (`T_Nov`),
  ADD CONSTRAINT `novedad_ibfk_4` FOREIGN KEY (`id_evi`) REFERENCES `evidencia` (`id_evi`);

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`id_e`) REFERENCES `empresa` (`id_e`);

--
-- Filtros para la tabla `telefono_encargado`
--
ALTER TABLE `telefono_encargado`
  ADD CONSTRAINT `fk_ID_En` FOREIGN KEY (`ID_En`) REFERENCES `encargado` (`ID_En`);

--
-- Filtros para la tabla `user_rol`
--
ALTER TABLE `user_rol`
  ADD CONSTRAINT `user_rol_ibfk_1` FOREIGN KEY (`ID_log`) REFERENCES `login` (`ID_log`),
  ADD CONSTRAINT `user_rol_ibfk_2` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
