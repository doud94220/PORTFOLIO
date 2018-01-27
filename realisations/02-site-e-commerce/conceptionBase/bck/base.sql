CREATE DATABASE IF NOT EXISTS boutique;

USE boutique;

CREATE TABLE membre (
  id_membre INT(3) NOT NULL AUTO_INCREMENT,
  pseudo VARCHAR(20) NOT NULL,
  mdp VARCHAR(60) NOT NULL,
  nom VARCHAR(20) NOT NULL,
  prenom VARCHAR(20) NOT NULL,
  email VARCHAR(20) NOT NULL,
  civilite ENUM('m','f') NOT NULL,
  ville VARCHAR(20) NOT NULL,
  code_postal INT(5) NOT NULL,
  adresse VARCHAR(50) NOT NULL,
  statut INT(1) NOT NULL,
  PRIMARY KEY (id_membre)
) ENGINE=InnoDB ;

CREATE TABLE produit (
  id_produit INT(3) NOT NULL AUTO_INCREMENT,
  reference VARCHAR(20) NOT NULL,
  categorie VARCHAR(20) NOT NULL,
  titre VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  couleur VARCHAR(20) NOT NULL,
  taille VARCHAR(5) NOT NULL,
  public ENUM('m','f', 'mixte') NOT NULL,
  photo VARCHAR(250) NOT NULL,
  prix INT(3) NOT NULL,
  stock INT(3) NOT NULL,
  PRIMARY KEY (id_produit)
) ENGINE=InnoDB ;

CREATE TABLE commande (
  id_commande INT(3) NOT NULL AUTO_INCREMENT,
  id_membre INT(3) NOT NULL,
  montant INT(3) NOT NULL,
  date_enregistrement DATETIME,
  etat ENUM('en cours de traitement','envoyé', 'livré') NOT NULL,
  PRIMARY KEY (id_commande)
) ENGINE=InnoDB ;

ALTER TABLE commande ADD FOREIGN KEY (id_membre) REFERENCES boutique.membre(id_membre);

CREATE TABLE details_commande (
  id_details_commande INT(3) NOT NULL AUTO_INCREMENT,
  id_commande INT(3) NOT NULL,
  id_produit INT(3) NOT NULL,
  quantite INT(3) NOT NULL,
  prix INT(3) NOT NULL,
  PRIMARY KEY (id_details_commande)
) ENGINE=InnoDB ;

ALTER TABLE details_commande ADD FOREIGN KEY (id_commande) REFERENCES boutique.commande(id_commande);
ALTER TABLE details_commande ADD FOREIGN KEY (id_produit) REFERENCES boutique.produit(id_produit);

----------------------------- 2eme partie ------------------------------

/*
  On a aussi modifié les propriétés des contraintes (ON DELETE, ON UPDATE) des clés étrangères dans phpMyAdmin
*/

-- Aussi j ai rajouté unicité sur champ reference dans table produit
