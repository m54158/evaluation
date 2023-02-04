-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 04 fév. 2023 à 15:12
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `evaluation_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(10) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(9,2) NOT NULL,
  `url_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `url_image`) VALUES
(1, 'Mercedes amg c63', 'Cette nouvelle Mercedes-AMG C 63 S E Performance est capable de monter jusqu\'à 280 km/h, ou 270 km/h pour le break. Avec son puissant moteur 2.0 quatre cylindres turbo à assistance électrique, la sportive allemande abat le 0 à 100 km/h en g3,4 secondes seulement.', '999999.99', 'https://www.largus.fr/images/images/amg-gt-4-portes-1.jpg'),
(2, 'Ferrari F40', 'La Ferrari F40 est une supercar GT et de compétition, du constructeur automobile italien Ferrari !', '459036.99', 'https://cdn.motor1.com/images/mgl/VzzZe7/s3/ferrari-f40-chassis-87041.jpg'),
(4, 'Bugatti chiron', 'La Chiron est une supercar du constructeur automobile français Bugatti, descendante annoncée de la Bugatti Veyron 16.4. Elle tient son nom du pilote automobile monégasque Louis Chiron (1899-1979). Elle est préfigurée par le concept car Bugatti Vision Gran Turismo et inspirée par la Bugatti Type 57.', '999999.99', 'https://cdn.motor1.com/images/mgl/xW8K2/s1/bugatti-chiron-pur-sport.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `administrateur` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `administrateur`) VALUES
(7, 'tata', '$2y$10$QQiAN8dF1nN8srXL676ikeIWVI0Q7gStUFBXQ0.uz4pDpRFRLo0Rq', 0),
(8, 'test', '$2y$10$dLNY/4LQDx0utR4nDs/vPO0MRD63WpWQFakAVV7us0ObbljaQmspS', 0),
(12, 'toto', '$2y$10$3IcbQvuJMMfuymozNjIxrO2Hho0c.WEFqLkLZokznEDOjlodFKpx.', 1),
(13, 'ggggg', '$2y$10$ntRxdGRk3DCpIiGSZSvS8egWLXl8meXSTmjS2oSDKR.sL0idbwoFu', 0),
(14, 'ffff', '$2y$10$sZfx3dn5kkIq7n298FE22uBIYCVuYJKbcXiFSI0b6kYVKJ8Dwslvu', 0),
(15, 'test5', '$2y$10$alEesp7I/EJ9MqjxM.xRl.UR5yEkS4lcrUAHYB.BcUomlBXH8LG.2', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
