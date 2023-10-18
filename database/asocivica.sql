-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2023 a las 01:30:18
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
(1, 'ARL POSITIVA'),
(4, 'LIBERTY SEGUROS DE VIDA'),
(5, 'MAPFRE COLOMBIA VIDA SEGUROS S.A.'),
(6, 'RIESGOS LABORALES COLMENA'),
(2, 'SEGUROS BOLÍVAR S.A'),
(7, 'SEGUROS DE VIDA ALFA S.A'),
(3, 'SEGUROS DE VIDA AURORA S.A'),
(8, 'SEGUROS DE VIDA COLPATRIA S.A'),
(9, 'SEGUROS DE VIDA LA EQUIDAD ORGANISMO C.'),
(10, 'SURA - CIA. SURAMERICANA DE SEGUROS DE VIDA');

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
(1, 'COLFONDOS'),
(2, 'PORVENIR'),
(3, 'PROTECCIÓN'),
(4, 'SKANDIA'),
(5, 'FONDO NACIONAL DEL AHORRO');

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
  `estado` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_em`, `id_doc`, `documento`, `n_em`, `a_em`, `eml_em`, `f_em`, `barloc_em`, `dir_em`, `lic_emp`, `lib_em`, `tel_em`, `contrato`, `id_pens`, `id_eps`, `id_arl`, `id_ces`, `id_rh`, `estado`) VALUES
(1, 5, '12347678', 'Juan', 'Mayorga', 'juan.mayorga@email.com', 'https://example.com/juanmayorga.jpg', 'Tunal, Tunjuelito', 'Calle 52', 'No tiene', 'No tiene', '3323456789', 'link', 2, 10, 8, 5, 2, '1'),
(2, 1, '1234567890', 'Juan', 'Perez', 'juan.perez@email.com', 'https://example.com/juanerez.jpg', 'Restrepo, Antonio Nariño', 'Calle 123', 'A1', 'Primera clase', '3101234567', 'link', 1, 1, 1, 1, 1, '1'),
(3, 2, '2345678901', 'Maria', 'Gonzalez', 'maria.gonzalez@email.com', 'https://example.com/mariagonzales.jpg', 'Simón Bolivar, Barrios Unidos', 'Calle 456', 'A2', 'Segunda clase', '3123456789', 'link', 2, 2, 2, 2, 2, '1'),
(4, 3, '3456789012', 'Carlos', 'Lopez', 'carlos.lopez@email.com', 'https://example.com/carloslopez.jpg', 'La independencia, Bosa', 'Calle 789', 'No tiene', 'No tiene', '3156789012', 'link', 3, 3, 3, 3, 3, '1'),
(5, 4, '4567890123', 'Ana', 'Rodriguez', 'ana.rodriguez@email.com', 'https://example.com/anarodriguez.jpg', 'Santa Bárbara, Candelaria', 'Calle 321', 'A1', 'Primera clase', '3178901234', 'link', 4, 4, 4, 4, 4, '1'),
(6, 5, '5678901234', 'Pedro', 'Martinez', 'pedro.martinez@email.com', 'https://example.com/pedromartinez.jpg', 'Chapinero Alto, Chapinero', 'Calle 654', 'A2', 'Segunda clase', '3201234567', 'link', 5, 5, 5, 5, 5, '1'),
(7, 6, '6789012345', 'Sofia', 'Garcia', 'sofia.garcia@email.com', 'https://example.com/sofiagarcia.jpg', 'La igualdad, Kenndy', 'Calle 987', 'No tiene', 'No tiene', '3234567890', 'link', 3, 6, 6, 3, 6, '1'),
(8, 4, '7890123456', 'Luis', 'Fernandez', 'luis.fernandez@email.com', 'https://example.com/luisfernandez.jpg', 'Ricaurte, Los Mártires', 'Calle 135', 'A1', 'Primera clase', '3267890123', 'link', 2, 7, 7, 1, 7, '1'),
(9, 3, '8901234567', 'Laura', 'Sanchez', 'laura.sanchez@email.com', 'https://example.com/laurasanchez.jpg', 'Trinidad, Puente Aranda', 'Calle 246', 'A2', 'Segunda clase', '3290123456', 'link', 3, 8, 8, 2, 8, '1'),
(10, 2, '9012345678', 'Daniel', 'Ramirez', 'daniel.ramirez@email.com', 'https://example.com/danielramirez.jpg', 'La Soledad, Teusaquillo', 'Calle 369', 'No tiene', 'No tiene', '3323456789', 'link', 1, 9, 6, 1, 5, '1');

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
(1, '123456782', 'Empresa A', 'empresaA@gmail.com', 'Juan pablo Montoya', 2, '123456789', '123', 100000, '0', '2023-09-11', '2023-09-19', '003', '009'),
(2, '134567892', 'Empresa B', 'empresaB@hotmail.com', 'Representante Legal 2', 4, '134567890', '1234', 152, '0', '2021-05-24', '2023-09-12', 'SE-002', 'AE-002'),
(3, '145678903', 'Empresa C', 'empresaC@yahoo.com', 'Representante Legal 3', 2, '14567889', '12345', 200, '0', '2023-09-16', '2023-09-16', 'SE-003', 'AE-003'),
(4, '156789014', 'Empresa D', 'empresaD@outlook.com', 'Representante Legal 4', 6, '156789012', '123456', 250, '1', '2023-09-17', '2023-09-17', 'SE-004', 'AE-004'),
(5, '167890125', 'Empresa E', 'empresaE@gmail.com', 'Representante Legal 5', 2, '167890123', '1234567', 302, '0', '2023-09-06', '2023-09-06', 'SE-005', 'AE-005'),
(6, '178901236', 'Empresa F', 'empresaF@hotmail.com', 'Representante Legal 6', 2, '178901234', '12345678', 350, '0', '2023-01-12', '0000-00-00', 'SE-006', 'AE-006'),
(7, '189012347', 'Empresa G', 'empresaG@yahoo.com', 'Representante Legal 7', 2, '169352345', '123456789', 400, '0', '2022-05-22', '0000-00-00', 'SE-007', 'AE-007'),
(8, '189012349', 'Empresa I', 'empresaI@yahoo.com', 'Representante Legal 9', 2, '178904345', '987', 400, '0', '2022-05-19', '0000-00-00', 'SE-009', 'AE-009'),
(9, '1032676892', 'mapreco', 'mapreco@gmail.com', 'felipe', 5, '19191919', '9876', 560, '0', '2022-06-30', '0000-00-00', 'SE-002', 'AE-003'),
(10, '190123458', 'Empresa H', 'empresaH@outlook.com', 'Representante Legal 8', 2, '170186456', '9765', 450, '0', '2023-09-06', '2023-09-06', 'SE-008', 'AE-008'),
(11, '11129965-9', 'Empresa locion', 'locion@mail.co', 'Representante andres', 2, '190126456', '987654', 500, '1', '2023-08-20', '2024-08-20', 'SE-0010', 'AE-0020'),
(12, '10102939-6', 'cafito', 'cafito@mail.com', 'camilo', 2, '10006693322', '9876543', 260, '0', '2023-03-06', '2023-09-16', 'SE-69', 'AE-60'),
(13, '10102939-6', 'cafesito', 'cafesito@mail.com', 'camilo', 1, '10006693322', '98765432', 260, '0', '2023-03-06', '2023-09-10', 'SE-69', 'AE-60'),
(14, '95003636-9', 'norma', 'colores@norma.com', 'Mario Guzman', 2, '255569696', '325669696', 2500, '0', '2023-08-31', '2024-03-30', 'se-69', 'ae222'),
(15, '109566-9', 'Reservado cali', 'lcmed@mali.co', 'lucas', 2, '2525936', '36659591', 2525, '0', '2023-08-27', '2023-09-08', 'se-22', 'ae222'),
(16, '123456789', 'Mi Empreso', 'miempreso@example.com', 'Nombre Responsable', 1, '123456789', '97654', 1, '0', '2023-09-16', '2023-12-31', 'SE01', 'AE01'),
(17, '123456789', 'Mi Empresa', 'miempresa@example.com', 'Nombre Responsable', 2, '1234567890', '98765431', 1000, '0', '2023-09-16', '2023-12-31', 'SE01', 'AE01'),
(18, '1365745', 'Empresota', 'miempresota@example.com', 'Nombre Responsable', 1, '12367890', '98765', 560, '0', '2023-09-16', '2023-12-31', 'SE01', 'AE01'),
(19, '1365745', 'Empresoto', 'miempresoto@example.com', 'Nombre Responsable', 1, '1234567890', '987654321', 560, '0', '2023-09-16', '2023-12-31', 'SE01', 'AE01'),
(20, '109566-9', 'Celulares sas', 'administracion@celulares.com', 'Mario Mendoza', 2, '15056165', '2653322', 500000, '0', '2023-09-17', '2023-09-17', 'SE-001', 'AE-002'),
(21, '99865956-2', 'Tu empresa', 'recurso@tuemp.co', 'Nicolas', 2, '25663201', '2658854', 260000, '1', '2023-09-17', '2023-09-17', '08', '05'),
(23, '10102526-9', 'Ramo ', 'novedades@ramo.co', 'Rafael Molano', 2, '10214952', '2645321', 250000, '0', '2023-09-18', '2023-09-18', '0212', '0365');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado`
--

CREATE TABLE `encargado` (
  `ID_En` int(11) NOT NULL,
  `N_En` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tel1` varchar(15) NOT NULL,
  `tel2` varchar(15) NOT NULL,
  `tel3` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `encargado`
--

INSERT INTO `encargado` (`ID_En`, `N_En`, `tel1`, `tel2`, `tel3`) VALUES
(1, 'Mariana', '2161651', '266663', '3262362'),
(2, 'María Rodríguez', '2652652', '35235236', '3212132'),
(3, 'Pedro García', '3212535', '3252613', '3235153'),
(4, 'Laura Martínez', '2322515', '3232562', '32510001'),
(5, 'Carlos Sánchez', '2321321', '32659895', '32321003'),
(6, 'Ana Gómez', '3201532', '22521330', '20132352'),
(7, 'David Fernández', '32320303', '32320225', '32365012'),
(8, 'Carmen Díaz', '21321330', '3265600', '3200231'),
(9, 'José Jiménez', '2659963', '', ''),
(10, 'Lucía López', '2658858', '', ''),
(11, 'sadsa', '3556985', '', ''),
(12, 'Laura', '2689962', '', ''),
(13, 'Mario', '32658920', '', ''),
(14, 'Sara', '3659832', '', ''),
(15, 'Sara', '2653320', '', ''),
(16, 'juan', '2659935', '2659832', ''),
(17, 'Daniel Mendez', '2659985', '', ''),
(18, 'steven', '2448965', '', ''),
(19, 'Wilmer', '4456368', '2651517', '3652928'),
(20, 'Mirian ', '2654744', '3253220', '4469323'),
(21, 'juan', '321654321', '321654321', '321654321'),
(22, 'Camilo', '3105869288', '3169865', '3521410'),
(23, '', '', '', ''),
(24, 'Juan', '3215884762', '2658965', '3145862020'),
(25, 'Encargado 1 Sede 1', '111111111', '222222222', '333333333'),
(26, 'Encargado 2 Sede 1', '444444444', '555555555', '666666666'),
(27, 'Encargado 1 Sede 2', '777777777', '888888888', '999999999'),
(28, 'Encargado 1 Sede 1', '111111111', '222222222', '333333333'),
(29, 'Encargado 2 Sede 1', '444444444', '555555555', '666666666'),
(30, 'Encargado 1 Sede 2', '777777777', '888888888', '999999999'),
(31, 'Raul Hernandez', '11111111', '22222222', '33333333'),
(32, 'Daniela Linarez', '2111114', '5666322', '59995666'),
(33, 'Iliarte Mendez', '2658847', '3140523651', '2365515'),
(34, 'Sergio', '2654141', '3205408293', '3145027950');

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
(1, 1, 1, '1'),
(2, 2, 2, '0'),
(3, 3, 3, '0'),
(4, 4, 4, '0'),
(5, 5, 5, '0'),
(6, 6, 6, '0'),
(7, 7, 7, '0'),
(8, 8, 8, '0'),
(9, 9, 9, '1'),
(10, 10, 10, '0'),
(11, 9, 1, '1'),
(12, 11, 11, '1'),
(13, 12, 12, '1'),
(14, 13, 13, '1'),
(15, 14, 14, '0'),
(16, 15, 15, '0'),
(17, 16, 1, '0'),
(18, 17, 1, '0'),
(19, 18, 16, '0'),
(20, 19, 1, '0'),
(21, 20, 17, '0'),
(22, 21, 18, '0'),
(23, 22, 19, '0'),
(24, 23, 20, '0'),
(25, 24, 19, '0'),
(26, 25, 25, '0'),
(27, 26, 25, '1'),
(28, 27, 26, '0'),
(29, 28, 27, '0'),
(30, 29, 27, '0'),
(31, 30, 28, '0'),
(32, 31, 29, '0'),
(33, 32, 30, '0'),
(34, 33, 30, '0'),
(35, 34, 31, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eps`
--

CREATE TABLE `eps` (
  `ID_eps` tinyint(3) NOT NULL,
  `N_eps` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `eps`
--

INSERT INTO `eps` (`ID_eps`, `N_eps`) VALUES
(4, 'ALIANSALUD EPS'),
(26, 'ANAS WAYUU EPSI'),
(20, 'ASMET SALUD'),
(25, 'ASOCIACION INDIGENA DEL CAUCA EPSI'),
(15, 'CAJACOPI ATLANTICO'),
(22, 'CAPITAL SALUD EPS-S'),
(16, 'CAPRESOCA'),
(17, 'COMFACHOCO'),
(18, 'COMFAORIENTE'),
(11, 'COMFENALCO VALLE'),
(12, 'COMPENSAR EPS'),
(1, 'COOSALUD EPS-S'),
(24, 'DUSAKAWI EPSI'),
(21, 'EMSSANAR E.S.S.'),
(13, 'EPM - EMPRESAS PUBLICAS DE MEDELLIN'),
(19, 'EPS FAMILIAR DE COLOMBIA'),
(6, 'EPS SANITAS'),
(7, 'EPS SURA'),
(8, 'FAMISANAR'),
(14, 'FONDO DE PASIVO SOCIAL DE FERROCARRILES NACIONALES DE COLOMBIA'),
(27, 'MALLAMAS EPSI'),
(3, 'MUTUAL SER'),
(2, 'NUEVA EPS'),
(28, 'PIJAOS SALUD EPSI'),
(29, 'SALUD BÓLIVAR EPS SAS'),
(10, 'SALUD MIA'),
(5, 'SALUD TOTAL EPS S.A.'),
(23, 'SAVIA SALUD EPS'),
(9, 'SERVICIO OCCIDENTAL DE SALUD EPS SOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidencia`
--

CREATE TABLE `evidencia` (
  `id_evi` int(11) NOT NULL,
  `adjunto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `ID_Nov` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evidencia`
--

INSERT INTO `evidencia` (`id_evi`, `adjunto`, `ID_Nov`) VALUES
(1, 'adsasdasfs', 1),
(2, 'asdfasdfsad', 2),
(3, 'asfsadf', 3),
(4, 'afdsffasfdfgsd', 4),
(5, 'jhklkhlhkjhñ', 5),
(6, 'khñkhhkññ', 6),
(7, 'sfdasfdsa', 7),
(8, 'cgfhghjhj', 8),
(9, 'sdsdadsfdghhjj', 9),
(10, 'sdfgklñluytdf', 10);

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
(3, 'otra cosa', 3),
(6, 'otra cosa', 6),
(1, 'pass', 1),
(9, 'password10', 9),
(2, 'password3', 2),
(4, 'password5', 4),
(5, 'password6', 5),
(7, 'password8', 7),
(8, 'password9', 8);

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
  `id_em` int(11) NOT NULL,
  `ID_S` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `novedad`
--

INSERT INTO `novedad` (`ID_Nov`, `Fe_Nov`, `T_Nov`, `Dic_Nov`, `Des_Nov`, `id_em`, `ID_S`) VALUES
(1, '2023-07-29 19:04:06', 3, 'Calle 1 # 123', 'Robo de vehículo', 1, 1),
(2, '2023-07-29 19:04:10', 1, 'Calle 2 # 456', 'Accidente de tráfico', 1, 2),
(3, '2023-07-29 19:04:14', 4, 'Calle 3 # 789', 'Incendio en vivienda', 2, 3),
(4, '2023-07-29 19:04:17', 1, 'Calle 4 # 012', 'Robo a mano armada', 3, 4),
(5, '2023-07-29 19:04:20', 5, 'Calle 5 # 345', 'Inundación en zona residencial', 4, 5),
(6, '2023-07-29 19:04:23', 1, 'Calle 6 # 678', 'Atraco en tienda de conveniencia', 4, 6),
(7, '2023-07-29 19:04:27', 6, 'Calle 7 # 901', 'Explosión en fábrica', 6, 7),
(8, '2023-07-29 19:04:31', 1, 'Calle 8 # 234', 'Hurto en establecimiento comercial', 7, 8),
(9, '2023-07-29 19:04:34', 2, 'Calle 9 # 567', 'Incidente en espacio público', 9, 9),
(10, '2023-07-29 19:04:39', 1, 'Calle 10 # 890', 'Accidente laboral', 10, 10),
(14, '2023-07-29 19:04:43', 3, NULL, 'asds', 1, NULL),
(15, '2023-09-19 14:30:15', 1, 'calle1', 'asdg', 1, NULL),
(16, '2023-09-19 14:35:09', 2, NULL, 'todopaso', 1, 1),
(17, '2023-09-19 14:58:02', 1, NULL, 'Casa de ceramica robada', 9, 1);

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
(1, 'COLFONDOS'),
(5, 'COLPENSIONES'),
(2, 'PORVENIR'),
(3, 'PROTECCIÓN'),
(4, 'SKANDIA');

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
(2, 'A-'),
(1, 'A+'),
(6, 'AB-'),
(5, 'AB+'),
(4, 'B-'),
(3, 'B+'),
(8, 'O-'),
(7, 'O+');

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
(4, 'Empresa'),
(3, 'Motorizado'),
(2, 'Radio Operador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `ID_S` int(11) NOT NULL,
  `Dic_S` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Sec_V` tinyint(3) NOT NULL,
  `est_sed` varchar(2) NOT NULL,
  `id_e` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`ID_S`, `Dic_S`, `Sec_V`, `est_sed`, `id_e`) VALUES
(1, 'Calle 24 # 32 - 52', 2, '1', 1),
(2, 'Carrera 2 # 2-2', 3, '0', 2),
(3, 'Avenida 3 # 3-3', 3, '0', 3),
(4, 'Calle 4 # 4-4', 3, '0', 4),
(5, 'Carrera 5 # 5-5', 3, '0', 5),
(6, 'Avenida 6 # 6-6', 2, '0', 6),
(7, 'Calle 7 # 7-7', 2, '0', 7),
(8, 'Carrera 8 # 8-8', 1, '0', 8),
(9, 'Avenida 9 # 9-9', 1, '0', 9),
(10, 'Calle 10 # 10-10', 3, '0', 10),
(11, 'safdsa', 1, '0', 2),
(12, 'calle 95 # 36-60', 2, '2', 1),
(13, 'calle 99 - 36', 2, '0', 2),
(14, 'calle 26 # 35-65', 2, '0', 12),
(15, 'calle 26 # 35-65', 2, '0', 12),
(16, 'cll 56 # 32-60', 1, '0', 1),
(17, 'calle 24 carracas', 1, '2', 1),
(18, 'transversal 32', 2, '2', 1),
(19, 'calle 59 # 32-45', 3, '0', 1),
(20, 'carrera 12 # 24-60', 2, '0', 1),
(21, 'Dirección Sede 1', 1, '0', 16),
(22, 'Dirección Sede 2', 2, '0', 16),
(23, 'Dirección Sede 1', 1, '0', 17),
(24, 'Dirección Sede 2', 2, '0', 17),
(25, 'Dirección Sede 1', 1, '0', 18),
(26, 'Dirección Sede 2', 2, '0', 18),
(27, 'Dirección Sede 1', 1, '0', 19),
(28, 'Dirección Sede 2', 2, '0', 19),
(29, 'calle 94 # 34 -44', 2, '0', 20),
(30, 'calle 2c # 26-55', 4, '0', 21),
(31, 'Cl. 22c #68f-98, Bogotá', 4, '0', 23);

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
(2, 'Cédula de Ciudadanía'),
(4, 'Cédula de Extranjería'),
(6, 'NIT'),
(5, 'Pasaporte'),
(3, 'Tarjeta de Extranjería'),
(1, 'Tarjeta de Identidad');

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
  `id_em` int(11) NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf32 COLLATE utf32_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trazabilidad`
--

INSERT INTO `trazabilidad` (`ID_Tra`, `Fh_Tra`, `id_em`, `descripcion`) VALUES
(1, '2023-12-22 19:45:00', 1, NULL),
(2, '2023-10-04 17:09:57', 4, NULL),
(3, '2023-03-03 21:15:00', 1, NULL),
(4, '2023-08-24 22:00:00', 1, NULL),
(5, '2023-11-05 23:30:00', 1, NULL),
(6, '2023-10-04 17:10:02', 2, NULL),
(7, '2023-09-15 01:00:00', 1, NULL),
(8, '2023-10-04 17:10:06', 3, NULL),
(9, '2023-01-03 03:05:00', 1, NULL),
(10, '2023-10-04 17:10:16', 5, NULL);

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
  `Fecha_tecnicomecanica` date DEFAULT NULL,
  `estado` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_ve`, `Matricula`, `Cilindraje`, `Modelo`, `Fecha_Soat`, `Fecha_tecnicomecanica`, `estado`) VALUES
(1, 'ABC-12F', '99 C.C', '2010', '2023-03-12', '2023-03-22', '0'),
(2, 'BCD-89V', '150 C.C', '2000', '2023-06-17', '2023-02-19', '1'),
(3, 'DEF-45Q', '100 C.C', '2003', '2023-03-08', '2023-08-12', '2'),
(4, 'GHI-78T', '100 C.C', '2001', '2023-12-02', '2023-02-04', '0'),
(5, 'JKL-01J', '99 C.C', '2015', '2023-10-06', '2023-03-12', '0'),
(6, 'MNO-34D', '150 C.C', '2004', '2023-03-12', '2023-05-01', '0'),
(7, 'PQR-67B', '150 C.C', '2002', '2023-05-20', '2023-12-05', '0'),
(8, 'STU-90H', '200 C.C', '2012', '2023-09-17', '2023-11-12', '0'),
(9, 'VWX-23L', '99 C.C', '2010', '2023-04-28', '2023-09-14', '0'),
(10, 'YZA-56S', '100 C.C', '2003', '2023-03-24', '2023-10-10', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arl`
--
ALTER TABLE `arl`
  ADD PRIMARY KEY (`ID_arl`),
  ADD UNIQUE KEY `N_arl` (`N_arl`);

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
  ADD UNIQUE KEY `T_CEm` (`T_CEm`),
  ADD KEY `fk_contacto_emergencia` (`id_em`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_em`),
  ADD UNIQUE KEY `id_doc` (`id_doc`,`documento`),
  ADD UNIQUE KEY `eml_em` (`eml_em`),
  ADD KEY `empresa_ibfk_1` (`id_doc`),
  ADD KEY `empresa_ibfk_2` (`id_rh`),
  ADD KEY `empresa_ibfk_4` (`id_eps`),
  ADD KEY `empresa_ibfk_5` (`id_arl`),
  ADD KEY `empresa_ibfk_6` (`id_ces`),
  ADD KEY `empresa_ibfk_7` (`id_pens`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_e`),
  ADD UNIQUE KEY `ID_Doc` (`ID_Doc`,`CC_Rl`),
  ADD UNIQUE KEY `Nom_E` (`Nom_E`),
  ADD UNIQUE KEY `Eml_E` (`Eml_E`),
  ADD UNIQUE KEY `telefonoGeneral` (`telefonoGeneral`),
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
  ADD PRIMARY KEY (`ID_eps`),
  ADD UNIQUE KEY `N_eps` (`N_eps`);

--
-- Indices de la tabla `evidencia`
--
ALTER TABLE `evidencia`
  ADD PRIMARY KEY (`id_evi`),
  ADD KEY `evidencia_ibfk_1` (`ID_Nov`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID_log`),
  ADD UNIQUE KEY `passw` (`passw`,`id_em`),
  ADD KEY `id_em` (`id_em`);

--
-- Indices de la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD PRIMARY KEY (`ID_Nov`),
  ADD KEY `novedad_ibfk_1` (`id_em`),
  ADD KEY `novedad_ibfk_2` (`ID_S`),
  ADD KEY `novedad_ibfk_3` (`T_Nov`);

--
-- Indices de la tabla `pensiones`
--
ALTER TABLE `pensiones`
  ADD PRIMARY KEY (`ID_pens`),
  ADD UNIQUE KEY `N_pens` (`N_pens`);

--
-- Indices de la tabla `rh`
--
ALTER TABLE `rh`
  ADD PRIMARY KEY (`ID_RH`),
  ADD UNIQUE KEY `T_RH` (`T_RH`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_rol`),
  ADD UNIQUE KEY `N_rol` (`N_rol`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`ID_S`),
  ADD KEY `sede_ibfk_1` (`id_e`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`ID_Doc`),
  ADD UNIQUE KEY `N_TDoc` (`N_TDoc`);

--
-- Indices de la tabla `tp_novedad`
--
ALTER TABLE `tp_novedad`
  ADD PRIMARY KEY (`T_Nov`),
  ADD UNIQUE KEY `Nombre_Tn` (`Nombre_Tn`);

--
-- Indices de la tabla `trazabilidad`
--
ALTER TABLE `trazabilidad`
  ADD PRIMARY KEY (`ID_Tra`),
  ADD KEY `trasabilidad_ibfk_1` (`id_em`);

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
  ADD PRIMARY KEY (`id_ve`),
  ADD UNIQUE KEY `Matricula` (`Matricula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arl`
--
ALTER TABLE `arl`
  MODIFY `ID_arl` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `encargado`
--
ALTER TABLE `encargado`
  MODIFY `ID_En` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `encargado_estado`
--
ALTER TABLE `encargado_estado`
  MODIFY `idEncargadoEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `eps`
--
ALTER TABLE `eps`
  MODIFY `ID_eps` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `ID_Nov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `ID_S` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  ADD CONSTRAINT `empresa_ibfk_3` FOREIGN KEY (`id_eps`) REFERENCES `eps` (`ID_eps`),
  ADD CONSTRAINT `empresa_ibfk_4` FOREIGN KEY (`id_arl`) REFERENCES `arl` (`ID_arl`),
  ADD CONSTRAINT `empresa_ibfk_5` FOREIGN KEY (`id_ces`) REFERENCES `cesantias` (`ID_ces`),
  ADD CONSTRAINT `empresa_ibfk_6` FOREIGN KEY (`id_pens`) REFERENCES `pensiones` (`ID_pens`);

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
-- Filtros para la tabla `evidencia`
--
ALTER TABLE `evidencia`
  ADD CONSTRAINT `evidencia_ibfk_1` FOREIGN KEY (`ID_Nov`) REFERENCES `novedad` (`ID_Nov`);

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD CONSTRAINT `novedad_ibfk_1` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`),
  ADD CONSTRAINT `novedad_ibfk_2` FOREIGN KEY (`ID_S`) REFERENCES `sede` (`ID_S`),
  ADD CONSTRAINT `novedad_ibfk_3` FOREIGN KEY (`T_Nov`) REFERENCES `tp_novedad` (`T_Nov`);

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`id_e`) REFERENCES `empresa` (`id_e`);

--
-- Filtros para la tabla `trazabilidad`
--
ALTER TABLE `trazabilidad`
  ADD CONSTRAINT `trasabilidad_ibfk_1` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`);

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
