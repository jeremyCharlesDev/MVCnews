-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 10, 2020 at 10:37 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, ' Actualité ', ' Actualité '),
(2, 'Locales', 'Locales'),
(3, 'Sport', 'Sport'),
(4, 'Economie', 'Economie'),
(5, 'Planète', 'Planète'),
(6, 'High-Tech', 'High-Tech'),
(7, 'By the Web', 'By the Web');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `photo`, `category`) VALUES
(26, 'CES de Las Vegas 2020', 'Sony dévoile sa première voiture baptisée Vision-S', 'undefined.jpg', 6),
(27, 'Invention', 'Des enceintes modernes dans de vieilles radios vintage', 'mac.jpg', 6),
(28, 'NBA : le plus gros dunk ?', 'Notre plus grand regret dans cette histoire, c’est que George Eddy ne commente plus la NBA. Qu’est-ce qu’on aurait aimé l’entendre s’exclamer sur ce dunk surnaturel de Sekou Doumbouya cette nuit avec son accent légendaire. « Il aurait fait une syncope, y aurait descente d’organes », se marre Bastien du site spécialisé dans la balle orange, Trash-Talk. Dans le doute, on a essayé d’appeler le grand George, mais répondeur jusque-là. On vous tient au courant.\r\n\r\nNon parce qu’il faut un peu prendre la mesure du bazar. Le dunk, tomar, poster – appelez-le comme vous voulez – de Doumbouya est un grand moment de l’année en NBA, et peut-être même de l’histoire du sport français. Rien que ça ? « J’ai le souvenir d’un gros de Nico Batum à l’époque à Portland, Joakim Noah a dû en envoyer un ou deux, Rudy Gobert aussi, mais c’est peut-être le plus gros dunk de l’histoire d’un Français en NBA, je me pose la question », rigole Bastien.\r\n\r\nCe qui est sûr, c’est que des athlètes capables de faire ça, « tentaculaires, grands, costauds et capables de tout faire », on en a rarement (jamais ?) vu dans le basket français. Bastien « zonait » devant la télé vers 1h30 du mat\' quand Doumbouya s’est envolé. « J’étais très choqué parce que l’athlète, je voyais très bien ce dont il était capable, on le voit souvent à l’échauffement faire ce genre de choses, mais là où je ne l’attendais pas c’est qu’il n’a pas ce côté agressif. Et le voir \"grimper\" sur quelqu’un à 19 ans, le toiser du regard ensuite quand il est au sol… »\r\n\r\nDoomsday ?\r\nAprès l’action, Doumbouya est resté calme face aux micros. « Je suis resté sérieux. Je ne réagis pas. Je ne crie pas. J’étais juste concentré sur ce que j’avais à faire. » Presque tout pareil que Trash-Talk, qui a titré très sobrement son article sur le sujet : « Sekou Doumbouya a assassiné Tristan Thompson : poster monstrueux du Frenchie, attention la violence est extrême ! ». En plus, Tristan Thompson, ce n’est pas n’importe qui en NBA. Champion avec les Cavs, mec de Khloé Kardashian… Bref, ça donne à cette action un petit côté légendaire qui devrait aider le jeune Français, formé à Poitiers, à se faire un nom en NBA. Même si toutes les franchises connaissaient déjà son potentiel. « Elles sont toutes venues le voir, et même plusieurs fois pour certaines, nous confiait en juin l’assistant coach du CSP Limoges, Benjamin Villeger. A ma connaissance, il y a eu au moins quatre ou cinq general managers (numéros 2 des équipes NBA) de franchises très fortes qui sont venus jusqu’à Limoges. Et quand ces gens-là se déplacent, c’est bien qu’ils ont une idée derrière… » Finalement drafté à la 15e position l\'été dernier, Doumbouya commence à peine à se faire sa place dans l’effectif des Pistons.\r\n\r\nBastien confirme : « Pour lui, c’est un bel alignement des planètes : il y a beaucoup de blessés à Detroit et le coach a décidé de donner leur chance aux jeunes. A 19 ans, certains passent leur partiel, et lui il défend sur LeBron James. Certes, il fait des erreurs, c’est un gamin, mais il a désormais sa place assurée dans le cinq majeur des Pistons jusqu’à la fin de la saison. Il va faire sa place et s’il continue à performer comme il le fait, il peut la garder l’an prochain. Et ce genre de dunk, ça aide au niveau du public, de la vente de maillots aussi. Il y a un concours pour lui trouver un surnom, c’est Doomsday (un jeu de mot sur son nom et un film post-apocalyptique) qui est en tête. Tout ça participe à la notoriété… ».\r\n\r\nDe là à lui assurer une place au dunk contest, où jamais aucun Frenchy n’a mis les pieds ? Bastien n’y croit pas trop, encore. « L’échantillon de dunks n’est pas assez important ». Tu sais ce qu’il te reste à faire, Sekou.', 'nba.jpg', 3),
(29, 'Tensions Iran-USA', 'Coup de com et main tendue… Donald Trump joue l’apaisement face à la menace d’une escalade', '1.jpg', 1),
(30, 'Lille', 'Les voitures devront rester derrière les cyclistes', '2.jpg', 2),
(31, 'Grève à la SNCF', 'Le taux de grévistes augmente légèrement', 'mac.jpg', 4),
(32, 'Climat', '2019 a été la deuxième année la plus chaude de l’histoire', '1.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` int(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'admin', 1234, 'jeremy', 'charles'),
(3, 'Jeremy', 1234, 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_category` (`category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_category` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
