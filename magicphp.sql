-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2015 a las 19:05:57
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
(10, 'pharmADN');

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
('015BA158-00.POQ', 'Calificación de Operación  Proyecto bajo volumenes', 'OQ', 5, 'EQP', 2, 'LGEP51RE2-XOQ-0001-00-S-P01', '0000-00-00', 'RED', 3, 'N');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `itemproyecto`
--

INSERT INTO `itemproyecto` (`IDItemProyecto`, `IDProyecto`, `NombreItem`, `Observaciones`) VALUES
(1, 1, 'Plan quinquenal Unidad 1', 'Relevamiento de calificaciones/validaciones y estado de la Unidad 1'),
(2, 1, 'Agua Potable', 'Confección de FAT y SAT del nuevo sistema de agua potable'),
(3, 2, 'Sistema de pesadas Reactores', 'Nuevo sistema para los reactores de bajo volumentes NO beta lactamicos');

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
(159, 2015);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`IDProyecto`, `NombreProyecto`, `IDCliente`) VALUES
(1, 'Synthon: Proyecto 2015', 9),
(2, 'Roemmers - L Guillon: Pesada Reactores', 5);

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
('CSV', 'Computer Sistem Validation'),
('EQL', 'Equipo de Laboratorio'),
('EQP', 'Equipo de Producción'),
('GE', 'Gases Especiales'),
('GM', 'Gases Medicinales'),
('HPW', 'Agua altamente purificada'),
('HVAC', 'Sistema de aire acondicionado'),
('INF', 'Infraestructura'),
('IT', 'Tecnoligias de la información'),
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
  `IDProfile` varchar(3) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDUsuario`, `NombreUsuario`, `ClaveUsuario`, `IDProfile`) VALUES
('alopez', 'Alejandro Lopez Stanley', 'c33367701511b4f6020ec61ded352059', 'ADM'),
('cmontano', 'Candela Montaño', 'c33367701511b4f6020ec61ded352059', 'USU'),
('jpbenedetti', 'Juan Pablo Benedetti', '', 'USU'),
('merolando', 'Maria Eugenia Rolando', 'c33367701511b4f6020ec61ded352059', 'ADM'),
('prolando', 'Pablo Rolando', 'c33367701511b4f6020ec61ded352059', 'USU'),
('vbalcedo', 'Veronica Balcedo', 'c33367701511b4f6020ec61ded352059', 'USU');

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
  MODIFY `IDCliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `itemproyecto`
--
ALTER TABLE `itemproyecto`
  MODIFY `IDItemProyecto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `IDProyecto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
