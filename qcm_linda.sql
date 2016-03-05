SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `db322671_qcm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db322671_qcm`;


CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

INSERT INTO `personne` VALUES
(1, 'etudiant', 'etudiant', 'erat.eget@odiosagittis.ca', 'etudiant'),
(2, 'Anika', 'Anika', 'Aliquam.rutrum@senectus.edu', 'etudiant'),
(3, 'Duncan', 'FRC90EQW5DP', 'pretium.aliquet.metus@pretium.com', 'etudiant'),
(4, 'Uriel', 'HZU97FAI0MU', 'Aliquam.nec@tinciduntnibh.ca', 'professeur'),
(5, 'Hanae', 'ULS16VAL6HM', 'Aliquam.erat.volutpat@felisullamcorperviverra.co.uk', 'etudiant'),
(6, 'Leigh', 'AFR34GMB7RA', 'Proin@augueporttitorinterdum.ca', 'etudiant'),
(7, 'Xandra', 'OHM24ZVA9RG', 'nisl.elementum@egettinciduntdui.co.uk', 'etudiant'),
(8, 'Hadassah', 'JRJ78PBR7BO', 'consequat.nec@dolornonummyac.ca', 'professeur'),
(9, 'Kennedy', 'VDP38IXK3HW', 'mi.lorem.vehicula@maurissapiencursus.ca', 'etudiant'),
(10, 'Eliana', 'AFJ23FHM8EQ', 'tempor@dictum.edu', 'professeur'),
(11, 'Noelle', 'RRH34KCU4YR', 'nulla.magna.malesuada@Maurismolestiepharetra.edu', 'etudiant'),
(12, 'Lars', 'NVN79YSE2OI', 'mi@est.org', 'professeur'),
(14, 'Candace', 'Candace', 'quam@Suspendissecommodo.co.uk', 'professeur'),
(15, 'Kirsten', 'MPK62KLI3XQ', 'dapibus.rutrum.justo@Donecnibh.com', 'etudiant'),
(16, 'Fallon', 'QWV88CAH3DL', 'non.feugiat.nec@dictumeu.com', 'etudiant'),
(17, 'Yuli', 'Yuli', 'aliquet.diam.Sed@convalliserateget.net', 'etudiant'),
(18, 'Shafira', 'MJY69GGM3QA', 'non@etlacinia.ca', 'professeur'),
(19, 'prof', 'prof', 'ante.bibendum@at.net', 'professeur'),
(20, 'Whilemina', 'QJW05NVI0LE', 'risus@semvitaealiquam.net', 'etudiant');

CREATE TABLE IF NOT EXISTS `theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

INSERT INTO `theme` VALUES
(1, 'informatique'),
(2, 'communication'),
(7, 'test'),
(8, 'test'),
(9, 'mon_theme'),
(10, 'mon_theme');


CREATE TABLE IF NOT EXISTS `qcm` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `personne_id` int(11) NOT NULL,
  `date_limite` date DEFAULT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `personne_id` (`personne_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

INSERT INTO `qcm` VALUES
(12, 'Special Info', 19, '2016-01-30', 1),
(17, 'Qcm Info', 19, '2015-11-30', 0),
(22, 'Mon autre qcm', 19, '2015-11-30', 1),
(23, 'Qcm2', 19, '2015-11-30', 1),
(24, 'Divers', 19, '2015-11-30', 1);


CREATE TABLE IF NOT EXISTS `question_reponse` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `personne_id` int(11) DEFAULT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `question` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `reponse1` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `reponse2` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `reponse3` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `reponse4` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `solution` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auteur_id` (`personne_id`),
  KEY `theme_id` (`theme_id`),
  KEY `auteur_id_2` (`personne_id`),
  KEY `theme_id_2` (`theme_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

INSERT INTO `question_reponse` VALUES
(1, 19, 1, 'Quelle est l''OS le plus utilisé ?', 'Windows', 'Mandriva', 'Mac OS', 'Ubuntu', 'Windows'),
(2, 19, 1, 'Laquelle de ces réponses n''est pas un langage de programmation ?', 'HTML', 'PHP', 'JAVA', 'C++', 'HTML'),
(3, 18, 1, 'Trouvez l''intrus ', 'PhpStorm', 'Sublime Text', 'NotePad', 'Atom', '0'),
(4, 14, 2, 'Qu''est ce qu''un web-doc ?', 'Une nouvelle technologie', 'Un nouveau type de média', 'Un genre musical', 'Je ne sais pas', '0'),
(5, 14, 1, 'Quel est le langage que vous maîtrisez le mieux ?', 'JAVA', 'PHP', 'C++', 'Ruby', '0'),
(12, 18, 1, 'Quelle est votre OS ?', 'Linux', 'Windobe', 'Mac', 'Ubuntu', '0'),
(15, 19, 2, 'A quel événement allez vous assister cette année ? ', 'Agile tour', 'Salon de l''auto', 'TGS', 'Aucun', 'Agile tour'),
(19, 19, 1, 'Que permet l''héritage ?', 'Rien', 'De spécialiser ou généraliser', 'de valider des fonctions', 'Je ne sais pas', 'De spécialiser ou généraliser'),
(26, 19, 1, 'Quelle est la méthode agile la plus populaire ?', 'Scrum', 'Kaban', 'LESS', 'SpeedBoat', 'Scrum'),
(27, 19, 9, 'Quelle est la couleur du cheval blanc d''Henri IV ?', 'Noir', 'Rouge', 'Violet', 'Blanc', 'Blanc');

CREATE TABLE IF NOT EXISTS `qcms_question_reponses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qcm_id` int(11) unsigned NOT NULL,
  `question_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `qcm_id` (`qcm_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

INSERT INTO `qcms_question_reponses` VALUES
(4, 12, 12),
(5, 12, 2),
(17, 17, 15),
(18, 17, 26),
(28, 22, 1),
(29, 22, 2),
(30, 22, 3),
(31, 23, 15),
(32, 23, 19),
(33, 23, 26),
(34, 23, 27),
(35, 24, 1),
(36, 24, 2),
(37, 24, 3),
(38, 24, 4),
(39, 24, 5),
(40, 24, 12),
(41, 24, 15),
(42, 24, 19),
(43, 24, 26),
(44, 24, 27);


CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personne_id` int(11) NOT NULL,
  `qcm_id` int(11) unsigned NOT NULL,
  `resultat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `etudiant_id` (`personne_id`,`qcm_id`),
  KEY `qcm_id` (`qcm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

INSERT INTO `etudiant` VALUES
(3, 1, 17, 2),
(4, 1, 12, 0),
(5, 2, 22, 2),
(6, 2, 23, 3),
(7, 2, 24, 1),
(8, 17, 12, 1),
(10, 1, 23, 4);


ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_qcm` FOREIGN KEY (`qcm_id`) REFERENCES `qcm` (`id`),
  ADD CONSTRAINT `etudiant_personne` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`);

ALTER TABLE `qcm`
  ADD CONSTRAINT `personne_qcm` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`);

ALTER TABLE `qcms_question_reponses`
  ADD CONSTRAINT `reponse_qcm_question` FOREIGN KEY (`question_id`) REFERENCES `question_reponse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qcm_qcm_question` FOREIGN KEY (`qcm_id`) REFERENCES `qcm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `question_reponse`
  ADD CONSTRAINT `personne_question` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `theme_question` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
