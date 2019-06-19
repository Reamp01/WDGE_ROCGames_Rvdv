-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 19 jun 2019 om 10:14
-- Serverversie: 5.7.19
-- PHP-versie: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roc-games`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `games`
--

CREATE TABLE `games` (
  `gameID` int(3) NOT NULL,
  `gameName` varchar(40) NOT NULL,
  `gameDescription` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `games`
--

INSERT INTO `games` (`gameID`, `gameName`, `gameDescription`) VALUES
(1, 'Tetris', 'Tetris is een spel waarin je zoveel mogelijk rijen moet wegspelen door middel van vallende figuren.'),
(2, 'Memory', 'Maak setjes door kaarten om te draaien. Zorg dat je meer setjes hebt dan je tegenstander.'),
(3, 'RPS', 'Kies uit: een steen, een schaar & een vel papier. Kijk daarna of jou keuze de juiste keuze was.'),
(4, 'Pong', 'Probeer zolang mogelijk te overleven tegenover de computer. Hoe langer je blijft leven hoe hoger je score.'),
(5, 'FlappyBird', 'Begeleid een vogel door een parcour van verschillende buizen. Zorg dat de vogel de buizen niet aanraakt.'),
(6, 'TicTacToe', 'Een spel voor 2 locale spelers. Een is het kruisje en de andere het rondje. Zorg er voor dat jij wint.'),
(7, 'Breakout', 'Haal alle platformen uit de lucht door middel van een bewegend balletje en een klein platformpje.'),
(8, 'Snake', 'Je bestuurt in dit spel een slang die op zoek is naar eten. Zodra je voedsel eet krijg je punt.'),
(9, 'Simon', 'Er verschijnt een kleurpatroon op het simon-bordje. Klik dit patroon zo vaak mogelijk na.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `scores`
--

CREATE TABLE `scores` (
  `scoreID` int(100) NOT NULL,
  `scoreTetris` int(100) NOT NULL,
  `scorePong` int(100) NOT NULL,
  `scoreBreakout` int(100) NOT NULL,
  `scoreSnake` int(11) NOT NULL,
  `scoreFlappyBird` int(11) NOT NULL,
  `scoreMemory` int(11) DEFAULT NULL,
  `scoreSimon` int(11) NOT NULL,
  `scoreUser` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `scores`
--

INSERT INTO `scores` (`scoreID`, `scoreTetris`, `scorePong`, `scoreBreakout`, `scoreSnake`, `scoreFlappyBird`, `scoreMemory`, `scoreSimon`, `scoreUser`) VALUES
(1, 10, 9, 0, 0, 7, NULL, 0, 'Ruben'),
(2, 570, 7, 7, 55, 24, 1549, 7, 'Benzaiten');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `UserID` int(3) NOT NULL,
  `UserUsername` varchar(16) NOT NULL,
  `UserPassword` varchar(5000) NOT NULL,
  `UserEmail` text NOT NULL,
  `UserBirthdate` date NOT NULL,
  `UserRegidate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`UserID`, `UserUsername`, `UserPassword`, `UserEmail`, `UserBirthdate`, `UserRegidate`) VALUES
(1, 'Ruben', '$2y$10$zpNtYNOi2N/rY0mAVqbNOOvPWEqIv1V.KKboXjYIHm61mHNWY91fG', '81281@rocteraa-student.nl', '2001-10-28', '2019-06-19'),
(2, 'Benzaiten', '$2y$10$vP1NboeG9eTNoZRvnVWn6uJzvrKA5towV7ewLIbPOekaWLQsrY3vW', '81422@rocteraa-student.nl', '1999-11-12', '2019-06-19');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `games`
--
ALTER TABLE `games`
  ADD UNIQUE KEY `User-ID` (`gameID`);

--
-- Indexen voor tabel `scores`
--
ALTER TABLE `scores`
  ADD UNIQUE KEY `scoreID` (`scoreID`),
  ADD KEY `scoreID_2` (`scoreID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `User-ID` (`UserID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `games`
--
ALTER TABLE `games`
  MODIFY `gameID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `scores`
--
ALTER TABLE `scores`
  MODIFY `scoreID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
