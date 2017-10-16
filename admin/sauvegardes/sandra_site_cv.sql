-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 06 oct. 2017 à 14:22
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sandra_site_cv`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_titre_cv`
--

CREATE TABLE `t_titre_cv` (
  `id_titre_cv` int(3) NOT NULL,
  `titre_cv` text NOT NULL,
  `accroche` text NOT NULL,
  `logo` varchar(20) NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `id_utilisateur` int(3) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` int(10) UNSIGNED ZEROFILL NOT NULL,
  `mdp` varchar(12) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `avatar` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `sexe` enum('m','f','','') NOT NULL,
  `etat_civil` enum('M','Mme','','') NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `code_postal` int(5) UNSIGNED ZEROFILL NOT NULL,
  `ville` varchar(30) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `site_web` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`id_utilisateur`, `prenom`, `nom`, `email`, `telephone`, `mdp`, `pseudo`, `avatar`, `age`, `date_de_naissance`, `sexe`, `etat_civil`, `adresse`, `code_postal`, `ville`, `pays`, `site_web`) VALUES
(1, 'Sandra', 'Herisson', 'sandra.herisson@lepoles.com', 0677447489, '123456', 'harmel', 'lettre.png', 42, '1975-02-25', 'f', 'Mme', '17 Avenue Anatol France', 92110, 'Clichy', 'France', 'google');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_titre_cv`
--
ALTER TABLE `t_titre_cv`
  ADD PRIMARY KEY (`id_titre_cv`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_titre_cv`
--
ALTER TABLE `t_titre_cv`
  MODIFY `id_titre_cv` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `id_utilisateur` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
