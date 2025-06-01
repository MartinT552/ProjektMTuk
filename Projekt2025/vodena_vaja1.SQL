/*
Created: 06/03/2025
Modified: 06/03/2025
Model: MySQL 8.0
Database: MySQL 8.0
*/

-- Create tables section -------------------------------------------------

-- Table kraji

CREATE TABLE `kraji`
(
  `id_k` Int NOT NULL AUTO_INCREMENT,
  `kraj` Varchar(200) NOT NULL,
  `post_st` Int(4) NOT NULL,
  PRIMARY KEY (`id_k`)
)
;

-- Table lastniki

CREATE TABLE `lastniki`
(
  `id_l` Int NOT NULL AUTO_INCREMENT,
  `ime` Varchar(30) NOT NULL,
  `priimek` Varchar(200) NOT NULL,
  `mail` Varchar(100) NOT NULL,
  `geslo` Varchar(256),
  `id_k` Int,
  PRIMARY KEY (`id_l`)
)
;

CREATE INDEX `IX_Relationship1` ON `lastniki` (`id_k`)
;

-- Table predmeti

CREATE TABLE `predmeti`
(
  `id_p` Int NOT NULL AUTO_INCREMENT,
  `naziv` Varchar(200) NOT NULL,
  `tip` Varchar(20) NOT NULL,
  PRIMARY KEY (`id_p`)
)
;

-- Table las_predm

CREATE TABLE `las_predm`
(
  `id_lp` Int NOT NULL AUTO_INCREMENT,
  `kolicina` Int NOT NULL,
  `id_l` Int,
  `id_p` Int,
  PRIMARY KEY (`id_lp`)
)
;

CREATE INDEX `IX_Relationship2` ON `las_predm` (`id_l`)
;

CREATE INDEX `IX_Relationship3` ON `las_predm` (`id_p`)
;

-- Create foreign keys (relationships) section -------------------------------------------------

ALTER TABLE `lastniki` ADD CONSTRAINT `bivajo` FOREIGN KEY (`id_k`) REFERENCES `kraji` (`id_k`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `las_predm` ADD CONSTRAINT `Relationship2` FOREIGN KEY (`id_l`) REFERENCES `lastniki` (`id_l`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `las_predm` ADD CONSTRAINT `lastijo` FOREIGN KEY (`id_p`) REFERENCES `predmeti` (`id_p`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


