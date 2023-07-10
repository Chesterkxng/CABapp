-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 07 juil. 2023 à 15:45
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cabdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `courier`
--

CREATE TABLE `courier` (
  `COURIER_ID` bigint(20) UNSIGNED NOT NULL,
  `RECIPIENT` varchar(2000) NOT NULL,
  `OBJECT` varchar(400) DEFAULT NULL,
  `DETAILS` varchar(400) NOT NULL,
  `EDITION_DATE` date NOT NULL,
  `URL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `EVENT_ID` int(11) NOT NULL,
  `TITLE` varchar(50) NOT NULL,
  `START` varchar(30) NOT NULL,
  `END` varchar(30) NOT NULL,
  `PERSONAL_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `LOGIN_ID` int(11) NOT NULL,
  `USERNAME` varchar(25) DEFAULT NULL,
  `PASSWORD` text DEFAULT NULL,
  `SECURITY_QUESTION` varchar(100) DEFAULT NULL,
  `SECURITY_ANSWER` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `om`
--

CREATE TABLE `om` (
  `OM_ID` bigint(20) UNSIGNED NOT NULL,
  `RECIPIENT` varchar(100) NOT NULL,
  `COUNTRY` varchar(20) NOT NULL,
  `CITY` varchar(100) NOT NULL,
  `COMPANIONS` varchar(200) NOT NULL,
  `OBJECT` varchar(200) NOT NULL,
  `MEANS` varchar(100) NOT NULL,
  `DEPARTURE_DATE` varchar(30) NOT NULL,
  `RETURN_DATE` varchar(30) NOT NULL,
  `TYPE` varchar(20) NOT NULL,
  `EDITION_DATE` date DEFAULT NULL,
  `URL` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `passport`
--

CREATE TABLE `passport` (
  `PASSPORT_ID` int(11) NOT NULL,
  `PASSNUMBER` varchar(12) NOT NULL,
  `GRADE` varchar(45) NOT NULL,
  `SURNAME` varchar(20) NOT NULL,
  `FIRST_NAME` varchar(80) NOT NULL,
  `DELIVERY_DATE` date NOT NULL,
  `EXPIRATION_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal`
--

CREATE TABLE `personal` (
  `PERSONAL_ID` int(11) NOT NULL,
  `LOGIN_ID` int(11) DEFAULT NULL,
  `GRADE` varchar(50) DEFAULT NULL,
  `FIRST_NAME` varchar(70) DEFAULT NULL,
  `SURNAME` varchar(20) DEFAULT NULL,
  `FUNCTION` varchar(30) DEFAULT NULL,
  `REMOVAL_STATUS` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `todo`
--

CREATE TABLE `todo` (
  `TODO_ID` int(11) NOT NULL,
  `PERSONAL_ID` int(11) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `DETAILS` varchar(200) NOT NULL,
  `DEADLINE` varchar(30) NOT NULL,
  `RECIPIENT` int(11) NOT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `visa`
--

CREATE TABLE `visa` (
  `VISA_ID` int(11) NOT NULL,
  `VISA_NUMBER` varchar(20) NOT NULL,
  `PASSNUMBER` varchar(12) NOT NULL,
  `DELIVERY_DATE` date NOT NULL,
  `EXPIRATION_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`COURIER_ID`),
  ADD UNIQUE KEY `COURIER_ID` (`COURIER_ID`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EVENT_ID`),
  ADD KEY `PERSONAL_ID` (`PERSONAL_ID`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LOGIN_ID`);

--
-- Index pour la table `om`
--
ALTER TABLE `om`
  ADD PRIMARY KEY (`OM_ID`),
  ADD UNIQUE KEY `OM_ID` (`OM_ID`);

--
-- Index pour la table `passport`
--
ALTER TABLE `passport`
  ADD PRIMARY KEY (`PASSPORT_ID`),
  ADD UNIQUE KEY `PASSNUMBER` (`PASSNUMBER`);

--
-- Index pour la table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`PERSONAL_ID`),
  ADD KEY `FK_LOGIN_PERSONAL` (`LOGIN_ID`);

--
-- Index pour la table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`TODO_ID`),
  ADD KEY `PERSONAL_ID` (`PERSONAL_ID`),
  ADD KEY `RECIPIENT` (`RECIPIENT`);

--
-- Index pour la table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`VISA_ID`),
  ADD UNIQUE KEY `VISA` (`VISA_NUMBER`),
  ADD KEY `PASSNUMBER` (`PASSNUMBER`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `courier`
--
ALTER TABLE `courier`
  MODIFY `COURIER_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `EVENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `LOGIN_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `om`
--
ALTER TABLE `om`
  MODIFY `OM_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `passport`
--
ALTER TABLE `passport`
  MODIFY `PASSPORT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal`
--
ALTER TABLE `personal`
  MODIFY `PERSONAL_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `todo`
--
ALTER TABLE `todo`
  MODIFY `TODO_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `visa`
--
ALTER TABLE `visa`
  MODIFY `VISA_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`PERSONAL_ID`) REFERENCES `personal` (`PERSONAL_ID`);

--
-- Contraintes pour la table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`PERSONAL_ID`) REFERENCES `personal` (`PERSONAL_ID`),
  ADD CONSTRAINT `todo_ibfk_2` FOREIGN KEY (`RECIPIENT`) REFERENCES `personal` (`PERSONAL_ID`);

--
-- Contraintes pour la table `visa`
--
ALTER TABLE `visa`
  ADD CONSTRAINT `visa_ibfk_1` FOREIGN KEY (`PASSNUMBER`) REFERENCES `passport` (`PASSNUMBER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
