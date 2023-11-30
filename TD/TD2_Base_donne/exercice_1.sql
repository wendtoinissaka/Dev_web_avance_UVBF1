-- Se connecter à MySQL / MariaDB
-- Assurez-vous de vous connecter en tant qu'utilisateur disposant des droits d'administration.

-- Créer une base de données "uvbf-dwa-2023"
CREATE DATABASE IF NOT EXISTS `uvbf-dwa-2023` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Utilisation de la nouvelle base de données
USE `uvbf-dwa-2023`;

-- Créer un utilisateur "uvbf-dwa-2023" avec tous les droits sur la nouvelle base de données
CREATE USER IF NOT EXISTS 'uvbf-dwa-2023'@'localhost' IDENTIFIED BY 'votre_mot_de_passe';
GRANT ALL PRIVILEGES ON `uvbf-dwa-2023`.* TO 'uvbf-dwa-2023'@'localhost';

-- Assurez-vous d'avoir les droits de l'administrateur pour exécuter les commandes ci-dessus.

-- Dans la nouvelle base de données, créer une table "personne"
CREATE TABLE IF NOT EXISTS `personne` (
    `idPersonne` INT AUTO_INCREMENT PRIMARY KEY,
    `nomPersonne` VARCHAR(20),
    `prenomPersonne` VARCHAR(60),
    `dateNaissancePersonne` DATE,
    `genrePersonne` VARCHAR(10),
    `administrateur` BOOLEAN
);

-- Exemple d'insertion de données
/*
INSERT INTO `personne` (`vnomPersonne`, `vprenomPersonne`, `vdateNaissancePersonne`, `vgenrePersonne`, `vadministrateur`)
VALUES
    ('Nom1', 'Prenom1', '2000-01-01', 'Masculin', 1),
    ('Nom2', 'Prenom2', '1995-05-15', 'Féminin', 0),
    ('Nom3', 'Prenom3', '1988-12-10', 'Masculin', 0);

*/