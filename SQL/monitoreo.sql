-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2016 a las 02:16:29
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `monitoreo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depto`
--

CREATE TABLE IF NOT EXISTS `depto` (
  `iddepto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_depto` varchar(10) NOT NULL,
  `nombre_depto` varchar(50) NOT NULL,
  `idpais` int(11) NOT NULL,
  PRIMARY KEY (`iddepto`),
  UNIQUE KEY `codigo_depto` (`codigo_depto`),
  KEY `idpais` (`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `depto`
--

INSERT INTO `depto` (`iddepto`, `codigo_depto`, `nombre_depto`, `idpais`) VALUES
(1, '19', 'CAUCA', 1),
(2, '18', 'CAQUETÁ', 1),
(3, '01', 'Cundinamarca', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_macroactividad`
--

CREATE TABLE IF NOT EXISTS `evento_macroactividad` (
  `idevento` int(11) NOT NULL,
  `idmacroactividad` int(11) NOT NULL,
  PRIMARY KEY (`idevento`,`idmacroactividad`),
  KEY `fk_evento_macroactividad_2` (`idmacroactividad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento_macroactividad`
--

INSERT INTO `evento_macroactividad` (`idevento`, `idmacroactividad`) VALUES
(163, 31),
(319, 31),
(320, 31),
(163, 36),
(170, 36),
(317, 36),
(166, 38),
(173, 38),
(160, 40),
(135, 44),
(159, 44),
(130, 50),
(134, 50),
(157, 51),
(158, 51),
(174, 54),
(255, 54),
(123, 55),
(124, 55),
(139, 55),
(140, 55),
(142, 55),
(143, 55),
(145, 55),
(146, 55),
(147, 55),
(279, 55),
(281, 55),
(312, 55),
(313, 55),
(169, 56),
(261, 57),
(118, 58),
(120, 58),
(128, 58),
(285, 58),
(125, 59),
(329, 59),
(330, 59),
(331, 59),
(332, 59),
(161, 61),
(304, 61),
(164, 62),
(303, 63),
(144, 64),
(167, 65),
(122, 66),
(126, 66),
(254, 66),
(316, 66),
(318, 66),
(122, 67),
(141, 67),
(168, 67),
(171, 67),
(257, 67),
(137, 68),
(172, 69),
(162, 70),
(172, 71),
(126, 72),
(141, 73),
(149, 75),
(151, 75),
(155, 75),
(148, 76),
(243, 79),
(310, 80),
(311, 80),
(133, 81),
(310, 81),
(150, 86),
(152, 86),
(153, 86),
(154, 86),
(156, 86),
(163, 86),
(184, 89),
(190, 89),
(191, 89),
(127, 90),
(129, 90),
(136, 90),
(244, 90),
(259, 90),
(132, 91),
(138, 91),
(245, 91),
(260, 91),
(302, 91),
(229, 92),
(230, 92),
(305, 92),
(306, 92),
(218, 96),
(215, 98),
(210, 100),
(186, 102),
(273, 102),
(274, 102),
(196, 108),
(203, 109),
(206, 110),
(270, 111),
(271, 111),
(328, 111),
(212, 112),
(275, 113),
(210, 116),
(247, 127),
(182, 128),
(219, 128),
(262, 128),
(263, 128),
(264, 128),
(265, 128),
(266, 128),
(267, 128),
(268, 128),
(269, 128),
(276, 128),
(277, 128),
(278, 128),
(280, 128),
(286, 128),
(287, 128),
(288, 128),
(289, 128),
(290, 128),
(291, 128),
(293, 128),
(295, 128),
(309, 129),
(333, 129),
(227, 130),
(177, 131),
(211, 131),
(226, 131),
(194, 132),
(258, 132),
(301, 132),
(214, 134),
(309, 136),
(333, 136),
(225, 139),
(205, 141),
(205, 142),
(233, 142),
(202, 144),
(202, 145),
(334, 145),
(335, 146),
(233, 147),
(334, 147),
(209, 148),
(222, 148),
(228, 148),
(307, 148),
(233, 150),
(233, 152),
(228, 153),
(233, 153),
(228, 156),
(233, 156),
(233, 157),
(334, 157),
(202, 159),
(187, 160),
(188, 160),
(193, 160),
(228, 161),
(202, 162),
(241, 162),
(242, 162),
(209, 163),
(222, 163),
(307, 163),
(246, 164),
(199, 165),
(250, 165),
(284, 165),
(201, 166),
(252, 166),
(283, 166),
(178, 167),
(204, 167),
(315, 167),
(296, 168),
(321, 169),
(207, 170),
(208, 170),
(300, 170),
(192, 173),
(195, 173),
(292, 173),
(294, 173),
(326, 173),
(298, 174),
(323, 174),
(325, 174),
(253, 175),
(299, 175),
(324, 176),
(327, 176),
(297, 177),
(322, 180),
(216, 181),
(314, 181);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(7) NOT NULL DEFAULT '#3a87ad',
  `date` datetime NOT NULL,
  `textColor` varchar(10) DEFAULT NULL,
  `realizacion` varchar(20) DEFAULT NULL,
  `idproyecto` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idregional` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idproyecto` (`idproyecto`,`idpersona`,`idregional`),
  KEY `fk_evento_regional` (`idregional`),
  KEY `fk_evento_persona` (`idpersona`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=336 ;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `color`, `date`, `textColor`, `realizacion`, `idproyecto`, `idpersona`, `idregional`) VALUES
(118, 'Jornada de notificación', 'La unidad de victimas entregó los actos administrativos a los declarantes asistentes tanto incluidos como no incluidos. Los incluidos recibieron la orientación acerca de sus derechos después de recibir este reconocimiento formal y luego los enlacen integrales brindaron información a cada uno de ellos de su estado de pagos y agendas de PAARI. Para el caso de los no incluidos pudieron radicar sus recursos de reposición con el apoyo del Consejo Noruego ante la UARIV. Se notificaron un total de 624 personas asistentes al evento', '#DFF0D8', '2016-09-29 08:02:00', '#3C959A', 'Realizada', 14, 1, 1),
(120, 'Reunión con la Subdirección de Registro de la UARIV para coordinar las acciones para la notificación', 'Se acordó el apoyo logístico para las jornadas masivas de notificación y la posibilidad de valoración de familias atendidas en menor tiempo', '#DFF0D8', '2016-10-14 10:30:00', '#3C959A', 'Realizada', 14, 9, 1),
(122, 'Reunión con el plenario de las MMP de los municipios de Toribio y Caloto, con el propósito de revisar y ajustar los respectivos PT. ', 'Se presentó el programa de IRD, se reviso el Plan de Trabajo de las MMP de Toribio y Caloto y se presento el IEO. ', '#DFF0D8', '2016-10-06 08:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(123, 'PP9-003(2) ', 'Se atendieron 21 familias 58 personas.', '#DFF0D8', '2016-11-16 08:00:00', '#3C959A', 'Realizada', 14, 15, 1),
(124, 'PP9-004(1)', 'Se atendieron 15 familias 40 personas.', '#DFF0D8', '2016-11-16 14:00:00', '#3C959A', 'Realizada', 14, 15, 1),
(125, 'Jornada de caracterizacion', 'se realizo la caracterización a seis personas correspondientes al PRMVIII', '#DFF0D8', '2016-11-09 08:30:00', '#3C959A', 'Realizada', 14, 11, 1),
(126, 'Reunión con el plenario de las MMP del municipio de Toribio para aplicar el IEO, ajustar y organizar un cronograma de actividades del Plan de Trabajo.', 'Se realizó la aplicación del IEO, Revisión, ajuste y organización del cronograma del plan de trabajo. ', '#DFF0D8', '2016-10-18 09:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(127, 'Realización GAM I "Reconociéndonos y formando grupo"', '', '#D9EDF7', '0000-00-00 00:00:00', '#286090', 'Programada', 14, 12, 1),
(128, 'Jornada de Notificación UARIV', 'Se notificaron 624 declarantes y 31 de ellos correspondían a familias atendidas por IRD del proyecto PRMVIII', '#DFF0D8', '2016-11-12 08:00:00', '#3C959A', 'Realizada', 14, 10, 1),
(129, 'Realización Encuentro I "Reconociéndonos y formando grupo", del grupo "Mujeres víctimas y profesionales"', 'Se realizó el I encuentro, donde se avanzó en la conformación de grupo y se estrecharon lazos de confianza.', '#DFF0D8', '2016-11-17 02:00:00', '#3C959A', 'Realizada', 14, 12, 1),
(130, 'Reunión Administración Municipal y Personería Toribío ', 'se presentó la estrategia de Intervención "Cerrando Brechas". Se precisa situación sobre la Mesa de Participación (es Urbana). Alcalde solicita que la intervención en el marco del PIRC se concerte con el Proyecto Nasa y los cabildos. Solicita que se firme un convenio de entendimiento donde se incluya al proyecto Nasa.', '#DFF0D8', '2016-10-28 08:00:00', '#3C959A', 'Realizada', 14, 2, 1),
(132, 'Realización Encuentro  II "Que ha pasado por aquí?, con la comunidad del Barrio Bosques de occidente.', 'Las personas lograron comprender las emociones y sentimientos que le conflicto armado ha generado a nivel individual, familiar y comunitario, se estrecharon lazos de confianza a nivel grupal.', '#DFF0D8', '2016-11-17 05:00:00', '#3C959A', 'Realizada', 14, 12, 1),
(133, 'Minga comunitaria con niños y niñas de las veredas la Selva y los Chorros', 'Se realizó el encuentro entre los niños y niñas de las veredas los Chorros y la Selva con el objetivo de socializar los abracitos vividos y extender la invitación a conformar un nuevo grupo de niño/as', '#DFF0D8', '2016-11-18 09:00:00', '#3C959A', 'Realizada', 14, 12, 1),
(134, 'Reunion con Administración Municipal y Personería de Caloto', 'Se realizó la reunión y se presentó la estrategia de intervención "Cerrando Brechas". La alcaldesa solicitó apoyo para implementar con urgencia la estrategia de intervención psicosocial.', '#DFF0D8', '2016-10-28 12:00:00', '#3C959A', 'Realizada', 14, 2, 1),
(135, 'Reunión de subcomités técnicos de Atención y Asistencia, Reparación y Restitución, Participación, Prevención y protección, Sistemas de Información para culminar la formulación del Plan Operativo y seguimiento al PAT del municipio de Popayán.', 'Revisión de la información de los planes Operativos de los Subcomités Atención y Asistencia, Reparación y Restitución, Participación, Prevención y protección, Sistemas de Información  y Seguimiento PAT: Se recogió la información de avance de los programa y proyectos. Presentación de las rutas de atención del municipio de Popayán. ', '#DFF0D8', '2016-10-20 08:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(136, 'Presentación programa "Cuidadores y grupos de apoyo mutuo"', 'Se presentó el programa "Cuidadores y grupos de apoyo mutuo", se abrirá un nuevo grupo de 26 mujeres.', '#DFF0D8', '2016-10-26 02:00:00', '#3C959A', 'Realizada', 14, 12, 1),
(137, 'Actividad de la MMP de Caloto en el marco del Proyecto de participación: presentación de la obra teatral de las víctimas del conflicto armado.', 'En el municipio de Caloto se realizó el Foro: participación ciudadana y explicación del proceso de puesta en escena de la obra “el jardín de la discordia”. y Presentación de la Obra "El Jardín de la discordia"', '#DFF0D8', '2016-10-22 02:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(138, 'Presentación "Cuidadores y grupos de apoyo mutuo", Barrio Bosques de Occidente', 'Se realizó la presentación del proyecto "Cuidadores y grupos de apoyo mutuo" a la comunidad Bosques de Occidente"', '#DFF0D8', '2016-10-21 05:00:00', '#3C959A', 'Realizada', 14, 12, 1),
(139, 'Grupo PP9-005(1)', 'Se atendieron 19 familias 54 personas.', '#DFF0D8', '2016-11-28 08:00:00', '#3C959A', 'Realizada', 14, 15, 1),
(140, 'Grupo PP9-004(2)', 'Se atendieron 17 familias 42 personas.', '#DFF0D8', '2016-11-29 08:00:00', '#3C959A', 'Realizada', 14, 15, 1),
(141, 'Reunión con el plenario de las MMP del municipio de Caloto para aplicar el IEO, ajustar y organizar un cronograma de actividades del Plan de Trabajo.', 'Presentación del programa de desminado por la agencia HALO, Aplicación del IEO, Revisión, ajuste y organización del Cronograma del Plan de Trabajo y Socialización de los ajustes al PAT.  ', '#DFF0D8', '2016-10-27 08:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(142, 'Grupo PP9-001(1)', 'Se atendieron 18 familias 38 personas.', '#DFF0D8', '2016-09-30 08:00:00', '#3C959A', 'Realizada', 14, 15, 1),
(143, 'Grupo PP9-002(1)', 'Se atendieron 18 familias 48 personas', '#DFF0D8', '2016-10-07 08:00:00', '#3C959A', 'Realizada', 14, 15, 1),
(144, 'Reunión de la mesa Municipal de Participación de Popayán con la Administración Municipal para establecer acuerdos que permita a las víctimas acceder a los programas municipales.', 'La MMP realizó concentración con la UARIV para la jornada de entrega de libreta militar el 04 de Noviembre de 2016.   ', '#DFF0D8', '2016-10-28 15:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(145, 'Grupo PP9-001(2)', 'Se atendieron 17 familias 36 personas.', '#DFF0D8', '2016-10-12 08:00:00', '#3C959A', 'Realizada', 14, 15, 1),
(146, 'Grupo PP9-002(2)', 'Se atendieron 19 familias 50 pesonas', '#DFF0D8', '2016-10-21 08:00:00', '#3C959A', 'Realizada', 14, 15, 1),
(147, 'Grupo PP9-003(1)', 'Se atendieron 25 familias 64 personas', '#DFF0D8', '2016-10-31 14:00:00', '#3C959A', 'Realizada', 14, 15, 1),
(148, 'Encuentro grupal de acompañamiento psicosocial en el marco de al segunda entrega', 'Las personas atendidas reconocieron las estrategias de afrontamiento que han desarrollado a nivel familiar y las diferentes redes de apoyo en las dimensiones individuales y colectivas.', '#DFF0D8', '2016-11-16 07:15:00', '#3C959A', 'Realizada', 14, 12, 1),
(149, 'Encuentro grupal de acompañamiento psicosocial en el marco de la primera entrega', '', '#D9EDF7', '0000-00-00 00:00:00', '#286090', 'Programada', 14, 12, 1),
(150, 'Reunión con Proyecto Nasa y UARIV para riorizar PIRC Toribío', 'El Proyecto Nasa contextualiza el marco y los principios bajo los cuales se formuló el PIRC de Toribío. se realiza presentación sobre IRD: Qué somos, qué hacemos, nuestros objetivos. Se plantea que existen aproximadamente 13 actividades del PIRC en las cuales IRD podría apoyar (todas ellas en el marco de la Rehabilitación). Se acuerda adelantar una nueva reunión para priorizar y definir metodologías de implementación. ', '#DFF0D8', '2016-09-29 10:00:00', '#3C959A', 'Realizada', 14, 2, 1),
(151, 'Encuentro grupal de acompañamiento psicosocial en el marco de la primera entrega', 'Las personas atendidas lograron identificar las emociones más significativas generadas por el desplazamiento forzado.', '#DFF0D8', '2016-11-16 01:15:00', '#3C959A', 'Realizada', 14, 12, 1),
(152, 'Reunión para mesa de trabajo con el proyecto Nasa, Comité Central, coordinadores de Cabildos, para acordar acciones a implementar en las Medidas de Reparación Colectiva desde un enfoque psico-cultural.', 'Se priorizaron desde los 4 ejes las medidas y acciones a priorizar por parte del proyecto Nasa en concordancia con las apoyadas por I R D', '#DFF0D8', '2016-11-03 09:00:00', '#3C959A', 'Realizada', 14, 12, 1),
(153, 'Reunión para mesa de trabajo con el proyecto Nasa, Comité Central, coordinadores de Cabildos, para acordar acciones a implementar en las Medidas de Reparación Colectiva desde un enfoque psico-cultural.', 'Priorización de las acciones contempladas en las medidas del proyecto Nasa apoyadas por IRD', '#DFF0D8', '2016-11-04 08:00:00', '#3C959A', 'Realizada', 14, 12, 1),
(154, 'Reunión para acordar acciones a implementar en las medidas de reparación colectiva a priorizar desde un enfoque psico-cultural.', 'Se priorizaron algunas acciones del proyecto Nasa y el acompañamiento de IRD. ', '#DFF0D8', '2016-11-10 09:00:00', '#3C959A', 'Realizada', 14, 12, 1),
(155, 'PP9-001 Encuentro grupal de acompañamiento psicosocial en el marco de la primera entrega', '', '#F2DEDE', '2016-09-30 07:15:00', '#286090', 'Programada', 14, 12, 1),
(156, 'Evento de protocolización del PIRC del sujeto colectivo Proyecto Nasa - Toribio ', 'Se adelantó reunión con participación de comunidades de los Resguardos Indígenas de Toribío, Tacueyó y San Francisco. Se aprobó el contenido del PIRC por parte de los asistentes, pero no se aprobó la protocolización por la ausencia de funcionarios con capacidad decisoria. ', '#DFF0D8', '2016-10-27 09:00:00', '#3C959A', 'Realizada', 14, 2, 1),
(157, 'Firma de Acuerdos de Entendimiento alcaldías de Popayán y Caloto', 'Se recibieron los acuerdos debidamente firmados.', '#DFF0D8', '2016-10-05 10:00:00', '#3C959A', 'Realizada', 14, 2, 1),
(158, 'Firma de Acuerdos de Entendimiento alcaldías de Popayán y Caloto', 'Se recibieron los acuerdos debidamente firmados.', '#DFF0D8', '2016-10-05 10:00:00', '#3C959A', 'Realizada', 14, 2, 1),
(159, 'Reunión de CTJT del municipio de Popayán para la presentación del seguimiento al PAT del año 2016 y aprobación de los Planes Operativos de los subcomités técnicos del año 2016.', 'Presentación del seguimiento del PAT del año 2016, presentación y entrega de material de rutas.  ', '#DFF0D8', '2016-10-28 08:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(160, 'Reunión sobre el diligenciamiento del tablero PAT 2017 por parte de la Gobernación del cauca, para indagar por los recursos para aplicar al mecanismo de corresponsabilidad para el municipio de Popayán. ', 'Se realizó reunión con la Gobernación del Cauca para indagar por los recursos que se diligenciaron en el Tablero PAT del año 2017 para el municipio de Popayán en la medida de Atención Humanitaria Inmediata, para aplicar al mecanismo de subsidiariedad. ', '#DFF0D8', '2016-10-26 16:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(161, 'Seguimiento a la implementación del Plan de Trabajo de la MMP de Popayán. ', 'se realizó seguimiento a la implementación del Plan de Trabajo de la MMP de Popayán, se ajustó una actividad ya que estaba repetida, quedaron 37 actividades de las cuales 11 actividades cumplieron el 100%, 18 actividades están en 0% y 8 actividades están entre 10% y 56%, se organizó un cronograma de actividades para lograr cumplir con las metas previstas. ', '#DFF0D8', '2016-10-07 15:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(162, 'Presentación del resultado del Índice de Estado Organizacional, a los integrantes de la MMP de Popayán.', 'Se presentó el resultado del IEO a la MMP de Popayán aplicado en el mes de septiembre. Los integrantes manifestaron que se sentían bien al ver que avanzaron de 2,60 a 2,87, aunque no cumplen con el puntaje de 3 que sería el puntaje ideal, pero reconocen que no han avanzado más por las dificultades que se les han presentado internamente. Se les recalco la importancia de trabajar como equipo para cumplir con las actividades del Plan de trabajo. ', '#DFF0D8', '2016-10-11 15:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(163, 'Reunión con funcionarios de la administración municipal de Toribio para realizar ajuste al PAT de los años 2016-2019.', 'Se realizó: \n1. Reunión con funcionarios de la administración municipal de Toribio para realizar ajuste al PAT de los años 2016-2019. 2. Entrega de materiales a la alcaldía de Toribio para el proyecto en donde se implementa la Estrategia de Recuperación Emocional. 3. Entrega de invitación al Alcalde Municipal de Toribio para el evento de formación a funcionarios públicos. 4. Entrega de Invitación a la alcaldesa y Personero municipal de Caloto, para el evento de formación a funcionarios púbicos.  ', '#DFF0D8', '2016-11-16 09:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(164, 'Rendición de cuentas de la MMPV de Popayán  que permita  a la comunidad en general conocer los avances logrados.', 'La MMP de Popayán presento del informe de Rendición de Cuentas a líderes de las diferentes organizaciones del municipio.  ', '#DFF0D8', '2016-11-02 15:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(165, 'Capacitación a la MMP de Popayán en la ruta de Prevención y Protección, y su implementación en el municipio de Popayán.', 'La MMP de Popayán fue capacitada en la ruta de Prevención y protección, y como esta se implementa en el municipio. ', '#DFF0D8', '2016-11-01 15:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(166, 'Reunión del CTJT del municipio de Caloto para la aprobación de los ajustes al PAT 2016-2016. ', 'No se logró la aprobación de los ajustes del PAT del municipio de Caloto, debido a la solicitud de inclusión de algunos programas. Se recogieron las sugerencias para el nuevo ajuste y en una próxima reunión de CTJT se hará su aprobación.', '#DFF0D8', '2016-11-03 07:30:00', '#3C959A', 'Realizada', 14, 8, 1),
(167, 'Reunión de la MMP de Popayán con la UARIV para que esta conozca que es el MAARIV, y sus componentes tales como PAARIV, Tablero PAT, SIGO.', 'Se capacito a la MMP de Popayán  en MAARIV, y sus componentes tales como PAARIV, Tablero PAT, SIGO por la UARIV. ', '#DFF0D8', '2016-11-04 15:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(168, 'Elaboración del informe que la MMP de Caloto presentará al Concejo municipal sobre la rendición de cuentas en el tema de la aplicación de la Ley 1448 de 2011 en el ámbito local. ', 'Presentación de los resultados del IEO y Elaboración del informe de Rendición de Cuentas. ', '#DFF0D8', '2016-11-09 08:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(169, 'Remisión de Niños, niñas y adolescentes identificados por fuera del Sistema Educativo a la Secretaría de Educación. ', 'Se envío oficio a la secretaría de educación  relacionando los  Niños, niñas y adolescentes identificados por fuera del Sistema Educativo a la Secretaría de Educación. ', '#DFF0D8', '2016-11-17 16:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(170, 'Reunión con funcionarios de la administración municipal de Toribio para continuar con el ajuste al PAT de los años 2016-2019.', 'Se realizo la continuación con los ajustes del PAT con los funcionarios de Secretaria de Salud, Enlace de víctimas, UMATA, Oficina de Obras.    ', '#DFF0D8', '2016-11-22 09:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(171, 'Rendición de Cuentas de la MMP y Jornadas de socialización y sensibilización para dar a conocer la ley 1448 del 2011 y las rutas de atención, dirigida a líderes de población victima en la zona urbana del municipio de Caloto', '', '#F5F5F5', '2016-11-24 08:00:00', '#808080', 'Cancelada', 14, 8, 1),
(172, 'Presentar a la MMP de Popayán el seguimiento al PAT 2016 y seguimiento a las dimenciones del IEO. ', 'Se presento el seguimiento del Pat del año 2016 a los integrantes de la MPM y se realizó seguimiento a las dimenciones del IEO en los compoentes de Garantías y relaciones institucionales. ', '#DFF0D8', '2016-11-28 15:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(173, 'Reunión de CTJT para la aprobación de los ajustes del PAT en el municipio de Caloto. ', 'Se realizó reunion de CTJT en donde se aprobaron los ajustes al PAT. ', '#DFF0D8', '2016-11-29 08:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(174, 'Formalización de los acuerdos para la presencia institucional en el CRAV en el marco de un CTJT de Popayán.', '', '#F5F5F5', '2016-11-30 08:00:00', '#808080', 'Cancelada', 14, 8, 1),
(177, ' Jornada de notificacion ', 'Se notificaron 25 familias de PRM VIII', '#DFF0D8', '2016-11-25 14:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(178, 'Sistematización Encuentro Psicosocial en la Notificación', 'Se realizó encuentro psicosocial con 26 familias', '#DFF0D8', '2016-11-25 14:00:00', '#3C959A', 'Realizada', 14, 21, 4),
(182, 'Entrega FF9-006 (1)', 'Se atendieron 17 familias 51 personas de primera entrega ', '#DFF0D8', '2016-11-24 08:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(184, 'Formación de la Escuela de Reparaciones de la UARIV', 'Formación de la Escuela de Reparaciones de la UARIV, en aspectos fundamentales de la ley de victimas y restitución de tierras, generalidades de los decretos Étnicos y participación efectiva de las victimas, para los funcionarios públicos de la administración municipal de Florencia. Florencia 26 de octubre de 2016.', '#DFF0D8', '2016-10-26 08:00:00', '#3C959A', 'Realizada', 14, 23, 4),
(186, 'CTJT Florencia', '', '#D9EDF7', '2016-11-30 08:00:00', '#286090', 'Programada', 14, 18, 4),
(187, 'Formación escuela de Reparaciones MMP Florencia', '', '#D9EDF7', '2016-11-30 08:00:00', '#286090', 'Programada', 14, 18, 4),
(188, 'Formación escuela de Reparaciones MMP Florencia', '', '#D9EDF7', '2016-12-01 08:00:00', '#286090', 'Programada', 14, 18, 4),
(190, 'Formación Escuela de Reparaciones Funcionarios públicos', '', '#F2DEDE', '2016-12-01 14:00:00', '#286090', 'Programada', 14, 18, 4),
(191, 'Formación Escuela de Reparaciones Funcionarios públcios', '', '#D9EDF7', '2016-12-02 08:00:00', '#286090', 'Programada', 14, 18, 4),
(192, 'Socializacion Caracterización del daño Embera Chamí ', '', '#FCF8E3', '2016-11-21 08:00:00', '#D6A455', 'Realizada', 14, 7, 4),
(193, 'Formación Escuela de Reparaciones a la MMP Florencia', 'Formación en la Escuela de Reparaciones de la UARIV, en aspectos fundamentales de la ley de Victimas y Restitución de Tierras, Generalidades de los Decretos Étnicos y Participación Efectiva de las Victimas, para los integrantes de la MMP de Florencia. Florencia 27 de octubre de 2016.', '#DFF0D8', '2016-10-27 08:00:00', '#3C959A', 'Realizada', 14, 18, 4),
(194, 'Diligenciamiento Ficha de Caracterización', 'Se caracterizaron 2 familias', '#DFF0D8', '2016-11-21 14:30:00', '#3C959A', 'Realizada', 14, 23, 4),
(195, 'Presentación Proyecto Alcalde San Vicente', 'Presentación proyecto a Alcalde, Secretarios de Despacho y Personera', '#FCF8E3', '0000-00-00 00:00:00', '#D6A455', 'Realizada', 14, 7, 4),
(196, 'Presentación Proyecto a San Vicente', 'Presentación al Alcalde, Secretarios de Despacho San Vicente', '#DFF0D8', '2016-10-05 07:30:00', '#3C959A', 'Realizada', 14, 7, 4),
(199, 'Sistematización acompañamiento psicosocial primera entrega - Octubre ', 'Se realizó el Acompañamiento psicosocial a 36 familias de primera entrega en el mes de octubre.', '#DFF0D8', '2016-10-20 08:00:00', '#3C959A', 'Realizada', 14, 21, 4),
(200, 'Reunión secretarias de despacho responsables secretaria técnicas  de subcomités con cooperantes.', '', '#D9EDF7', '2016-10-11 08:00:00', '#286090', 'Programada', 14, 18, 4),
(201, 'Sistematización acompañamiento psicosocial segunda entrega - Octubre', 'Se realizó el acompañamiento psicosocial en segunda entrega a 16 familias en el mes de octubre', '#DFF0D8', '2016-10-19 08:00:00', '#3C959A', 'Realizada', 14, 21, 4),
(202, 'Plenario MMP Belén de los Andaquíes', 'Reunión de la mesa municipal de participación de Belén de los Andaquíes, para la aplicación IEO, divulgación protocolo de participación y sesión 1 de construcción plan de trabajo. Belén de los Andaquíes 18 de octubre de 2016.', '#DFF0D8', '2016-10-18 09:41:00', '#3C959A', 'Realizada', 14, 18, 4),
(203, 'Presentación Proyecto Belén de los Andaquíes', 'Presentación proyecto a Alcalde, Secretarios de Despacho y Personera Belén', '#DFF0D8', '2016-10-06 15:00:00', '#3C959A', 'Realizada', 14, 7, 4),
(204, 'Sistematización acompañamiento psicosocial en la notificación', 'Se realizó acompañamiento psicosocial en la notificación a 16 familias en el mes de octubre', '#DFF0D8', '2016-10-26 14:00:00', '#3C959A', 'Realizada', 14, 21, 4),
(205, 'Plenario MM San Vicente del Cagúan', 'Reunión de la mesa municipal de participación San Vicente del Caguan, para la aplicación IEO, divulgación protocolo de participación y sesión 1 de construcción plan de trabajo. San Vicente del Caguán 19 de octubre de 2016.', '#DFF0D8', '2016-10-19 08:30:00', '#3C959A', 'Realizada', 14, 18, 4),
(206, 'Firma Acuerdo de Entendimiento Florencia', 'Acuerdo firmado por Alcalde Florencia, Personero y Directora IRD', '#DFF0D8', '2016-10-15 08:00:00', '#3C959A', 'Realizada', 14, 7, 4),
(207, 'Presentación estrategia entrelanzando por la UARIV en La Comunidad de Puerto Torres.', 'se realizó la presentación de la estrategia Entrelazando por parte de UARIV en las comunidades de Puerto Torres, se brindó el acompañamiento logístico y el apoyo durante las actividades adelantadas por el profesional de la Unidad, selección de cuidadores y presentación iniciativa adecuación caseta comunitaria de Puerto Torres.', '#DFF0D8', '2016-10-15 09:54:00', '#3C959A', 'Realizada', 14, 21, 4),
(208, 'Presentación Casa Pintada en la Inspección La Mono 16 de octubre de 2016', 'Se realizó la presentación Casa Pintada en la Inspección La Mono 16 de octubre de 2016', '#DFF0D8', '2016-10-16 09:58:00', '#3C959A', 'Realizada', 14, 21, 4),
(209, 'Planeación intercambio de experiencias', 'Guión metodológico intercambio experiencias', '#DFF0D8', '2016-10-10 08:00:00', '#3C959A', 'Realizada', 14, 18, 4),
(210, 'CTJT Belén de los Andaquíes', 'Comité territorial de justicia transicional, para presentar análisis balance PAT y conformación subcomité de atención y asistencia. 12 de octubre de 2016', '#DFF0D8', '2016-10-12 09:00:00', '#3C959A', 'Realizada', 14, 18, 4),
(211, 'Jornada de otificacion ', 'Se notificaron 16 familias que pertenecen a PRM VIII', '#DFF0D8', '2016-10-26 14:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(212, 'Firma Acuerdo de Entendimiento Belén de los Andaquíes', 'Firma del Acuerdo por el Alcalde Belén, personera y Directora IRD', '#DFF0D8', '2016-10-15 08:00:00', '#3C959A', 'Realizada', 14, 7, 4),
(213, 'Capacitación SIGO por la UARIV', '', '#D9EDF7', '2016-10-06 10:13:00', '#286090', 'Programada', 14, 18, 4),
(214, 'Jornada Inter institucional. Comuna Sur, Barrio Versalles ', '176 asistentes: 35 funcionario, 140 personas', '#DFF0D8', '2016-10-28 08:00:00', '#3C959A', 'Realizada', 14, 25, 4),
(215, 'Subcomité de Atención y Asistencia Florencia', 'se realizo el subcomité de atención y asistencia el día 24 de octubre de 2016,', '#DFF0D8', '2016-10-28 07:30:00', '#3C959A', 'Realizada', 14, 18, 4),
(216, 'Identificación, remisión y seguimiento a casos de violencia sexual en el marco del conflicto armado a la oferta de atención psicosocial en Florencia', 'En el mes de octubre se identificó un caso de violencia sexual en el marco del conflicto armado el cual fue remitido para atención psicosocial al CIAPSC con cita para el 18 de octubre a las 3 PM. Se realizó seguimiento telefónico y no se obtuvo respuesta debido a que el teléfono se encontraba apagado, sin embargo se contactó al CIAPSC quienes manifestaron que la beneficiaria no asistió a la cita. ', '#DFF0D8', '2016-10-31 08:00:00', '#3C959A', 'Realizada', 14, 21, 4),
(218, 'Subcomité de Reparación colectiva', 'Subcomité de atención y asistencia, seguimiento al Plan Operativo  y sesiones bilaterales seguimiento al Plan de Acción Territorial. Belén de los Andaquíes 10 de noviembre de 2016', '#DFF0D8', '2016-11-10 08:30:00', '#3C959A', 'Realizada', 14, 18, 4),
(219, 'Reunión ICBF para revisión acciones en el marco del Convenio', '', '#D9EDF7', '2016-11-29 08:00:00', '#286090', 'Programada', 14, 7, 4),
(222, 'Intercambio de experiencias San Vicente del Caguan ', 'Compartir lecciones aprendidas ', '#DFF0D8', '2016-10-28 08:00:00', '#3C959A', 'Realizada', 14, 42, 4),
(225, 'Comité Ejecutivo MMP- Preparación rendición de cuentas delegados al -CTJT al plenario de la MMP', '', '#D9EDF7', '2016-11-15 14:00:00', '#286090', 'Programada', 14, 18, 4),
(226, 'Jornada de notificacion ', '', '#D9EDF7', '2016-12-16 14:00:00', '#286090', 'Programada', 14, 19, 4),
(227, 'Mesa de acceso- Salud', '16 funcionarios de diferentes Instituciones.Movilidad, potabilidad y Sisben, temas tratados ', '#DFF0D8', '2016-11-23 09:00:00', '#3C959A', 'Realizada', 14, 25, 4),
(228, 'plenario MMP San Vicente del Caguán', 'Seguimiento al PAT, seguimiento plan de Trabajo, socialización resultados IEO y socialización intercambio de experiencias.', '#DFF0D8', '2016-11-16 11:00:00', '#3C959A', 'Realizada', 14, 18, 4),
(229, 'Taller de nivelación THT', '', '#D9EDF7', '2016-12-05 08:00:00', '#286090', 'Programada', 14, 18, 4),
(230, 'Taller de nivelación THT', '', '#D9EDF7', '2016-12-06 08:00:00', '#286090', 'Programada', 14, 18, 4),
(233, 'Plenario MMP San Vicente del Caguán', '', '#D9EDF7', '2016-12-15 10:00:00', '#286090', 'Programada', 14, 18, 4),
(240, 'Rendición de cuentas de la MMP a las víctimas de San Vicente del Caguán', '', '#D9EDF7', '2016-11-27 14:00:00', '#286090', 'Programada', 14, 18, 4),
(241, 'Plenario MMP Belén de los Andaquíes', '', '#D9EDF7', '0000-00-00 00:00:00', '#286090', 'Programada', 14, 18, 4),
(242, 'Plenario MMP Belén de los Andaqíes', 'Se aplico la línea base de IEO y socialización de los resultados MMPV Belén de los Andaquíes. 18 de octubre de 2016.', '#DFF0D8', '2016-11-21 08:00:00', '#3C959A', 'Realizada', 14, 18, 4),
(243, 'Reunión con  el proyecto Nasa, coordinadores de cablidos mujer y familia para validación de la propuesta metodológica a desarrollar con mujeres de los cabildos Tacueyo, san francisco y Toribio.', 'Se validó la propuesta metodológica propuesta por parte de IRD para trabajar desde un enfoque psicocultural con las mujeres de los resguardos de Tacueyó, San Frnacisco y Toribio.', '#DFF0D8', '2016-11-24 09:00:00', '#3C959A', 'Realizada', 14, 12, 1),
(244, 'III Encuentro "El sentido de las emociones en los procesos de reconciliación" con el grupo "Mujeres víctimas y profesionales".', 'Las mujeres reconocieron e integraron sus historias de dolor con sus historias de vida emocional, reconociendo las emociones y el papel que juegan en la vida de cada una.', '#DFF0D8', '2016-12-01 02:00:00', '#3C959A', 'Realizada', 14, 12, 1),
(245, 'IV Encuentro "Cómo nos ha afectado la guerra a hombres y mujeres", con la comunidad del barrio Bosques de Occidente.', 'Los/as participantes lograron darse cuenta cómo la violencia en el marco del conflicto armado, ha afectado a hombres y mujeres, además de reconocer acciones de cuidado frente a dichas emociones.', '#DFF0D8', '2016-12-01 05:00:00', '#3C959A', 'Realizada', 14, 12, 1),
(246, 'Presentación informe al Concejo Municipal por la MMP Florencia', '', '#D9EDF7', '2016-11-23 17:43:00', '#286090', 'Programada', 14, 18, 4),
(247, 'Reunión con Directora UARIV y Secretaria de Inclusión Social para discutir metodología CRAV', 'La metodología del CRAV fue revisada y aprobada por UARIV y Alcaldía.  Se programó jornada de trabajo en enero para preparar información y el taller en el mes de febrero con el SNARIV', '#FCF8E3', '2016-11-23 08:00:00', '#D6A455', 'Realizada', 14, 7, 4),
(249, 'Comité Departamental de Justicia Transicional', 'El Comité se realizó, sin embargo no fue posible nuestra participación por estar cerrado el ingreso. no se aceptaron invitados', '#F2DEDE', '2016-11-28 08:00:00', '#286090', 'Programada', 14, 7, 4),
(250, 'Sistematización encuentro psicosocial primera entrega', 'Se brindó acompañamiento psicosocial a 24 familias', '#DFF0D8', '2016-11-24 08:00:00', '#3C959A', 'Realizada', 14, 21, 4),
(252, 'Sistematización acompañamiento psicosocial en segunda entrega', 'Se realizó acompañamiento psicosocial a 24 familias', '#DFF0D8', '2016-11-18 08:00:00', '#3C959A', 'Realizada', 14, 21, 4),
(253, 'Presentación proyecto casa pintada  la Mono y adecuación caseta comunal  Puerto Torres.', 'Reunión realizada en San Vicente  donde se presentó el proyecto ante el alcalde, secretarios y personero.', '#DFF0D8', '2016-10-05 02:30:00', '#3C959A', 'Realizada', 14, 23, 4),
(254, 'Reunión con la MMP de Toribio para concretar las fechas de las actividades del Plan de Trabajo con la compañia de el Enlace de Víctimas y la Personera Municipal. ', 'Se realizó revisión del Plan de Trabajo de la MMP de Toribio, de igual manera se socializo los ajustes del PAT. se contó con la presencia de la personería Municipal y Enlace de víctimas. ', '#DFF0D8', '2016-12-01 09:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(255, 'Formalizacion de los acierdos para la presencia institucional en el CRAV en el marco del CTJT de Popayán ', 'Se realizó la informatización de los acuerdos para la presencia de funcionarios en el CRAV. ', '#DFF0D8', '2016-12-06 14:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(257, 'Rendición de Cuentas de la MMP y Jornadas de socialización y sensibilización para dar a conocer la ley 1448 del 2011 y las rutas de atención, dirigida a líderes de población victima en la zona urbana del municipio de Caloto.', 'la MMP de Caloto realizó la Rendición de Cuentas y la socialización y sensibilización para dar a conocer la ley 1448 del 2011 y las rutas de atención, dirigida a líderes de población victima en la zona urbana del municipio de Caloto.', '#DFF0D8', '2016-12-07 08:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(258, 'Diligenciamiento ficha  de Caracterización', '1 Familia Caracterizada', '#DFF0D8', '2016-11-25 03:00:00', '#3C959A', 'Realizada', 14, 23, 4),
(259, 'Realización Encuentro II "Qué ha pasado por aquí" con el grupo "Mujeres víctimas y profesionales"', 'Las mujeres visualizaron los efectos que la violencia a dejado en su comunidad, se afianzaron lazos de solidaridad y amistad', '#DFF0D8', '2016-11-24 01:30:00', '#3C959A', 'Realizada', 14, 12, 1),
(260, 'Realización Encuentro III "el sentido de las emociones en los procesos de reconciliación", con la comunidad del barrio Bosques de Occidente', 'El grupo avanzó en el reconocimiento de sus emociones y el papel que cada una de ellas cumple en su cotidianidad.', '#DFF0D8', '2016-11-24 05:00:00', '#3C959A', 'Realizada', 14, 12, 1),
(261, 'Seguimiento Educación en SIMAT y SIFA', 'Se realizó seguimiento en SIMAT y SIFA encontrando un niño matriculado en el Tambo y beneficiario de Mas Familias en Acción. ', '#DFF0D8', '2016-11-30 14:25:00', '#3C959A', 'Realizada', 14, 8, 1),
(262, 'Entrega FF9-006(2)', '', '#D9EDF7', '2016-12-05 08:00:00', '#286090', 'Programada', 14, 19, 4),
(263, 'Entrega FF9-007 (1) ', '', '#D9EDF7', '2016-12-06 08:00:00', '#286090', 'Programada', 14, 19, 4),
(264, 'Entrega FF9-007(2) ', '', '#D9EDF7', '2016-12-21 08:00:00', '#286090', 'Programada', 14, 19, 4),
(265, 'Entrega FF9-008(1) ', '', '#D9EDF7', '2016-12-22 08:00:00', '#286090', 'Programada', 14, 19, 4),
(266, 'Entrega FF9-001(1)\n', 'Se atendieron 18 familias 58 personas ', '#DFF0D8', '2016-10-03 08:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(267, 'Entrega FF9-002 ESPECIAL ', 'Se atendieron 2 familias 3 personas ', '#DFF0D8', '2016-10-03 08:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(268, 'Entrega FF9-001(2)', 'Se atendieron 16 familias 53 personas ', '#DFF0D8', '2016-10-19 08:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(269, 'Entrega FF9-003(1)', 'Se atendieron 18 familias 48 personas ', '#DFF0D8', '2016-10-20 08:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(270, 'Acuerdo Firmado Alcalde y Personera San Vicente del Caguán', 'Pendiente firma Carmenza Becerra IRD', '#FCF8E3', '0000-00-00 00:00:00', '#D6A455', 'Realizada', 14, 7, 4),
(271, 'Firma Acuerdo San Vicente por Alcalde y Personera', 'Pendiente firma Carmenza Becerra IRD', '#DFF0D8', '2016-10-15 16:36:00', '#3C959A', 'Realizada', 14, 7, 4),
(273, 'Comité de Justicia Transicional en Florencia', '', '#D9EDF7', '0000-00-00 00:00:00', '#286090', 'Programada', 14, 7, 4),
(274, 'Comité de Justicia Transicional Florencia', '', '#D9EDF7', '2016-12-07 09:00:00', '#286090', 'Programada', 14, 7, 4),
(275, 'Rendición de cuentas de IRD a Alcalde, equipo de Gobierno y Personero', '', '#D9EDF7', '2016-12-06 07:00:00', '#286090', 'Programada', 14, 7, 4),
(276, 'Entrega FF9-005(1)', 'Se atendieron 7 familias 16 personas ', '#DFF0D8', '2016-11-03 08:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(277, 'Entrega FF9-003(2) ', 'Se atendieron 17 familias 47 personas ', '#DFF0D8', '2016-11-10 08:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(278, 'Entrega FF9-005(2) ', 'Se atendieron 7 Familias 16 personas', '#DFF0D8', '2016-11-18 08:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(279, 'Recepción Kits UARIV', 'Se recibieron 43 kits Tipo A, 14 Kits tipo B, 4 kits tipo C. de la OP 708.', '#DFF0D8', '2016-11-29 08:52:00', '#3C959A', 'Realizada', 14, 15, 1),
(280, 'Recepcion de Kit de frutas y verduras y panal de huevos.', 'Se recibieron 23 kits ', '#DFF0D8', '2016-10-03 08:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(281, 'Reunión con.....', 'Bien', '#FCF8E3', '2016-12-07 09:47:00', '#D6A455', 'Realizada', 14, 28, 1),
(283, 'Sistematización encuentro psicosocial en la segunda entrega', '', '#D9EDF7', '2016-12-21 08:00:00', '#286090', 'Programada', 14, 21, 4),
(284, 'Sisitematización acompañamiento psicosocial en la primera entrega', '', '#D9EDF7', '2016-12-19 08:00:00', '#286090', 'Programada', 14, 21, 4),
(285, 'Jornada de notificación', 'Se convocaron 35 declarantes y se notificaron 30 de ellos', '#DFF0D8', '2016-12-06 08:00:00', '#3C959A', 'Realizada', 14, 1, 1),
(286, 'Recepcion de Kit de frutas verduras y panal de huevos ', 'Se recibieron 18 kits ', '#DFF0D8', '2016-10-20 08:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(287, 'Recepcion de kit de frutas verduras y panal de huevos. ', 'Se recibieron 7 kits ', '#DFF0D8', '2016-11-03 08:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(288, 'Recepcion de frutas verduras y panal de huevos ', 'Se recibieron 2 kits', '#DFF0D8', '2016-10-03 08:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(289, 'Recepcion de kit de frutas verduras y panal de huevos ', 'Se recibieron 17 kits ', '#DFF0D8', '2016-11-24 08:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(290, 'Recepcion de Bienestarina ', 'Se recibieron 50 bolsas de bienestarina MAS X 900', '#DFF0D8', '2016-10-11 17:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(291, 'Recepcion de bienestarina ', 'Se recibieron 100 bolsas de Bienestarina MAS y 25 bolsas de bienestarina MAS Fresa x 900', '#DFF0D8', '2016-11-11 08:30:00', '#3C959A', 'Realizada', 14, 19, 4),
(292, 'Intervención espacio comunitario Embera Chamí Puru Resguardo San José de Canelo Florencia', '21/11/2016. Apoyo logístico durante socializacion de resultados por parte de la UARIV de la caracterización del daño comunidad Embera Chami. 22/11/2016 Rescate de tradiciones ancestrales en torno a la comida comunidad Embera Chami', '#DFF0D8', '2016-11-21 08:00:00', '#3C959A', 'Realizada', 14, 26, 4),
(293, 'Recepcion de alimentos y complementos UARIV', 'Se recibieron \n12 kit tipo A\n21 kit tipo B\n33 kit cocina\n108 kit vajilla \n', '#DFF0D8', '2016-10-13 08:30:00', '#3C959A', 'Realizada', 14, 19, 4),
(294, 'Acompañamiento para la caracterización del daño Comunidad Embera chami Vereda San José de Canelos Florencia. Noviembre 7, 8 y 9 de 2016', 'Se brindo acompañamiento logistico durante las jornadas de caracterizacion del daño llevada a cabo por parte de la UARIV con la comunidad indigena Embera Chami', '#DFF0D8', '2016-11-07 08:00:00', '#3C959A', 'Realizada', 14, 26, 4),
(295, 'Recepcion de alimentos y complementos UARIV', 'Se recibieron\n33 kit tipo A\n29 kit tipo B\n62 kit cocina\n182 kit vajilla\n\n', '#DFF0D8', '2016-11-21 12:00:00', '#3C959A', 'Realizada', 14, 19, 4),
(296, 'Divulgación Herramientas psicosociales para la Vida comunidad Nueva Colombia San Vicente del Caguán', 'Presentación de los GAM a la comunidad de Villa Colombia y selección de grupo GAM', '#DFF0D8', '2016-11-16 16:00:00', '#3C959A', 'Realizada', 14, 26, 4),
(297, 'Presentación Proyecto Casa Pintada a comunidad La Mono y acuerdos para mano de obra adecuaciones', 'Selección de tejedores para la comunidad de La Mono y taller casa pintada.', '#DFF0D8', '2016-11-25 09:00:00', '#3C959A', 'Realizada', 14, 26, 4),
(298, ' Intervención espacio comunitario Nasa Páez Resguardo La Gaitana Florencia', 'Acompañamiento durante consulta previa Ministerio de interior, UARIV con la comunidad Nasa Paez. Socializacion por parte del gobierno Nasa Paez frente a la importancia de la Casa Yatwala.', '#DFF0D8', '2016-11-17 09:00:00', '#3C959A', 'Realizada', 14, 26, 4),
(299, 'Encuentro Psicosocial de Planeación Participativa que permita el acercamiento en el Corregimiento de Puerto Torres . Noviembre 10 de 2016', 'Se realizo encuentro Psicosocial de Planeación Participativa que permitió la identificación de los lugares comunitarios y su prioridad para su adecuación también  el acercamiento con la comunidad de  Puerto Torre.', '#DFF0D8', '2016-11-10 09:00:00', '#3C959A', 'Realizada', 14, 26, 4),
(300, 'Selección de Tejedores y realizacion de practica deportiva rescate de juegos tradicionales que afiancen los lazos comunitarios en Puerto Torres. Noviembre 24 de 2016', 'e realizó la selección de los 13 (cuidadores) para la comunidad de Puerto Torres. Se adelantó el rescate de juegos tradicionales con la participación de todos los asistentes  ', '#DFF0D8', '2016-11-24 09:00:00', '#3C959A', 'Realizada', 14, 26, 4),
(301, 'Diligenciamiento Ficha de caracterización.', '1 Familia caracterizada', '#DFF0D8', '2016-12-05 08:00:00', '#3C959A', 'Realizada', 14, 23, 4),
(302, 'Realización I Encuentro "Reconociéndonos y formando grupo" con la comunidad del barrio Bosques de Occidente.', 'Se concertó con el grupo del barrio Bosques de Occidente el primer GAM; se afianzaron lazos de confianza y de reconocimiento del grupo.', '#DFF0D8', '2016-11-03 14:00:00', '#3C959A', 'Realizada', 14, 12, 1),
(303, 'Actividades de autocuidado para los integrantes de la MMP Popayán.', '.se desarrolló con los miembros de la mesa de Popayán el tema de trabajo en equipo y negociación.  ', '#DFF0D8', '2016-10-20 13:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(304, 'Seguimiento a la ejecución del Plan de Trabajo en la mesa de Participación de Popayán.', 'se realizó seguimiento al Plan de Trabajo de la Mesa de Popayán, se revisó actividad por actividad, de las 37 actividades, 19 alcanzaron el 100%, una 75%, una 70%, una 67%, cinco 50%, una 33%, una 14% y ocho 0% de avance, para un promedio de 65% de avance en la implementación del Plan de Trabajo de la Mesa Municipal de Participación de Popayán. ', '#DFF0D8', '2016-11-18 13:30:00', '#3C959A', 'Realizada', 14, 8, 1),
(305, 'Taller THT', '', '#D9EDF7', '2017-02-27 08:00:00', '#286090', 'Programada', 14, 18, 4),
(306, 'Taller THT', '', '#D9EDF7', '2017-02-28 08:00:00', '#286090', 'Programada', 14, 18, 4),
(307, 'Intercambio de experiencias', '', '#D9EDF7', '2016-10-29 08:00:00', '#286090', 'Programada', 14, 18, 4),
(309, 'REunión SEM', '', '#D9EDF7', '0000-00-00 00:00:00', '#286090', 'Programada', 14, 18, 4),
(310, 'Realización del primer encuentro "Reconociéndonos y formando grupo" con los niños y niñas de la vereda los Chorros y reunión con el grupo étnico ARCOIRIS para proponer fechas de los encuentros de la vereda la selva', '', '#D9EDF7', '2016-12-14 08:00:00', '#286090', 'Programada', 14, 46, 1),
(311, 'Realización del I encuentro "Reconociéndonos y formando grupo" con mujeres de las OVDS, Resguardo Huellas, Renacer y comunidad de la vereda Caicedo. Planeación con las cuidadoras para la implementación del GAM con mujeres y Abracitos con los niños de la v', '', '#DFF0D8', '2016-10-25 08:00:00', '#3C959A', 'Realizada', 14, 46, 1),
(312, 'Grupo PP9-005(2)', 'Se atendieron 21 familias 58 personas.', '#DFF0D8', '2016-12-12 08:00:00', '#3C959A', 'Realizada', 14, 15, 1),
(313, 'Grupo PP9-006(1)', 'Se atendieron 22 familias 56 personas', '#DFF0D8', '2016-12-12 14:00:00', '#3C959A', 'Realizada', 14, 15, 1),
(314, 'Identificación, remisión y seguimiento de casos de violencia sexual en el marco del conflicto armado a la oferta de atención psicosocial en Florencia', 'Identificación y remisión de un caso de VS en el marco del conflicto armado. se remitio al CIAPSC para atención psicólogica, le asignaron cita para el 12 de diciembre a las 3PM. La enfermera está realizando la inclusión al sistema de salud teniendo en cuenta que no tiene carne de salud.', '#DFF0D8', '2016-12-06 08:00:00', '#3C959A', 'Realizada', 14, 21, 4),
(315, 'Encuentro grupal de acompañamiento psicosocial en el marco de la jornada de notificación de la UARIV en Florencia.', '', '#D9EDF7', '2016-12-21 14:00:00', '#286090', 'Programada', 14, 21, 4),
(316, 'Formulación del informe de Rendición de Cuentas a presentar a la comunidad por la MMP de Toribio. Revisión de las dimensiones del IEO.', 'Se elaboró el informe de Rendición de cuentas de la MMP de Toribio.', '#DFF0D8', '2016-12-09 09:00:00', '#3C959A', 'Realizada', 14, 8, 1),
(317, 'Reunión del CTJT del municipio de Toribio para la aprobación de los ajustes al PAT de los años 2016-2019.', '', '#D9EDF7', '2016-12-13 09:00:00', '#286090', 'Programada', 14, 8, 1),
(318, 'Presentación del informe de Rendición a la comunidad del municipio de Toribio por la MMP.', '', '#D9EDF7', '2016-12-14 09:00:00', '#286090', 'Programada', 14, 8, 1),
(319, 'Formación a funcionarios públicos con participación de los municipios de Toribio y Caloto. Habilidades gerenciales, con THT.', '', '#D9EDF7', '2016-12-15 08:00:00', '#286090', 'Programada', 14, 8, 1),
(320, 'Formación a funcionarios públicos con participación de los municipios de Toribio y Caloto. Habilidades gerenciales, con THT.', '', '#D9EDF7', '2016-12-16 08:00:00', '#286090', 'Programada', 14, 8, 1),
(321, 'GAM 1, 2 Comunidad Nueva Colombia San Vicente del Caguán', '', '#D9EDF7', '2016-12-06 09:00:00', '#286090', 'Programada', 14, 26, 4),
(322, 'Taller Casa Pintada la Mono', '', '#D9EDF7', '2016-12-12 09:00:00', '#286090', 'Programada', 14, 26, 4),
(323, 'Taller de diseño participativo de la Casa del Pensamiento con la Comunidad indigena Nasa Paez en la Vereda El Vergel Florencia. ', '', '#D9EDF7', '2016-12-14 09:00:00', '#286090', 'Programada', 14, 26, 4),
(324, 'Adecuación caseta comunitaria Puerto Torres', '', '#D9EDF7', '2016-12-15 09:00:00', '#286090', 'Programada', 14, 26, 4),
(325, 'Acompañamiento para la caracterización del daño Comunidad Nasa Paez en la Vereda El Vergel Florencia.', '', '#D9EDF7', '2016-12-15 15:20:00', '#286090', 'Programada', 14, 26, 4),
(326, 'Compra y entrega de insumos para la celebración de fiestas tradicionales de fin de año comunidad Embera Chami en la Vereda San José de Canelo Florencia.', '', '#D9EDF7', '2016-12-20 15:25:00', '#286090', 'Programada', 14, 26, 4),
(327, 'Diseño participativo Caseta comunal en la comunidad de Puerto Torres. ', '', '#D9EDF7', '2016-12-15 09:00:00', '#286090', 'Programada', 14, 26, 4),
(328, 'Firma Acuerdo de Entendimiento San Vicente', 'Acuerdo firmado por Alcalde San Vicente, Personera y Directora IRD', '#F2DEDE', '2016-10-15 15:41:00', '#286090', 'Programada', 14, 7, 4),
(329, 'Jornada de caracterización', 'Se convocaron nueve familias y se lograron caracterizar 8 de ellas', '#DFF0D8', '2016-12-09 08:00:00', '#3C959A', 'Realizada', 14, 1, 1),
(330, 'Jornada de caracterización', 'Se convocaron 6 declarantes y se caracterizaron 4', '#DFF0D8', '2016-12-13 08:00:00', '#3C959A', 'Realizada', 14, 1, 1),
(331, 'Jornada de caracterización', '', '#D9EDF7', '2016-12-14 08:00:00', '#286090', 'Programada', 14, 1, 1),
(332, 'Jornada de caracterización', '', '#D9EDF7', '2016-12-16 08:00:00', '#286090', 'Programada', 14, 1, 1),
(333, 'Reunión SEM', 'Revisión barreras de acceso al sistema educativo', '#D9EDF7', '2016-12-13 08:00:00', '#286090', 'Programada', 14, 18, 4),
(334, 'Plenario MMP Belén de los Andaquíes', '', '#D9EDF7', '2016-12-16 08:00:00', '#286090', 'Programada', 14, 18, 4),
(335, 'Rendición de cuentas de la MMP a las víctimas Florencia.', '', '#D9EDF7', '2016-12-15 02:00:00', '#286090', 'Programada', 14, 18, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador`
--

CREATE TABLE IF NOT EXISTS `indicador` (
  `idindicador` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_indicador` varchar(10) NOT NULL,
  `nombre_indicador` varchar(500) NOT NULL,
  `descripcion_indicador` text,
  `meta` int(11) NOT NULL,
  `tipo_indicador` varchar(50) DEFAULT NULL,
  `frecuencia_medicion_indicador` varchar(50) DEFAULT NULL,
  `idobjetivo` int(11) NOT NULL,
  PRIMARY KEY (`idindicador`),
  KEY `idobjetivo` (`idobjetivo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `indicador`
--

INSERT INTO `indicador` (`idindicador`, `codigo_indicador`, `nombre_indicador`, `descripcion_indicador`, `meta`, `tipo_indicador`, `frecuencia_medicion_indicador`, `idobjetivo`) VALUES
(15, '1.1.', 'Número de reuniones de Comités Municipales de Justicia Transicional y Subcomités para el diseño, evaluación, monitoreo y evaluación de la asistencia y reparación a víctimas', '', 24, '', '', 16),
(16, '1.2.', 'Número de municipios con un Plan de Acción Territorial para la asistencia y reparación a las víctimas diseñado, implementado y con monitoreo', '', 6, '', '', 16),
(17, '1.3.', 'Número de municipios certificados por la UARIV con un nivel de contribución medio o superior para la asistencia y reparación a víctimas', '', 6, '', '', 16),
(18, '2.1.', 'Porcentaje de desplazados nuevos que reciben raciones de comida de 2.100 Kcal/día por 30 días', '', 90, '', '', 17),
(19, '2.2.', 'Porcentaje de niños desplazados en edad escolar que estén estudiando actualmente o hayan finalizado', '', 85, '', '', 17),
(20, '2.3.', 'Porcentaje de víctimas de desplazamiento forzado notificadas de su inclusión en el RUV', '', 60, '', '', 17),
(21, '2.4.', 'Porcentaje de víctimas de desplazamiento forzado incluidas en el RUV con un diagnóstico de necesidades para la asistencia', '', 60, '', '', 17),
(22, '3.1.', 'Número de Mesas de Participación Municipales con Planes de Trabajo diseñados, implementados y en seguimiento', '', 6, '', '', 18),
(23, '3.2.', 'Número de reuniones de Mesas de Participación Municipales para diseñar, monitorear y evaluar la implementación del PAT', '', 12, '', '', 18),
(24, '3.3.', 'Número de Mesas Municipales de Participación con un puntaje del Índice de Capacidad Organizacional superior a 3.0', '', 6, '', '', 18),
(25, '4.1.', 'Porcentaje de familias con un Índice de Afectación Emocional menor a 0,56', '', 90, '', '', 19),
(26, '4.2.', 'Porcentaje de mujeres que participan en Grupos de Apoyo Mutuo', '', 90, '', '', 19),
(27, '4.3.', 'Número de comunidades con actividades de rehabilitación comunitaria', '', 22, '', '', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaaccion`
--

CREATE TABLE IF NOT EXISTS `lineaaccion` (
  `idlineaaccion` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_lineaaccion` decimal(2,1) DEFAULT NULL,
  `nombre_lineaaccion` varchar(100) NOT NULL,
  `descripcion_lineaaccion` text NOT NULL,
  `idobjetivo` int(11) NOT NULL,
  PRIMARY KEY (`idlineaaccion`),
  KEY `idobjetivo` (`idobjetivo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `lineaaccion`
--

INSERT INTO `lineaaccion` (`idlineaaccion`, `codigo_lineaaccion`, `nombre_lineaaccion`, `descripcion_lineaaccion`, `idobjetivo`) VALUES
(3, '1.1', 'Formación', '', 16),
(4, '1.2', 'Planeación', '', 16),
(5, '1.3', 'Coordinación', '', 16),
(6, '1.4', 'Financiación', '', 16),
(7, '1.5', 'Atención', '', 16),
(8, '2.1', 'Atención Humanitaria Inmediata (Popayán y Florencia)', '', 17),
(9, '2.2', 'Ruta Integral de Asistencia', '', 17),
(10, NULL, 'Subsistencia Mínima', '', 17),
(11, '3.1', 'Plan de Trabajo', '', 18),
(12, '3.2', 'Participación en Política Pública de Atención y Reparación', '', 18),
(13, '3.3', 'Organización Interna', '', 18),
(14, '4.1', 'Atención Psicosocial en la Emergencia', '', 19),
(15, '4.2', 'Grupos de Apoyo Mutuo.', '', 19),
(16, '4.3', 'Actividades para la Rehabilitación Comunitaria', '', 19),
(27, '4.4', ' Identificación, remisión y seguimiento', '', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `macroactividad`
--

CREATE TABLE IF NOT EXISTS `macroactividad` (
  `idmacroactividad` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_macroactividad` decimal(8,0) NOT NULL,
  `nombre_macroactividad` text NOT NULL,
  `descripcion_macroactividad` text NOT NULL,
  `idproyecto` int(11) NOT NULL,
  `idobjetivo` int(11) NOT NULL,
  `idregional` int(11) NOT NULL,
  `idperiodo` int(11) NOT NULL,
  `idlineaaccion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmacroactividad`),
  KEY `idproyecto` (`idproyecto`,`idobjetivo`,`idregional`,`idperiodo`),
  KEY `idlineaaccion` (`idlineaaccion`),
  KEY `idobjetivo` (`idobjetivo`,`idregional`,`idperiodo`),
  KEY `idregional` (`idregional`),
  KEY `idperiodo` (`idperiodo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=183 ;

--
-- Volcado de datos para la tabla `macroactividad`
--

INSERT INTO `macroactividad` (`idmacroactividad`, `codigo_macroactividad`, `nombre_macroactividad`, `descripcion_macroactividad`, `idproyecto`, `idobjetivo`, `idregional`, `idperiodo`, `idlineaaccion`) VALUES
(26, '1', 'aCTIVIDAD 1', '', 14, 16, 1, 10, NULL),
(31, '1', 'Formación a funcionarios publicos con participación de los municipios de Popayán, Toribio y Caloto. Habilidades gerenciales, con THT.', 'Se identificarán los funcionarios de Toribio y Caloto para incluirlos en el plan de formación. ', 14, 16, 1, 10, 3),
(32, '1', 'Formulación del plan financiero de los PAT de los municipios de Popayán, Caloto y Toribío. Año 2017, 5 Medidas prioritarias', 'Elaboración del Plan Anualizado de Caja.', 14, 16, 1, 10, 4),
(33, '2', ' Aprobación del presupuesto municipal con recursos para las cinco medidas prioritarias. Municipio de Popayán', '', 14, 16, 1, 10, 4),
(34, '3', 'Aprobación del presupuesto municipal con recursos para las cinco medidas prioritarias. Municipio de Caloto', '', 14, 16, 1, 10, 4),
(35, '4', 'Aprobación del presupuesto municipal con recursos para las cinco medidas prioritarias. Municipio de Toribio', '', 14, 16, 1, 10, 4),
(36, '5', 'Ajuste y Aprobación al PAT 2016 - 2019 por parte del CMJT  de Toribio.', '', 14, 16, 1, 10, 4),
(37, '6', 'Elaboración Tablero de Control. PAT 2016 -2019, municipio de Toribio.', '', 14, 16, 1, 10, 4),
(38, '7', 'Aprobación de los ajustes al PAT 2016 - 2019 por parte del CMJT  de Caloto.', '', 14, 16, 1, 10, 4),
(39, '8', '. Elaboración Tablero de Control. PAT 2016 -2019, municipio de Caloto.', '', 14, 16, 1, 10, 4),
(40, '9', 'Diligenciamiento Tablero PAT 2017 Gobernación, con recursos para aplicar mecanismo de corresponsabilidad.', 'Antes del 12 de octubre-', 14, 16, 1, 10, 4),
(44, '10', 'Seguimiento al Plan de Acción Territorial de Popayán en subcomites técnicos y el CTJT. ', '', 14, 16, 1, 10, 4),
(45, '1', 'Jornadas de trabajo para garantizar las réplicas de certificación 2015, con las administracion municipal de Popayán.', '', 14, 16, 1, 10, 5),
(46, '2', 'Jornadas de trabajo para garantizar las réplicas de certificación 2015, con las administracion municipal de Caloto ', '', 14, 16, 1, 10, 5),
(47, '3', 'Jornadas de trabajo para garantizar las réplicas de certificación 2015, con las administracion municipal de Toribio', '', 14, 16, 1, 10, 5),
(48, '4', 'Presentación balance de mecanismo de subsidiaridad y subsistencia minima por parte de la Alcaldia de Popayán, a Uariv, Gobernación y MMP', '', 14, 16, 1, 10, 5),
(49, '5', ' Rendición de cuentas de IRD a la Administración Municipal de Popayán.', '', 14, 16, 1, 10, 5),
(50, '6', 'Presentación del proyecto Cerrando Brechas 2016 - 2017, a los alcaldes y personeros de Caloto y Toribio', '', 14, 16, 1, 10, 5),
(51, '7', 'Firma de los acuerdos de entendimientos entre IRD y los alcaldes y personeros de los municipios de Popayán, Caloto y Toribio. ', '', 14, 16, 1, 10, 5),
(52, '1', 'Comité Técnico del convenio del proyecto "Fortalecimiento de la capacidad municipal para la recuperación emocional y la reparación colectiva a las victimas de la violencia en el municipio de Popayán".', '', 14, 16, 1, 10, 6),
(53, '2', ' Identificación de las necesidades del municipio íde Toribio frente a la implementación del proyecto psicosocial. ', '', 14, 16, 1, 10, 6),
(54, '1', 'Formalización de los acuerdos para la presencia institucional en el CRAV en el marco de un CTJT de Popayán.', '', 14, 16, 1, 10, 7),
(55, '1', ' Primera y Segunda Entrega de raciones y complementos en el municipio de Popayán.', ' Entregas Quincenales', 14, 17, 1, 10, 8),
(56, '1', 'Elaboración y remisión de ordenes de matrícula a menores que no estan vinculados al sistema educativo a los  colegios identificados  en el municipio de Popayán.', 'Se remitirá a los colegios que reciben la mayor cantidad de NNA en el municipio. ', 14, 17, 1, 10, 9),
(57, '2', 'Seguimiento interno a jóvenes en edad escolar.', '', 14, 17, 1, 10, 9),
(58, '3', 'Adelantar jornada de notificacióna incluidos por UARIV a atendidos por IRD. ', '', 14, 17, 1, 10, 9),
(59, '4', 'Elaboración de fichas de caracterización a familias incluidas y atendidas por IRD', '', 14, 17, 1, 10, 9),
(60, '5', 'Seguimiento a Salud. Aplicación reglas de portabilidad.', '', 14, 17, 1, 10, 9),
(61, '1', 'Seguimiento a la ejecución del Plan de Trabajo  en la mesa de Participación de Popayán.', '', 14, 18, 1, 10, 11),
(62, '2', 'Rendición de cuentas de la MMPV que permita  a la comunidad en general conocer los avances logrados Popayán.', 'Actividad del Plan de Trabajo', 14, 18, 1, 10, 11),
(63, '3', 'Actividades de autocuidado para los integrantes de la MMP Popayán.', 'Actividad del Plan de Trabajo\r\n', 14, 18, 1, 10, 11),
(64, '4', 'Jornada interinstitucional de la MMPV de Popayán con enfasís en tramites de libreta militar. ', 'Actividad del Plan de Trabajo\r\n', 14, 18, 1, 10, 11),
(65, '5', 'Capacitación a miembros de la MMP de Popayán en PAARI, Ficha de Caracterización, Tablero PAT, y SIGO. ', 'Actividad del Plan de Trabajo\r\n', 14, 18, 1, 10, 11),
(66, '6', 'Revisión y ajuste al Plan de Trabajo de la MMP de Toribio.', '', 14, 18, 1, 10, 11),
(67, '7', 'Revisión y ajuste al Plan de Trabajo de la MMP de Caloto.', '', 14, 18, 1, 10, 11),
(68, '8', 'Identificación de necesidades de apoyo proyecto de participación de la MMP de Caloto', '', 14, 18, 1, 10, 11),
(69, '1', 'Presentacion a la MMP de Popayán el seguimiento al PAT.\r\n', '', 14, 18, 1, 10, 12),
(70, '1', ' Presentación del resultado del Indice de Estado Organizacional, a los integrantes de la MMP de Popayán\r\n', '', 14, 18, 1, 10, 13),
(71, '2', 'Seguimiento a las dimensiones del IEO en las sesiones de la MMPV de Popayán y  en otras reuniones.\r\n', '', 14, 18, 1, 10, 13),
(72, '3', ' Aplicación del IEO a la MMP de Toribio.\r\n', '', 14, 18, 1, 10, 13),
(73, '4', 'Aplicación del IEO a la MMP de Caloto.\r\n', '', 14, 18, 1, 10, 13),
(74, '5', 'Preparación de la elección de la MMP de Popayán.', 'Solicitado por la personería de Popayán.\r\n', 14, 18, 1, 10, 13),
(75, '1', ' Encuentros grupales de acompañamiento psicosocial en el marco de la primera entrega.\r\n', '', 14, 19, 1, 10, 14),
(76, '2', ' Encuentros grupales de acompañamiento psicosocial en el marco de la segunda entrega.\r\n', '', 14, 19, 1, 10, 14),
(77, '3', 'Encuentro grupal de acompañamiento psicosocial en el marco de la notificacion a incluidos por UARIV a declarantes atendidos por IRD.\r\n', '', 14, 19, 1, 10, 14),
(78, '1', 'Formación a cuidadores de Toribio y Caloto.\r\n', ' seis (6) encuentros.\r\n', 14, 19, 1, 10, 15),
(79, '2', ' Acompañamiento a la implementación al proceso de abrazos en el municipio de Toribío.\r\n', 'Comunidad por Definir\r\n', 14, 19, 1, 10, 15),
(80, '3', ' Acompañamiento a la implementación al proceso de abrazoscon las OVDs Medidas Cautelares y Nuevo Renacer en el municipio de Caloto. Abrazos 1, 2, 3, 4, 5, 6, 7 y 8\r\n', 'Participan 28 mujeres y 2 hombres. Los encuentros se realizan la Tulpa de la vereda La Selva.\r\n', 14, 19, 1, 10, 15),
(81, '4', ' Acompañamiento a la implementación al proceso de abracitos a niños y niñas de la comunidad Los Chorros en el municipio de Caloto. Abracitos 1, 2 ,3, 4 ,5 y 6\r\n', 'Este grupo esta conformado por 31 niños. Lo lideran los cuidadores Hector Velasco y Luz Marina Escué. Se acompañará presencialmente cada 15 días.\r\n', 14, 19, 1, 10, 15),
(82, '5', 'Acompañamiento a la implementación al proceso de abrazos con la organización MOVICE en el municipio de Popayán. Abrazos 1, 2, 3, 4, 5 y 6.\r\n', 'Apoyar un proceso de abrazos iniciado por la cuidadora Rutsarita Bastidas.\r\n', 14, 19, 1, 10, 15),
(83, '1', 'Adecuación del salón comunal de la vereda la Rejoya en el marco del sujeto colectivo.\r\n', 'Proyecto concertado con la comunidad de la Rejoya, la UARIV y alcaldía municipal.\r\n', 14, 19, 1, 10, 16),
(84, '2', ' Implementación de actividades de Rehabilitación Comunitaria en el sujeto colectivo de la Rejoya en el marco del proyecto "Fortalecimiento de la capacidad municipal para la recuperación emocional y la reparación colectiva a las victimas de la violencia en el municipio de Popayán".. \r\n', ' Al menos una (1) actividad de Rehabilitación comunitaria\r\n', 14, 19, 1, 10, 16),
(85, '3', ' Implementación de actividades de Rehabilitación Comunitaria en el casco urbano del municipio de Popayán en el marco del proyecto "Fortalecimiento de la capacidad municipal para la recuperación emocional y la reparación colectiva a las victimas de la violencia en el municipio de Popayán".\r\n', 'Al menos cuatro (4) actividades de Rehabilitación Comunitaria\r\n', 14, 19, 1, 10, 16),
(86, '4', ' Implementación de actividades de Rehabilitación Comunitaria en el sujeto colectivo de Toribio, en el marco del PIRC concertado.\r\n', 'Por concertar una vez se realice el evento de protocolización.\r\n', 14, 19, 1, 10, 16),
(87, '5', 'Seguimiento a las actividades del sujeto colectivo de la Rejoya. \r\n', 'Reunión con la instituciones con responsabilidad en las actividades del sujeto de reparación colectiva para hacer seguimiento a los compromisos pactado en el mes de agosto. \r\n', 14, 19, 1, 10, 16),
(88, '1', ' Identificación, Remisión y seguimiento de casos de Violencia Sexual en el marco del conflicto armado, a la oferta de Atención Psicosocial en Popayán. \r\n', '', 14, 19, 1, 10, 27),
(89, '1', 'Formación a Funcionarios Públicos de Alcaldía de Florencia, Gobernación, Ministerio Público y UARIV en los módulos  IV y V de la Escuela de Reparaciones UARIV', 'Actividad coordinada con UARIV y Organizaciones de Cooperación (GIZ, MAPP OEA, NRC, OIM).  Nivel IV " LEY DE VÍCTIMAS Y RESTITUCIÓN DE TIERRAS": Aspectos fundamentales de la ley de víctimas y restitución de tierras, Generalidades Decretos Ley étnicos Y Participación efectiva de las víctimas. Nivel V "IMPLEMENTACIÓN":  Registro, Atención y Asistencia, Reparación Integral individual, Reparación integral colectiva, Garantías de no repetición y Ruta integral de atención, asistencia y reparación integral.', 14, 16, 4, 10, 3),
(90, '6', 'Acompañamiento a la implementación al proceso de abrazos al grupo de mujeres vícitmas y profesionales del municipio de Popayán. Abrazos 1, 2, 3, 4, y 5.', '', 14, 19, 1, 10, 15),
(91, '7', 'Acompañamiento a la implementación al proceso de abrazos en la comunidad Bosques de Occidente de Popayán. Abrazos 1, 2, 3, 4, 5, y 6.', 'Apoyar un proceso de abrazos iniciado por la cuidadora Maria Elena. Lopez', 14, 19, 1, 10, 15),
(92, '2', 'Módulo de nivelación a Funcionarios públicos de San Vicente del Caguán, Florencia y Belén de los Andaquíes en habilidades gerenciales para un mejor desempeño', 'Nivelación Belén de los Andaquíes: Enlace de Víctimas, Secretaria de Gobierno, Secretario de Planeación, Asesor Víctimas, Personera, Coordinador Salud y Coordinador Educación (7)\r\nNivelación San Vicente del Caguán: Enlace de Víctimas, Secretaria de Desarrollo Social, Secretario de Gobierno,  Asesores Víctimas, Personera, Coordinador Salud y Coordinador Educación (8)\r\nNivelación Florencia:  Enlace de Víctimas, Profesional apoyo PP, Psicóloga PAV, Enlace Secretaria de Salud,  nueva Enlace de Secretaría de Educación, UARIV (Enlaces de Reparación Colectiva), Enlace étnico Alcaldía, Enlace secretaría de gobierno y Enlace Víctimas departamental (10)', 14, 16, 4, 10, 3),
(93, '1', 'Seguimiento y monitoreo al PAT 2016  Subcomité de Asistencia y Atención en San Vicente del Caguán ', '', 14, 16, 4, 10, 4),
(94, '2', 'Seguimiento y monitoreo al PAT 2016 Subcomité de Reparación Integral en San Vicente del Caguán ', '', 14, 16, 4, 10, 4),
(95, '3', 'Seguimiento y monitoreo al PAT 2016  Subcomité de Asistencia y Atención en Belén de los Andaquíes', '', 14, 16, 4, 10, 4),
(96, '4', 'Seguimiento y monitoreo al PAT 2016 Subcomité de Reparación Integral en Belén de los Andaquíes', '', 14, 16, 4, 10, 4),
(97, '5', ' Monitoreo ejecución plan operativo  Subcomité de Reparación Integral en Florencia ', '', 14, 16, 4, 10, 4),
(98, '6', 'Monitoreo ejecución plan operativo  Subcomité de Asistencia y Atención en Florencia ', '', 14, 16, 4, 10, 4),
(99, '7', 'Seguimiento ejecución plan operativo  Subcomité de Información en Florencia ', '', 14, 16, 4, 10, 4),
(100, '8', 'Análisis balance PAT con Alcalde Municipal, Enlace de Víctimas y Secretario de Gobierno Municipal Belén de los Andaquíes', 'Con la participación de UARIV profesional nación territorio', 14, 16, 4, 10, 4),
(101, '9', 'Diligenciamiento tablero PAT 2017 Gobernación con recursos para aplicar mecanismo de corresponsabilidad', 'Primera semana de octubre jornada de trabajo con gobernación, ministerio del interior y UARIV.  Gobernación que diligencie el tablero PAT con recursos para corresponsabilidad antes del 13 de octubre.(AH, REPARACIÓN, PLANES DE REPARACIÓN, EDUCACIÓN).  Averiguar como es la plataforma PAT que complejidad tiene..  ', 14, 16, 4, 10, 4),
(102, '10', 'Monitoreo ejecución PAT Florencia en el marco del CTJT', '', 14, 16, 4, 10, 4),
(103, '11', 'Monitoreo ejecución PAT San Vicente del Caguán en el marco del CTJT', '', 14, 16, 4, 10, 4),
(104, '12', 'Monitoreo ejecución PAT Belén de los Andaquíes en el marco del CTJT', '', 14, 16, 4, 10, 4),
(105, '13', ' Presentación y aprobación de presupuesto para medidas prioritarias en Concejo Municipal Florencia para vigencia 2017', 'radicación 31 octubre', 14, 16, 4, 10, 4),
(106, '14', 'Presentación y aprobación de presupuesto para medidas prioritarias en Concejo Municipal San Vicente del Caguán para vigencia 2017', 'radicación 31 octubre', 14, 16, 4, 10, 4),
(107, '15', ' Presentación y aprobación de presupuesto para medidas prioritarias en Concejo Municipal Belén de los Andaquíes para vigencia 2017', 'radicación 31 octubre', 14, 16, 4, 10, 4),
(108, '1', ' Presentación proyecto Cerrando Brechas 2016 - 2017 a Alcalde, Secretarios de Despacho y Personera de San Vicente del Caguán', '5 de octubre en la mañana', 14, 16, 4, 10, 5),
(109, '2', 'Presentación proyecto Cerrando Brechas 2016 - 2017 a Alcalde, Secretarios de Despacho y Personera de Belén de los Andaquíes', '5 de octubre en la tarde', 14, 16, 4, 10, 5),
(110, '3', 'Firma acuerdo de entendimiento con Alcaldía y Personería de Florencia para el período 29 de septiembre 2016- 28 de septiembre 2017', '', 14, 16, 4, 10, 5),
(111, '4', ' Firma acuerdo de entendimiento con Alcaldía y Personería de San Vicente del Caguán para el período 29 de septiembre 2016- 28 de septiembre 2017', '', 14, 16, 4, 10, 5),
(112, '5', 'Firma acuerdo de entendimiento con Alcaldía y Personería de Belén de los Andaquíes para el período 29 de septiembre 2016- 28 de septiembre 2017', '', 14, 16, 4, 10, 5),
(113, '6', ' Rendición de cuentas a Alcaldía de Florencia y personero municipal ', '', 14, 16, 4, 10, 5),
(114, '7', ' Jornada de trabajo con la Alcaldía de Florencia para proceso de réplica de la certificación ', '', 14, 16, 4, 10, 5),
(115, '8', 'Jornada de trabajo con la Alcaldía de San Vicente del Caguán para proceso de réplica de la certificación ', '', 14, 16, 4, 10, 5),
(116, '9', 'Jornada de trabajo con la Alcaldía de Belén de los Andaquíes para proceso de réplica de la certificación', 'pendiente fecha', 14, 16, 4, 10, 5),
(117, '10', 'Rendición de cuentas para presentación balance general año 2016 del mecanismo de subsidiariedad por Alcaldía a MP, UARIV ', 'Líder Regional\r\n', 14, 16, 4, 10, 5),
(118, '1', 'Comunicación de la Alcaldía a la UARIV confirmando su compromiso con el enfoque étnico del proyecto', 'se comprometen con los lineamientos de la UARIV se capacitarán los psicólogos, el proyecto será presentado a las comunidades para ajustes estilo propio de la comunidad étnica.', 14, 16, 4, 10, 6),
(119, '2', 'Notificación del resultado del proceso a la Alcaldía de Florencia.  Proyecto "Fortalecimiento de la capacidad municipal para la Recuperación Emocional y la Reparación Colectiva a las víctimas de la violencia en el municipio de Florencia"', 'Apoyo en la verificación de psicólogos que cumplan con el perfil.', 14, 16, 4, 10, 6),
(120, '3', 'Selección equipo Psicólogos y Coordinador Técnico para la ejecución del proyecto "Fortalecimiento de la capacidad municipal para la Recuperación Emocional y la Reparación Colectiva a las víctimas de la violencia en el municipio de Florencia"', '', 14, 16, 4, 10, 6),
(122, '4', 'Legalización convenio proyecto "Fortalecimiento de la capacidad municipal para la Recuperación Emocional y la Reparación Colectiva a las víctimas de la violencia en el municipio de Florencia"', 'seguimiento a todo el proceso de legalización', 14, 16, 4, 10, 6),
(123, '5', 'Incorporación del proyecto al presupuesto municipal para la contratación del personal', '', 14, 16, 4, 10, 6),
(124, '6', 'Seguimiento realización Comité Técnico al convenio para la ejecución del proyecto "Fortalecimiento de la capacidad municipal para la Recuperación Emocional y la Reparación Colectiva a las víctimas de la violencia en el municipio de Florencia"', '', 14, 16, 4, 10, 6),
(125, '7', 'Capacitación equipo Psicólogos y Coordinador Técnico para la ejecución del proyecto "Fortalecimiento de la capacidad municipal para la Recuperación Emocional y la Reparación Colectiva a las víctimas de la violencia en el municipio de Florencia"', '', 14, 16, 4, 10, 6),
(126, '8', 'Entrega de dotación equipo Psicólogos y Coordinador Técnico para la ejecución del proyecto "Fortalecimiento de la capacidad municipal para la Recuperación Emocional y la Reparación Colectiva a las víctimas de la violencia en el municipio de Florencia"', '', 14, 16, 4, 10, 6),
(127, '1', ' Discusión y análisis de la metodología didáctica CRAV con Directora Territorial UARIV y Coordinadora del Punto de Atención  a Víctimas para preparar insumos para taller con SNARIV', 'Se programará taller para Q2', 14, 16, 4, 10, 7),
(128, '1', 'Primera y Segunda Entrega de raciones y complementos Florencia.', '', 14, 17, 4, 10, 8),
(129, '1', 'Revisión de avances en remisiones,  casos especiales y barreras de acceso a matricula con Secretaria de Educación municipal, delegada al Subcomité de Asistencia y Atención de la MMP y Personero Municipal', 'Clases hasta el 18 de noviembre', 14, 17, 4, 10, 9),
(130, '2', 'Análisis barreras de acceso y situación actual acceso a RSSSS con Mesa Interinstitucional de Servicios de Acceso a Salud', 'Actividad liderada por CICR con participación de secretaría de salud departamental y municipal, EPS''s, IPS''s.  Participará SISBEN.', 14, 17, 4, 10, 9),
(131, '3', ' Jornadas de notificación por parte de la UARIV a las familias atendidas en Florencia incluidas en el RUV ', '', 14, 17, 4, 10, 9),
(132, '4', 'Diligenciamiento ficha de caracterización a familias incluidas en el RUV', '', 14, 17, 4, 10, 9),
(134, '5', 'Jornada Interinstitucional Comuna Sur Barrio Versalles Florencia', '', 14, 17, 4, 10, 9),
(135, '6', 'Presentación resultados subsistencia mínima a UARIV, Ministerio Público y Alcaldía Municipal', '', 14, 17, 4, 10, 9),
(136, '1', 'Divulgación de avances y barreras en el acceso al sistema educativo de las familias atendidas en la etapa inmediata del desplazamiento y revisar estrategias para el acceso a través de reunión con Secretario de Educación Municipal', 'Actividad del plan de trabajo, reunión con rectores, Personeria,Secretaria de Educación, UARIV y Ministerio de Educación.', 14, 18, 4, 10, 11),
(137, '2', 'Revisión avance ejecución plan de trabajo MMP', 'Actividad del plan de trabajo', 14, 18, 4, 10, 11),
(138, '3', 'Presentación de la Alcaldía a la MMP sobre los avances en la construcción del Centro Regional de Atención a Víctimas', 'Actividad del plan de trabajo', 14, 18, 4, 10, 11),
(139, '4', 'Rendición de cuentas de los representantes ante el CTJT  al plenario de la Mesa.', 'Actividad del plan de trabajo.  ', 14, 18, 4, 10, 11),
(141, '5', 'Sesión 1. Diseño plan de trabajo de la MMPV San Vicente del Caguán', '', 14, 18, 4, 10, 11),
(142, '6', 'Sesión 2. Aprobación plan de trabajo de la MMPV San Vicente del Caguán', '', 14, 18, 4, 10, 11),
(143, '7', 'Sesión 2. Aprobación plan de trabajo de la MMPV San Vicente del Caguán', '', 14, 18, 4, 10, 11),
(144, '7', 'Sesión 1. Diseño plan de trabajo de la MMPV Belén de los Andaquíes', '', 14, 18, 4, 10, 11),
(145, '8', 'Sesión 2. Aprobación plan de trabajo de la MMPV Belén de los Andaquíes', '', 14, 18, 4, 10, 11),
(146, '9', 'Rendición de Cuentas a las víctimas de Florencia por parte de la MMPV ', 'Actividad para fortalecer dimensión funciones en IEO.  Se coordinará ejercicio con GIZ  y OIM', 14, 18, 4, 10, 11),
(147, '10', 'Sesiones ordinarias de la MMPV para seguimiento al PAT, en Belén de los Andaquíes', 'Actividad del plan de trabajo de Belén de los Andaquíes', 14, 18, 4, 10, 11),
(148, '11', ' Intercambio de Experiencias con comité ejecutivo de San Vicente del Caguán y Mesa de Víctimas de Florencia', 'Actividad del plan de trabajo de Belén de los Andaquíes', 14, 18, 4, 10, 11),
(149, '12', 'Informe al Concejo Municipal po parte de la MMP de Belén de los Andaquíes', 'Actividad del plan de trabajo de Belén de los Andaquíes', 14, 18, 4, 10, 11),
(150, '13', ' Rendición de cuentas al plenario del a MMPV por parte de los representantes al CTJT en Belén de los Andaquíes.', 'Actividad del plan de trabajo de Belén de los Andaquíes', 14, 18, 4, 10, 11),
(151, '14', 'Rendición de Cuentas a las víctimas del municipio en San Vicente del  Caguán.', 'Actividad del plan de trabajo de San Vicente del  Caguán', 14, 18, 4, 10, 11),
(152, '15', 'Rendición de cuentas de los integrantes del Comité de Justicia Transicional al plenario de la MMP', 'Actividad del plan de trabajo de San Vicente del  Caguán', 14, 18, 4, 10, 11),
(153, '16', 'Seguimiento a la Política Pública PAT, San Vicente del Caguán', 'Actividad del plan de trabajo de San Vicente del  Caguán', 14, 18, 4, 10, 11),
(154, '17', ' Informe Concejo Municipal de San Vicente del Caguán', 'Actividad del plan de trabajo de San Vicente del  Caguán', 14, 18, 4, 10, 11),
(155, '1', 'Revisión avance ejecución Plan de Acción  Territorial 2016 y revisión ajustes PAT 2017  Florencia', '', 14, 18, 4, 10, 12),
(156, '2', 'Revisión avance ejecución Plan de Acción  Territorial PAT San Vicente del Caguán', '', 14, 18, 4, 10, 12),
(157, '3', 'Revisión avance ejecución Plan de Acción  Territorial PAT Belén de los Andaquíes', '', 14, 18, 4, 10, 12),
(158, '1', 'Divulgación Protocolo de Participación MMPV San Vicente del Caguán ', '', 14, 18, 4, 10, 13),
(159, '2', 'Divulgación Protocolo de Participación MMPV Belén de los Andaquíes', '', 14, 18, 4, 10, 13),
(160, '3', 'Formación a miembros de la MMP en el  Nivel IV y V de la Escuela de Reparaciones UARIV', 'Actividad coordinada con UARIV y Organizaciones de Cooperación (GIZ, MAPP OEA, NRC, OIM).  Nivel IV " LEY DE VÍCTIMAS Y RESTITUCIÓN DE TIERRAS": Aspectos fundamentales de la ley de víctimas y restitución de tierras, Generalidades Decretos Ley étnicos Y Participación efectiva de las víctimas. Nivel V "IMPLEMENTACIÓN":  Registro, Atención y Asistencia, Reparación Integral individual, Reparación integral colectiva, Garantías de no repetición y Ruta integral de atención, asistencia y reparación integral.', 14, 18, 4, 10, 13),
(161, '4', 'Aplicación línea base IEO y socialización de los resultados MMPV San Vicente del Caguán', '', 14, 18, 4, 10, 13),
(162, '5', ' Aplicación línea base IEO y socialización de los resultados MMPV Belén de los Andaquíes', '', 14, 18, 4, 10, 13),
(163, '6', ' Intercambio de experiencias entre comité ejecutivo MDP y representante a la MNP con comité ejecutivo MMP de Florencia', 'Actividad para fortalecer dimensión relaciones interinstitucionales en IEO.    Se coordinará ejercicio con GIZ, ACNUR y OIM', 14, 18, 4, 10, 13),
(164, '7', 'Presentación informe de gestión de la MMP al Concejo Municipal de Florencia', 'Actividad para fortalecer dimensión funciones en IEO.  Se coordinará ejercicio con GIZ  y OIM', 14, 18, 4, 10, 13),
(165, '1', 'Encuentros grupales de acompañamiento psicosocial en el marco de la primera entrega en Florencia ', '', 14, 19, 4, 10, 14),
(166, '2', 'Encuentros grupales de acompañamiento psicosocial en el marco de la segunda entrega en Florencia ', '', 14, 19, 4, 10, 14),
(167, '3', 'Encuentro grupal de acompañamiento psicosocial en el marco de la jornada de notificación de la UARIV en Florencia.', '', 14, 19, 4, 10, 14),
(168, '1', 'Divulgación Herramientas psicosociales para la Vida comunidad Nueva Colombia San Vicente del Caguán', '', 14, 19, 4, 10, 15),
(169, '2', 'GAM 1, 2, 3 y 4 Comunidad Nueva Colombia San Vicente del Caguán', '', 14, 19, 4, 10, 15),
(170, '3', ' Formación en herramientas psicosociales para la vida a cuidadores de Puerto Torres y La Mono Belén de los Andaquíes', '15 y 16 de octubre se hará la presentación de la estrategia ENTRELAZANDO  a las comunidades para la selección de los tejedores.', 14, 19, 4, 10, 15),
(171, '4', 'GAM 1 y 2 Comunidad Puerto Torres Belén de los Andaquíes', '', 14, 19, 4, 10, 15),
(172, '5', 'GAM 1 y 2 Comunidad La Mono Belén de los Andaquíes', '', 14, 19, 4, 10, 15),
(173, '1', 'Intervención espacio comunitario Embera Chamí Puru Resguardo San José de Canelo Florencia', 'Cocina comunitaria y unidad sanitaria al lado del tambo.   Visita 20 y 21 de octubre fecha de instalación consulta previa.  Para culminar en noviembre', 14, 19, 4, 10, 16),
(174, '2', 'Intervención espacio comunitario Nasa Páez Resguardo La Gaitana Florencia', 'Casa de pensamiento con cocina comunitaria y unidad sanitaria.  Visita 26 y 27 de octubre fecha de instalación consulta previa.  Para culminar en Q2.', 14, 19, 4, 10, 16),
(175, '3', 'Presentación Proyecto Casa Pintada La Mono y Adecuación Caseta Puerto Torres a Alcalde para definir intervención en mano de obra', 'El presidente de la JAC participará en la reunión con el Alcalde', 14, 19, 4, 10, 16),
(176, '4', 'Adecuación caseta comunitaria Puerto Torres', 'Reunión 15 de octubre Puerto Torres para presentar propuesta y definir mano de obra comunitaria y concertar gestión apoyo Alcaldía.  Fase Alistamiento', 14, 19, 4, 10, 16),
(177, '5', 'Presentación Proyecto Casa Pintada a comunidad La Mono y acuerdos para mano de obra adecuaciones', 'Reunión 16 de octubre La Mono para presentar propuesta y definir mano de obra comunitaria y concertar gestión apoyo Alcaldía.  Fase Alistamiento', 14, 19, 4, 10, 16),
(178, '6', 'Diagnóstico Viviendas Comunidad La Mono Belén de los Andaquíes', 'En reunión 16 de octubre se les presenta la iniciativa para programar jornada de diagnóstico la semana siguiente o el sábado 15.', 14, 19, 4, 10, 16),
(179, '7', 'Mano de obra a viviendas Comunidad La Mono Belén de los Andaquíes', 'Incluir en mano de obra de Casa Pintada la adecuación de la caseta?', 14, 19, 4, 10, 16),
(180, '8', 'Taller Casa Pintada la Mono', '', 14, 19, 4, 10, 16),
(181, '1', 'Identificación, remisión y seguimiento de casos de violencia sexual en el marco del conflicto armado a la oferta de atención psicosocial en Florencia', '', 14, 19, 4, 10, 27),
(182, '1', 'aa', '', 14, 16, 5, 10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `macroactividad_mes_semana`
--

CREATE TABLE IF NOT EXISTS `macroactividad_mes_semana` (
  `idmacroactividad` int(11) NOT NULL,
  `mes` varchar(2) NOT NULL,
  `semana` varchar(2) NOT NULL,
  PRIMARY KEY (`idmacroactividad`,`mes`,`semana`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `macroactividad_mes_semana`
--

INSERT INTO `macroactividad_mes_semana` (`idmacroactividad`, `mes`, `semana`) VALUES
(31, '10', '4'),
(31, '11', '3'),
(31, '12', '2'),
(33, '11', '4'),
(34, '11', '4'),
(35, '11', '4'),
(36, '10', '2'),
(36, '10', '3'),
(37, '10', '4'),
(38, '10', '2'),
(39, '11', '1'),
(40, '10', '2'),
(44, '11', '3'),
(45, '10', '1'),
(46, '10', '1'),
(47, '10', '1'),
(48, '12', '2'),
(49, '10', '2'),
(50, '10', '4'),
(51, '10', '2'),
(52, '09', '1'),
(52, '10', '1'),
(52, '11', '1'),
(53, '10', '1'),
(53, '10', '2'),
(54, '11', '3'),
(55, '10', '2'),
(55, '10', '4'),
(55, '11', '2'),
(55, '11', '4'),
(55, '12', '2'),
(56, '10', '1'),
(56, '10', '2'),
(56, '10', '3'),
(56, '10', '4'),
(56, '11', '1'),
(56, '11', '2'),
(56, '11', '3'),
(56, '11', '4'),
(56, '12', '1'),
(56, '12', '2'),
(56, '12', '3'),
(56, '12', '4'),
(57, '10', '1'),
(57, '10', '2'),
(57, '10', '3'),
(57, '10', '4'),
(57, '11', '1'),
(57, '11', '2'),
(57, '11', '3'),
(57, '11', '4'),
(57, '12', '1'),
(57, '12', '2'),
(57, '12', '3'),
(57, '12', '4'),
(58, '10', '4'),
(58, '11', '4'),
(58, '12', '3'),
(59, '10', '1'),
(59, '10', '2'),
(59, '10', '3'),
(59, '10', '4'),
(59, '11', '1'),
(59, '11', '2'),
(59, '11', '3'),
(59, '11', '4'),
(59, '12', '1'),
(59, '12', '2'),
(59, '12', '3'),
(59, '12', '4'),
(60, '10', '4'),
(60, '11', '4'),
(60, '12', '2'),
(61, '10', '3'),
(61, '11', '3'),
(61, '12', '2'),
(62, '10', '2'),
(63, '11', '1'),
(64, '11', '4'),
(65, '12', '1'),
(66, '10', '3'),
(67, '10', '3'),
(68, '10', '2'),
(69, '12', '1'),
(70, '10', '2'),
(71, '11', '2'),
(72, '10', '3'),
(73, '10', '3'),
(74, '10', '3'),
(74, '11', '2'),
(74, '12', '2'),
(75, '10', '2'),
(75, '10', '4'),
(75, '11', '2'),
(75, '11', '4'),
(75, '12', '2'),
(76, '10', '2'),
(76, '10', '4'),
(76, '11', '2'),
(76, '11', '4'),
(76, '12', '2'),
(77, '10', '4'),
(77, '11', '4'),
(77, '12', '3'),
(78, '11', '1'),
(78, '11', '3'),
(78, '12', '1'),
(78, '12', '3'),
(80, '10', '3'),
(80, '10', '4'),
(80, '11', '1'),
(80, '11', '2'),
(80, '11', '3'),
(80, '11', '4'),
(80, '12', '1'),
(80, '12', '2'),
(81, '11', '1'),
(81, '11', '3'),
(81, '12', '1'),
(82, '11', '1'),
(82, '11', '2'),
(82, '11', '3'),
(82, '11', '4'),
(82, '12', '1'),
(82, '12', '2'),
(83, '11', '1'),
(83, '11', '2'),
(83, '11', '3'),
(83, '11', '4'),
(83, '12', '1'),
(83, '12', '2'),
(83, '12', '3'),
(83, '12', '4'),
(84, '10', '4'),
(84, '11', '4'),
(84, '12', '2'),
(85, '10', '4'),
(85, '11', '4'),
(85, '12', '2'),
(87, '10', '4'),
(88, '10', '1'),
(88, '10', '2'),
(88, '10', '3'),
(88, '10', '4'),
(88, '11', '1'),
(88, '11', '2'),
(88, '11', '3'),
(88, '11', '4'),
(88, '12', '1'),
(88, '12', '2'),
(89, '10', '4'),
(89, '11', '4'),
(90, '11', '2'),
(90, '11', '3'),
(90, '11', '4'),
(90, '12', '1'),
(90, '12', '2'),
(91, '11', '1'),
(91, '11', '2'),
(91, '11', '3'),
(91, '11', '4'),
(91, '12', '1'),
(91, '12', '2'),
(92, '12', '3'),
(93, '11', '3'),
(94, '11', '3'),
(95, '11', '4'),
(96, '11', '4'),
(97, '10', '1'),
(98, '10', '4'),
(99, '10', '4'),
(100, '10', '3'),
(101, '10', '2'),
(102, '11', '2'),
(103, '12', '1'),
(104, '12', '1'),
(105, '11', '2'),
(106, '11', '2'),
(107, '11', '2'),
(108, '10', '1'),
(109, '10', '1'),
(110, '10', '2'),
(110, '10', '3'),
(111, '10', '2'),
(111, '10', '3'),
(112, '10', '2'),
(112, '10', '3'),
(113, '11', '1'),
(114, '11', '2'),
(115, '11', '2'),
(116, '11', '2'),
(117, '12', '1'),
(118, '10', '1'),
(119, '10', '2'),
(120, '10', '2'),
(120, '10', '3'),
(120, '10', '4'),
(122, '10', '3'),
(123, '10', '3'),
(124, '10', '4'),
(124, '11', '3'),
(124, '12', '3'),
(125, '11', '1'),
(126, '11', '2'),
(127, '10', '4'),
(128, '10', '1'),
(128, '10', '3'),
(128, '11', '1'),
(128, '11', '3'),
(128, '12', '1'),
(128, '12', '3'),
(129, '11', '2'),
(130, '11', '1'),
(131, '10', '4'),
(131, '11', '4'),
(131, '12', '3'),
(132, '10', '1'),
(132, '10', '2'),
(132, '10', '3'),
(132, '10', '4'),
(132, '11', '1'),
(132, '11', '2'),
(132, '11', '3'),
(132, '11', '4'),
(132, '12', '1'),
(132, '12', '2'),
(132, '12', '3'),
(134, '10', '4'),
(135, '11', '2'),
(136, '11', '2'),
(137, '11', '2'),
(138, '11', '2'),
(139, '11', '2'),
(141, '10', '2'),
(142, '10', '3'),
(143, '10', '2'),
(144, '10', '2'),
(145, '10', '3'),
(146, '12', '1'),
(147, '12', '2'),
(148, '10', '4'),
(149, '11', '3'),
(150, '12', '2'),
(151, '11', '4'),
(152, '11', '3'),
(153, '11', '3'),
(154, '11', '3'),
(155, '11', '1'),
(156, '11', '4'),
(157, '11', '4'),
(158, '10', '2'),
(159, '10', '2'),
(160, '10', '4'),
(160, '11', '4'),
(161, '10', '2'),
(162, '10', '2'),
(163, '11', '1'),
(164, '11', '3'),
(165, '10', '1'),
(165, '10', '3'),
(165, '11', '1'),
(165, '11', '3'),
(165, '12', '1'),
(165, '12', '3'),
(166, '10', '3'),
(166, '11', '1'),
(166, '11', '3'),
(166, '12', '1'),
(166, '12', '3'),
(167, '10', '4'),
(167, '11', '4'),
(167, '12', '3'),
(168, '11', '3'),
(169, '12', '1'),
(169, '12', '2'),
(170, '11', '2'),
(170, '11', '3'),
(171, '12', '2'),
(172, '12', '2'),
(173, '10', '3'),
(173, '11', '4'),
(174, '10', '4'),
(175, '10', '1'),
(176, '10', '2'),
(177, '10', '2'),
(178, '10', '3'),
(179, '11', '1'),
(179, '11', '2'),
(179, '11', '3'),
(179, '11', '4'),
(180, '12', '1'),
(180, '12', '2'),
(181, '10', '1'),
(181, '10', '2'),
(181, '10', '3'),
(181, '10', '4'),
(181, '11', '1'),
(181, '11', '2'),
(181, '11', '3'),
(181, '11', '4'),
(181, '12', '1'),
(181, '12', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `macroactividad_persona`
--

CREATE TABLE IF NOT EXISTS `macroactividad_persona` (
  `idmacroactividad` int(11) NOT NULL,
  `idpersonal` int(11) NOT NULL,
  PRIMARY KEY (`idmacroactividad`,`idpersonal`),
  KEY `idpersonal` (`idpersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `macroactividad_persona`
--

INSERT INTO `macroactividad_persona` (`idmacroactividad`, `idpersonal`) VALUES
(26, 1),
(55, 1),
(58, 1),
(59, 1),
(26, 2),
(31, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(83, 2),
(84, 2),
(85, 2),
(86, 2),
(87, 2),
(100, 7),
(102, 7),
(103, 7),
(104, 7),
(108, 7),
(109, 7),
(110, 7),
(111, 7),
(112, 7),
(113, 7),
(117, 7),
(118, 7),
(119, 7),
(120, 7),
(124, 7),
(125, 7),
(126, 7),
(127, 7),
(135, 7),
(174, 7),
(175, 7),
(178, 7),
(26, 8),
(31, 8),
(32, 8),
(33, 8),
(34, 8),
(35, 8),
(36, 8),
(37, 8),
(38, 8),
(39, 8),
(40, 8),
(44, 8),
(45, 8),
(46, 8),
(47, 8),
(48, 8),
(49, 8),
(50, 8),
(52, 8),
(53, 8),
(54, 8),
(56, 8),
(57, 8),
(61, 8),
(62, 8),
(63, 8),
(64, 8),
(65, 8),
(66, 8),
(67, 8),
(68, 8),
(69, 8),
(70, 8),
(71, 8),
(72, 8),
(73, 8),
(74, 8),
(83, 8),
(87, 8),
(55, 10),
(58, 10),
(59, 10),
(60, 10),
(55, 11),
(59, 11),
(55, 12),
(75, 12),
(76, 12),
(77, 12),
(78, 12),
(79, 12),
(81, 12),
(84, 12),
(85, 12),
(86, 12),
(88, 12),
(90, 12),
(91, 12),
(55, 14),
(75, 14),
(76, 14),
(77, 14),
(78, 14),
(80, 14),
(81, 14),
(82, 14),
(84, 14),
(85, 14),
(86, 14),
(88, 14),
(55, 15),
(55, 16),
(89, 18),
(92, 18),
(93, 18),
(94, 18),
(95, 18),
(96, 18),
(97, 18),
(98, 18),
(99, 18),
(100, 18),
(101, 18),
(102, 18),
(103, 18),
(104, 18),
(105, 18),
(106, 18),
(107, 18),
(114, 18),
(115, 18),
(116, 18),
(119, 18),
(122, 18),
(123, 18),
(129, 18),
(136, 18),
(137, 18),
(138, 18),
(139, 18),
(141, 18),
(142, 18),
(143, 18),
(144, 18),
(145, 18),
(146, 18),
(147, 18),
(148, 18),
(149, 18),
(150, 18),
(151, 18),
(152, 18),
(153, 18),
(154, 18),
(155, 18),
(156, 18),
(157, 18),
(158, 18),
(159, 18),
(160, 18),
(161, 18),
(162, 18),
(163, 18),
(164, 18),
(128, 19),
(131, 19),
(165, 21),
(166, 21),
(167, 21),
(168, 21),
(169, 21),
(170, 21),
(171, 21),
(172, 21),
(173, 21),
(176, 21),
(177, 21),
(179, 21),
(180, 21),
(181, 21),
(132, 23),
(128, 24),
(130, 25),
(134, 25),
(165, 26),
(166, 26),
(167, 26),
(168, 26),
(169, 26),
(170, 26),
(171, 26),
(172, 26),
(173, 26),
(176, 26),
(177, 26),
(179, 26),
(180, 26),
(181, 26),
(80, 46),
(81, 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `idmunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_municipio` varchar(10) NOT NULL,
  `nombre_municipio` varchar(50) NOT NULL,
  `iddepto` int(11) NOT NULL,
  PRIMARY KEY (`idmunicipio`),
  UNIQUE KEY `codigo_municipio` (`codigo_municipio`),
  KEY `iddepto` (`iddepto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idmunicipio`, `codigo_municipio`, `nombre_municipio`, `iddepto`) VALUES
(1, '19001', 'POPAYÁN', 1),
(2, '18001', 'FLORENCIA', 2),
(3, '011', 'BOGOTÁ', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivo`
--

CREATE TABLE IF NOT EXISTS `objetivo` (
  `idobjetivo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_objetivo` varchar(10) NOT NULL,
  `nombre_objetivo` text NOT NULL,
  `descripcion_objetivo` text,
  `idproyecto` int(11) NOT NULL,
  PRIMARY KEY (`idobjetivo`),
  KEY `idproyecto` (`idproyecto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `objetivo`
--

INSERT INTO `objetivo` (`idobjetivo`, `codigo_objetivo`, `nombre_objetivo`, `descripcion_objetivo`, `idproyecto`) VALUES
(16, 'OBJ1', 'Fortalecer la capacidad del Gobierno Nacional, los Gobiernos Locales, y el Ministerio Público para la prevención, asistencia, atención  y reparación a víctimas de desplazamiento forzado', '', 14),
(17, 'OBJ2', 'Satisfacer las necesidades  básicas de  las víctimas de desplazamiento forzado', '', 14),
(18, 'OBJ3', 'Fortalecer  las capacidades de las Mesas de Participación Municipales para su participación efectiva', '', 14),
(19, 'OBJ4', 'Promover la recuperación emocional y la rehabilitación comunitaria de las víctimas del conflicto armado, incluida la violencia sexual', '', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `idpais` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_pais` varchar(10) NOT NULL,
  `nombre_pais` varchar(50) NOT NULL,
  PRIMARY KEY (`idpais`),
  UNIQUE KEY `codigo_pais` (`codigo_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idpais`, `codigo_pais`, `nombre_pais`) VALUES
(1, '001', 'COLOMBIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `idperfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(30) NOT NULL,
  `descripcion_perfil` text NOT NULL,
  `icono_perfil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idperfil`, `nombre_perfil`, `descripcion_perfil`, `icono_perfil`) VALUES
(1, 'Marco lógico', 'Gestión de proyectos', 'fa-sitemap'),
(7, 'Seguridad', 'Configuración de seguridad de la plataforma', 'fa-lock'),
(8, 'Talento humano', '', 'fa-user'),
(9, 'Planeación y seguimiento', 'Plan de administración de desempeño (Perfomance Management Plan - PMP)', 'fa-table'),
(10, 'Trabajo colaborativo', '', 'fa-calendar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE IF NOT EXISTS `periodo` (
  `idperiodo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_periodo` varchar(20) NOT NULL,
  `fecha_inicio_periodo` date NOT NULL,
  `fecha_final_periodo` date NOT NULL,
  `idproyecto` int(11) NOT NULL,
  PRIMARY KEY (`idperiodo`),
  KEY `idproyecto` (`idproyecto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`idperiodo`, `codigo_periodo`, `fecha_inicio_periodo`, `fecha_final_periodo`, `idproyecto`) VALUES
(10, 'Q1', '2016-10-01', '2016-12-31', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `idpermiso` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_permiso` varchar(50) DEFAULT NULL,
  `nombre_permiso` text NOT NULL,
  `descripcion_permiso` text,
  `ruta_permiso` varchar(150) NOT NULL,
  `idperfil` int(11) NOT NULL,
  PRIMARY KEY (`idpermiso`),
  KEY `idperfil` (`idperfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `codigo_permiso`, `nombre_permiso`, `descripcion_permiso`, `ruta_permiso`, `idperfil`) VALUES
(21, 'enlace_proyectos', 'Programas/Proyectos', 'Registrar información de proyectos', 'MarcoLogico/MarcoLogico_controller', 1),
(24, 'enlace_regionales', 'Regionales', 'Alcance geográfico del proyecto', 'MarcoLogico/Regional_controller', 1),
(27, 'enlace_perfiles', 'Perfiles', 'Gestión de perfiles de usuario', 'Seguridad/Perfil_controller', 7),
(28, 'enlace_usuarios', 'Usuarios', '', 'Seguridad/Usuario_controller', 7),
(29, 'enlace_personal', 'Personal', '', 'Personal/Personal_controller', 8),
(30, 'enlace_cargos', 'Cargos', '', 'Personal/Cargo_controller', 8),
(31, 'enlace_pi', 'Plan de implementación', '', 'PlanImplementacion/Planimplementacion_controller', 9),
(32, 'enlace_actividades', 'Calendario', '', 'Autocontrol/Calendar', 10),
(33, '2', 'Tablero de control', '', 'Autocontrol/TableroControl_controller', 10),
(34, '1', 'Plan de implementación', 'Consulta del plande implementación', 'Autocontrol/Plan_Implementacion_controller', 10),
(35, 'enlace_segpi', 'Seguimiento Plan Implementación', '', 'PlanImplementacion/SeguimientoPI_controller', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `identificacion_persona` varchar(20) NOT NULL,
  `nombres_persona` varchar(50) NOT NULL,
  `apellidos_persona` varchar(50) NOT NULL,
  `fecha_nacimiento_persona` date NOT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `correo_electronico_persona` varchar(50) NOT NULL,
  `celular_persona` varchar(15) NOT NULL,
  `direccion_persona` varchar(100) NOT NULL,
  `idregional` int(11) NOT NULL,
  `foto_persona` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idpersona`),
  KEY `idregional` (`idregional`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`idpersona`, `identificacion_persona`, `nombres_persona`, `apellidos_persona`, `fecha_nacimiento_persona`, `sexo`, `correo_electronico_persona`, `celular_persona`, `direccion_persona`, `idregional`, `foto_persona`) VALUES
(1, '10290235', 'José Luis', 'Granda Bolaños', '1980-12-18', 'H', 'jgranda@irdglobal.org', '3137814927', 'Cra 7 # 28CN-07', 1, 'img/funcionarios/1.png'),
(2, '1235466', 'Juan José', 'Fernández', '2016-08-19', 'H', 'jfernandez@irdglobal.org', '676767', 'cr', 1, NULL),
(7, '40776657', 'Claudia Patricia', 'Gallego Ramírez', '1973-03-24', 'M', 'cgallego@irdglobal.org', '3107958374', 'Cra 11 No. 3 C 10 Avenida Los Fundadores', 4, NULL),
(8, '38612761', 'Claudia', 'Gil', '2016-09-07', 'M', 'cgil@irdglobal.org', '33', 'cra', 1, NULL),
(9, '1010', 'Juan Pablo', 'Franco', '2016-09-22', 'H', 'jfranco@irdglobal.org', '111', 'Cra 6', 5, NULL),
(10, '24', 'Amanda', 'Rodríguez Alfonso', '2016-10-01', 'M', 'arodriguez@irdglobal.org', '310-7956452', '', 1, NULL),
(11, '98122813436', 'Andry Yesmin ', 'Villano Montenegro', '1998-12-28', 'M', 'avillano@irdglobal.org', '3118043361', '', 1, NULL),
(12, '26', 'Claudia Jimena', 'Narvaez Ortega', '2016-10-01', 'M', 'cnarvaez@irdglobal.org', '320-8346109', '', 1, NULL),
(13, '28', 'Fabiola Bibiana', 'Gutierrez Fernandez', '2016-10-01', 'M', 'fgutierrez@irdglobal.org', '313-7910042', '', 1, NULL),
(14, '29', 'Fredy', 'Morales', '2016-10-01', 'H', 'fmorales@irdglobal.org', '311-3661453', '', 1, NULL),
(15, '30', 'Ignacio Leon', 'Tacue', '2016-10-01', 'H', 'itacue@irdglobal.org', ' 320-4909934', '', 1, NULL),
(16, '33', 'William', 'Peña', '2016-10-01', 'H', 'wpenamolina@irdglobal.org', '310 4498417', '', 1, NULL),
(17, '14', 'Edith Yuliana', 'Arcila', '2016-10-01', 'M', 'earcila@irdglobal.org', ' 310-7960863', '', 4, NULL),
(18, '30.312.907', 'Gloria Carmenza', 'Toro', '1969-09-17', 'M', 'gtoro@irdglobal.org', ' 311-5558270', 'Calle 14 No 1A este-50 barrio Rincón de la Estrella II', 4, NULL),
(19, '1117542644', 'Haminton', 'Cabrera', '1995-12-06', 'H', 'hcabrera@irdglobal.org', ' 313 2691411', '', 4, NULL),
(20, '17', 'Kervyl', 'Gasca', '2016-10-01', 'H', 'kgascacabrera@irdglobal.org', '319 4901194', '', 4, NULL),
(21, '25279140', 'Lenis', 'Mendoza', '1978-11-11', 'M', 'lmendoza@irdglobal.org', ' 310-7961263', '', 4, NULL),
(22, '19', 'Maria Angelica', 'Monroy', '2016-10-01', 'M', 'mmonroy@irdglobal.org', '', '', 4, NULL),
(23, '20', 'Martha Liliana', 'Cuellar', '2016-10-01', 'M', 'mcuellar@irdglobal.org ', '', '', 4, NULL),
(24, '21', 'William ', 'Granada', '2016-10-01', 'H', 'wgranada@irdglobal.org', ' 310-7959643', '', 4, NULL),
(25, '1117521043', 'Yeniffer', 'Pedrosa Gutierrez', '1991-09-16', 'M', 'ypedrosa@irdglobal.org', '310-7959661', '', 4, 'img/funcionarios/25.jpeg'),
(26, '23', 'Yoana ', 'Ibarra', '2016-10-01', 'M', 'yibarra@irdglobal.org', '(57) 310-795960', '', 4, NULL),
(27, '1', 'Alexander ', 'Mora ', '2016-10-01', 'H', 'amora@irdglobal.org', '311-5570231', '', 5, NULL),
(28, '2', 'Angel Ignacio', 'Colmenares', '2016-10-01', 'H', 'acolmenares@irdglobal.org', ' 310-7958377', '', 5, NULL),
(29, '3', 'Carmenza', 'Becerra', '2016-10-01', 'M', 'cbecerra@irdglobal.org', ' 321-2052572', '', 5, NULL),
(30, '4', 'Duvis Isabel', 'Ramirez', '2016-10-01', 'M', 'dramirez@irdglobal.org', '310 7961293', '', 5, NULL),
(31, '5', 'Elizabet', 'Delgado', '2016-10-01', 'M', 'ldelgado@irdglobal.org', '320-4909935', '', 5, NULL),
(32, '6', 'Fabian', 'Ayala', '2016-10-01', 'H', 'fayala@irdglobal.org', '310-7959602', '', 5, NULL),
(33, '7', 'Guillermo', 'Mora', '2016-10-01', 'H', 'gmora@irdglobal.org', '310-3290915', '', 5, NULL),
(34, '9', 'Lisa', 'Rodriguez Medina', '2016-10-01', 'M', 'lrodriguez@irdglobal.org', '311-5569530', '', 5, NULL),
(35, '10', 'Lucas', 'Rincón', '2016-10-01', 'H', 'lrincon@irdglobal.org', '320-4909933', '', 5, NULL),
(40, '11', 'Mery Judith ', 'Mora ', '2016-10-01', 'M', 'mmorasilva@irdglobal.org', '312-4958238', '', 5, NULL),
(41, '12', 'Olga', 'Moreno', '2016-10-01', 'M', 'omoreno@irdglobal.org', ' 311 555 8250', '', 5, NULL),
(42, '1117546865', 'Gian Carlo', 'Cabrera Rivas', '1997-05-17', 'H', 'gcabrera@irdglobal.org', '3222008323', 'Calle 22 N 1-159', 4, NULL),
(43, '111', 'Claudia Liliana', 'Ortiz', '2016-11-04', NULL, 'lortiz@irdglobal.org', '', '', 1, NULL),
(44, '222', 'Carmen Jacqueline', 'Zarama', '2016-11-03', NULL, 'jzarama@irdglobal.org', '', '', 1, NULL),
(45, '99999999', 'Heather', 'Haydu', '2016-11-30', 'M', 'hhaydu@ird.org', '', '', 5, NULL),
(46, '11223344', 'Adriana', 'Portilla', '2016-12-01', 'M', 'aportilla@irdglobal.org', '321', 'Cra', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `idproyecto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_proyecto` varchar(200) NOT NULL,
  `codigo_proyecto` varchar(10) NOT NULL,
  `descripcion_proyecto` text,
  `fecha_inicial_proyecto` date NOT NULL,
  `fecha_final_proyecto` date NOT NULL,
  `numero_periodos_proyecto` int(11) NOT NULL,
  `activo_proyecto` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idproyecto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`idproyecto`, `nombre_proyecto`, `codigo_proyecto`, `descripcion_proyecto`, `fecha_inicial_proyecto`, `fecha_final_proyecto`, `numero_periodos_proyecto`, `activo_proyecto`) VALUES
(14, 'Cerrando Brechas 2016 - 2017', 'PRMIX', '', '2016-09-29', '2017-09-28', 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regional`
--

CREATE TABLE IF NOT EXISTS `regional` (
  `idregional` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_regional` varchar(50) NOT NULL,
  `codigo_regional` varchar(10) NOT NULL,
  `idpais` int(11) NOT NULL,
  `iddepto` int(11) NOT NULL,
  `idmunicipio` int(11) NOT NULL,
  PRIMARY KEY (`idregional`),
  KEY `idpais` (`idpais`,`iddepto`),
  KEY `fk_regional_depto` (`iddepto`),
  KEY `idmunicipio` (`idmunicipio`),
  KEY `idmunicipio_2` (`idmunicipio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `regional`
--

INSERT INTO `regional` (`idregional`, `nombre_regional`, `codigo_regional`, `idpais`, `iddepto`, `idmunicipio`) VALUES
(1, 'Popayán', 'PP', 1, 1, 1),
(4, 'Florencia', 'FF', 1, 2, 2),
(5, 'Bogotá', 'BOG', 1, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte`
--

CREATE TABLE IF NOT EXISTS `soporte` (
  `idsoporte` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_soporte` varchar(100) NOT NULL,
  `tamano_soporte` float NOT NULL,
  `extension_soporte` varchar(50) NOT NULL,
  `ruta_soporte` varchar(200) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `idevento` int(11) NOT NULL,
  `idproyecto` int(11) NOT NULL,
  `idregional` int(11) NOT NULL,
  `idperiodo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsoporte`),
  KEY `idevento` (`idevento`,`idproyecto`,`idregional`,`idperiodo`),
  KEY `idregional` (`idregional`),
  KEY `idperiodo` (`idperiodo`),
  KEY `idproyecto` (`idproyecto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=268 ;

--
-- Volcado de datos para la tabla `soporte`
--

INSERT INTO `soporte` (`idsoporte`, `nombre_soporte`, `tamano_soporte`, `extension_soporte`, `ruta_soporte`, `estado`, `idevento`, `idproyecto`, `idregional`, `idperiodo`) VALUES
(48, 'RV JORNADA DE NOTIFICACIONES POPAYAN DEL 27 A 30 DE SEPTIEMBRE DEL 2016..msg', 231424, 'application/octet-stream', 'soportes/14_1/RV JORNADA DE NOTIFICACIONES POPAYAN DEL 27 A 30 DE SEPTIEMBRE DEL 2016..msg', NULL, 118, 14, 1, NULL),
(49, 'Base de datos familias IRD sin notificación.msg', 177664, 'application/octet-stream', 'soportes/14_1/Base de datos familias IRD sin notificación.msg', NULL, 120, 14, 1, NULL),
(50, '3.1.6. - 3.1.7..pdf', 2143720, 'application/pdf', 'soportes/14_1/3.1.6. - 3.1.7..pdf', NULL, 122, 14, 1, NULL),
(53, '2016-11-09-Jornada Caracterizacion.pdf', 1690420, 'application/pdf', 'soportes/14_1/2016-11-09-Jornada Caracterizacion.pdf', NULL, 125, 14, 1, NULL),
(54, '3.3.3.pdf', 776244, 'application/pdf', 'soportes/14_1/3.3.3.pdf', NULL, 126, 14, 1, NULL),
(55, '1.2.10..pdf', 2008500, 'application/pdf', 'soportes/14_1/1.2.10..pdf', NULL, 135, 14, 1, NULL),
(56, 'Soporte presentacion proyecto mujeres.pdf', 1752980, 'application/pdf', 'soportes/14_1/Soporte presentacion proyecto mujeres.pdf', NULL, 136, 14, 1, NULL),
(58, '2016-10-27-28_Protocolozacion-PIRC-Toribio_socializacionCerrandoBrechas-Toribio-Caloto.pdf', 1262080, 'application/pdf', 'soportes/14_1/2016-10-27-28_Protocolozacion-PIRC-Toribio_socializacionCerrandoBrechas-Toribio-Caloto.pdf', NULL, 130, 14, 1, NULL),
(60, '3.1.8.pdf', 1914760, 'application/pdf', 'soportes/14_1/3.1.8.pdf', NULL, 137, 14, 1, NULL),
(62, '3.1.7. - 3.3.4 - 27-10-2016.pdf', 1282100, 'application/pdf', 'soportes/14_1/3.1.7. - 3.3.4 - 27-10-2016.pdf', NULL, 141, 14, 1, NULL),
(63, '2016-10-27-28_Protocolozacion-PIRC-Toribio_socializacionCerrandoBrechas-Toribio-Caloto.pdf', 1262080, 'application/pdf', 'soportes/14_1/2016-10-27-28_Protocolozacion-PIRC-Toribio_socializacionCerrandoBrechas-Toribio-Caloto.pdf', NULL, 134, 14, 1, NULL),
(64, '2016-10-21 Presentación Proyecto.pdf', 1255720, 'application/pdf', 'soportes/14_1/2016-10-21 Presentación Proyecto.pdf', NULL, 138, 14, 1, NULL),
(67, '3.1.4..pdf', 1206150, 'application/pdf', 'soportes/14_1/3.1.4..pdf', NULL, 144, 14, 1, NULL),
(71, '2016-3-4-11-2016  Reunión medidas de reparación colectiva proyectop Nasa.pdf', 1286520, 'application/pdf', 'soportes/14_1/2016-3-4-11-2016  Reunión medidas de reparación colectiva proyectop Nasa.pdf', NULL, 152, 14, 1, NULL),
(72, '2016-3-4-11-2016  Reunión medidas de reparación colectiva proyectop Nasa.pdf', 1286520, 'application/pdf', 'soportes/14_1/2016-3-4-11-2016  Reunión medidas de reparación colectiva proyectop Nasa.pdf', NULL, 153, 14, 1, NULL),
(73, '2016-10-11-2016 Reunión concertación de medidas a priorizar,reparación colectiva.pdf', 1275230, 'application/pdf', 'soportes/14_1/2016-10-11-2016 Reunión concertación de medidas a priorizar,reparación colectiva.pdf', NULL, 154, 14, 1, NULL),
(74, '2016-09-29_reunion-autoridades-indigenas-Toribio-para-revision-PIRC_MMP-Caloto-Toribio.pdf', 1307000, 'application/pdf', 'soportes/14_1/2016-09-29_reunion-autoridades-indigenas-Toribio-para-revision-PIRC_MMP-Caloto-Toribio.pdf', NULL, 150, 14, 1, NULL),
(75, '2016-10-27-28_Protocolozacion-PIRC-Toribio_socializacionCerrandoBrechas-Toribio-Caloto.pdf', 1262080, 'application/pdf', 'soportes/14_1/2016-10-27-28_Protocolozacion-PIRC-Toribio_socializacionCerrandoBrechas-Toribio-Caloto.pdf', NULL, 156, 14, 1, NULL),
(76, 'ACUERDO CALOTO.pdf', 1418510, 'application/pdf', 'soportes/14_1/ACUERDO CALOTO.pdf', NULL, 157, 14, 1, NULL),
(77, 'ACUERDO POPAYÁN.pdf', 2918060, 'application/pdf', 'soportes/14_1/ACUERDO POPAYÁN.pdf', NULL, 158, 14, 1, NULL),
(79, 'Entrega grupo PP9-001(1).pdf', 3763650, 'application/pdf', 'soportes/14_1/Entrega grupo PP9-001(1).pdf', NULL, 142, 14, 1, NULL),
(80, 'Entrega grupo PP9-002(1).pdf', 3786790, 'application/pdf', 'soportes/14_1/Entrega grupo PP9-002(1).pdf', NULL, 143, 14, 1, NULL),
(81, 'Entrega grupo PP9-001(2).pdf', 2050210, 'application/pdf', 'soportes/14_1/Entrega grupo PP9-001(2).pdf', NULL, 145, 14, 1, NULL),
(82, 'Entrega grupo PP9-002(2).pdf', 2408260, 'application/pdf', 'soportes/14_1/Entrega grupo PP9-002(2).pdf', NULL, 146, 14, 1, NULL),
(83, 'Entrega grupo PP9-003(1).pdf', 6215760, 'application/pdf', 'soportes/14_1/Entrega grupo PP9-003(1).pdf', NULL, 147, 14, 1, NULL),
(84, '1.2.10.pdf', 1903960, 'application/pdf', 'soportes/14_1/1.2.10.pdf', NULL, 159, 14, 1, NULL),
(85, '1.2.9..pdf', 739328, 'application/pdf', 'soportes/14_1/1.2.9..pdf', NULL, 160, 14, 1, NULL),
(86, '311.pdf', 2166020, 'application/pdf', 'soportes/14_1/311.pdf', NULL, 161, 14, 1, NULL),
(87, 'PLAN DE TRABAJO DE POPAYAN 2016-2017_MMP 10-08-2016.xlsx', 31865, 'application/vnd.openxmlformats-officedocument.spre', 'soportes/14_1/PLAN DE TRABAJO DE POPAYAN 2016-2017_MMP 10-08-2016.xlsx', NULL, 161, 14, 1, NULL),
(89, '16-11-2016.pdf', 2724510, 'application/pdf', 'soportes/14_1/16-11-2016.pdf', NULL, 163, 14, 1, NULL),
(90, '11-10-2016.pdf', 2587240, 'application/pdf', 'soportes/14_1/11-10-2016.pdf', NULL, 162, 14, 1, NULL),
(91, '02-11-2016.pdf', 6347940, 'application/pdf', 'soportes/14_1/02-11-2016.pdf', NULL, 164, 14, 1, NULL),
(92, '01-11-2016.pdf', 797761, 'application/pdf', 'soportes/14_1/01-11-2016.pdf', NULL, 165, 14, 1, NULL),
(93, '03-11-2016.pdf', 652686, 'application/pdf', 'soportes/14_1/03-11-2016.pdf', NULL, 166, 14, 1, NULL),
(94, '04-11-2016.pdf', 1217520, 'application/pdf', 'soportes/14_1/04-11-2016.pdf', NULL, 167, 14, 1, NULL),
(95, '09-11-2016.pdf', 834904, 'application/pdf', 'soportes/14_1/09-11-2016.pdf', NULL, 168, 14, 1, NULL),
(97, '17-11-2016.pdf', 933173, 'application/pdf', 'soportes/14_1/17-11-2016.pdf', NULL, 169, 14, 1, NULL),
(101, '', 0, '', 'soportes/14_4/', NULL, 196, 14, 4, NULL),
(102, 'Q1. 1.3.1 Reunión Alcalde San Vicente.pdf', 246237, 'application/pdf', 'soportes/14_4/Q1. 1.3.1 Reunión Alcalde San Vicente.pdf', NULL, 196, 14, 4, NULL),
(103, 'soporte actividad Octubre 2016.msg', 122368, 'application/octet-stream', 'soportes/14_4/soporte actividad Octubre 2016.msg', NULL, 199, 14, 4, NULL),
(104, '', 0, '', 'soportes/14_4/', NULL, 201, 14, 4, NULL),
(105, 'soporte actividad Octubre 2016.msg', 144384, 'application/octet-stream', 'soportes/14_4/soporte actividad Octubre 2016.msg', NULL, 201, 14, 4, NULL),
(106, 'Q1. 1.3.2 Reunión Alcalde Belén.pdf', 227586, 'application/pdf', 'soportes/14_4/Q1. 1.3.2 Reunión Alcalde Belén.pdf', NULL, 203, 14, 4, NULL),
(107, 'soporte actividad Octubre 2016.msg', 118272, 'application/octet-stream', 'soportes/14_4/soporte actividad Octubre 2016.msg', NULL, 204, 14, 4, NULL),
(109, 'Soporte Actividad 4.2.3.msg', 251392, 'application/octet-stream', 'soportes/14_4/Soporte Actividad 4.2.3.msg', NULL, 207, 14, 4, NULL),
(110, 'Soporte Actividad 4.2.3.msg', 251392, 'application/octet-stream', 'soportes/14_4/Soporte Actividad 4.2.3.msg', NULL, 208, 14, 4, NULL),
(111, '1. Q1- 2 2 4 21 de Noviembre de 2016.pdf', 159933, 'application/pdf', 'soportes/14_4/1. Q1- 2 2 4 21 de Noviembre de 2016.pdf', NULL, 194, 14, 4, NULL),
(114, 'Informe de Legalizacion.xlsx', 26091, 'application/vnd.openxmlformats-officedocument.spre', 'soportes/14_4/Informe de Legalizacion.xlsx', NULL, 214, 14, 4, NULL),
(115, 'Soporte Actividad Octubre.msg', 99328, 'application/octet-stream', 'soportes/14_4/Soporte Actividad Octubre.msg', NULL, 216, 14, 4, NULL),
(116, '1.Intercambio de experiencia Guion y sistematizacion.msg', 140800, 'application/octet-stream', 'soportes/14_4/1.Intercambio de experiencia Guion y sistematizacion.msg', NULL, 222, 14, 4, NULL),
(117, '2.Intercambio de experiencia Informe de Legalizacion.msg', 656896, 'application/octet-stream', 'soportes/14_4/2.Intercambio de experiencia Informe de Legalizacion.msg', NULL, 222, 14, 4, NULL),
(118, 'Planilla Entidades.pdf', 3100160, 'application/pdf', 'soportes/14_4/Planilla Entidades.pdf', NULL, 214, 14, 4, NULL),
(119, '', 0, '', 'soportes/14_4/', NULL, 209, 14, 4, NULL),
(120, 'Guio?n Intercambio de experiencias.docx', 33839, 'application/vnd.openxmlformats-officedocument.word', 'soportes/14_4/Guio?n Intercambio de experiencias.docx', NULL, 209, 14, 4, NULL),
(121, '', 0, '', 'soportes/14_4/', NULL, 228, 14, 4, NULL),
(122, '3. Seguimiento PAT 16 Y 17 de noviembre.msg', 347648, 'application/octet-stream', 'soportes/14_4/3. Seguimiento PAT 16 Y 17 de noviembre.msg', NULL, 228, 14, 4, NULL),
(132, '4.2.4-17-11-2016 Encuentro II Comunidad Bosques de Occidente.pdf', 1412520, 'application/pdf', 'soportes/14_1/4.2.4-17-11-2016 Encuentro II Comunidad Bosques de Occidente.pdf', NULL, 132, 14, 1, NULL),
(135, '4.2.4-18-11-2016 Minga CLTO.pdf', 724282, 'application/pdf', 'soportes/14_1/4.2.4-18-11-2016 Minga CLTO.pdf', NULL, 133, 14, 1, NULL),
(137, '22-11-2016.pdf', 735904, 'application/pdf', 'soportes/14_1/22-11-2016.pdf', NULL, 170, 14, 1, NULL),
(138, 'PAT Ajustado.xlsx', 73931, 'application/vnd.openxmlformats-officedocument.spre', 'soportes/14_1/PAT Ajustado.xlsx', NULL, 170, 14, 1, NULL),
(139, 'Q1 4 3 3 Presentación Casa Pintada Alcalde Belén.msg', 289792, 'application/octet-stream', 'soportes/14_4/Q1 4 3 3 Presentación Casa Pintada Alcalde Belén.msg', NULL, 253, 14, 4, NULL),
(140, 'Notificacion 25-11-2016.pdf', 834215, 'application/pdf', 'soportes/14_4/Notificacion 25-11-2016.pdf', NULL, 177, 14, 4, NULL),
(141, 'Notificacion 26-10-2016.pdf', 613538, 'application/pdf', 'soportes/14_4/Notificacion 26-10-2016.pdf', NULL, 211, 14, 4, NULL),
(142, '', 0, '', 'soportes/14_4/', NULL, 227, 14, 4, NULL),
(143, 'Informe de Legalizacion.xlsx', 26751, 'application/vnd.openxmlformats-officedocument.spre', 'soportes/14_4/Informe de Legalizacion.xlsx', NULL, 227, 14, 4, NULL),
(144, 'Listado de asistencia.pdf', 138945, 'application/pdf', 'soportes/14_4/Listado de asistencia.pdf', NULL, 227, 14, 4, NULL),
(145, '2. Q1- 2 2 4 25 de Noviembre de 2016.msg', 109568, 'application/octet-stream', 'soportes/14_4/2. Q1- 2 2 4 25 de Noviembre de 2016.msg', NULL, 258, 14, 4, NULL),
(146, '4.2.2 24-11-2016 Reunión validación metodológica para encuentros con mujeres Nasa.pdf', 1322820, 'application/pdf', 'soportes/14_1/4.2.2 24-11-2016 Reunión validación metodológica para encuentros con mujeres Nasa.pdf', NULL, 243, 14, 1, NULL),
(147, '4.2.6 24-11-2016 Encuentro II Qué ha pasado por aquí con Mujeres víctimas y profesionales.pdf', 1352060, 'application/pdf', 'soportes/14_1/4.2.6 24-11-2016 Encuentro II Qué ha pasado por aquí con Mujeres víctimas y profesionales.pdf', NULL, 259, 14, 1, NULL),
(151, '28-11-2016.pdf', 1506090, 'application/pdf', 'soportes/14_1/28-11-2016.pdf', NULL, 172, 14, 1, NULL),
(152, '29-11-2016.pdf', 1377420, 'application/pdf', 'soportes/14_1/29-11-2016.pdf', NULL, 173, 14, 1, NULL),
(153, 'Soporte Reunion mesa de participacion Belen.msg', 314368, 'application/octet-stream', 'soportes/14_4/Soporte Reunion mesa de participacion Belen.msg', NULL, 202, 14, 4, NULL),
(154, 'SOPORTE 1 2 8 Q1 PRM IX.msg', 75264, 'application/octet-stream', 'soportes/14_4/SOPORTE 1 2 8 Q1 PRM IX.msg', NULL, 210, 14, 4, NULL),
(155, 'Soporte Reunion mesa de participacion San Vicente 19-10-16.msg', 410112, 'application/octet-stream', 'soportes/14_4/Soporte Reunion mesa de participacion San Vicente 19-10-16.msg', NULL, 205, 14, 4, NULL),
(156, '1.Plenario MMP San Vicente.msg', 410112, 'application/octet-stream', 'soportes/14_4/1.Plenario MMP San Vicente.msg', NULL, 205, 14, 4, NULL),
(157, 'Soporte actividad 1 1 1 PRMA IX  Q1.msg', 450048, 'application/octet-stream', 'soportes/14_4/Soporte actividad 1 1 1 PRMA IX  Q1.msg', NULL, 184, 14, 4, NULL),
(158, 'Soporte Formacion Escuela de Reparaciones.msg', 333824, 'application/octet-stream', 'soportes/14_4/Soporte Formacion Escuela de Reparaciones.msg', NULL, 193, 14, 4, NULL),
(159, '1.Correo Electronico 10-11-16.msg', 60416, 'application/octet-stream', 'soportes/14_4/1.Correo Electronico 10-11-16.msg', NULL, 215, 14, 4, NULL),
(160, 'Soporte Seguimiento PAT 10-11-16.msg', 409088, 'application/octet-stream', 'soportes/14_4/Soporte Seguimiento PAT 10-11-16.msg', NULL, 218, 14, 4, NULL),
(161, 'SOPORTE IEO BELEN DE LOS ANDAQUIES.msg', 1947140, 'application/octet-stream', 'soportes/14_4/SOPORTE IEO BELEN DE LOS ANDAQUIES.msg', NULL, 242, 14, 4, NULL),
(162, 'Soporte Reunion mesa de participcion Belen 18-10-16.msg', 314368, 'application/octet-stream', 'soportes/14_4/Soporte Reunion mesa de participcion Belen 18-10-16.msg', NULL, 242, 14, 4, NULL),
(164, 'PLAN DE ACCION TERRITORIAL CALOTO 2016_2019 Ajustado.xlsx', 79763, 'application/vnd.openxmlformats-officedocument.spre', 'soportes/14_1/PLAN DE ACCION TERRITORIAL CALOTO 2016_2019 Ajustado.xlsx', NULL, 173, 14, 1, NULL),
(165, '30-11-2016.xlsx', 38790, 'application/vnd.openxmlformats-officedocument.spre', 'soportes/14_1/30-11-2016.xlsx', NULL, 261, 14, 1, NULL),
(166, 'FF9-006(1) IRD.pdf', 153502, 'application/pdf', 'soportes/14_4/FF9-006(1) IRD.pdf', NULL, 182, 14, 4, NULL),
(167, 'FF9-006(1) UARIV.pdf', 195184, 'application/pdf', 'soportes/14_4/FF9-006(1) UARIV.pdf', NULL, 182, 14, 4, NULL),
(168, 'FF9-006 ALCALDIA.pdf', 61437, 'application/pdf', 'soportes/14_4/FF9-006 ALCALDIA.pdf', NULL, 182, 14, 4, NULL),
(169, 'FF9-006 ICBF.pdf', 231128, 'application/pdf', 'soportes/14_4/FF9-006 ICBF.pdf', NULL, 182, 14, 4, NULL),
(170, 'PRESENTACIÓN EVALUACION Y SEGUIMIENTO PAT 2016.pptx', 40235700, 'application/vnd.openxmlformats-officedocument.pres', 'soportes/14_1/PRESENTACIÓN EVALUACION Y SEGUIMIENTO PAT 2016.pptx', NULL, 172, 14, 1, NULL),
(171, 'FF9-001(1) IRD.pdf', 2595230, 'application/pdf', 'soportes/14_4/FF9-001(1) IRD.pdf', NULL, 266, 14, 4, NULL),
(172, 'FF9-001(1) UARIV.pdf', 2557600, 'application/pdf', 'soportes/14_4/FF9-001(1) UARIV.pdf', NULL, 266, 14, 4, NULL),
(173, 'FF9-001 ALCALDIA.pdf', 1668460, 'application/pdf', 'soportes/14_4/FF9-001 ALCALDIA.pdf', NULL, 266, 14, 4, NULL),
(174, 'FF9-001 ICBF.pdf', 3197900, 'application/pdf', 'soportes/14_4/FF9-001 ICBF.pdf', NULL, 266, 14, 4, NULL),
(175, 'FF9-002(1) IRD ESPECIAL.pdf', 1371220, 'application/pdf', 'soportes/14_4/FF9-002(1) IRD ESPECIAL.pdf', NULL, 267, 14, 4, NULL),
(176, 'FF9-002(1) UARIV.pdf', 644063, 'application/pdf', 'soportes/14_4/FF9-002(1) UARIV.pdf', NULL, 267, 14, 4, NULL),
(177, 'FF9-002 ALCALDIA ESPECIAL.pdf', 672899, 'application/pdf', 'soportes/14_4/FF9-002 ALCALDIA ESPECIAL.pdf', NULL, 267, 14, 4, NULL),
(178, 'FF9-002(2) IRD ESPECIAL.pdf', 777248, 'application/pdf', 'soportes/14_4/FF9-002(2) IRD ESPECIAL.pdf', NULL, 267, 14, 4, NULL),
(179, 'FF9-002(2) UARIV ESPECIAL.pdf', 746651, 'application/pdf', 'soportes/14_4/FF9-002(2) UARIV ESPECIAL.pdf', NULL, 267, 14, 4, NULL),
(180, 'FF9-001(2) IRD.pdf', 2322250, 'application/pdf', 'soportes/14_4/FF9-001(2) IRD.pdf', NULL, 268, 14, 4, NULL),
(181, 'FF9-001(2) UARIV.pdf', 1500340, 'application/pdf', 'soportes/14_4/FF9-001(2) UARIV.pdf', NULL, 268, 14, 4, NULL),
(182, 'FF9-003(1) IRD.pdf', 3672490, 'application/pdf', 'soportes/14_4/FF9-003(1) IRD.pdf', NULL, 269, 14, 4, NULL),
(183, 'FF9-003(1) UARIV.pdf', 4606080, 'application/pdf', 'soportes/14_4/FF9-003(1) UARIV.pdf', NULL, 269, 14, 4, NULL),
(184, 'FF9-003 ALCALDIA.pdf', 2496720, 'application/pdf', 'soportes/14_4/FF9-003 ALCALDIA.pdf', NULL, 269, 14, 4, NULL),
(185, 'FF9-003 ICBF.pdf', 3501390, 'application/pdf', 'soportes/14_4/FF9-003 ICBF.pdf', NULL, 269, 14, 4, NULL),
(186, 'Acuerdo de Entendimiento IRD Alcaldía y Personeria Belén de los Andaquíes 29Sep 2016- 28Sep 2017.pdf', 451170, 'application/pdf', 'soportes/14_4/Acuerdo de Entendimiento IRD Alcaldía y Personeria Belén de los Andaquíes 29Sep 2016- 28Sep 2017.pdf', NULL, 212, 14, 4, NULL),
(187, 'Acuerdo de Entendimiento IRD Alcaldía y Personeria Florencia 29Sep 2016- 28Sep 2017.pdf', 897406, 'application/pdf', 'soportes/14_4/Acuerdo de Entendimiento IRD Alcaldía y Personeria Florencia 29Sep 2016- 28Sep 2017.pdf', NULL, 206, 14, 4, NULL),
(188, 'Acuerdo San Vicente. Firma Alcalde y Personera.pdf', 227024, 'application/pdf', 'soportes/14_4/Acuerdo San Vicente. Firma Alcalde y Personera.pdf', NULL, 271, 14, 4, NULL),
(189, 'FF9-005(1) IRD.pdf', 1964410, 'application/pdf', 'soportes/14_4/FF9-005(1) IRD.pdf', NULL, 276, 14, 4, NULL),
(190, 'FF9-005(1) UARIV.pdf', 2564010, 'application/pdf', 'soportes/14_4/FF9-005(1) UARIV.pdf', NULL, 276, 14, 4, NULL),
(191, 'FF9-005(1) ALCALDIA.pdf', 857283, 'application/pdf', 'soportes/14_4/FF9-005(1) ALCALDIA.pdf', NULL, 276, 14, 4, NULL),
(192, 'FF9-005(1) ICBF.pdf', 1178990, 'application/pdf', 'soportes/14_4/FF9-005(1) ICBF.pdf', NULL, 276, 14, 4, NULL),
(193, 'FF9-003(2) IRD.pdf', 408363, 'application/pdf', 'soportes/14_4/FF9-003(2) IRD.pdf', NULL, 277, 14, 4, NULL),
(194, 'FF9-003(2) UARIV.pdf', 4009180, 'application/pdf', 'soportes/14_4/FF9-003(2) UARIV.pdf', NULL, 277, 14, 4, NULL),
(195, 'FF9-005(2) IRD.pdf', 241807, 'application/pdf', 'soportes/14_4/FF9-005(2) IRD.pdf', NULL, 278, 14, 4, NULL),
(196, 'FF9-005(2) UARIV.pdf', 111229, 'application/pdf', 'soportes/14_4/FF9-005(2) UARIV.pdf', NULL, 278, 14, 4, NULL),
(197, 'Documentos de recepción Kits UARIV 29 de Noviembre.pdf', 2688260, 'application/pdf', 'soportes/14_1/Documentos de recepción Kits UARIV 29 de Noviembre.pdf', NULL, 279, 14, 1, NULL),
(198, '4.1.1 (Noviembre) Acompañamiento Psicosocial primera entrega.pdf', 2212530, 'application/pdf', 'soportes/14_4/4.1.1 (Noviembre) Acompañamiento Psicosocial primera entrega.pdf', NULL, 250, 14, 4, NULL),
(199, '4.1.3 (Noviembre) Acompañaomiento Psicosocial en la Notificación.pdf', 1972770, 'application/pdf', 'soportes/14_4/4.1.3 (Noviembre) Acompañaomiento Psicosocial en la Notificación.pdf', NULL, 178, 14, 4, NULL),
(200, '4.1.2 (Noviembre) Acompañamiento Psicolsocial en segunda entrega.pdf', 2082160, 'application/pdf', 'soportes/14_4/4.1.2 (Noviembre) Acompañamiento Psicolsocial en segunda entrega.pdf', NULL, 252, 14, 4, NULL),
(201, 'Recepcion 001 2017 - kit de frutas.pdf', 4061030, 'application/pdf', 'soportes/14_4/Recepcion 001 2017 - kit de frutas.pdf', NULL, 280, 14, 4, NULL),
(203, 'Recepcion 003 2017 - kit de frutas.pdf', 4572230, 'application/pdf', 'soportes/14_4/Recepcion 003 2017 - kit de frutas.pdf', NULL, 286, 14, 4, NULL),
(204, 'Recepcion 002 2017 - kit de frutas.pdf', 7897230, 'application/pdf', 'soportes/14_4/Recepcion 002 2017 - kit de frutas.pdf', NULL, 288, 14, 4, NULL),
(205, 'Recepción 004 2017 - Kit frutas y verduras nov 03 2016.pdf', 2989580, 'application/pdf', 'soportes/14_4/Recepción 004 2017 - Kit frutas y verduras nov 03 2016.pdf', NULL, 287, 14, 4, NULL),
(206, 'Recepcion 005 2017 - kit de frutas.pdf', 3650520, 'application/pdf', 'soportes/14_4/Recepcion 005 2017 - kit de frutas.pdf', NULL, 289, 14, 4, NULL),
(207, 'Recepción 001-2017 - Bienestarina oct 2016..pdf', 4324070, 'application/pdf', 'soportes/14_4/Recepción 001-2017 - Bienestarina oct 2016..pdf', NULL, 290, 14, 4, NULL),
(208, '4.3.1 Intervención espacio comunitario Embera Chamí Puru Resguardo San José de Canelo Florencia.pdf', 144094, 'application/pdf', 'soportes/14_4/4.3.1 Intervención espacio comunitario Embera Chamí Puru Resguardo San José de Canelo Florencia.pdf', NULL, 292, 14, 4, NULL),
(209, 'Recepción 002-2017 - ICBF nov 11 2016.pdf', 431763, 'application/pdf', 'soportes/14_4/Recepción 002-2017 - ICBF nov 11 2016.pdf', NULL, 291, 14, 4, NULL),
(210, '4.3.1(7, 8 y 9 nov) Intervención espacio comunitario Embera Chamí Florencia.pdf', 151164, 'application/pdf', 'soportes/14_4/4.3.1(7, 8 y 9 nov) Intervención espacio comunitario Embera Chamí Florencia.pdf', NULL, 294, 14, 4, NULL),
(211, 'Recepción 001-2017 - Bienestarina oct 2016..pdf', 4324070, 'application/pdf', 'soportes/14_4/Recepción 001-2017 - Bienestarina oct 2016..pdf', NULL, 293, 14, 4, NULL),
(212, 'Recepción 002-2017 - ICBF nov 11 2016.pdf', 431763, 'application/pdf', 'soportes/14_4/Recepción 002-2017 - ICBF nov 11 2016.pdf', NULL, 295, 14, 4, NULL),
(213, '4.2.1  Divulgación Herramientas psicosociales para la Vida comunidad Nueva Colombia.pdf', 314890, 'application/pdf', 'soportes/14_4/4.2.1  Divulgación Herramientas psicosociales para la Vida comunidad Nueva Colombia.pdf', NULL, 296, 14, 4, NULL),
(214, '4.3.5 Presentación Proyecto Casa Pintada a comunidad La Mono y acuerdos para mano de obra adecuacion', 100803, 'application/pdf', 'soportes/14_4/4.3.5 Presentación Proyecto Casa Pintada a comunidad La Mono y acuerdos para mano de obra adecuaciones.pdf', NULL, 297, 14, 4, NULL),
(215, '4.3.2 Intervención espacio comunitario Nasa Paez Resguardo La Gaitana Florencia.pdf', 130429, 'application/pdf', 'soportes/14_4/4.3.2 Intervención espacio comunitario Nasa Paez Resguardo La Gaitana Florencia.pdf', NULL, 298, 14, 4, NULL),
(216, '', 0, '', 'soportes/14_4/', NULL, 276, 14, 4, NULL),
(218, '4.2.7 1-12-2016 GAM 4 Bosques de Occidente.pdf', 1300810, 'application/pdf', 'soportes/14_1/4.2.7 1-12-2016 GAM 4 Bosques de Occidente.pdf', NULL, 245, 14, 1, NULL),
(219, '4.2.3 Formación en herramientas psicosociales para la vida a cuidadores de Puerto Torres y La Mono B', 100683, 'application/pdf', 'soportes/14_4/4.2.3 Formación en herramientas psicosociales para la vida a cuidadores de Puerto Torres y La Mono Belén de los Andaquíes.pdf', NULL, 300, 14, 4, NULL),
(220, '4.1.1-16-11-2016 Acompañamiento psicosocial.pdf', 1098910, 'application/pdf', 'soportes/14_1/4.1.1-16-11-2016 Acompañamiento psicosocial.pdf', NULL, 151, 14, 1, NULL),
(221, '4.1.1-16-11-2016 Acompañamiento psicosocial.pdf', 1098910, 'application/pdf', 'soportes/14_1/4.1.1-16-11-2016 Acompañamiento psicosocial.pdf', NULL, 148, 14, 1, NULL),
(222, 'Entrega grupo PP9-003(2).pdf', 3859890, 'application/pdf', 'soportes/14_1/Entrega grupo PP9-003(2).pdf', NULL, 123, 14, 1, NULL),
(223, 'Entrega grupo PP9-004(1).pdf', 4134520, 'application/pdf', 'soportes/14_1/Entrega grupo PP9-004(1).pdf', NULL, 124, 14, 1, NULL),
(224, 'Entrega grupo PP9-005(1).pdf', 5210720, 'application/pdf', 'soportes/14_1/Entrega grupo PP9-005(1).pdf', NULL, 139, 14, 1, NULL),
(225, 'Entrega grupo PP9-004(2).pdf', 3043600, 'application/pdf', 'soportes/14_1/Entrega grupo PP9-004(2).pdf', NULL, 140, 14, 1, NULL),
(226, '3. Q1- 2 2 4 05 de Diciembre de 2016.pdf', 47953, 'application/pdf', 'soportes/14_4/3. Q1- 2 2 4 05 de Diciembre de 2016.pdf', NULL, 301, 14, 4, NULL),
(228, 'doc01586620161205135720.pdf', 1321880, 'application/pdf', 'soportes/14_1/doc01586620161205135720.pdf', NULL, 302, 14, 1, NULL),
(231, '4.2.7 24-11-2016 III Encuentro Bosques de occidente.pdf', 1296000, 'application/pdf', 'soportes/14_1/4.2.7 24-11-2016 III Encuentro Bosques de occidente.pdf', NULL, 260, 14, 1, NULL),
(233, '4.2.6-17-11-2016 Encuentro I Mujeres victimas y profesionales.pdf', 1306020, 'application/pdf', 'soportes/14_1/4.2.6-17-11-2016 Encuentro I Mujeres victimas y profesionales.pdf', NULL, 129, 14, 1, NULL),
(234, '4.2.6 1-12-2016 GAM 3 Encuentro Mujeres victimas y profesionales.pdf', 1434140, 'application/pdf', 'soportes/14_1/4.2.6 1-12-2016 GAM 3 Encuentro Mujeres victimas y profesionales.pdf', NULL, 244, 14, 1, NULL),
(235, '4.3.3 Presentación Proyecto Casa Pintada La Mono y Adecuación Caseta Puerto Torres a Alcalde para de', 99456, 'application/pdf', 'soportes/14_4/4.3.3 Presentación Proyecto Casa Pintada La Mono y Adecuación Caseta Puerto Torres a Alcalde para definir intervención en mano de obra.pdf', NULL, 299, 14, 4, NULL),
(236, '', 0, '', 'soportes/14_1/', NULL, 303, 14, 1, NULL),
(237, '20-10-2016.pdf', 1099970, 'application/pdf', 'soportes/14_1/20-10-2016.pdf', NULL, 303, 14, 1, NULL),
(239, '01-12-2016.pdf', 848303, 'application/pdf', 'soportes/14_1/01-12-2016.pdf', NULL, 254, 14, 1, NULL),
(240, 'PLAN DE TRABAJO DE POPAYAN 2016-2017_MMP 10-08-2016.xlsx', 31771, 'application/vnd.openxmlformats-officedocument.spre', 'soportes/14_1/PLAN DE TRABAJO DE POPAYAN 2016-2017_MMP 10-08-2016.xlsx', NULL, 304, 14, 1, NULL),
(241, '18-11-2016.pdf', 5836320, 'application/pdf', 'soportes/14_1/18-11-2016.pdf', NULL, 304, 14, 1, NULL),
(242, '2016-11-12-13-14_formato_masivo.pdf', 263616, 'application/pdf', 'soportes/14_1/2016-11-12-13-14_formato_masivo.pdf', NULL, 128, 14, 1, NULL),
(243, 'NOTIFICACIONES JORNADA MASIVA POPAYAN DEL 12 AL 14 NOV.msg', 164352, 'application/octet-stream', 'soportes/14_1/NOTIFICACIONES JORNADA MASIVA POPAYAN DEL 12 AL 14 NOV.msg', NULL, 128, 14, 1, NULL),
(244, 'noticiaUARIV.html', 204, 'text/html', 'soportes/14_1/noticiaUARIV.html', NULL, 118, 14, 1, NULL),
(245, 'GAM I - Caloto.pdf', 2111080, 'application/pdf', 'soportes/14_1/GAM I - Caloto.pdf', NULL, 311, 14, 1, NULL),
(246, '4.4.1 (Diciembre) Identificación, remisión y seguimiento de casos de violencia sexual en el marco de', 34868, 'application/pdf', 'soportes/14_4/4.4.1 (Diciembre) Identificación, remisión y seguimiento de casos de violencia sexual en el marco del conflicto armado a la oferta de atención psicosocial en Florencia.pdf', NULL, 314, 14, 4, NULL),
(247, '06-12-2016.pdf', 728711, 'application/pdf', 'soportes/14_1/06-12-2016.pdf', NULL, 255, 14, 1, NULL),
(248, '07-12-2016.pdf', 1000220, 'application/pdf', 'soportes/14_1/07-12-2016.pdf', NULL, 257, 14, 1, NULL),
(249, 'Informe Mesa Municipal de Participación.pptx', 323012, 'application/vnd.openxmlformats-officedocument.pres', 'soportes/14_1/Informe Mesa Municipal de Participación.pptx', NULL, 257, 14, 1, NULL),
(250, 'PNUD Ds Victimas II Organizaciones de Víctimas.ppt', 4096000, 'application/vnd.ms-powerpoint', 'soportes/14_1/PNUD Ds Victimas II Organizaciones de Víctimas.ppt', NULL, 257, 14, 1, NULL),
(251, '09-12-2016.pdf', 679908, 'application/pdf', 'soportes/14_1/09-12-2016.pdf', NULL, 316, 14, 1, NULL),
(252, 'Informe de Rendición de cuentas de la MMP de Toribio.pptx', 1175500, 'application/vnd.openxmlformats-officedocument.pres', 'soportes/14_1/Informe de Rendición de cuentas de la MMP de Toribio.pptx', NULL, 316, 14, 1, NULL),
(255, 'Acuerdo de Entendimiento IRD Alcaldía y Personeria San Vicente del Caguán 29Sep 2016- 28Sep 2017.pdf', 1328410, 'application/pdf', 'soportes/14_4/Acuerdo de Entendimiento IRD Alcaldía y Personeria San Vicente del Caguán 29Sep 2016- 28Sep 2017.pdf', NULL, 328, 14, 4, NULL),
(256, '2016-12-09_jornadaCaracterizacion.pdf', 2184090, 'application/pdf', 'soportes/14_1/2016-12-09_jornadaCaracterizacion.pdf', NULL, 329, 14, 1, NULL),
(257, '2016-12-13_jornadaCaracterizacion.pdf', 1230180, 'application/pdf', 'soportes/14_1/2016-12-13_jornadaCaracterizacion.pdf', NULL, 330, 14, 1, NULL),
(258, '2016-12-06_planilla-UARIV.pdf', 1493800, 'application/pdf', 'soportes/14_1/2016-12-06_planilla-UARIV.pdf', NULL, 285, 14, 1, NULL),
(259, '2016-12-06-Planilla-IRD.pdf', 820721, 'application/pdf', 'soportes/14_1/2016-12-06-Planilla-IRD.pdf', NULL, 285, 14, 1, NULL),
(260, '2016-12-06-Notificacion Personal.pdf', 9081580, 'application/pdf', 'soportes/14_1/2016-12-06-Notificacion Personal.pdf', NULL, 285, 14, 1, NULL),
(261, '', 0, '', 'soportes/14_4/', NULL, 333, 14, 4, NULL),
(262, '', 0, '', 'soportes/14_4/', NULL, 333, 14, 4, NULL),
(263, '', 0, '', 'soportes/14_4/', NULL, 333, 14, 4, NULL),
(264, '', 0, '', 'soportes/14_4/', NULL, 333, 14, 4, NULL),
(265, 'Ayuda de memoria- SEM 13-12-206.pdf', 284266, 'application/pdf', 'soportes/14_4/Ayuda de memoria- SEM 13-12-206.pdf', NULL, 333, 14, 4, NULL),
(266, 'Entrega grupo PP9-005(2).pdf', 3088100, 'application/pdf', 'soportes/14_1/Entrega grupo PP9-005(2).pdf', NULL, 312, 14, 1, NULL),
(267, 'Entrega grupo PP9-006(1).pdf', 4833470, 'application/pdf', 'soportes/14_1/Entrega grupo PP9-006(1).pdf', NULL, 313, 14, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre_usuario` varchar(15) NOT NULL,
  `clave_usuario` varchar(100) NOT NULL,
  `idpersona` int(11) NOT NULL,
  PRIMARY KEY (`nombre_usuario`),
  KEY `idpersona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre_usuario`, `clave_usuario`, `idpersona`) VALUES
('acolmenares ', '37edde66cdc5da7572a79d145e979b9e', 28),
('amora', '8715f2566de2646479bfc0486608a306', 27),
('aportilla', 'f159f0c026d51861f1521b2c9400cfb2', 46),
('arodriguez', 'e61075a6246c4af38dc398cdcb8b0854', 10),
('avillano', 'bae637e3fc9c752940b2ed26d83fc9c4', 11),
('cbecerra', 'a6870b219b0f496089d7294672151db3', 29),
('cgallego', 'bded3d8bd873704ef5368a693dd5e72a', 7),
('cgil', '40ff96468fd73fe63ef2585fe3bdd311', 8),
('cnarvaez', '594388e6adbb93430e9a4066913f9224', 12),
('dramirez', '7e397c7ddbf0acf4f98a6aa2a277ee42', 30),
('earcila', '1bfd046916cd7802f8edaee489ed00e4', 17),
('edelgado', 'a59ea52d29885cacad8c6a748186403c', 31),
('fayala', '27efa21d90192878f98c4f913724b8bd', 32),
('fgutierrez', 'a7b0c429757eb39bde9115d0819c07a0', 13),
('fmorales', '2abf6b6edd097ee7a652700d59d5ea1e', 14),
('gcabrera', '9daf903d55ee227b77ed7f3bfc2c793e', 42),
('gmora', '3fc8fa47f838b4fbba84ce0946e44dcd', 33),
('gtoro', 'e471bea83d07e2bc4ccf90a7359a449a', 18),
('hcabrera', '3c78048c32cf984059489f179bbef65c', 19),
('hhaydu', 'cf00dd462763de8b9160ad6b3b36c8f5', 45),
('itacue', '62678d86a8793498e6e5f288cda11261', 15),
('jfernandez', '8787df20c38f11ddd0ecf1561b982ff3', 2),
('jfranco', 'ba489d4ca73cd1396f2fce11915c7a24', 9),
('jgranda', '0a5a24446958bbeef35b6224888722cb', 1),
('jzarama', '4fa85492a13df038996060a2f44e53c6', 44),
('kgasca', '82ec1bb67b45093e17502245a51f766a', 20),
('lmendoza', '6d4e34acf9e06b9341603c8742033ec7', 21),
('lortiz', '13f443827c1d2285b86751cd10e3607c', 43),
('lrincon', '0429b6b17e79062a86e901866cba4ec6', 35),
('lrodriguez', 'ffd238d130081ddcb0be22a825457487', 34),
('mcuellar', '88f8c221c0c2efcea39a42838bfe432b', 23),
('mmonroy', '4df25ad3094b0c7f546c354097b0a1a3', 22),
('mmora', '64101e3f682c76725c7f96c61ea9b4a0', 40),
('omoreno', 'e2fc947b32250a19ad642660d27378df', 41),
('wgranada', '5024bd8159a37efef954948a78c6914a', 24),
('wpeña', 'wpeña', 16),
('yibarra', 'da63a84752eaaac0001d14655164e502', 26),
('ypedrosa', 'cd6019042ff8190e3626dc2dbb11f420', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_perfil`
--

CREATE TABLE IF NOT EXISTS `usuario_perfil` (
  `nombre_usuario` varchar(15) NOT NULL,
  `idperfil` int(11) NOT NULL,
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`nombre_usuario`,`idperfil`),
  KEY `fk_usuper_perfil` (`idperfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_perfil`
--

INSERT INTO `usuario_perfil` (`nombre_usuario`, `idperfil`, `orden`) VALUES
('acolmenares', 7, NULL),
('acolmenares', 9, NULL),
('acolmenares', 10, NULL),
('amora', 10, NULL),
('aportilla', 10, NULL),
('arodriguez', 10, NULL),
('avillano', 10, NULL),
('cbecerra', 10, NULL),
('cgallego', 9, NULL),
('cgallego', 10, NULL),
('cgil', 10, NULL),
('cnarvaez', 10, NULL),
('dramirez', 10, NULL),
('earcila', 10, NULL),
('edelgado', 10, NULL),
('fayala', 10, NULL),
('fgutierrez', 10, NULL),
('fmorales', 10, NULL),
('gcabrera', 10, NULL),
('gmora', 10, NULL),
('gtoro', 10, NULL),
('hcabrera', 10, NULL),
('hhaydu', 1, NULL),
('hhaydu', 9, NULL),
('hhaydu', 10, NULL),
('itacue', 10, NULL),
('jfernandez', 9, NULL),
('jfernandez', 10, NULL),
('jfranco', 1, NULL),
('jfranco', 8, NULL),
('jfranco', 9, NULL),
('jfranco', 10, NULL),
('jgranda', 1, NULL),
('jgranda', 7, NULL),
('jgranda', 8, NULL),
('jgranda', 9, NULL),
('jgranda', 10, NULL),
('jzarama', 10, NULL),
('kgasca', 10, NULL),
('lmendoza', 10, NULL),
('lortiz', 10, NULL),
('lrincon', 9, NULL),
('lrincon', 10, NULL),
('lrodriguez', 10, NULL),
('mcuellar', 1, NULL),
('mcuellar', 8, NULL),
('mcuellar', 9, NULL),
('mcuellar', 10, NULL),
('mmonroy', 10, NULL),
('mmora', 10, NULL),
('omoreno', 10, NULL),
('wgranada', 10, NULL),
('wpeña', 10, NULL),
('yibarra', 10, NULL),
('ypedrosa', 10, NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_plan_implementacion`
--
CREATE TABLE IF NOT EXISTS `view_plan_implementacion` (
`idperiodo` int(11)
,`idproyecto` int(11)
,`idregional` int(11)
,`codigo_periodo` varchar(20)
,`fecha_inicio_periodo` date
,`fecha_final_periodo` date
,`idobjetivo` int(11)
,`codigo_objetivo` varchar(10)
,`nombre_objetivo` text
,`idmacroactividad` int(11)
,`codigo_macroactividad` decimal(8,0)
,`nombre_macroactividad` text
,`descripcion_macroactividad` text
,`idlineaaccion` int(11)
,`nombre_lineaaccion` varchar(100)
,`codigo_lineaaccion` decimal(2,1)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `view_plan_implementacion`
--
DROP TABLE IF EXISTS `view_plan_implementacion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_plan_implementacion` AS select `periodo`.`idperiodo` AS `idperiodo`,`periodo`.`idproyecto` AS `idproyecto`,`macroactividad`.`idregional` AS `idregional`,`periodo`.`codigo_periodo` AS `codigo_periodo`,`periodo`.`fecha_inicio_periodo` AS `fecha_inicio_periodo`,`periodo`.`fecha_final_periodo` AS `fecha_final_periodo`,`objetivo`.`idobjetivo` AS `idobjetivo`,`objetivo`.`codigo_objetivo` AS `codigo_objetivo`,`objetivo`.`nombre_objetivo` AS `nombre_objetivo`,`macroactividad`.`idmacroactividad` AS `idmacroactividad`,`macroactividad`.`codigo_macroactividad` AS `codigo_macroactividad`,`macroactividad`.`nombre_macroactividad` AS `nombre_macroactividad`,`macroactividad`.`descripcion_macroactividad` AS `descripcion_macroactividad`,`lineaaccion`.`idlineaaccion` AS `idlineaaccion`,`lineaaccion`.`nombre_lineaaccion` AS `nombre_lineaaccion`,`lineaaccion`.`codigo_lineaaccion` AS `codigo_lineaaccion` from (((`lineaaccion` join `macroactividad`) join `objetivo`) join `periodo`) where ((`periodo`.`idperiodo` = `macroactividad`.`idperiodo`) and (`objetivo`.`idobjetivo` = `macroactividad`.`idobjetivo`) and (`lineaaccion`.`idlineaaccion` = `macroactividad`.`idlineaaccion`)) order by `periodo`.`idperiodo`,`objetivo`.`codigo_objetivo`,`lineaaccion`.`codigo_lineaaccion`,`macroactividad`.`codigo_macroactividad`;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `depto`
--
ALTER TABLE `depto`
  ADD CONSTRAINT `depto_ibfk_1` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`);

--
-- Filtros para la tabla `evento_macroactividad`
--
ALTER TABLE `evento_macroactividad`
  ADD CONSTRAINT `fk_evento_macroactividad_1` FOREIGN KEY (`idevento`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `fk_evento_macroactividad_2` FOREIGN KEY (`idmacroactividad`) REFERENCES `macroactividad` (`idmacroactividad`);

--
-- Filtros para la tabla `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_evento_persona` FOREIGN KEY (`idpersona`) REFERENCES `personal` (`idpersona`),
  ADD CONSTRAINT `fk_evento_proyecto` FOREIGN KEY (`idproyecto`) REFERENCES `proyecto` (`idproyecto`),
  ADD CONSTRAINT `fk_evento_regional` FOREIGN KEY (`idregional`) REFERENCES `regional` (`idregional`);

--
-- Filtros para la tabla `indicador`
--
ALTER TABLE `indicador`
  ADD CONSTRAINT `indicador_ibfk_1` FOREIGN KEY (`idobjetivo`) REFERENCES `objetivo` (`idobjetivo`);

--
-- Filtros para la tabla `lineaaccion`
--
ALTER TABLE `lineaaccion`
  ADD CONSTRAINT `fk_lineaa_objetivo` FOREIGN KEY (`idobjetivo`) REFERENCES `objetivo` (`idobjetivo`);

--
-- Filtros para la tabla `macroactividad`
--
ALTER TABLE `macroactividad`
  ADD CONSTRAINT `fk_macract_obj` FOREIGN KEY (`idobjetivo`) REFERENCES `objetivo` (`idobjetivo`),
  ADD CONSTRAINT `fk_macract_periodo` FOREIGN KEY (`idperiodo`) REFERENCES `periodo` (`idperiodo`),
  ADD CONSTRAINT `fk_macract_proy` FOREIGN KEY (`idproyecto`) REFERENCES `proyecto` (`idproyecto`),
  ADD CONSTRAINT `fk_macract_reg` FOREIGN KEY (`idregional`) REFERENCES `regional` (`idregional`),
  ADD CONSTRAINT `fk_macroact_linea` FOREIGN KEY (`idlineaaccion`) REFERENCES `lineaaccion` (`idlineaaccion`);

--
-- Filtros para la tabla `macroactividad_mes_semana`
--
ALTER TABLE `macroactividad_mes_semana`
  ADD CONSTRAINT `fk_macractsemdia_macroact` FOREIGN KEY (`idmacroactividad`) REFERENCES `macroactividad` (`idmacroactividad`);

--
-- Filtros para la tabla `macroactividad_persona`
--
ALTER TABLE `macroactividad_persona`
  ADD CONSTRAINT `fk_marcroact_personal` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersona`),
  ADD CONSTRAINT `fk_marcroact_personal_1` FOREIGN KEY (`idmacroactividad`) REFERENCES `macroactividad` (`idmacroactividad`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`iddepto`) REFERENCES `depto` (`iddepto`);

--
-- Filtros para la tabla `objetivo`
--
ALTER TABLE `objetivo`
  ADD CONSTRAINT `objetivo_ibfk_1` FOREIGN KEY (`idproyecto`) REFERENCES `proyecto` (`idproyecto`);

--
-- Filtros para la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD CONSTRAINT `periodo_ibfk_1` FOREIGN KEY (`idproyecto`) REFERENCES `proyecto` (`idproyecto`);

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `fk_permiso_perfil` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`idperfil`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`idregional`) REFERENCES `regional` (`idregional`);

--
-- Filtros para la tabla `regional`
--
ALTER TABLE `regional`
  ADD CONSTRAINT `regional_ibfk_1` FOREIGN KEY (`iddepto`) REFERENCES `depto` (`iddepto`),
  ADD CONSTRAINT `regional_ibfk_2` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`),
  ADD CONSTRAINT `regional_ibfk_3` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`),
  ADD CONSTRAINT `regional_ibfk_4` FOREIGN KEY (`idmunicipio`) REFERENCES `municipio` (`idmunicipio`);

--
-- Filtros para la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD CONSTRAINT `fk_periodo_soporte` FOREIGN KEY (`idperiodo`) REFERENCES `periodo` (`idperiodo`),
  ADD CONSTRAINT `fk_regional_soporte` FOREIGN KEY (`idregional`) REFERENCES `regional` (`idregional`),
  ADD CONSTRAINT `fk_soporte_evento` FOREIGN KEY (`idevento`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `fk_soporte_proyecto` FOREIGN KEY (`idproyecto`) REFERENCES `proyecto` (`idproyecto`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_persona` FOREIGN KEY (`idpersona`) REFERENCES `personal` (`idpersona`);

--
-- Filtros para la tabla `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  ADD CONSTRAINT `fk_usuper_perfil` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`idperfil`),
  ADD CONSTRAINT `fk_usuper_usuario` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
