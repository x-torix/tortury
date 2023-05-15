-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Maj 2023, 14:10
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `filename` char(96) NOT NULL,
  `title` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `remove` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `cms`
--

INSERT INTO `cms` (`id`, `timestamp`, `filename`, `getTitle`, `user_id`, `remove`) VALUES
(1, '2023-03-15 14:53:53', 'img/7306731e1da903b5c64f5e2a8c41a6143b33d4b73aaa358aef7de0a33ed84396.webp', 'adad', 1, 0),
(2, '2023-03-15 15:36:48', 'img/0223d1e210a4f1ebbaf395b933b6ae7c6eb7c8e76301932ae5d266a3c46e4566.webp', 'XDDDD', 1, 0),
(3, '2023-03-22 13:53:55', 'img/170471f330fde442d0170df2b8f3c705a0d96cd07e0c9fa80578f7949a45032d.webp', 'piękne', 1, 0),
(4, '2023-03-22 14:02:57', 'img/5ccadeb5c994f31ecaeca4e225ee374ed74125c48e9264aa72f21fa517a715e1.webp', 'piękne', 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'jan@kowalski.com.pl', '$argon2i$v=19$m=65536,t=4,p=1$bC81UC9EWlc5RnhsYldscg$hr1oZDMd5K6rbzYw4UsO4ldbYwLf/J6TuKxHGkRWdbY'),
(2, 'jan@kowalski.com.pl', '$argon2i$v=19$m=65536,t=4,p=1$UWpYM0VqTUlkaHEuTEhmQw$lXgkBumASYn6kUoKZ8oYB3V1MSs72s0rTgz6nhbhjxM'),
(3, 'jan@kowalski.com.pl', '$argon2i$v=19$m=65536,t=4,p=1$ZkVoSXFIVDVJSGRoNmczQg$+mi+DyUuIlPd0iCxBoyoDa6brw0b0z/fkxhtC9oUx1w'),
(4, 'test@test.pl', '$argon2i$v=19$m=65536,t=4,p=1$NU40WElmaUlhQXRUMWwxRA$HwY9tYLjBBcyFYMgYmVpqZLRNELyr+QBCySk8wqAuxg'),
(5, 'test@test.pl', '$argon2i$v=19$m=65536,t=4,p=1$T213QUh5SW1RSzV4RzJ3cQ$ErHgu7qHGv9yIs1kcYDipPZsDhzHM3cmWuccNhkGMIk'),
(6, 'test@test.wp.pl', '$argon2i$v=19$m=65536,t=4,p=1$UDk5OFhZNFVERGM1S0hPRQ$adsbXzXwOZ8pv1gDho2baaD4WvhEny/nqZHbstHDZ/U'),
(7, 'jan@kowalski.com.pl', '$argon2i$v=19$m=65536,t=4,p=1$eFhjQ0dkL2hETS9QZjZPSg$3vsNsHJpZyFFNsJ+BjiSlDQuRAtTICUiIZkPW1Cc1Lk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
