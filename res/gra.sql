-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Gru 2020, 00:08
-- Wersja serwera: 10.4.13-MariaDB
-- Wersja PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktura tabeli dla tabeli `eq`
--

CREATE TABLE `eq` (
  `user_id` int(11) NOT NULL,
  `1` tinyint(1) NOT NULL,
  `2` tinyint(1) NOT NULL,
  `3` tinyint(1) NOT NULL,
  `4` tinyint(1) NOT NULL,
  `5` tinyint(1) NOT NULL,
  `6` tinyint(1) NOT NULL,
  `7` tinyint(1) NOT NULL,
  `8` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `eq`
--

INSERT INTO `eq` (`user_id`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1),
(18, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `items`
--

CREATE TABLE `items` (
  `item_id` int(3) NOT NULL,
  `name` varchar(256) COLLATE utf8_bin NOT NULL,
  `s_nick` varchar(50) COLLATE utf8_bin NOT NULL,
  `about` varchar(2000) COLLATE utf8_bin NOT NULL,
  `klasa` varchar(25) COLLATE utf8_bin NOT NULL,
  `cost` int(2) NOT NULL,
  `czy_sklep` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `items`
--

INSERT INTO `items` (`item_id`, `name`, `s_nick`, `about`, `klasa`, `cost`, `czy_sklep`) VALUES
(1, 'Pink_Monster', 'Pink', 'Pink to mały słotki królik. Urodził się na skutek cudu który otrzymała jego mama w zamian za pomoc wróżce.', 'start', 0, 0),
(2, 'Dude_Monster', 'Dude', 'Dude to potomek squirtle. Podczas ewolucji nauczył się chodzić na 2 nogach. Chusta to prezent od jego rodziców w dniu urodzin', 'epic', 10, 1),
(3, 'Owlet_Monster', 'Owlet', 'Owlet to potomek starej rodziny sówek. Jego rodzice umarli gdy był mały jednak owlet się nie poddaje i walczy do końca.', 'uncommon', 7, 1),
(4, 'Weed_Monster', 'Weed', 'Weed... Co tu dużo pisać.<br><br><br>', 'legendary', 20, 1),
(5, 'Princess_Girl', 'Princess', 'Princess Wiana(bo tak miała na imię) była córką króla małego kozaka. Jednak życie królewskie jej nie podpadło i uciekła.', 'rare', 12, 1),
(6, 'Santa_Event', 'Santa', 'Przybył w te święta aby niczym tajemniczy gość rozdawać wszystkim prezenty. Bo kto w końcu nie kocha mikołaja?', 'event', 15, 1),
(7, 'Skeleton_guy', 'Skeleton', 'Zmartwywstał i przybył z obcej gry aby walczyć z innymi umarlakam.<br><br>', 'common', 5, 1),
(8, 'Hulk', 'Hulk', 'Wielki i olbrzymi stwór. Jest alter ego słynnego profesora.<br><br>', 'vip', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `text` varchar(2000) COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `logs`
--

INSERT INTO `logs` (`id`, `text`, `date`) VALUES
(1, 'Gracz o id = 1 kupił skina o id = 3', '2020-12-16 20:39:14'),
(2, 'Gracz o id = 1 kupił skina o id = 7', '2020-12-16 20:39:27'),
(3, 'Gracz o id = 1 kupił skina o id = 3', '2020-12-16 20:39:57'),
(4, 'Gracz o id = 1 przedłużył vipa o miesiac!', '2020-12-16 20:42:44'),
(5, 'Gracz o id = 1 zalogowal sie', '2020-12-16 20:47:13'),
(6, 'Gracz o id = 1 kupił skina o id = 6', '2020-12-16 22:04:40'),
(7, 'Gracz o id = 1 przedłużył vipa o miesiac!', '2020-12-16 22:05:32'),
(8, 'Gracz o id = 1 kupił skina o id = 7', '2020-12-17 09:50:34'),
(9, 'Gracz o id = 1 przedłużył vipa o miesiac!', '2020-12-17 09:51:28'),
(10, 'Gracz o id = 1 wylogowal sie', '2020-12-20 14:50:11'),
(11, 'Gracz o id = 1 zalogowal sie', '2020-12-20 15:16:47'),
(12, 'Gracz o id = 1 wylogowal sie', '2020-12-20 15:22:45'),
(13, 'Gracz o id = 1 zalogowal sie', '2020-12-20 15:23:12'),
(14, 'Gracz o id = 1 zalogowal sie', '2020-12-20 19:52:37'),
(15, 'Gracz o id = 1 zalogowal sie', '2020-12-20 20:10:16'),
(16, 'Gracz o id = 1 przedłużył vipa o miesiac!', '2020-12-21 11:36:36'),
(17, 'Gracz o id = 1 przedłużył vipa o miesiac!', '2020-12-21 11:47:56'),
(18, 'Gracz o id = 1 przedłużył vipa o miesiac!', '2020-12-21 11:48:37'),
(19, 'Gracz o id = 1 przedłużył vipa o miesiac!', '2020-12-21 11:51:42'),
(20, 'Gracz o id = 1 przedłużył vipa o miesiac!', '2020-12-21 11:52:26'),
(21, 'Gracz o id = 1 przedłużył vipa o miesiac!', '2020-12-21 11:52:45'),
(22, 'Gracz o id = 1 zalogowal sie', '2020-12-21 12:20:48'),
(23, 'Gracz o id = 1 ustanowil rekord poziomu:2.12 na poziomie: 1', '2020-12-23 14:32:08'),
(24, 'Gracz o id = 1 wylogowal sie', '2020-12-23 15:49:55'),
(25, 'Gracz o id = 1 zalogowal sie', '2020-12-23 15:49:57'),
(26, 'Gracz o id = 1 wylogowal sie', '2020-12-23 17:29:53'),
(27, 'Gracz o id = 1 zalogowal sie', '2020-12-23 17:29:55'),
(28, 'Gracz o id = 1 wylogowal sie', '2020-12-23 18:37:49'),
(29, 'Gracz o id = 1 zalogowal sie', '2020-12-23 23:31:38'),
(30, 'Gracz o id = 1 ustanowil rekord poziomu:10.23 na poziomie: 3', '2020-12-25 12:12:15'),
(31, 'Gracz o id = 1 ustanowil rekord poziomu:10.09 na poziomie: 3', '2020-12-25 12:15:46'),
(32, 'Gracz o id = 1 ustanowil rekord poziomu:9.46 na poziomie: 3', '2020-12-25 14:13:49'),
(33, 'Gracz o id = 1 ustanowil rekord poziomu:8.36 na poziomie: 3', '2020-12-25 14:16:10'),
(34, 'Gracz o id = 1 ustanowil rekord poziomu:42.98 na poziomie: 4', '2020-12-25 14:31:06'),
(35, 'Gracz o id = 1 ustanowil rekord poziomu:29.98 na poziomie: 4', '2020-12-25 14:38:36'),
(36, 'Gracz o id = 1 ustanowil rekord poziomu:18.81 na poziomie: 4', '2020-12-25 15:42:24'),
(37, 'Gracz o id = 1 ustanowil rekord poziomu:11.69 na poziomie: 4', '2020-12-25 15:51:31'),
(38, 'Gracz o id = 1 ustanowil rekord poziomu:42.86 na poziomie: 5', '2020-12-25 15:52:16'),
(39, 'Gracz o id = 1 zalogowal sie', '2020-12-25 17:42:14'),
(40, 'Gracz o id = 1 ustanowil rekord poziomu:6.49 na poziomie: 2', '2020-12-25 18:39:22'),
(41, 'Gracz o id = 1 ustanowil rekord poziomu:4.27 na poziomie: 6', '2020-12-26 10:39:30'),
(42, 'Gracz o id = 1 ustanowil rekord poziomu:0.46 na poziomie: 7', '2020-12-26 10:39:33'),
(43, 'Gracz o id = 1 ustanowil rekord poziomu:0.55 na poziomie: 8', '2020-12-26 10:39:36'),
(44, 'Gracz o id = 1 ustanowil rekord poziomu:0.46 na poziomie: 9', '2020-12-26 10:39:38'),
(45, 'Gracz o id = 1 ustanowil rekord poziomu:2.95 na poziomie: 2', '2020-12-26 10:39:58'),
(46, 'Gracz o id = 1 ustanowil rekord poziomu:0.54 na poziomie: 8', '2020-12-26 11:33:03'),
(47, 'Gracz o id = 1 zalogowal sie', '2020-12-26 12:22:59'),
(48, 'Gracz o id = 1 zalogowal sie', '2020-12-26 15:13:43'),
(49, 'Gracz o id = 1 zalogowal sie', '2020-12-26 19:29:52'),
(50, 'Gracz o id = 1 zalogowal sie', '2020-12-26 19:33:44'),
(51, 'Gracz o id = 1 zalogowal sie', '2020-12-27 11:41:21'),
(52, 'Gracz o id = 1 zalogowal sie', '2020-12-27 11:50:41'),
(53, 'Gracz o id = 1 zalogowal sie', '2020-12-27 21:48:40'),
(54, 'Gracz o id = 1 zalogowal sie', '2020-12-29 22:26:41'),
(55, 'Gracz o id = 1 ustanowil rekord poziomu:28.9 na poziomie: 5', '2020-12-29 23:25:01'),
(56, 'Gracz o id = 1 zalogowal sie', '2020-12-29 23:58:03'),
(57, 'Gracz o id = 1 zalogowal sie', '2020-12-30 00:02:09');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payer_email` varchar(256) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_amount` double(10,2) NOT NULL,
  `payment_currency` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `payer_email`, `payment_status`, `payment_amount`, `payment_currency`, `txn_id`, `create_at`) VALUES
(1, 1, 'sb-ufcx473862373@personal.example.com', 'COMPLETED', 139.99, 'PLN', '6NS53794FA619815R', '2020-12-15 20:15:58'),
(2, 1, 'sb-ufcx473862373@personal.example.com', 'COMPLETED', 5.99, 'PLN', '40577879WC3349834', '2020-12-16 08:49:13'),
(3, 1, 'sb-ufcx473862373@personal.example.com', 'COMPLETED', 5.99, 'PLN', '69G50716DE927870M', '2020-12-16 19:02:45'),
(4, 1, 'sb-ufcx473862373@personal.example.com', 'COMPLETED', 5.99, 'PLN', '8TB94126KE2388500', '2020-12-16 21:02:17'),
(5, 1, 'sb-ufcx473862373@personal.example.com', 'COMPLETED', 44.99, 'PLN', '4BR22943DV5646506', '2020-12-17 08:49:26'),
(6, 1, 'sb-ufcx473862373@personal.example.com', 'COMPLETED', 5.99, 'PLN', '43H980101Y3097400', '2020-12-20 14:21:02');

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
  `l9` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `rank`
--

INSERT INTO `rank` (`id_gracza`, `l1`, `l2`, `l3`, `l4`, `l5`, `l6`, `l7`, `l8`, `l9`) VALUES
(1, 2.12, 2.95, 8.36, 11.69, 28.9, 4.27, 0.46, 0.54, 0.46),
(15, 14.94, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 27.91, 65.02, 77.86, 0, 0, 0, 0, 0, 0),
(18, 18.17, 30.41, 25.87, 71.49, 66.45, 28, 21.59, 0, 0),
(19, 10.75, 12.2, 14.43, 52.83, 61.67, 22.39, 23.64, 25.55, 52.83),
(20, 9.92, 9.53, 12.08, 50.02, 49.1, 16.83, 16.19, 18.04, 25.01),
(27, 18.47, 78.79, 42.24, 0, 0, 0, 0, 0, 0),
(29, 15.63, 28.31, 32.06, 0, 0, 0, 0, 0, 0),
(30, 35.88, 55.89, 39.46, 0, 0, 0, 0, 0, 0),
(31, 33.19, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 20.77, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 14.7, 16.46, 18.8, 58.94, 64.25, 28.23, 23.49, 42.58, 43.05),
(34, 30.28, 24.35, 17.89, 39.99, 58.7, 20.08, 14.32, 42.9, 24.44),
(35, 20.98, 67.85, 0, 0, 0, 0, 0, 0, 0);

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
  `balance` int(7) NOT NULL,
  `avatar` varchar(50) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Pink_Monster',
  `vip` datetime NOT NULL DEFAULT current_timestamp(),
  `hash` varchar(2000) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `lvl`, `balance`, `avatar`, `vip`, `hash`) VALUES
(1, 'Kubis10', '$2y$10$NTVDURAHXiFF/NFuudDXh.xbi6PqVjr7ROPXtwOFWhTKJ0pwBb8/u', 'kuba.kubis@interia.pl', 9, 0, 'Hulk', '2020-12-29 12:57:45', ''),
(2, 'jacek', '$2y$10$520GfTiKYdom8bBmFmnhc.dlePjIzHGyBGK7eX4xQe2eP9jo/ge.e', 'jacek@omega.pl', 1, 0, 'Pink_Monster', '2020-12-29 12:57:45', '30240c13-dc74-4324-9f89-b5463e1b08f2'),
(15, 'Pawel', '$2y$10$6/1GtpnJjyiOkxYdaFxdnOq88Jwtb1BqJL4SJ3YpRFSfuKvoJkAH6', 'pawcio.fapcio2@gmail.com', 2, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(16, 'Kuba', '$2y$10$1lKoUo2gbsuBOO5EOoiHtegZlZa2un8YyF9jTN9Cat4ZsGVWbA9Zq', 'Kubozo27@interia.pl', 1, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(17, 'Ueloo', '$2y$10$5bSeaOJLYVwojrDq6dhqyeqUJj19i1Ys/.CaxIE4XEXTrrzfhxAtm', 'Jmiczek2005@gmail.com', 4, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(18, 'Callum', '$2y$10$9C7CcnRpxiNieAbfbvR0v.Jc.LoYZuf/1tANwKFj/asn1DxFcNyhm', 'adrian.goral@gmail.com', 9, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(19, 'cebyiul', '$2y$10$/Qx9OYqcCt/ENDEFZR3ADu6Bj7fqtN9dBMySYJElKGe8klzJAVypy', 'kuba.cybulski@puszkun.eu', 9, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(20, 'GIGADYNIA', '$2y$10$0yXKhwXJUyHJy0HE8hbIY.2R7rMoZd9CSDCD5bKoyekXw8g1N8PyW', 'franciszeksuchora@gmail.com', 4, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(21, 'PATTAL', '$2y$10$7n9H/noEtlyW2TjG2cXDouz4uLsJP8wlKdrnd4nD3RyAtfRLsuXCS', 'zikubaak@gmail.com', 1, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(22, 'dzulia', '$2y$10$l8tZwaaufjQRAVeaqKhzfORVnfsjDjbhN1cGbOjo52q0hZhu5oDyK', 'wiktoria.wa2005.jw@gmail.com', 1, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(23, 'mewa', '$2y$10$0d4hVDn4wG0KqdrfopLKc.B3b2tiS8.NNnB1EtT.F7v0jhKnBI3G2', 'ewasanocka3@gmail.com', 1, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(24, 'mewcia', '$2y$10$Z0Pa9AvrHHrZFdktnKjik.IL53BC2JFGskp2eZwaoz5DtFpapuIQK', 'anejekotleta@obiad.com', 1, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(25, 'm3wcia', '$2y$10$qHFOjFC/wCknybMzgaq5guNHPDsduhfYoAli51ytCFx2FPurzgsmC', 'okej@gmail.com', 1, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(26, 'olaola', '$2y$10$TTXZt.Mbg9Ibevk9StxyROE6pqBZNcBi41Leelqy6f83zuOI8nPqW', 'anetajekotleta@gmail.com', 1, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(27, 'Gracek', '$2y$10$24IVExUVwueJFlURo3UKIO9ZaNaFPlfn8q4GurywJb7BmXExnEkvq', 'antonowiczcz@gmail.com', 4, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(28, 'IwkoSmok', '$2y$10$VF0NlMzS9BLWAAgytbkzfe6TZ7uP8SYI2iaaIILaadPfnwqq9MtWa', 'albertpieczara@wp.pl', 1, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(29, 'Dixelek', '$2y$10$pP6ayFVC5vDYwyCV6g3TjOeFwLwVutTnykfr2m3ZpnPaOz/V8Jgue', 'drkrawcik@gmail.com', 4, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(30, 'furtive', '$2y$10$6vWX34pmRG2kfMiLHDoKgeUEtiKoUbLJp5BoOdt4TfLIA9HzkHlzm', 'furtiveplanet@gmail.com', 4, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(31, 'xband', '$2y$10$j1XUvcmoH3iEClJOhW.DEuhb6ahko8sbQAzrDlnxpjA5FHHsntE/a', 'janwirkus2004@gmail.com', 2, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(32, 'Jaifurtive', '$2y$10$R/GU6T/POuRxgw3DTodkz..h8ACBB6tbjtT6d2bJzksrd1FDZlwq.', 'tomeklipowski000@gmail.com', 2, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(33, 'Kozak', '$2y$10$N.3zLjoP/Fj/i9kr2LydAuqMGBpGEgQjJ5XgXXr.ZwlEPRXzkANXm', 'martyneq.1@wp.pl', 4, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(34, 'Hajdunia', '$2y$10$4tiK7JyVculVPHf.4xttjuZr9iaDCV24U3N28reY1UOd4MzZDYXLK', 'julcia.hajduk@gmail.com', 10, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(35, 'samolot', '$2y$10$UNEPUAe0xNC8hOhUxvqdZejvnIuTqVyH8QfHHxBkqzdpQjXBpkS2e', 'Antosiaantosia0@gmail.pl', 3, 0, 'Pink_Monster', '2020-12-29 12:57:45', ''),
(36, 'TEST', '$2y$10$HAkMgEInqnKEXBEl4XSCHO/mPo71xbHoiERKj.08WB.bZeDdTKH66', 'kubakubis01@gmail.com', 1, 0, 'Pink_Monster', '2020-12-29 12:57:45', 'f87a9ba2-5ab7-4060-aab0-10e6a64ec84a');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indeksy dla tabeli `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `payment`
--
ALTER TABLE `payment`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT dla tabeli `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
