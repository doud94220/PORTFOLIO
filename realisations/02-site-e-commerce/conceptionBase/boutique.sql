-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 13 Septembre 2017 à 10:54
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(3) NOT NULL,
  `id_membre` int(3) DEFAULT NULL,
  `montant` int(3) NOT NULL,
  `date_enregistrement` datetime DEFAULT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_membre`, `montant`, `date_enregistrement`, `etat`) VALUES
(18, 1, 43, '2017-09-04 20:01:31', 'en cours de traitement'),
(19, 1, 79, '2017-09-05 10:44:11', 'en cours de traitement');

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `id_details_commande` int(3) NOT NULL,
  `id_commande` int(3) NOT NULL,
  `id_produit` int(3) DEFAULT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `details_commande`
--

INSERT INTO `details_commande` (`id_details_commande`, `id_commande`, `id_produit`, `quantite`, `prix`) VALUES
(1, 18, 6, 2, 14),
(2, 18, 7, 1, 15),
(3, 19, 7, 3, 15),
(4, 19, 11, 1, 34);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(3) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(60) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `civilite` enum('m','f') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `statut` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `statut`) VALUES
(1, 'admin1', '$2y$10$pWPyuUj7fWzH3PkikZ1Zv.c2PJV2FJPoZV0AsKgPag/hKXU/7sqcC', 'ANTHONY', 'Edouard', 'doud75@gmail.com', 'm', 'Charenton le Pont', 94220, '154 Rue de Paris', 1),
(2, 'nono75', '$2y$10$84yoEm6vPaFEG41cI2.Wteo9mPwTsqDisuzZyuItL0fZCeXu/uNFK', 'BEKK', 'Arnaud', 'nono@hotmail.com', 'm', 'Paris', 75014, '1 rue du genou', 0),
(3, 'test', '$2y$10$tlI1KA7vmhRRX7wNBO33.ukLZiQzLqPBAZbT0o5P.m4nx8p9NqC2q', 'test', 'test', 'test@test.fr', 'm', 'test', 75001, 'test', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(3) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `taille` varchar(5) NOT NULL,
  `public` enum('m','f','mixte') NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` int(3) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `public`, `photo`, `prix`, `stock`) VALUES
(6, 'R001', 'Tshirt', 'Thisrt rouge', 'Super thisrt rouge !', 'rouge', 'L', 'm', 'http://localhost/J37-J42-Boutique/boutique/photo/rouge.png', 14, 97),
(7, 'R002', 'Tshirt', 'Thisrt vert', 'Super thisrt vert !', 'vert', 'M', 'm', 'http://localhost/J37-J42-Boutique/boutique/photo/vert.png', 15, 76),
(11, 'R006', 'Chemise', 'Chemise rayée', 'Superbe chemise !', 'noir', 'L', 'm', 'http://localhost/J37-J42-Boutique/boutique/photo/chemisenoirm.jpg', 34, 42),
(12, 'R007', 'Chemise', 'Chemise blanche', 'Superbe chemise !', 'blanche', 'M', 'm', 'http://localhost/J37-J42-Boutique/boutique/photo/chemiseblanchem.jpg', 36, 28),
(13, 'R008', 'Divers', 'Pull', 'Superbe pull !', 'rouge', 'L', 'm', 'http://localhost/J37-J42-Boutique/boutique/photo/pull_rouge.jpg', 30, 20),
(14, 'R009', 'Divers', 'Chaussures Rando', 'Superbes chaussures pour faire de la rando !', 'noirne', 'S', 'mixte', 'http://localhost/J37-J42-Boutique/boutique/photo/chaussures_rando.jpg', 45, 11),
(15, 'R010', 'Tshirt', 'Thisrt jaune', 'Magnifique thisrt jaune !', 'jaune', 'M', 'm', 'http://localhost/J37-J42-Boutique/boutique/photo/jaune.png', 15, 66),
(16, 'R011', 'Tshirt', 'Thisrt noir', 'Magnifique thisrt noir !', 'noir', 'XL', 'm', 'http://localhost/J37-J42-Boutique/boutique/photo/noir.jpg', 13, 55);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_membre` (`id_membre`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id_details_commande`),
  ADD KEY `details_commande_ibfk_1` (`id_commande`),
  ADD KEY `details_commande_ibfk_2` (`id_produit`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id_details_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `details_commande_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `details_commande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
