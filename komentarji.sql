-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Gostitelj: localhost
-- Čas nastanka: 31. maj 2024 ob 20.51
-- Različica strežnika: 5.7.11
-- Različica PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `komentarji`
--

-- --------------------------------------------------------

--
-- Struktura tabele `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `customers`
--

INSERT INTO `customers` (`id`, `name`) VALUES
(1, 'Marko Novak'),
(2, 'Nino Horvat'),
(3, 'Branko Slivnik'),
(4, 'Rok Novak');

-- --------------------------------------------------------

--
-- Struktura tabele `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `images`
--

INSERT INTO `images` (`id`, `path`, `filename`) VALUES
(1, 'assets/images/', 'oseba1.png'),
(2, 'assets/images/', 'oseba2.png'),
(3, 'assets/images/', 'oseba3.png');

-- --------------------------------------------------------

--
-- Struktura tabele `statements`
--

CREATE TABLE `statements` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `statement` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `statements`
--

INSERT INTO `statements` (`id`, `customer_id`, `image_id`, `date`, `statement`) VALUES
(1, 1, 1, '2024-04-01', 'Fantastičen klub'),
(2, 2, 2, '2024-03-01', 'Odlična organizacija'),
(3, 3, 3, '2024-04-15', 'Super družba'),
(4, 4, 2, '2024-04-02', 'Kvalitetno preživet prosti čas');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `statements`
--
ALTER TABLE `statements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `image_id` (`image_id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT tabele `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT tabele `statements`
--
ALTER TABLE `statements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `statements`
--
ALTER TABLE `statements`
  ADD CONSTRAINT `statements_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `statements_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
