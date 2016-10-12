-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2016 a las 17:49:45
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `magicphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `IDCliente` int(11) NOT NULL,
  `NombreCliente` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IDCliente`, `NombreCliente`) VALUES
(3, 'Janseen'),
(4, 'Phoenix'),
(5, 'Roemmers'),
(6, 'Roemmers-UY'),
(7, 'AstraZeneca'),
(8, 'Hemo Derivados'),
(9, 'Synthon'),
(10, 'pharmADN'),
(11, 'Casasco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE IF NOT EXISTS `documentos` (
  `CodigoProtocolo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `NombreProtocolo` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `IDEtapa` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `IDSistema` varchar(4) COLLATE latin1_spanish_ci NOT NULL,
  `IDProyecto` int(11) NOT NULL,
  `CodigoCliente` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `FechaEntrega` date NOT NULL,
  `IDEstado` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `IDItemProyecto` int(11) NOT NULL,
  `nuevaversion` varchar(1) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`CodigoProtocolo`, `NombreProtocolo`, `IDEtapa`, `IDCliente`, `IDSistema`, `IDProyecto`, `CodigoCliente`, `FechaEntrega`, `IDEstado`, `IDItemProyecto`, `nuevaversion`) VALUES
('015BA154-00.PDQ', 'Calificación de Diseño Proyecto bajo volumenes', 'DQ', 5, 'EQP', 2, 'LGEP51RE2-XDQ-0001-00-S-P01', '0000-00-00', 'REVCL', 3, 'N'),
('015BA155-00.PIQ', 'Calificación De Instalación Proyecto bajo volumenes', 'IQ', 5, 'EQP', 2, 'LGEP51RE2-XIQ-0001-00-S-P01', '0000-00-00', 'REVCL', 3, 'N'),
('015BA156-00.PFAT', 'Protocolo de FAT Nueva planta de Agua potable', 'FAT', 9, 'AP', 1, '', '0000-00-00', 'REVCL', 2, 'N'),
('015BA157-00.PSAT', 'Protocolo de SAT Nueva planta de Agua potable', 'SAT', 9, 'AP', 1, '', '0000-00-00', 'NOINI', 2, 'N'),
('015BA158-00.POQ', 'Calificación de Operación  Proyecto bajo volumenes', 'OQ', 5, 'EQP', 2, 'LGEP51RE2-XOQ-0001-00-S-P01', '0000-00-00', 'RED', 3, 'N'),
('015BA159-00.PIQ', 'Calificación de instalación CAM2', 'IQ', 9, 'EQP', 1, '', '0000-00-00', 'INI', 4, 'N'),
('015BA160-00.PIQ', 'Calificación de Instalación CAM3', 'IQ', 9, 'EQP', 1, '', '0000-00-00', 'INI', 4, 'N'),
('015BA161-00.POQ', 'Calificación de Operación CAM2', 'OQ', 9, 'EQP', 1, '', '0000-00-00', 'INI', 4, 'N'),
('015BA162-00.POQ', 'Calificación de Operación CAM3', 'OQ', 9, 'EQP', 1, '', '0000-00-00', 'INI', 4, 'N'),
('015BA163-00.PV', 'Plan de Validación Simma 1.0', 'PV', 10, 'CSV', 3, '', '0000-00-00', 'ENV', 5, 'N'),
('015BA164-00.AR', 'Análisis de Riesgos Sistema Simma 1.0', 'AR', 10, 'CSV', 3, '', '0000-00-00', 'ENV', 5, 'N'),
('015BA165-00.PIQ', 'Calificación de Instalación Simma 1.0', 'IQ', 10, 'CSV', 3, '', '0000-00-00', 'ENV', 5, 'N'),
('015BA166-00.POQ', 'Calificación de Operación Simma 1.0', 'OQ', 10, 'CSV', 3, '', '0000-00-00', 'EJE', 5, 'N'),
('015BA167-00.PPQ', 'Calificación de Performance Simma 1.0', 'PQ', 10, 'CSV', 3, '', '0000-00-00', 'INI', 5, 'N'),
('015BA168-00.MAT', 'Matriz de Trazabilidad Validación Simma 1.0', 'MAT', 10, 'CSV', 3, '', '0000-00-00', 'INI', 5, 'N'),
('016BA001-00.PIQ', 'Calificación de Instalación Pick and place', 'IQ', 4, 'EQP', 4, '', '0000-00-00', 'RED', 6, 'N'),
('016BA002-00.POQ', 'Calificación de Operación Pick and place', 'OQ', 4, 'EQP', 4, '', '0000-00-00', 'RED', 6, 'N'),
('016BA003-00.PIQ', 'Protocolo IQ-OQ BIN DE 500 LITROS 515-03', 'IQ', 4, 'EQP', 4, '', '0000-00-00', 'RED', 7, 'N'),
('016BA004-00.POQ', 'OBSOLETO', 'OQ', 4, 'EQP', 4, '', '0000-00-00', 'NOINI', 7, 'N'),
('016BA005-00.PIQ', 'Protocolo IQ Compresor ATLAS COPCO GA 30 + FF (CÓDIGO 746-01)', 'IQ', 4, 'EQP', 4, '', '0000-00-00', 'INF', 7, 'N'),
('016BA006-00.POQ', 'Protocolo OQ Compresor Compresor ATLAS COPCO GA 30 + FF (CÓDIGO 746-01)', 'OQ', 4, 'EQP', 4, '', '0000-00-00', 'INF', 7, 'N'),
('016BA007-00.PIQ', 'Protocolo IQ Compresor ATLAS COPCO SF 15 FF (CÓDIGO 797-01)', 'IQ', 4, 'EQP', 4, '', '0000-00-00', 'INF', 7, 'N'),
('016BA008-00.POQ', 'Protocolo OQ Compresor ATLAS COPCO SF 15 FF (CÓDIGO 797-01)', 'OQ', 4, 'EQP', 4, '', '0000-00-00', 'INF', 7, 'N'),
('016BA009-00.PIQ', 'Protocolo IQ Compresor ATLAS COPCO GA 508 (552-01)', 'IQ', 4, 'EQP', 4, '', '0000-00-00', 'EJE', 7, 'N'),
('016BA010-00.POQ', 'Protocolo OQ Compresor ATLAS COPCO GA 508 (552-01)', 'OQ', 4, 'EQP', 4, '', '0000-00-00', 'EJE', 7, 'N'),
('016BA011-00.PIQ', 'Protocolo IQ Compresor ATLAS COPCO GX5FF EP (871-01)', 'IQ', 4, 'EQP', 4, '', '0000-00-00', 'RED', 7, 'N'),
('016BA012-00.POQ', 'Protocolo OQ Compresor ATLAS COPCO GX5FF EP (871-01)', 'OQ', 4, 'EQP', 4, '', '0000-00-00', 'RED', 7, 'N'),
('016BA013-00.ARE', 'Anteproyecto', 'ARE', 11, 'INF', 5, '', '0000-00-00', 'INI', 8, 'N'),
('016BA014-00.PIQ', 'Addemdun a la Calificación de Instalación', 'IQ', 7, 'PW', 6, 'PISM04-01', '2016-03-28', 'FIN', 9, 'N'),
('016BA015-00.POQ', 'Addemdun a la Calificación de Operación', 'OQ', 7, 'PW', 6, '', '2016-03-28', 'FIN', 9, 'N'),
('016BA016-00.PPQ', 'PQ Blistera Blipack 203-1 - Neumoterol', 'PQ', 4, 'EQP', 4, '', '0000-00-00', 'CORIP', 6, 'N'),
('016BA017-00.PPQ', 'Calificación de Desempeño Purelab Option R-15 ATPAT01', 'PQ', 4, 'EQL', 4, '', '2016-04-15', 'REVCL', 10, 'N'),
('016BA018-00.PPQ', 'Calificación de Desempeño Purelab Option R-15 ATPAT02', 'PQ', 4, 'EQL', 4, '', '0000-00-00', 'INI', 10, 'N'),
('016BA019-00.PPQ', 'Calificación de Desempeño Purelab Flex2 ATPAF01', 'PQ', 4, 'EQL', 4, '', '0000-00-00', 'INI', 10, 'N'),
('016BA020-00.PVI', 'Protocolo de verificación de instalación', 'VI', 7, 'WFI', 7, '', '0000-00-00', 'INI', 11, 'N'),
('016BA021-00.PVO', 'Protocolo de verificación de operación', 'PVO', 7, 'WFI', 7, '', '0000-00-00', 'INI', 11, 'N'),
('016BA022-00.PDQ', 'Calificación de Diseño Reactor 069', 'DQ', 5, 'EQP', 2, 'LGEP51RE2-QDQ-0007-00-S-P01', '0000-00-00', 'NOINI', 3, 'N'),
('016BA023-00.PDQ', 'Calificación de Diseño Reactor 070', 'DQ', 5, 'EQP', 2, 'LGEP51RE2-QDQ-0009-00-S-P01', '0000-00-00', 'NOINI', 3, 'N'),
('016BA024-00.PIQ', 'Calificación de Instalación Reactor 069', 'IQ', 5, 'EQP', 2, 'LGEP51RE2-QIQ-0007-00-S-P01', '0000-00-00', 'RED', 3, 'N'),
('016BA025-00.PIQ', 'Calificación de Instalación Reactor 070', 'IQ', 5, 'EQP', 2, 'LGEP51RE2-QIQ-0009-00-S-P01', '0000-00-00', 'RED', 3, 'N'),
('016BA026-00.POQ', 'Calificación de Operación Reactor 069', 'OQ', 5, 'EQP', 2, 'LGEP51RE2-QOQ-0007-00-S-P01', '0000-00-00', 'RED', 3, 'N'),
('016BA027-00.POQ', 'Calificación de Operación Reactor 070', 'OQ', 5, 'EQP', 2, 'LGEP51RE2-QOQ-0009-00-S-P01', '0000-00-00', 'RED', 3, 'N'),
('016BA028-00.PIQ', 'Protocolo IQ-OQ BIN DE 1300 LITROS 526-03', 'IQ', 4, 'EQP', 4, '', '0000-00-00', 'NOINI', 7, 'N'),
('016BA029-00.PV', 'Plan Maestro de Validación Mosar', 'PV', 4, 'PRO', 4, '', '0000-00-00', 'NOINI', 12, 'N'),
('016BA030-00.PMV', 'Plan Maestro de Validación Dacten D', 'PMV', 4, 'PRO', 4, '', '0000-00-00', 'NOINI', 12, 'N'),
('016BA031-00.PMV', 'Plan Maestro de Validación Pervinox', 'PMV', 4, 'PRO', 4, '', '0000-00-00', 'NOINI', 12, 'N'),
('016BA032-00.PPQ', 'Protocolo de Validación Mosar', 'PQ', 4, 'PRO', 4, '', '0000-00-00', 'NOINI', 12, 'N'),
('016BA033-00.PPQ', 'Protocolo de Validación Dacten D', 'PQ', 4, 'PRO', 4, '', '0000-00-00', 'NOINI', 12, 'N'),
('016BA034-00.PPQ', 'Protocolo de Validación Pervinox', 'PQ', 4, 'PRO', 4, '', '0000-00-00', 'NOINI', 12, 'N'),
('016BA035-00.PIQ', 'Protocolo de calificación de instalación ensobradora', 'IQ', 11, 'EQP', 8, 'IQ-135/01', '0000-00-00', 'RED', 13, 'N'),
('016BA036-00.POQ', 'Protocolo de calificación de operación ensobradora', 'OQ', 11, 'EQP', 8, 'OQ-135/01', '0000-00-00', 'NOINI', 13, 'N'),
('016BA037-00.PIQ', 'Protocolo de calificación de instalación linea de estuchado', 'IQ', 11, 'EQP', 8, 'IQ-169/01', '0000-00-00', 'RED', 13, 'N'),
('016BA038-00.POQ', 'Protocolo de calificación de operación linea de estuchado', 'OQ', 11, 'EQP', 8, 'OQ-169/01', '0000-00-00', 'NOINI', 13, 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `IDEstados` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `NombreEstado` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`IDEstados`, `NombreEstado`) VALUES
('CORIP', 'En Corrección IP&QA'),
('EJE', 'Ejecutado'),
('ENV', 'Enviado'),
('FAC', 'Facturado'),
('FIN', 'Finalizado'),
('INF', 'Informado'),
('INI', 'Iniciado'),
('NOINI', 'No Iniciado'),
('RED', 'En Redacción'),
('REVCL', 'En Revisión Cliente'),
('REVIP', 'En Revisión IP&QA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas`
--

CREATE TABLE IF NOT EXISTS `etapas` (
  `IDEtapa` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `NombreEtapa` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `ClaveProt` varchar(4) COLLATE latin1_spanish_ci NOT NULL,
  `ClaveInf` varchar(4) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `etapas`
--

INSERT INTO `etapas` (`IDEtapa`, `NombreEtapa`, `ClaveProt`, `ClaveInf`) VALUES
('AR', 'Analisis de Riesgo', 'AR', ''),
('ARE', 'Acta de Reunion', 'ARE', ''),
('AUD', 'AUDITORIA', 'AUD', ''),
('CC', 'Control de Cambios', 'CC', ''),
('DQ', 'Calificación de Diseño', 'PDQ', 'IDQ'),
('EC', 'Especificación de Configuración', 'EC', ''),
('EF', 'Especificación funcional', 'EF', ''),
('FAT', 'Factory Acceptance Test', 'PFAT', 'IFAT'),
('IQ', 'Calificación de Instalación', 'PIQ', 'IIQ'),
('MAT', 'Matriz de Trazabilidad', 'MAT', ''),
('OQ', 'Calificación de Operación', 'POQ', 'IOQ'),
('PMV', 'Plan Maestro de Validación', 'PMV', ''),
('PP', 'Plan de Pruebas', 'PP', ''),
('PQ', 'Calificación de Performance', 'PPQ', 'IPQ'),
('PV', 'Plan de Validación', 'PV', ''),
('PVO', 'Verificación de la operación', 'PVO', 'IVO'),
('REP', 'Reporte Final de Validación', 'REP', ''),
('SAT', 'Site Acceptance Test', 'PSAT', 'ISAT'),
('URS', 'Especificación de Requerimientos de Usuario', 'URS', 'URS'),
('VD', 'Verificación de Diseño', 'PVD', 'IVD'),
('VI', 'Verificación de Instalación', 'PVI', 'IVI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemproyecto`
--

CREATE TABLE IF NOT EXISTS `itemproyecto` (
  `IDItemProyecto` int(11) NOT NULL,
  `IDProyecto` int(11) NOT NULL,
  `NombreItem` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `Observaciones` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `itemproyecto`
--

INSERT INTO `itemproyecto` (`IDItemProyecto`, `IDProyecto`, `NombreItem`, `Observaciones`) VALUES
(1, 1, 'Plan quinquenal Unidad 1', 'Relevamiento de calificaciones/validaciones y estado de la Unidad 1'),
(2, 1, 'Agua Potable', 'Confección de FAT y SAT del nuevo sistema de agua potable'),
(3, 2, 'Sistema de pesadas Reactores', 'Nuevo sistema para los reactores de bajo volumentes NO beta lactamicos'),
(4, 1, 'Camaras Frias', 'Calificación de las cámaras moviles'),
(5, 3, 'Validación Simma', 'Ítem único para el proyecto'),
(6, 4, 'Blistera B203-1 (código 477-01)', ''),
(7, 4, 'Oferta P151221A-15A', ''),
(8, 5, 'Anteproyecto', ''),
(9, 6, 'Calificación de PW', 'Agregado en la calificación del sistema de generación de la PW'),
(10, 4, 'ATB-PW', 'Equipos de producción de PW para antibióticos.'),
(11, 7, 'Verificación de funcionamiento', 'Verificar la instalación y la operación del subloop '),
(12, 4, 'Validación de Procesos 2016', 'Productos:\r\n- Pervinox Clorhexidina\r\n- Dacten D\r\n- Mosar'),
(13, 8, 'Equipos', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numero`
--

CREATE TABLE IF NOT EXISTS `numero` (
  `siguiente` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `numero`
--

INSERT INTO `numero` (`siguiente`, `year`) VALUES
(39, 2016);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `IDPerfiles` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `NombrePerfil` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`IDPerfiles`, `NombrePerfil`) VALUES
('ADM', 'Administrador'),
('USU', 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `pantalla` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `accion` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `allow` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`pantalla`, `accion`, `allow`) VALUES
('Clave', 'VER', 'ADM'),
('Clave', 'VER', 'USU'),
('Clientes', 'ADD', 'ADM'),
('Clientes', 'MOD', 'ADM'),
('Clientes', 'VER', 'ADM'),
('Documentos', 'ADD', 'ADM'),
('Documentos', 'ADD', 'USU'),
('Documentos', 'MOD', 'ADM'),
('Documentos', 'MOD', 'USU'),
('Documentos', 'VER', 'ADM'),
('Documentos', 'VER', 'USU'),
('Estados', 'VER', 'ADM'),
('Estados', 'VER', 'USU'),
('Etapas', 'ADD', 'ADM'),
('Etapas', 'MOD', 'ADM'),
('Etapas', 'VER', 'ADM'),
('Etapas', 'VER', 'USU'),
('Perfiles', 'VER', 'ADM'),
('Perfiles', 'VER', 'USU'),
('Proyectos', 'ADD', 'ADM'),
('Proyectos', 'MOD', 'ADM'),
('Proyectos', 'MOD', 'USU'),
('Proyectos', 'VER', 'ADM'),
('Proyectos', 'VER', 'USU'),
('Sistemas', 'ADD', 'ADM'),
('Sistemas', 'MOD', 'ADM'),
('Sistemas', 'VER', 'ADM'),
('Sistemas', 'VER', 'USU'),
('Usuarios', 'ADD', 'ADM'),
('Usuarios', 'MOD', 'ADM'),
('Usuarios', 'VER', 'ADM'),
('Usuarios', 'VER', 'USU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE IF NOT EXISTS `proyectos` (
  `IDProyecto` int(11) NOT NULL,
  `NombreProyecto` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `IDCliente` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`IDProyecto`, `NombreProyecto`, `IDCliente`) VALUES
(1, 'Synthon: Proyecto 2015', 9),
(2, 'Roemmers - L Guillon: Pesada Reactores', 5),
(3, 'Validación Simma', 10),
(4, 'Proyecto 2016', 4),
(5, 'Proyecto Planta Pilar Etapa III, IV y V', 11),
(6, 'Planta de PW. Upgrade.', 7),
(7, 'Sub loop WFI', 7),
(8, 'Equipos 2016', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistemas`
--

CREATE TABLE IF NOT EXISTS `sistemas` (
  `IDSistema` varchar(4) COLLATE latin1_spanish_ci NOT NULL,
  `NombreSistema` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `sistemas`
--

INSERT INTO `sistemas` (`IDSistema`, `NombreSistema`) VALUES
('AC', 'Aire Comprimido'),
('AP', 'Agua Potable'),
('CSV', 'Computer System Validation'),
('EQL', 'Equipo de Laboratorio'),
('EQP', 'Equipo de Producción'),
('GE', 'Gases Especiales'),
('GM', 'Gases Medicinales'),
('HPW', 'Agua altamente purificada'),
('HVAC', 'Sistema de aire acondicionado'),
('INF', 'Infraestructura'),
('IT', 'Tecnologias de la información'),
('LIM', 'Limpieza'),
('N2', 'Nitrogeno'),
('PRO', 'Procesos'),
('PS', 'Vapor Puro'),
('PW', 'Agua Purificada'),
('SC', 'Sistema de control'),
('VAC', 'Vacio'),
('WFI', 'Agua para Inyectables');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `IDUsuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `NombreUsuario` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `ClaveUsuario` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `IDProfile` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `Cambia` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDUsuario`, `NombreUsuario`, `ClaveUsuario`, `IDProfile`, `Cambia`) VALUES
('alopez', 'Alejandro Lopez Stanley', '1b826e934a46273b25974b6c309b421a', 'ADM', 0),
('cmontano', 'Candela Montaño', 'c33367701511b4f6020ec61ded352059', 'USU', 1),
('jpbenedetti', 'Juan Pablo Benedetti', 'e10adc3949ba59abbe56e057f20f883e', 'USU', 0),
('merolando', 'Maria Eugenia Rolando', 'b83bd0941071c45518d5b451059ebd95', 'ADM', 0),
('prolando', 'Pablo Rolando', 'c33367701511b4f6020ec61ded352059', 'USU', 1),
('vbalcedo', 'Veronica Balcedo', '65f20d37e89213b9af16e195eab20baf', 'USU', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IDCliente`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`CodigoProtocolo`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`IDEstados`);

--
-- Indices de la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD PRIMARY KEY (`IDEtapa`);

--
-- Indices de la tabla `itemproyecto`
--
ALTER TABLE `itemproyecto`
  ADD PRIMARY KEY (`IDItemProyecto`);

--
-- Indices de la tabla `numero`
--
ALTER TABLE `numero`
  ADD PRIMARY KEY (`year`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`IDPerfiles`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`pantalla`,`accion`,`allow`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`IDProyecto`);

--
-- Indices de la tabla `sistemas`
--
ALTER TABLE `sistemas`
  ADD PRIMARY KEY (`IDSistema`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IDCliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `itemproyecto`
--
ALTER TABLE `itemproyecto`
  MODIFY `IDItemProyecto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `IDProyecto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
