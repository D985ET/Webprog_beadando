-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Máj 05. 13:40
-- Kiszolgáló verziója: 10.4.17-MariaDB
-- PHP verzió: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `elso`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `igeversek`
--

CREATE TABLE `igeversek` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `topic` varchar(25) DEFAULT NULL,
  `testament` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `igeversek`
--

INSERT INTO `igeversek` (`ID`, `name`, `image`, `username`, `topic`, `testament`) VALUES
(23, 'Filippi46', 'igevers/Filippi46/vers_8316.jpg', 'Levente', 'Hit', 'Újszövetség'),
(24, 'Zsoltárok911', 'igevers/Zsoltárok911/vers_9016.jpg', 'Levente', 'Szeretet', 'Ószövetség'),
(25, 'Róma138', 'igevers/Róma138/vers_5437.jpg', 'unsat', 'Szeretet', 'Újszövetség'),
(26, 'Zsoltárok328', 'igevers/Zsoltárok328/vers_1943.jpg', 'unsat', 'Hit', 'Ószövetség');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `link` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`) VALUES
(1, 'Profilom', 1),
(2, 'Többi felhasználó', 2),
(3, 'Igevers Hozzáadása', 3),
(4, 'Módosítás', 4),
(5, 'Felhasználó felvitel', 5),
(6, 'Felhasználó törlése', 6),
(7, 'Keresés', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(40) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `passwd` varchar(32) DEFAULT NULL,
  `img` text DEFAULT NULL,
  `authority` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `uname`, `email`, `passwd`, `img`, `authority`) VALUES
(1, 'Levente', 'levente@email.com', 'eab4cb526779c13369c85abce33770cc', 'users/Levente/83603787163282456_913558782789687_5124606909679144617_n.jpg', 'admin'),
(2, 'Bence', 'bence@protok.hu', 'f2034283eae41d2d2f45d92ec7208a93', 'users/Bence/731752613129955882_422572305540223_2646524407139239798_n.jpg', 'user'),
(3, 'Krisztian', 'krisztian@citrom.hu', '3a4fb92a3af8823420df5b5237c72527', 'users/Krisztian/104542560_252960722817971_8033840953377834876_n.jpg', 'user2'),
(6, 'mesa', 'mesa@email.com', '85770ae9def3473f559e0dbe0609060a', 'users/mesa/1628774068InkedYamaha_Dt_125R_113731919881864_LI_vlt.jpg', 'user'),
(10, 'gael', 'gael@gaemail.com', '87931780ab7fb3123b2d1ce18a95970e', 'users/gael/13320555slave_knight.jpg', 'user'),
(11, 'unsat', 'sat@unsat.hu', 'ab76ca464eefa1865434cd026016aa8e', 'users/unsat/840031181unknown.png', 'user');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `igeversek`
--
ALTER TABLE `igeversek`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `igeversek`
--
ALTER TABLE `igeversek`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT a táblához `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
