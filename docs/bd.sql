-- Created by DiaSql-Dump Version 0.01(Beta)
-- Filename: bd.sql

-- clientes --
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
	`id` INT(5) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`username` VARCHAR(50) NOT NULL UNIQUE,
	`password` VARCHAR(40) NOT NULL,
	`hash_session` VARCHAR(40) DEFAULT NULL,
	`clave_cifrar` VARCHAR(15) DEFAULT NULL,
	`sig_codigo` VARCHAR(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- End SQL-Dump
