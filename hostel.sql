-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Lip 2020, 16:51
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `action_log`
--

CREATE TABLE `action_log` (
  `id_log` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `log` varchar(512) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
(1, 'admin'),
(2, 'moderator'),
(3, 'user');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_no` int(4) NOT NULL,
  `price` double NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `added_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`, `price`, `description`, `image`, `added_time`) VALUES
(132, 5555, 55, 'pokój typu studio ', '', '2020-07-01 12:08:29'),
(133, 44, 44, 'pokój typu apartment', '', '2020-07-01 12:08:29'),
(134, 12, 100, 'pokój typu single', '', '2020-07-01 12:08:29');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `room_booking`
--

CREATE TABLE `room_booking` (
  `booking_id` int(11) NOT NULL,
  `chceck_in_date` date NOT NULL,
  `chceck_out_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `room_type`
--

CREATE TABLE `room_type` (
  `id_details` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `type` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `added_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `room_type`
--

INSERT INTO `room_type` (`id_details`, `room_id`, `type`, `added_time`, `author`) VALUES
(124, 132, 'single', '2020-06-29 17:51:10', 110),
(125, 133, 'apartament', '2020-06-29 17:51:37', 110),
(126, 134, 'single', '2020-06-30 05:44:35', 120);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`, `country`, `email`, `mobile`, `id_role`) VALUES
(109, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '', '', 'user@user.com', 0, 3),
(110, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 'admin@admin.com', 0, 1),
(120, 'moderator', '0408f3c997f309c03b08bf3a4bc7b730', 'moderator Krystian', 'Poland', 'moderator@wp.pl', 489574364, 2),
(123, 'php', '81dc9bdb52d04dc20036dbd8313ed055', 'Zenek Martyniuk', 'Afghanistan', 'wp@wp.pl', 12345, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_details`
--

CREATE TABLE `user_details` (
  `id_details` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `register_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user_details`
--

INSERT INTO `user_details` (`id_details`, `last_login`, `register_date`) VALUES
(109, '2020-07-03 09:04:12', '2020-06-10 10:59:25'),
(110, '2020-07-01 16:04:41', '2020-06-10 11:00:28'),
(120, '2020-07-01 21:50:48', '2020-06-30 07:31:00'),
(121, '0000-00-00 00:00:00', '2020-06-30 07:48:28'),
(122, '2020-06-30 08:37:23', '2020-06-30 08:37:02'),
(123, '2020-07-01 21:51:26', '2020-07-01 21:49:02');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `action_log`
--
ALTER TABLE `action_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeksy dla tabeli `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeksy dla tabeli `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `room_booking`
--
ALTER TABLE `room_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indeksy dla tabeli `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id_details`),
  ADD KEY `id_marker` (`room_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rola` (`id_role`) USING BTREE;

--
-- Indeksy dla tabeli `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id_details`),
  ADD KEY `id_details` (`id_details`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `action_log`
--
ALTER TABLE `action_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=939;

--
-- AUTO_INCREMENT dla tabeli `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT dla tabeli `room_booking`
--
ALTER TABLE `room_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT dla tabeli `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT dla tabeli `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `room_booking`
--
ALTER TABLE `room_booking`
  ADD CONSTRAINT `room_booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ograniczenia dla tabeli `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user_details` (`id_details`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
