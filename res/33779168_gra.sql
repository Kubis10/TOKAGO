-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Lis 2020, 08:52
-- Wersja serwera: 10.4.10-MariaDB
-- Wersja PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gra`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `text` varchar(2000) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rank`
--

CREATE TABLE `rank` (
  `id_gracza` int(11) NOT NULL,
  `l1` float NOT NULL,
  `l2` float NOT NULL,
  `l3` float NOT NULL,
  `l4` float NOT NULL,
  `l5` float NOT NULL,
  `l6` float NOT NULL,
  `l7` float NOT NULL,
  `l8` float NOT NULL,
  `l9` float NOT NULL,
  `l10` float NOT NULL,
  `l11` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `rank`
--

INSERT INTO `rank` (`id_gracza`, `l1`, `l2`, `l3`, `l4`, `l5`, `l6`, `l7`, `l8`, `l9`, `l10`, `l11`) VALUES
(1, 12.07, 12.37, 14.37, 49.94, 52.34, 22.35, 20.85, 26, 36.82, 35.33, 38.73),
(15, 14.94, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 27.91, 65.02, 77.86, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 18.17, 30.41, 25.87, 71.49, 66.45, 28, 21.59, 0, 0, 0, 0),
(19, 10.75, 12.2, 14.43, 52.83, 61.67, 22.39, 23.64, 25.55, 52.83, 37.54, 41.71),
(20, 9.92, 9.53, 12.08, 50.02, 49.1, 16.83, 16.19, 18.04, 25.01, 26.48, 32.45),
(27, 18.47, 78.79, 42.24, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 15.63, 28.31, 32.06, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 35.88, 55.89, 39.46, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 33.19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 20.77, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 14.7, 16.46, 18.8, 58.94, 64.25, 28.23, 23.49, 42.58, 43.05, 0, 0),
(34, 30.28, 24.35, 17.89, 39.99, 58.7, 20.08, 14.32, 42.9, 24.44, 0, 0),
(35, 20.98, 67.85, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `lvl` int(11) NOT NULL,
  `vip` datetime NOT NULL DEFAULT current_timestamp(),
  `hash` varchar(2000) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `lvl`, `vip`, `hash`) VALUES
(1, 'Kubis10', '$2y$10$6Bb.lmYgZ8V.cGkkBXhCcuzmCCaLlW97iPMbNFwOFKNlorHdnPzES', 'kuba.kubis@interia.pl', 3, '2020-11-18 17:33:07', ''),
(2, 'jacek', '$2y$10$520GfTiKYdom8bBmFmnhc.dlePjIzHGyBGK7eX4xQe2eP9jo/ge.e', 'jacek@omega.pl', 1, '2020-11-18 20:58:22', ''),
(15, 'Pawel', '$2y$10$6/1GtpnJjyiOkxYdaFxdnOq88Jwtb1BqJL4SJ3YpRFSfuKvoJkAH6', 'pawcio.fapcio2@gmail.com', 2, '2020-11-25 19:42:15', ''),
(16, 'Kuba', '$2y$10$1lKoUo2gbsuBOO5EOoiHtegZlZa2un8YyF9jTN9Cat4ZsGVWbA9Zq', 'Kubozo27@interia.pl', 1, '2020-11-25 20:15:32', ''),
(17, 'Ueloo', '$2y$10$5bSeaOJLYVwojrDq6dhqyeqUJj19i1Ys/.CaxIE4XEXTrrzfhxAtm', 'Jmiczek2005@gmail.com', 4, '2020-11-25 23:33:14', ''),
(18, 'Callum', '$2y$10$9C7CcnRpxiNieAbfbvR0v.Jc.LoYZuf/1tANwKFj/asn1DxFcNyhm', 'adrian.goral@gmail.com', 1, '2020-11-26 17:54:37', 'c2cd03b4-cde7-4708-80db-31a07b7e5efe'),
(19, 'cebyiul', '$2y$10$/Qx9OYqcCt/ENDEFZR3ADu6Bj7fqtN9dBMySYJElKGe8klzJAVypy', 'kuba.cybulski@puszkun.eu', 9, '2020-11-26 19:25:31', ''),
(20, 'GIGADYNIA', '$2y$10$0yXKhwXJUyHJy0HE8hbIY.2R7rMoZd9CSDCD5bKoyekXw8g1N8PyW', 'franciszeksuchora@gmail.com', 4, '2020-11-26 19:26:03', ''),
(21, 'PATTAL', '$2y$10$7n9H/noEtlyW2TjG2cXDouz4uLsJP8wlKdrnd4nD3RyAtfRLsuXCS', 'zikubaak@gmail.com', 1, '2020-11-26 20:18:22', ''),
(22, 'dzulia', '$2y$10$l8tZwaaufjQRAVeaqKhzfORVnfsjDjbhN1cGbOjo52q0hZhu5oDyK', 'wiktoria.wa2005.jw@gmail.com', 1, '2020-11-26 20:59:22', ''),
(23, 'mewa', '$2y$10$0d4hVDn4wG0KqdrfopLKc.B3b2tiS8.NNnB1EtT.F7v0jhKnBI3G2', 'ewasanocka3@gmail.com', 1, '2020-11-26 21:01:30', ''),
(24, 'mewcia', '$2y$10$Z0Pa9AvrHHrZFdktnKjik.IL53BC2JFGskp2eZwaoz5DtFpapuIQK', 'anejekotleta@obiad.com', 1, '2020-11-26 21:03:57', ''),
(25, 'm3wcia', '$2y$10$qHFOjFC/wCknybMzgaq5guNHPDsduhfYoAli51ytCFx2FPurzgsmC', 'okej@gmail.com', 1, '2020-11-26 21:05:54', ''),
(26, 'olaola', '$2y$10$TTXZt.Mbg9Ibevk9StxyROE6pqBZNcBi41Leelqy6f83zuOI8nPqW', 'anetajekotleta@gmail.com', 1, '2020-11-26 21:09:13', ''),
(27, 'Gracek', '$2y$10$24IVExUVwueJFlURo3UKIO9ZaNaFPlfn8q4GurywJb7BmXExnEkvq', 'antonowiczcz@gmail.com', 4, '2020-11-26 21:21:01', ''),
(28, 'IwkoSmok', '$2y$10$VF0NlMzS9BLWAAgytbkzfe6TZ7uP8SYI2iaaIILaadPfnwqq9MtWa', 'albertpieczara@wp.pl', 1, '2020-11-28 21:01:45', ''),
(29, 'Dixelek', '$2y$10$pP6ayFVC5vDYwyCV6g3TjOeFwLwVutTnykfr2m3ZpnPaOz/V8Jgue', 'drkrawcik@gmail.com', 4, '2020-11-29 00:09:45', ''),
(30, 'furtive', '$2y$10$6vWX34pmRG2kfMiLHDoKgeUEtiKoUbLJp5BoOdt4TfLIA9HzkHlzm', 'furtiveplanet@gmail.com', 4, '2020-11-29 00:13:22', ''),
(31, 'xband', '$2y$10$j1XUvcmoH3iEClJOhW.DEuhb6ahko8sbQAzrDlnxpjA5FHHsntE/a', 'janwirkus2004@gmail.com', 2, '2020-11-29 00:14:21', ''),
(32, 'Jaifurtive', '$2y$10$R/GU6T/POuRxgw3DTodkz..h8ACBB6tbjtT6d2bJzksrd1FDZlwq.', 'tomeklipowski000@gmail.com', 2, '2020-11-29 00:19:31', ''),
(33, 'Kozak', '$2y$10$N.3zLjoP/Fj/i9kr2LydAuqMGBpGEgQjJ5XgXXr.ZwlEPRXzkANXm', 'martyneq.1@wp.pl', 4, '2020-11-29 02:51:13', ''),
(34, 'Hajdunia', '$2y$10$4tiK7JyVculVPHf.4xttjuZr9iaDCV24U3N28reY1UOd4MzZDYXLK', 'julcia.hajduk@gmail.com', 10, '2020-11-29 02:55:19', ''),
(35, 'samolot', '$2y$10$UNEPUAe0xNC8hOhUxvqdZejvnIuTqVyH8QfHHxBkqzdpQjXBpkS2e', 'Antosiaantosia0@gmail.pl', 3, '2020-11-29 03:24:35', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id_gracza`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
