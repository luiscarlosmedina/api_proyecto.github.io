-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: b4zpdfljvwzlvh9yqpvc-mysql.services.clever-cloud.com:3306
-- Generation Time: Sep 19, 2023 at 03:07 PM
-- Server version: 8.0.15-5
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b4zpdfljvwzlvh9yqpvc`
--
CREATE DATABASE IF NOT EXISTS `b4zpdfljvwzlvh9yqpvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `b4zpdfljvwzlvh9yqpvc`;

-- --------------------------------------------------------

--
-- Table structure for table `arl`
--

CREATE TABLE `arl` (
  `ID_arl` tinyint(3) NOT NULL,
  `N_arl` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arl`
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
-- Table structure for table `asigna_vehiculo`
--

CREATE TABLE `asigna_vehiculo` (
  `ID_AV` int(11) NOT NULL,
  `Fh_Asi` date NOT NULL,
  `id_ve` int(11) NOT NULL,
  `id_em` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asigna_vehiculo`
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
-- Table structure for table `cesantias`
--

CREATE TABLE `cesantias` (
  `ID_ces` tinyint(3) NOT NULL,
  `N_ces` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cesantias`
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
-- Table structure for table `contacto_emergencia`
--

CREATE TABLE `contacto_emergencia` (
  `ID_CEm` int(11) NOT NULL,
  `N_CoE` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `Csag` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_em` int(11) NOT NULL,
  `T_CEm` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacto_emergencia`
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
-- Table structure for table `empleado`
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
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`id_em`, `id_doc`, `documento`, `n_em`, `a_em`, `eml_em`, `f_em`, `barloc_em`, `dir_em`, `lic_emp`, `lib_em`, `tel_em`, `contrato`, `id_pens`, `id_eps`, `id_arl`, `id_ces`, `id_rh`, `id_rol`, `estado`) VALUES
(1, 5, '12347678', 'Juan', 'Mayorga', 'juan.mayorga@email.com', 'https://example.com/juanmayorga.jpg', 'Tunal, Tunjuelito', 'Calle 52', 'No tiene', 'No tiene', '3323456789', 'link', 10, 10, 8, 10, 2, 3, ''),
(2, 1, '1234567890', 'Juan', 'Perez', 'juan.perez@email.com', 'https://example.com/juanerez.jpg', 'Restrepo, Antonio Nariño', 'Calle 123', 'A1', 'Primera clase', '3101234567', 'link', 1, 1, 1, 1, 1, 1, ''),
(3, 2, '2345678901', 'Maria', 'Gonzalez', 'maria.gonzalez@email.com', 'https://example.com/mariagonzales.jpg', 'Simón Bolivar, Barrios Unidos', 'Calle 456', 'A2', 'Segunda clase', '3123456789', 'link', 2, 2, 2, 2, 2, 2, ''),
(4, 3, '3456789012', 'Carlos', 'Lopez', 'carlos.lopez@email.com', 'https://example.com/carloslopez.jpg', 'La independencia, Bosa', 'Calle 789', 'No tiene', 'No tiene', '3156789012', 'link', 3, 3, 3, 3, 3, 3, ''),
(5, 4, '4567890123', 'Ana', 'Rodriguez', 'ana.rodriguez@email.com', 'https://example.com/anarodriguez.jpg', 'Santa Bárbara, Candelaria', 'Calle 321', 'A1', 'Primera clase', '3178901234', 'link', 4, 4, 4, 4, 4, 4, ''),
(6, 5, '5678901234', 'Pedro', 'Martinez', 'pedro.martinez@email.com', 'https://example.com/pedromartinez.jpg', 'Chapinero Alto, Chapinero', 'Calle 654', 'A2', 'Segunda clase', '3201234567', 'link', 5, 5, 5, 5, 5, 2, ''),
(7, 6, '6789012345', 'Sofia', 'Garcia', 'sofia.garcia@email.com', 'https://example.com/sofiagarcia.jpg', 'La igualdad, Kenndy', 'Calle 987', 'No tiene', 'No tiene', '3234567890', 'link', 6, 6, 6, 6, 6, 1, ''),
(8, 4, '7890123456', 'Luis', 'Fernandez', 'luis.fernandez@email.com', 'https://example.com/luisfernandez.jpg', 'Ricaurte, Los Mártires', 'Calle 135', 'A1', 'Primera clase', '3267890123', 'link', 7, 7, 7, 7, 7, 3, ''),
(9, 3, '8901234567', 'Laura', 'Sanchez', 'laura.sanchez@email.com', 'https://example.com/laurasanchez.jpg', 'Trinidad, Puente Aranda', 'Calle 246', 'A2', 'Segunda clase', '3290123456', 'link', 8, 8, 8, 8, 8, 4, ''),
(10, 2, '9012345678', 'Daniel', 'Ramirez', 'daniel.ramirez@email.com', 'https://example.com/danielramirez.jpg', 'La Soledad, Teusaquillo', 'Calle 369', 'No tiene', 'No tiene', '3323456789', 'link', 9, 9, 6, 1, 5, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
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
-- Dumping data for table `empresa`
--

INSERT INTO `empresa` (`id_e`, `Nit_E`, `Nom_E`, `Eml_E`, `Nom_Rl`, `ID_Doc`, `CC_Rl`, `telefonoGeneral`, `Val_E`, `Est_E`, `Fh_Afi`, `fechaFinalizacion`, `COD_SE`, `COD_AE`) VALUES
(1, '123456782', 'Empresa A', 'empresaA@gmail.com', 'Juan pablo Montoya', 2, '123456789', '2635959', 100000, '0', '2023-09-11', '2023-09-19', '003', '009'),
(2, '134567892', 'Empresa B', 'empresaB@hotmail.com', 'Representante Legal 2', 1, '134567890', '3252694', 152, '0', '2021-05-24', '2023-09-12', 'SE-002', 'AE-002'),
(3, '145678903', 'Empresa C', 'empresaC@yahoo.com', 'Representante Legal 3', 2, '14567889', '', 200, '0', '2023-09-16', '2023-09-16', 'SE-003', 'AE-003'),
(4, '156789014', 'Empresa D', 'empresaD@outlook.com', 'Representante Legal 4', 6, '156789012', '', 250, '1', '2023-09-17', '2023-09-17', 'SE-004', 'AE-004'),
(5, '167890125', 'Empresa E', 'empresaE@gmail.com', 'Representante Legal 5', 2, '167890123', '', 302, '0', '2023-09-06', '2023-09-06', 'SE-005', 'AE-005'),
(6, '178901236', 'Empresa F', 'empresaF@hotmail.com', 'Representante Legal 6', 2, '178901234', '', 350, '0', '2023-01-12', '0000-00-00', 'SE-006', 'AE-006'),
(7, '189012347', 'Empresa G', 'empresaG@yahoo.com', 'Representante Legal 7', 2, '169352345', '', 400, '0', '2022-05-22', '0000-00-00', 'SE-007', 'AE-007'),
(8, '189012349', 'Empresa I', 'empresaI@yahoo.com', 'Representante Legal 9', 2, '178904345', '', 400, '0', '2022-05-19', '0000-00-00', 'SE-009', 'AE-009'),
(9, '1032676892', 'mapreco', 'mapreco@gmail.com', 'felipe', 5, '19191919', '', 560, '0', '2022-06-30', '0000-00-00', 'SE-002', 'AE-003'),
(10, '190123458', 'Empresa H', 'empresaH@outlook.com', 'Representante Legal 8', 2, '170186456', '', 450, '0', '2023-09-06', '2023-09-06', 'SE-008', 'AE-008'),
(11, '11129965-9', 'Empresa locion', 'locion@mail.co', 'Representante andres', 2, '190126456', '2693658', 500, '1', '2023-08-20', '2024-08-20', 'SE-0010', 'AE-0020'),
(12, '10102939-6', 'cafesito', 'cafesito@mail.com', 'camilo', 2, '10006693322', '2686655', 260, '0', '2023-03-06', '2023-09-16', 'SE-69', 'AE-60'),
(13, '10102939-6', 'cafesito', 'cafesito@mail.com', 'camilo', 1, '10006693322', '2686655', 260, '0', '2023-03-06', '2023-09-10', 'SE-69', 'AE-60'),
(14, '95003636-9', 'norma', 'colores@norma.com', 'Mario Guzman', 2, '255569696', '325669696', 2500, '0', '2023-08-31', '2024-03-30', 'se-69', 'ae222'),
(15, '109566-9', 'Reservado cali', 'lcmed@mali.co', 'lucas', 2, '2525936', '36659591', 2525, '0', '2023-08-27', '2023-09-08', 'se-22', 'ae222'),
(16, '123456789', 'Mi Empresa', 'miempresa@example.com', 'Nombre Responsable', 1, '1234567890', '987654321', 1, '0', '2023-09-16', '2023-12-31', 'SE01', 'AE01'),
(17, '123456789', 'Mi Empresa', 'miempresa@example.com', 'Nombre Responsable', 1, '1234567890', '987654321', 1000, '0', '2023-09-16', '2023-12-31', 'SE01', 'AE01'),
(18, '1365745', 'Empresota', 'miempresa@example.com', 'Nombre Responsable', 1, '1234567890', '987654321', 560, '0', '2023-09-16', '2023-12-31', 'SE01', 'AE01'),
(19, '1365745', 'Empresota', 'miempresa@example.com', 'Nombre Responsable', 1, '1234567890', '987654321', 560, '0', '2023-09-16', '2023-12-31', 'SE01', 'AE01'),
(20, '109566-9', 'Celulares sas', 'administracion@celulares.com', 'Mario Mendoza', 2, '15056165', '2653322', 500000, '0', '2023-09-17', '2023-09-17', 'SE-001', 'AE-002'),
(21, '99865956-2', 'Tu empresa', 'recurso@tuemp.co', 'Nicolas', 2, '25663201', '2658854', 260000, '1', '2023-09-17', '2023-09-17', '08', '05'),
(23, '10102526-9', 'Ramo ', 'novedades@ramo.co', 'Rafael Molano', 2, '10214952', '2645321', 250000, '0', '2023-09-18', '2023-09-18', '0212', '0365');

-- --------------------------------------------------------

--
-- Table structure for table `encargado`
--

CREATE TABLE `encargado` (
  `ID_En` int(11) NOT NULL,
  `N_En` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tel1` varchar(15) NOT NULL,
  `tel2` varchar(15) NOT NULL,
  `tel3` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `encargado`
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
-- Table structure for table `encargado_estado`
--

CREATE TABLE `encargado_estado` (
  `idEncargadoEstado` int(11) NOT NULL,
  `ID_En` int(11) NOT NULL,
  `ID_S` int(11) NOT NULL,
  `Est_en` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `encargado_estado`
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
-- Table structure for table `eps`
--

CREATE TABLE `eps` (
  `ID_eps` tinyint(3) NOT NULL,
  `N_eps` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eps`
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
-- Table structure for table `evidencia`
--

CREATE TABLE `evidencia` (
  `id_evi` int(11) NOT NULL,
  `adjunto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evidencia`
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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID_log` int(11) NOT NULL,
  `passw` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ID_Em` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID_log`, `passw`, `ID_Em`) VALUES
(1, 'pass', '2345678901'),
(2, 'password3', '3456789012'),
(3, 'otra cosa', '1231231231'),
(4, 'password5', '5678901234'),
(5, 'password6', '6789012345'),
(6, 'otra cosa', '1231231231'),
(7, 'password8', '8901234567'),
(8, 'password9', '9012345678'),
(9, 'password10', '12347678');

-- --------------------------------------------------------

--
-- Table structure for table `novedad`
--

CREATE TABLE `novedad` (
  `ID_Nov` int(11) NOT NULL,
  `Fe_Nov` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `T_Nov` int(11) NOT NULL,
  `Dic_Nov` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Des_Nov` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_evi` int(11) DEFAULT NULL,
  `id_em` int(11) NOT NULL,
  `ID_S` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `novedad`
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
(14, '2023-07-29 19:04:43', 3, NULL, 'asds', 3, 1, NULL),
(15, '2023-09-19 14:30:15', 1, 'calle1', 'asdg', 1, 1, NULL),
(16, '2023-09-19 14:35:09', 2, NULL, 'todopaso', 1, 1, 1),
(17, '2023-09-19 14:58:02', 1, NULL, 'Casa de ceramica robada', 1, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pensiones`
--

CREATE TABLE `pensiones` (
  `ID_pens` tinyint(3) NOT NULL,
  `N_pens` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pensiones`
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
-- Table structure for table `rh`
--

CREATE TABLE `rh` (
  `ID_RH` tinyint(3) NOT NULL,
  `T_RH` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rh`
--

INSERT INTO `rh` (`ID_RH`, `T_RH`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `ID_rol` tinyint(3) NOT NULL,
  `N_rol` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`ID_rol`, `N_rol`) VALUES
(1, 'ADMIN'),
(2, 'Radio Operador'),
(3, 'Motorizado'),
(4, 'Empresa');

-- --------------------------------------------------------

--
-- Table structure for table `sede`
--

CREATE TABLE `sede` (
  `ID_S` int(11) NOT NULL,
  `Dic_S` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Sec_V` tinyint(3) NOT NULL,
  `est_sed` varchar(2) NOT NULL,
  `id_e` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sede`
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
-- Table structure for table `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `ID_Doc` tinyint(3) NOT NULL,
  `N_TDoc` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_doc`
--

INSERT INTO `tipo_doc` (`ID_Doc`, `N_TDoc`) VALUES
(1, 'Tarjeta de Identidad'),
(2, 'Cédula de Ciudadanía'),
(3, 'Tarjeta de Extranjería'),
(4, 'Cédula de Extranjería'),
(5, 'Pasaporte'),
(6, 'NIT');

-- --------------------------------------------------------

--
-- Table structure for table `tp_novedad`
--

CREATE TABLE `tp_novedad` (
  `T_Nov` int(11) NOT NULL,
  `Nombre_Tn` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descrip_Tn` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tp_novedad`
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
-- Table structure for table `trazabilidad`
--

CREATE TABLE `trazabilidad` (
  `ID_Tra` int(11) NOT NULL,
  `Fh_Tra` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `T_Tra` bit(1) NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf32 COLLATE utf32_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trazabilidad`
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
-- Table structure for table `user_rol`
--

CREATE TABLE `user_rol` (
  `ID_UR` int(11) NOT NULL,
  `ID_rol` tinyint(3) NOT NULL,
  `ID_log` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_rol`
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
-- Table structure for table `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_ve` int(11) NOT NULL,
  `Matricula` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Cilindraje` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Modelo` year(4) DEFAULT NULL,
  `Fecha_Soat` date DEFAULT NULL,
  `Fecha_tecnicomecanica` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehiculo`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `arl`
--
ALTER TABLE `arl`
  ADD PRIMARY KEY (`ID_arl`);

--
-- Indexes for table `asigna_vehiculo`
--
ALTER TABLE `asigna_vehiculo`
  ADD PRIMARY KEY (`ID_AV`),
  ADD KEY `asigna_vehiculo_ibfk_1` (`id_em`),
  ADD KEY `asigna_vehiculo_ibfk_2` (`id_ve`);

--
-- Indexes for table `cesantias`
--
ALTER TABLE `cesantias`
  ADD PRIMARY KEY (`ID_ces`);

--
-- Indexes for table `contacto_emergencia`
--
ALTER TABLE `contacto_emergencia`
  ADD PRIMARY KEY (`ID_CEm`),
  ADD KEY `fk_contacto_emergencia` (`id_em`);

--
-- Indexes for table `empleado`
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
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_e`),
  ADD KEY `fk_ID_Doc` (`ID_Doc`);

--
-- Indexes for table `encargado`
--
ALTER TABLE `encargado`
  ADD PRIMARY KEY (`ID_En`);

--
-- Indexes for table `encargado_estado`
--
ALTER TABLE `encargado_estado`
  ADD PRIMARY KEY (`idEncargadoEstado`),
  ADD KEY `encargado_estado_ibfk_1` (`ID_En`),
  ADD KEY `encargado_estado_ibfk_2` (`ID_S`);

--
-- Indexes for table `eps`
--
ALTER TABLE `eps`
  ADD PRIMARY KEY (`ID_eps`);

--
-- Indexes for table `evidencia`
--
ALTER TABLE `evidencia`
  ADD PRIMARY KEY (`id_evi`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID_log`);

--
-- Indexes for table `novedad`
--
ALTER TABLE `novedad`
  ADD PRIMARY KEY (`ID_Nov`),
  ADD KEY `novedad_ibfk_1` (`id_em`),
  ADD KEY `novedad_ibfk_2` (`ID_S`),
  ADD KEY `novedad_ibfk_3` (`T_Nov`),
  ADD KEY `novedad_ibfk_4` (`id_evi`);

--
-- Indexes for table `pensiones`
--
ALTER TABLE `pensiones`
  ADD PRIMARY KEY (`ID_pens`);

--
-- Indexes for table `rh`
--
ALTER TABLE `rh`
  ADD PRIMARY KEY (`ID_RH`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_rol`);

--
-- Indexes for table `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`ID_S`),
  ADD KEY `sede_ibfk_1` (`id_e`);

--
-- Indexes for table `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`ID_Doc`);

--
-- Indexes for table `tp_novedad`
--
ALTER TABLE `tp_novedad`
  ADD PRIMARY KEY (`T_Nov`);

--
-- Indexes for table `trazabilidad`
--
ALTER TABLE `trazabilidad`
  ADD PRIMARY KEY (`ID_Tra`);

--
-- Indexes for table `user_rol`
--
ALTER TABLE `user_rol`
  ADD PRIMARY KEY (`ID_UR`),
  ADD KEY `user_rol_ibfk_1` (`ID_log`),
  ADD KEY `user_rol_ibfk_2` (`ID_rol`);

--
-- Indexes for table `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_ve`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arl`
--
ALTER TABLE `arl`
  MODIFY `ID_arl` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `asigna_vehiculo`
--
ALTER TABLE `asigna_vehiculo`
  MODIFY `ID_AV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cesantias`
--
ALTER TABLE `cesantias`
  MODIFY `ID_ces` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacto_emergencia`
--
ALTER TABLE `contacto_emergencia`
  MODIFY `ID_CEm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_em` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `encargado`
--
ALTER TABLE `encargado`
  MODIFY `ID_En` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `encargado_estado`
--
ALTER TABLE `encargado_estado`
  MODIFY `idEncargadoEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `eps`
--
ALTER TABLE `eps`
  MODIFY `ID_eps` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `evidencia`
--
ALTER TABLE `evidencia`
  MODIFY `id_evi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `novedad`
--
ALTER TABLE `novedad`
  MODIFY `ID_Nov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pensiones`
--
ALTER TABLE `pensiones`
  MODIFY `ID_pens` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rh`
--
ALTER TABLE `rh`
  MODIFY `ID_RH` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_rol` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sede`
--
ALTER TABLE `sede`
  MODIFY `ID_S` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tipo_doc`
--
ALTER TABLE `tipo_doc`
  MODIFY `ID_Doc` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tp_novedad`
--
ALTER TABLE `tp_novedad`
  MODIFY `T_Nov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trazabilidad`
--
ALTER TABLE `trazabilidad`
  MODIFY `ID_Tra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_rol`
--
ALTER TABLE `user_rol`
  MODIFY `ID_UR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_ve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asigna_vehiculo`
--
ALTER TABLE `asigna_vehiculo`
  ADD CONSTRAINT `asigna_vehiculo_ibfk_1` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`),
  ADD CONSTRAINT `asigna_vehiculo_ibfk_2` FOREIGN KEY (`id_ve`) REFERENCES `vehiculo` (`id_ve`);

--
-- Constraints for table `contacto_emergencia`
--
ALTER TABLE `contacto_emergencia`
  ADD CONSTRAINT `contacto_emergencia` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`);

--
-- Constraints for table `empleado`
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
-- Constraints for table `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_ID_Doc` FOREIGN KEY (`ID_Doc`) REFERENCES `tipo_doc` (`ID_Doc`);

--
-- Constraints for table `encargado_estado`
--
ALTER TABLE `encargado_estado`
  ADD CONSTRAINT `encargado_estado_ibfk_1` FOREIGN KEY (`ID_En`) REFERENCES `encargado` (`ID_En`),
  ADD CONSTRAINT `encargado_estado_ibfk_2` FOREIGN KEY (`ID_S`) REFERENCES `sede` (`ID_S`);

--
-- Constraints for table `novedad`
--
ALTER TABLE `novedad`
  ADD CONSTRAINT `novedad_ibfk_1` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`),
  ADD CONSTRAINT `novedad_ibfk_2` FOREIGN KEY (`ID_S`) REFERENCES `sede` (`ID_S`),
  ADD CONSTRAINT `novedad_ibfk_3` FOREIGN KEY (`T_Nov`) REFERENCES `tp_novedad` (`T_Nov`),
  ADD CONSTRAINT `novedad_ibfk_4` FOREIGN KEY (`id_evi`) REFERENCES `evidencia` (`id_evi`);

--
-- Constraints for table `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`id_e`) REFERENCES `empresa` (`id_e`);

--
-- Constraints for table `user_rol`
--
ALTER TABLE `user_rol`
  ADD CONSTRAINT `user_rol_ibfk_1` FOREIGN KEY (`ID_log`) REFERENCES `login` (`ID_log`),
  ADD CONSTRAINT `user_rol_ibfk_2` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
