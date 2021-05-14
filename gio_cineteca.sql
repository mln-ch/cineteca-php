-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2020 at 08:33 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gio_cineteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `titolo_it` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `durata` int(3) NOT NULL,
  `genere_it` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trama_it` text COLLATE utf8_unicode_ci NOT NULL,
  `anno` int(4) NOT NULL,
  `copertina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registi` int(11) NOT NULL,
  `nazionalita_it` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `titolo_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genere_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trama_en` text COLLATE utf8_unicode_ci NOT NULL,
  `nazionalita_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `titolo_it`, `durata`, `genere_it`, `trama_it`, `anno`, `copertina`, `registi`, `nazionalita_it`, `titolo_en`, `genere_en`, `trama_en`, `nazionalita_en`) VALUES
(1, 'Pinocchio', 125, 'Avventura, Fantastico', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est \'laborum\'.', 2019, '', 4, '', '', '', '', ''),
(3, 'Hammamet', 126, 'Biografico', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2020, '', 5, '', '', '', '', ''),
(4, 'Joker', 123, 'drammatico', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2019, '', 7, '', '', '', '', ''),
(6, 'prova', 123, 'Corse', 'bla bla bla', 2019, 'paesaggio-small_1.jpg', 5, 'Italia', '', '', '', ''),
(7, 'prova2', 133, 'Drammatico', 'dsda', 2000, '', 5, 'Italia', '', '', '', ''),
(8, 'Pinocchio', 120, 'Commedia', 'bla bla bla', 2020, 'Pinocchio_Benigni.jpg', 4, 'Italia', 'Pinocchio', 'Commedy', 'bla bla bla ma in inglese', 'Italy');

-- --------------------------------------------------------

--
-- Table structure for table `registi`
--

CREATE TABLE `registi` (
  `id_registi` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cognome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nazionalita` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascita` date NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registi`
--

INSERT INTO `registi` (`id_registi`, `nome`, `cognome`, `nazionalita`, `data_nascita`, `bio`) VALUES
(4, 'Gianni', 'Amelio', 'Italiana', '1945-01-20', 'Etiam sit amet scelerisque ante. Cras nec molestie lacus. Donec consectetur nisi ut lacus lacinia sodales. Vestibulum et eros sit amet eros malesuada efficitur sed sit amet quam. Ut tincidunt interdum arcu, euismod pretium lacus mollis sed. In ultricies nisl a rutrum vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque ut nibh lorem. Aenean lacinia augue vitae eros volutpat mollis. Suspendisse eu nunc mi. Morbi enim nulla, posuere at ligula vel, pulvinar placerat orci.'),
(5, 'Matteo', 'Garrone', 'Italiana', '1968-10-15', 'Aenean vel porttitor sem, vitae cursus elit. Suspendisse urna ex, lobortis sed ligula a, euismod aliquet odio. Nulla et magna ornare, condimentum leo eu, egestas velit. Nulla porttitor dui odio, sit amet facilisis lacus maximus et. Pellentesque urna lectus, lobortis sed tempus vel, tincidunt sed felis. Quisque convallis tellus eget cursus dapibus. Interdum et malesuada fames ac ante ipsum primis in faucibus.'),
(7, 'Todd', 'Phillips', 'USA', '1970-12-20', 'Pellentesque volutpat urna in sapien sollicitudin auctor. Donec eget nulla malesuada, eleifend orci vel, ultrices sem. Mauris efficitur, nisi sit amet consequat facilisis, felis massa ullamcorper arcu, at elementum erat mi elementum nisi. Pellentesque a diam sed velit sodales tempus vel sit amet quam. Mauris porta nec dui vel finibus. Fusce lacinia laoreet nulla, in sollicitudin ipsum vulputate quis. Pellentesque faucibus interdum rhoncus. Praesent lobortis aliquam urna. Etiam nec sollicitudin metus. Mauris pulvinar non nisl eu consequat.');

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `id_utenti` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cognome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_iscrizione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bio` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utenti`
--

INSERT INTO `utenti` (`id_utenti`, `nome`, `cognome`, `email`, `username`, `password`, `data_iscrizione`, `bio`) VALUES
(4, 'Leonardo', 'Furlanis', 'a@b.c', 'fauno', 'demo', '2020-01-17 21:26:21', 'Etiam sit amet scelerisque ante. Cras nec molestie lacus. Donec consectetur nisi ut lacus lacinia sodales. Vestibulum et eros sit amet eros malesuada efficitur sed sit amet quam. Ut tincidunt interdum arcu, euismod pretium lacus mollis sed. In ultricies nisl a rutrum vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque ut nibh lorem. Aenean lacinia augue vitae eros volutpat mollis. Suspendisse eu nunc mi. Morbi enim nulla, posuere at ligula vel, pulvinar placerat orci.'),
(5, 'Melanie', 'Chies', 'la.mia@email.it', 'mel123', 'demo', '2020-01-23 20:18:46', 'Aenean vel porttitor sem, vitae cursus elit. Suspendisse urna ex, lobortis sed ligula a, euismod aliquet odio. Nulla et magna ornare, condimentum leo eu, egestas velit. Nulla porttitor dui odio, sit amet facilisis lacus maximus et. Pellentesque urna lectus, lobortis sed tempus vel, tincidunt sed felis. Quisque convallis tellus eget cursus dapibus. Interdum et malesuada fames ac ante ipsum primis in faucibus.'),
(6, 'Altro2', 'Utente', 'la.sua@email.com', 'altro_utente', 'demo', '2020-01-24 10:24:09', 'asdfghjkl'),
(8, 'Gianni', 'Burei', 'gburei@hotmail.com', 'gianni', 'fe01ce2a7fbac8fafaed7c982a04e229', '2020-01-30 16:20:08', 'demo'),
(9, 'Pippo', 'Pluto', 'pippo@pippo.it', 'pippo', '0c88028bf3aa6a6a143ed846f2be1ea4', '2020-01-30 18:58:09', 'dsadasdsadasdsa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indexes for table `registi`
--
ALTER TABLE `registi`
  ADD PRIMARY KEY (`id_registi`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id_utenti`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registi`
--
ALTER TABLE `registi`
  MODIFY `id_registi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id_utenti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
