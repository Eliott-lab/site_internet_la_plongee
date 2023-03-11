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

-- Export de la structure de la table palier. azote residuel
CREATE TABLE IF NOT EXISTS `azote residuel` (
  `azote residuel` float DEFAULT NULL,
  `12` int(11) DEFAULT NULL,
  `15` int(11) DEFAULT NULL,
  `18` int(11) DEFAULT NULL,
  `20` int(11) DEFAULT NULL,
  `22` int(11) DEFAULT NULL,
  `25` int(11) DEFAULT NULL,
  `28` int(11) DEFAULT NULL,
  `30` int(11) DEFAULT NULL,
  `32` int(11) DEFAULT NULL,
  `35` int(11) DEFAULT NULL,
  `38` int(11) DEFAULT NULL,
  `40` int(11) DEFAULT NULL,
  `42` int(11) DEFAULT NULL,
  `45` int(11) DEFAULT NULL,
  `48` int(11) DEFAULT NULL,
  `50` int(11) DEFAULT NULL,
  `52` int(11) DEFAULT NULL,
  `55` int(11) DEFAULT NULL,
  `58` int(11) DEFAULT NULL,
  `60` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Export de données de la table palier.azote residuel : 18 rows
DELETE FROM `azote residuel`;
/*!40000 ALTER TABLE `azote residuel` DISABLE KEYS */;
INSERT INTO `azote residuel` (`azote residuel`, `12`, `15`, `18`, `20`, `22`, `25`, `28`, `30`, `32`, `35`, `38`, `40`, `42`, `45`, `48`, `50`, `52`, `55`, `58`, `60`) VALUES
	(0.82, 4, 3, 2, 2, 2, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
	(0.84, 7, 6, 5, 4, 4, 3, 3, 3, 3, 2, 2, 2, 2, 2, 2, 2, 2, 2, 1, 1),
	(0.86, 11, 9, 7, 7, 6, 5, 5, 4, 4, 4, 3, 3, 3, 3, 3, 3, 3, 2, 2, 2),
	(0.89, 17, 13, 11, 10, 9, 8, 7, 7, 6, 6, 5, 5, 5, 4, 4, 4, 4, 4, 3, 3),
	(0.92, 23, 18, 15, 13, 12, 11, 10, 9, 8, 8, 7, 7, 6, 6, 5, 5, 5, 5, 5, 4),
	(0.95, 29, 23, 19, 17, 15, 13, 12, 11, 10, 10, 9, 8, 8, 7, 7, 7, 6, 6, 6, 5),
	(0.99, 38, 30, 24, 22, 20, 17, 15, 14, 13, 12, 11, 11, 10, 9, 9, 8, 8, 8, 7, 7),
	(1.03, 47, 37, 30, 27, 24, 21, 19, 17, 16, 15, 14, 13, 12, 11, 11, 10, 10, 9, 9, 9),
	(1.07, 57, 44, 36, 32, 29, 25, 22, 21, 19, 18, 16, 15, 15, 13, 13, 12, 12, 11, 10, 10),
	(1.11, 68, 52, 42, 37, 34, 29, 26, 24, 22, 20, 19, 18, 17, 16, 15, 14, 13, 13, 12, 12),
	(1.16, 81, 62, 50, 44, 40, 34, 30, 28, 26, 24, 22, 21, 20, 18, 17, 16, 16, 15, 14, 13),
	(1.2, 93, 70, 56, 50, 45, 39, 34, 32, 29, 27, 24, 23, 22, 20, 19, 18, 18, 17, 16, 15),
	(1.24, 106, 79, 63, 56, 50, 43, 38, 35, 33, 30, 27, 26, 24, 23, 21, 20, 19, 18, 17, 17),
	(1.29, 124, 91, 72, 63, 56, 49, 43, 40, 37, 33, 30, 29, 27, 25, 24, 23, 22, 20, 19, 19),
	(1.33, 139, 101, 79, 70, 62, 53, 47, 43, 40, 36, 33, 31, 30, 28, 26, 25, 24, 22, 21, 20),
	(1.38, 160, 114, 89, 78, 69, 59, 52, 48, 44, 40, 37, 35, 33, 30, 28, 27, 26, 24, 23, 22),
	(1.42, 180, 126, 97, 85, 75, 64, 56, 52, 48, 43, 39, 37, 35, 33, 30, 29, 28, 26, 25, 24),
	(1.45, 196, 135, 104, 90, 80, 68, 59, 55, 51, 46, 42, 39, 37, 34, 32, 31, 29, 28, 26, 25);
/*!40000 ALTER TABLE `azote residuel` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
