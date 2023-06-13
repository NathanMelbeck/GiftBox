-- Adminer 4.8.1 MySQL 5.5.5-10.3.11-MariaDB-1:10.3.11+maria~bionic dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

INSERT INTO `user` (`login`, `passwd`, `email`, `privilege`) VALUES ('admin', 'admin', 'admin@gmail.com', 1);

INSERT INTO `box` (`id`, `token`, `libelle`, `description`, `montant`, `kdo`, `message_kdo`, `statut`, `created_at`, `updated_at`) VALUES
('360bb4cc-e092-3f00-9eae-774053730cb2',	null,	'2 jours à Nancy',	'Passer deux magnifiques jour à Nancy, afin de visité la ville. Cette box offre une superbe visité guidée afin de découvrir la plus belle place européenne. Découvrer une exposition
éphémère et enfin avec la possibilité de dormir dans un des plus beaux hotel de Nancy à seulement quelques pas de la place Stanislas le tout accompagné de cocktail',	200,	0,	null,	1,	'2023-04-07 14:27:32',	'2023-04-07 14:27:32'),
('360bb4cc-3f00-9eae-e092-774053730cb2',	null,	'Anniversaire',	'Parfait pour organiser un anniversaire inoubliable pour votre enfant ou pour un adulte. Tous les invités recoivent un cadeaux au planête laser accompagné d un animateur qui va animé en fonction du thême que vous choissisez ! prix minimun à 40€ pour une personne, rajouter 10€ par personne',	40,	0,	null,	1,	'2023-04-07 14:27:32',	'2023-04-07 14:27:32'),
('360bb4cc-3f00-9eae-e092-884053730cb2',	null,	'Théatral !',	'Cette box est parfait pour découvrir les joies du théatre et de la musique au coeur de la ville de Nancy, Le but de cette box est de vous faire passer une après-midi incroyable suivie d une soirée à l opéra inoubliable !',	100,	0,	null,	1,	'2023-04-07 14:27:32',	'2023-04-07 14:27:32');

INSERT INTO `box2presta` (`box_id`, `presta_id`, `quantite`) VALUES
('360bb4cc-e092-3f00-9eae-774053730cb2', '38888d1e-d408-4e01-a0e6-05a966e348ea', 1),
('360bb4cc-e092-3f00-9eae-774053730cb2', 'b8559a26-74e1-47e6-8028-aa6ded071d86', 1),
('360bb4cc-e092-3f00-9eae-774053730cb2', '63cdce06-cd63-4fbe-9695-885d3cb64c7b', 1),
('360bb4cc-e092-3f00-9eae-774053730cb2', 'f60320cb-68d2-48b3-b5a2-a6d67ce0cb23', 2),
('360bb4cc-e092-3f00-9eae-774053730cb2', 'faa3b035-4d22-4a13-a1a7-3b6e19883bd7', 1),
('360bb4cc-3f00-9eae-e092-774053730cb2', '773ea293-a779-4047-ae52-af2edac531ff', 1),
('360bb4cc-3f00-9eae-e092-774053730cb2', 'e8785174-b670-4c8b-ba0a-b779aa69b4c1', 1),
('360bb4cc-3f00-9eae-e092-774053730cb2', 'af272cf7-6e6b-4978-9e9d-8c40e989bf6c', 1),
('360bb4cc-3f00-9eae-e092-774053730cb2', 'f60320cb-68d2-48b3-b5a2-a6d67ce0cb23', 2),
('360bb4cc-3f00-9eae-e092-884053730cb2', '4cca8b8e-0244-499b-8247-d217a4bc542d', 2),
('360bb4cc-3f00-9eae-e092-884053730cb2', 'b15503a1-9694-485d-a336-874860a3b664', 1),
('360bb4cc-3f00-9eae-e092-884053730cb2', '14872d96-97d6-4a9f-8a28-463886fea622', 1),
('360bb4cc-3f00-9eae-e092-884053730cb2', 'b8559a26-74e1-47e6-8028-aa6ded071d86', 1),
('360bb4cc-3f00-9eae-e092-884053730cb2', '95a72f23-2ee7-4cbe-98d0-3d372102fcae', 1);



INSERT INTO `categorie` (`id`, `libelle`, `description`) VALUES
(1,	'restauration',	'restaurant, en cas, sur le pouce, livré ... toutes les façons de manger.'),
(2,	'hébergement',	'hôtel, chambre d\'hôte, cabane dans les bois, appart\'hotel, ...'),
(3,	'attention',	'les petits plus qui font la différence : fleurs, chocolats, souvenirs'),
(4,	'activité',	'culture, sport, bien être, détente, visite ... toutes les activités sont là.');

INSERT INTO `prestation` (`id`, `libelle`, `description`, `url`, `unite`, `tarif`, `img`, `cat_id`) VALUES
('4cca8b8e-0244-499b-8247-d217a4bc542d',	'Champagne',	'Bouteille de champagne + flutes + jeux à gratter',	NULL,	'1 bouteille, 4 flutes, 4 jeux',	20.00,	'champagne.jpg',	3),
('14872d96-97d6-4a9f-8a28-463886fea622',	'Musique',	'Partitions de piano à 4 mains',	NULL,	'2 partitions',	25.00,	'musique.jpg',	3),
('63cdce06-cd63-4fbe-9695-885d3cb64c7b',	'Exposition',	'Visite guidée de l’exposition ‘REGARDER’ à la galerie Poirel',	NULL,	'visite pour 1 personne',	14.00,	'poirelregarder.jpg',	4),
('74af082e-4ed4-4c63-9fd3-602a5349c442',	'Goûter',	'Goûter au FIFNL',	NULL,	'gouter pour 1 personne',	20.00,	'gouter.jpg',	1),
('b15503a1-9694-485d-a336-874860a3b664',	'Projection',	'Projection courts-métrages au FIFNL',	NULL,	'1 entree categorie A',	10.00,	'film.jpg',	3),
('a277c67f-eb06-40a3-bc06-0d067159e886',	'Bouquet',	'Bouquet de roses et Mots de Marion Renaud',	NULL,	NULL,	16.00,	'rose.jpg',	3),
('8854b992-aa48-4ef7-9048-2d92a8f1a1bb',	'Diner Stanislas',	'Diner à La Table du Bon Roi Stanislas (Apéritif /Entrée / Plat / Vin / Dessert / Café / Digestif)',	NULL,	NULL,	60.00,	'bonroi.jpg',	1),
('991fef91-944d-4993-bbde-ee9a74fe2f36',	'Origami',	'Baguettes magiques en Origami en buvant un thé',	NULL,	NULL,	12.00,	'origami.jpg',	4),
('01d57b87-8c0f-4ef1-8ce5-b6b82d4a8ec5',	'Livres',	'Livre bricolage avec petits-enfants + Roman',	NULL,	NULL,	24.00,	'bricolage.jpg',	3),
('95a72f23-2ee7-4cbe-98d0-3d372102fcae',	'Diner  Grand Rue ',	'Diner au Grand’Ru(e) (Apéritif / Entrée / Plat / Vin / Dessert / Café)',	NULL,	NULL,	59.00,	'grandrue.jpg',	1),
('faa3b035-4d22-4a13-a1a7-3b6e19883bd7',	'Visite guidée',	'Visite guidée personnalisée de Saint-Epvre jusqu’à Stanislas',	NULL,	NULL,	11.00,	'place.jpg',	4),
('a5cecbd8-d64f-4146-8770-2fa3d63edbf3',	'Bijoux',	'Bijoux de manteau + Sous-verre pochette de disque + Lait après-soleil',	NULL,	NULL,	29.00,	'bijoux.jpg',	3),
('b8559a26-74e1-47e6-8028-aa6ded071d86',	'Opéra',	'Concert commenté à l’Opéra',	NULL,	NULL,	15.00,	'opera.jpg',	4),
('17834c03-5aab-41ab-85c1-05e12290b1d0',	'Thé Hotel de la reine',	'Thé de debriefing au bar de l’Hotel de la reine',	NULL,	NULL,	5.00,	'hotelreine.gif',	1),
('3508f806-45ec-4092-9546-4bcdd26533c0',	'Jeu connaissance',	'Jeu pour faire connaissance',	NULL,	NULL,	6.00,	'connaissance.jpg',	4),
('1fde0834-f834-49ea-89ba-26c7695a04e0',	'Diner',	'Diner (Apéritif / Plat / Vin / Dessert / Café)',	NULL,	NULL,	40.00,	'diner.jpg',	1),
('773ea293-a779-4047-ae52-af2edac531ff',	'Cadeaux individuels',	'Cadeaux individuels sur le thème de la soirée',	NULL,	NULL,	13.00,	'cadeaux.jpg',	3),
('af272cf7-6e6b-4978-9e9d-8c40e989bf6c',	'Animation',	'Activité animée par un intervenant extérieur',	NULL,	NULL,	9.00,	'animateur.jpg',	4),
('85ec08bf-ebbf-4d4c-bf7f-a9280817ce51',	'Jeu contacts',	'Jeu pour échange de contacts',	NULL,	NULL,	5.00,	'contact.png',	4),
('f60320cb-68d2-48b3-b5a2-a6d67ce0cb23',	'Cocktail',	'Cocktail de fin de soirée',	NULL,	NULL,	12.00,	'cocktail.jpg',	1),
('162c527f-1e2f-4d91-ac84-3311a2085c09',	'Star Wars',	'Star Wars - Le Réveil de la Force. Séance cinéma 3D',	NULL,	NULL,	12.00,	'starwars.jpg',	4),
('badf0dcb-5a93-4ed7-9eb1-feeb46020617',	'Concert',	'Un concert à Nancy',	NULL,	NULL,	17.00,	'concert.jpg',	4),
('14c4c6d1-d4a4-408a-acd7-a130b5e529da',	'Appart Hotel',	'Appart’hôtel Coeur de Ville, en plein centre-ville',	NULL,	NULL,	56.00,	'apparthotel.jpg',	2),
('38888d1e-d408-4e01-a0e6-05a966e348ea',	'Hôtel d\'Haussonville',	'Hôtel d\'Haussonville, au coeur de la Vieille ville à deux pas de la place Stanislas',	NULL,	NULL,	169.00,	'hotel_haussonville_logo.jpg',	2),
('0abe4736-88ca-457a-b58f-a8234569b5fe',	'Boite de nuit',	'Discothèque, Boîte tendance avec des soirées à thème & DJ invités',	NULL,	NULL,	32.00,	'boitedenuit.jpg',	4),
('e8785174-b670-4c8b-ba0a-b779aa69b4c1',	'Planètes Laser',	'Laser game : Gilet électronique et pistolet laser comme matériel, vous voilà équipé.',	NULL,	NULL,	15.00,	'laser.jpg',	4),
('6ad840b8-62df-49fe-8220-0b840f8c3d9e',	'Fort Aventure',	'Découvrez Fort Aventure à Bainville-sur-Madon, un site Accropierre unique en Lorraine ! Des Parcours Acrobatiques pour petits et grands, Jeu Mission Aventure, Crypte de Crapahute, Tyrolienne, Saut à l\'élastique inversé, Toboggan géant... et bien plus encore.',	NULL,	NULL,	25.00,	'fort.jpg',	4);

-- 2023-04-07 14:50:24
