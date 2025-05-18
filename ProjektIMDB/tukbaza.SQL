/*
Created: 02/04/2025
Modified: 03/04/2025
Model: MySQL 8.0
Database: MySQL 8.0
*/

-- Create tables section -------------------------------------------------

-- Table kraji

CREATE TABLE `kraji`
(
  `id_k` Int NOT NULL,
  `ime` Varchar(200) NOT NULL,
  `posta` Int,
  `id_d` Int
)
;

CREATE INDEX `IX_Relationship1` ON `kraji` (`id_d`)
;

ALTER TABLE `kraji` ADD PRIMARY KEY (`id_k`)
;

-- Table drzave

CREATE TABLE `drzave`
(
  `id_d` Int NOT NULL,
  `ime` Varchar(200) NOT NULL,
  `kratica` Varchar(20)
)
;

ALTER TABLE `drzave` ADD PRIMARY KEY (`id_d`)
;

-- Table filmi

CREATE TABLE `filmi`
(
  `id_f` Int NOT NULL,
  `naslov` Varchar(200) NOT NULL,
  `datum_izdaje` Date NOT NULL,
  `id_d` Int,
  `trajanje_filma` Varchar(200) NOT NULL,
  `id_r` Int
)
;

CREATE INDEX `IX_Relationship3` ON `filmi` (`id_d`)
;

CREATE INDEX `IX_Relationship11` ON `filmi` (`id_r`)
;

ALTER TABLE `filmi` ADD PRIMARY KEY (`id_f`)
;

-- Table ocene

CREATE TABLE `ocene`
(
  `id_o` Int NOT NULL,
  `ocena` Int NOT NULL,
  `komentar` Varchar(2000),
  `id_u` Int,
  `id_f` Int
)
;

CREATE INDEX `IX_Relationship4` ON `ocene` (`id_u`)
;

CREATE INDEX `IX_Relationship7` ON `ocene` (`id_f`)
;

ALTER TABLE `ocene` ADD PRIMARY KEY (`id_o`)
;

-- Table uporabniki

CREATE TABLE `uporabniki`
(
  `id_u` Int NOT NULL,
  `priimek` Varchar(200) NOT NULL,
  `ime` Varchar(200) NOT NULL,
  `naslov` Varchar(200) NOT NULL,
  `e-posta` Varchar(200) NOT NULL,
  `geslo` Varchar(256),
  `id_k` Int
)
;

CREATE INDEX `IX_Relationship2` ON `uporabniki` (`id_k`)
;

ALTER TABLE `uporabniki` ADD PRIMARY KEY (`id_u`)
;

-- Table zanri

CREATE TABLE `zanri`
(
  `id_z` Int NOT NULL,
  `ime` Varchar(20) NOT NULL,
  `opis` Varchar(200)
)
;

ALTER TABLE `zanri` ADD PRIMARY KEY (`id_z`)
;

-- Table filmi_zanri

CREATE TABLE `filmi_zanri`
(
  `id_fz` Int NOT NULL,
  `id_f` Int,
  `id_z` Int
)
;

CREATE INDEX `IX_Relationship9` ON `filmi_zanri` (`id_f`)
;

CREATE INDEX `IX_Relationship10` ON `filmi_zanri` (`id_z`)
;

ALTER TABLE `filmi_zanri` ADD PRIMARY KEY (`id_fz`)
;

-- Table reziserji

CREATE TABLE `reziserji`
(
  `id_r` Int NOT NULL,
  `ime` Varchar(20) NOT NULL,
  `priimek` Varchar(20) NOT NULL,
  `e-posta` Char(20)
)
;

ALTER TABLE `reziserji` ADD PRIMARY KEY (`id_r`)
;

-- Table igralci

CREATE TABLE `igralci`
(
  `id_i` Int NOT NULL,
  `ime` Varchar(20) NOT NULL,
  `priimek` Varchar(20) NOT NULL,
  `e-posta` Varchar(20)
)
;

ALTER TABLE `igralci` ADD PRIMARY KEY (`id_i`)
;

-- Table filmi_igralci

CREATE TABLE `filmi_igralci`
(
  `id_fi` Int NOT NULL,
  `id_f` Int,
  `id_i` Int
)
;

CREATE INDEX `IX_Relationship12` ON `filmi_igralci` (`id_f`)
;

CREATE INDEX `IX_Relationship13` ON `filmi_igralci` (`id_i`)
;

ALTER TABLE `filmi_igralci` ADD PRIMARY KEY (`id_fi`)
;

-- Create foreign keys (relationships) section -------------------------------------------------

ALTER TABLE `kraji` ADD CONSTRAINT `Relationship1` FOREIGN KEY (`id_d`) REFERENCES `drzave` (`id_d`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `uporabniki` ADD CONSTRAINT `Relationship2` FOREIGN KEY (`id_k`) REFERENCES `kraji` (`id_k`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `filmi` ADD CONSTRAINT `Relationship3` FOREIGN KEY (`id_d`) REFERENCES `drzave` (`id_d`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `ocene` ADD CONSTRAINT `Relationship4` FOREIGN KEY (`id_u`) REFERENCES `uporabniki` (`id_u`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `ocene` ADD CONSTRAINT `Relationship7` FOREIGN KEY (`id_f`) REFERENCES `filmi` (`id_f`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `filmi_zanri` ADD CONSTRAINT `Relationship9` FOREIGN KEY (`id_f`) REFERENCES `filmi` (`id_f`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `filmi_zanri` ADD CONSTRAINT `Relationship10` FOREIGN KEY (`id_z`) REFERENCES `zanri` (`id_z`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `filmi` ADD CONSTRAINT `Relationship11` FOREIGN KEY (`id_r`) REFERENCES `reziserji` (`id_r`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `filmi_igralci` ADD CONSTRAINT `Relationship12` FOREIGN KEY (`id_f`) REFERENCES `filmi` (`id_f`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `filmi_igralci` ADD CONSTRAINT `Relationship13` FOREIGN KEY (`id_i`) REFERENCES `igralci` (`id_i`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


