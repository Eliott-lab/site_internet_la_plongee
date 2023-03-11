-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.1.72-community - MySQL Community Server (GPL)
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de la table palier. evolution azote residuel
CREATE TABLE IF NOT EXISTS `evolution azote residuel` (
  `GPS` tinytext,
  `15` float DEFAULT NULL,
  `30` float DEFAULT NULL,
  `45` float DEFAULT NULL,
  `60` float DEFAULT NULL,
  `90` float DEFAULT NULL,
  `120` float DEFAULT NULL,
  `150` float DEFAULT NULL,
  `180` float DEFAULT NULL,
  `210` float DEFAULT NULL,
  `240` float DEFAULT NULL,
  `270` float DEFAULT NULL,
  `300` float DEFAULT NULL,
  `330` float DEFAULT NULL,
  `360` float DEFAULT NULL,
  `390` float DEFAULT NULL,
  `420` float DEFAULT NULL,
  `450` float DEFAULT NULL,
  `480` float DEFAULT NULL,
  `510` float DEFAULT NULL,
  `540` float DEFAULT NULL,
  `570` float DEFAULT NULL,
  `600` float DEFAULT NULL,
  `630` float DEFAULT NULL,
  `660` float DEFAULT NULL,
  `690` float DEFAULT NULL,
  `720` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Export de données de la table palier.evolution azote residuel : 16 rows
DELETE FROM `evolution azote residuel`;
/*!40000 ALTER TABLE `evolution azote residuel` DISABLE KEYS */;
INSERT INTO `evolution azote residuel` (`GPS`, `15`, `30`, `45`, `60`, `90`, `120`, `150`, `180`, `210`, `240`, `270`, `300`, `330`, `360`, `390`, `420`, `450`, `480`, `510`, `540`, `570`, `600`, `630`, `660`, `690`, `720`) VALUES
	('A', 0.84, 0.83, 0.83, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81, 0.81, 0.81, 0.81, 0.81, 0.81, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	('B', 0.88, 0.88, 0.87, 0.86, 0.85, 0.85, 0.84, 0.83, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81, 0.81, 0.81, 0.81, 0.81, 0, 0, 0, 0, 0, 0, 0, 0),
	('C', 0.92, 0.91, 0.9, 0.89, 0.88, 0.87, 0.85, 0.85, 0.84, 0.83, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81, 0.81, 0.81, 0.81, 0.81, 0, 0, 0, 0, 0, 0),
	('D', 0.97, 0.95, 0.94, 0.93, 0.91, 0.89, 0.88, 0.86, 0.85, 0.85, 0.84, 0.83, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81, 0.81, 0.81, 0.81, 0.81, 0, 0, 0, 0),
	('E', 1, 0.98, 0.97, 0.96, 0.93, 0.91, 0.89, 0.88, 0.87, 0.86, 0.85, 0.84, 0.83, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81, 0.81, 0.81, 0.81, 0.81, 0, 0, 0),
	('F', 1.05, 1.03, 1.01, 0.99, 0.96, 0.94, 0.91, 0.9, 0.88, 0.87, 0.86, 0.85, 0.84, 0.83, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81, 0.81, 0.81, 0.81, 0.81, 0.81, 0),
	('G', 1.08, 1.06, 1.04, 1.02, 0.98, 0.96, 0.93, 0.91, 0.89, 0.88, 0.87, 0.85, 0.85, 0.84, 0.83, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81, 0.81, 0.81, 0.81, 0.81, 0),
	('H', 1.13, 1.1, 1.08, 1.05, 1.01, 0.98, 0.95, 0.93, 0.91, 0.89, 0.88, 0.86, 0.85, 0.85, 0.84, 0.83, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81, 0.81, 0.81, 0.81, 0.81),
	('I', 1.17, 1.14, 1.11, 1.08, 1.04, 1, 0.97, 0.94, 0.92, 0.9, 0.88, 0.87, 0.86, 0.85, 0.84, 0.84, 0.83, 0.83, 0.82, 0.82, 0.81, 0.81, 0.81, 0.81, 0.81, 0.81),
	('J', 1.2, 1.17, 1.14, 1.11, 1.06, 1.02, 0.98, 0.96, 0.93, 0.91, 0.89, 0.88, 0.87, 0.86, 0.85, 0.84, 0.83, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81, 0.81, 0.81, 0.81),
	('K', 1.25, 1.21, 1.18, 1.15, 1.09, 1.04, 1.01, 0.97, 0.95, 0.92, 0.9, 0.89, 0.87, 0.86, 0.85, 0.84, 0.84, 0.83, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81, 0.81, 0.81),
	('L', 1.29, 1.25, 1.21, 1.17, 1.12, 1.07, 1.02, 0.99, 0.96, 0.93, 0.91, 0.89, 0.88, 0.87, 0.86, 0.85, 0.84, 0.83, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81, 0.81, 0.81),
	('M', 1.33, 1.29, 1.25, 1.21, 1.14, 1.09, 1.04, 1.01, 0.97, 0.94, 0.92, 0.9, 0.89, 0.87, 0.86, 0.85, 0.84, 0.84, 0.83, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81, 0.81),
	('N', 1.37, 1.32, 1.28, 1.24, 1.17, 1.11, 1.06, 1.02, 0.98, 0.95, 0.93, 0.91, 0.89, 0.88, 0.87, 0.85, 0.85, 0.84, 0.83, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81, 0.81),
	('O', 1.41, 1.36, 1.32, 1.27, 1.2, 1.13, 1.08, 1.04, 1, 0.97, 0.94, 0.92, 0.9, 0.88, 0.87, 0.86, 0.85, 0.84, 0.84, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81, 0.81),
	('P', 1.45, 1.4, 1.35, 1.3, 1.22, 1.15, 1.1, 1.05, 1.01, 0.98, 0.95, 0.93, 0.91, 0.89, 0.87, 0.86, 0.85, 0.84, 0.84, 0.83, 0.83, 0.82, 0.82, 0.82, 0.81, 0.81);
/*!40000 ALTER TABLE `evolution azote residuel` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
