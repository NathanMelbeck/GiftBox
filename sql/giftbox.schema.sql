-- Adminer 4.8.1 MySQL 5.5.5-10.3.11-MariaDB-1:10.3.11+maria~bionic dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `box`;
CREATE TABLE `box` (
                       `id` varchar(128) NOT NULL,
                       `token` varchar(64) NOT NULL,
                       `libelle` varchar(128) NOT NULL,
                       `description` text NOT NULL,
                       `montant` decimal(12,2) NOT NULL DEFAULT 0.00,
                       `kdo` tinyint(4) NOT NULL DEFAULT 0,
                       `message_kdo` text NOT NULL DEFAULT '',
                       `statut` int(11) NOT NULL DEFAULT 1,
                       `modele` int(1) NOT NULL DEFAULT 1,
                       `email` varchar(256) NOT NULL,
                       `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
                       `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `box2presta`;
CREATE TABLE `box2presta` (
                              `box_id` varchar(128) NOT NULL,
                              `presta_id` varchar(128) NOT NULL,
                              `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
                             `id` int(11) NOT NULL AUTO_INCREMENT,
                             `libelle` varchar(128) NOT NULL,
                             `description` text DEFAULT NULL,
                             PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `prestation`;
CREATE TABLE `prestation` (
                              `id` varchar(128) NOT NULL,
                              `libelle` varchar(128) NOT NULL,
                              `description` text NOT NULL,
                              `url` varchar(256) DEFAULT NULL,
                              `unite` varchar(128) DEFAULT NULL,
                              `tarif` decimal(10,2) NOT NULL,
                              `img` varchar(128) NOT NULL,
                              `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
                        `login` varchar(20) NOT NULL,
                        `passwd` varchar(256) NOT NULL,
                        `email` varchar(256) NOT NULL,
                        `nomUser` varchar(20) DEFAULT NULL,
                        `prenomUser` varchar(20) DEFAULT NULL,
                        `tel` varchar(20) DEFAULT NULL,
                        `token` varchar(50) DEFAULT NULL,
                        `privilege` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2023-04-07 14:49:49
