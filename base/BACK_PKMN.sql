/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.6.26 : Database - pkmn
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`pkmn` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pkmn`;

/*Table structure for table `tbl_entrenador` */

DROP TABLE IF EXISTS `tbl_entrenador`;

CREATE TABLE `tbl_entrenador` (
  `ID_ENTRENADOR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TIPOENTRENADOR` int(11) DEFAULT NULL,
  `NOMBRE_ENTRENADOR` varchar(20) NOT NULL,
  `ALIAS_ENTRENADOR` varchar(20) DEFAULT NULL,
  `SEXO_ENTRENADOR` char(1) NOT NULL,
  `RIVAL_ENTRENADOR` varchar(20) DEFAULT NULL,
  `SOBREMI_ENTRENADOR` varchar(60) DEFAULT NULL,
  `CONTRA_ENTRENADOR` varchar(20) NOT NULL,
  `ADMIN_ENTRENADOR` varchar(20) DEFAULT NULL,
  `NUM_INTENTOS` int(11) DEFAULT '0',
  `FECHA_BLOQUEO` varchar(20) DEFAULT NULL,
  `BLOQUEO` int(11) DEFAULT '0',
  PRIMARY KEY (`ID_ENTRENADOR`),
  KEY `FK_TIPOENTRENADOR_ENTRENADOR` (`ID_TIPOENTRENADOR`),
  CONSTRAINT `FK_TIPOENTRENADOR_ENTRENADOR` FOREIGN KEY (`ID_TIPOENTRENADOR`) REFERENCES `tbl_tipoentrenador` (`ID_TIPOENTRENADOR`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_entrenador` */

insert  into `tbl_entrenador`(`ID_ENTRENADOR`,`ID_TIPOENTRENADOR`,`NOMBRE_ENTRENADOR`,`ALIAS_ENTRENADOR`,`SEXO_ENTRENADOR`,`RIVAL_ENTRENADOR`,`SOBREMI_ENTRENADOR`,`CONTRA_ENTRENADOR`,`ADMIN_ENTRENADOR`,`NUM_INTENTOS`,`FECHA_BLOQUEO`,`BLOQUEO`) values (1,1,'Dario','PRO','M','TPI',NULL,'\'!BAdÙ„	rW‘¹È‚','ót¿}à#×‡º‡uj…4Â',0,NULL,0),(2,2,'Roman','PRO','M','TPI',NULL,'Ô\0Oß‹%ºOQVf/bDÅ','\'!BAdÙ„	rW‘¹È‚',0,'2015-12-10 22:14:47',0),(3,3,'Araya','PRO','M','TPI',NULL,'Ô\0Oß‹%ºOQVf/bDÅ','\'!BAdÙ„	rW‘¹È‚',0,NULL,0);

/*Table structure for table `tbl_equipo` */

DROP TABLE IF EXISTS `tbl_equipo`;

CREATE TABLE `tbl_equipo` (
  `ID_EQUIPO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ENTRENADOR` int(11) DEFAULT NULL,
  `NOMBRE_EQUIPO` varchar(20) NOT NULL,
  `CANTIDAD_EQUIPO` int(11) NOT NULL,
  PRIMARY KEY (`ID_EQUIPO`),
  KEY `FK_ENTRENADOR_EQUIPO` (`ID_ENTRENADOR`),
  CONSTRAINT `FK_ENTRENADOR_EQUIPO` FOREIGN KEY (`ID_ENTRENADOR`) REFERENCES `tbl_entrenador` (`ID_ENTRENADOR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_equipo` */

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `ID_MENU` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TIPOENTRENADOR` int(11) DEFAULT NULL,
  `NOMBRE_MENU` varchar(20) NOT NULL,
  `DESCRIPCION_MENU` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ID_MENU`),
  KEY `FK_TIPOENTRENADOR_MENU` (`ID_TIPOENTRENADOR`),
  CONSTRAINT `FK_TIPOENTRENADOR_MENU` FOREIGN KEY (`ID_TIPOENTRENADOR`) REFERENCES `tbl_tipoentrenador` (`ID_TIPOENTRENADOR`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`ID_MENU`,`ID_TIPOENTRENADOR`,`NOMBRE_MENU`,`DESCRIPCION_MENU`) values (3,2,'Medallas','Contiene los tipos de medallas disponibles'),(4,3,'Ribbon','Listones de Coordinacion'),(5,4,'Guarderia','Sitio de crianza y nacimiento'),(6,3,'Vestimenta','Ropa de gala para PKMN');

/*Table structure for table `tbl_pkmn` */

DROP TABLE IF EXISTS `tbl_pkmn`;

CREATE TABLE `tbl_pkmn` (
  `ID_PKMN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_EQUIPO` int(11) DEFAULT NULL,
  `NOMBRE_PKMN` varchar(20) NOT NULL,
  `SEXO_PKMN` char(1) NOT NULL,
  `NATURALEZA_PKMN` varchar(20) DEFAULT NULL,
  `FOTO_PKMN` longblob,
  `TIPO1_PKMN` varchar(20) NOT NULL,
  `TIPO2_PKMN` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_PKMN`),
  KEY `FK_EQUIPO_PKMN` (`ID_EQUIPO`),
  CONSTRAINT `FK_EQUIPO_PKMN` FOREIGN KEY (`ID_EQUIPO`) REFERENCES `tbl_equipo` (`ID_EQUIPO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pkmn` */

/*Table structure for table `tbl_submenu` */

DROP TABLE IF EXISTS `tbl_submenu`;

CREATE TABLE `tbl_submenu` (
  `ID_SUBMENU` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MENU` int(11) DEFAULT NULL,
  `NOMBRE_SUBMENU` varchar(20) NOT NULL,
  `DESCRIPCION_SUBMENU` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ID_SUBMENU`),
  KEY `FK_MENU_SUBMENU` (`ID_MENU`),
  CONSTRAINT `FK_MENU_SUBMENU` FOREIGN KEY (`ID_MENU`) REFERENCES `tbl_menu` (`ID_MENU`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_submenu` */

insert  into `tbl_submenu`(`ID_SUBMENU`,`ID_MENU`,`NOMBRE_SUBMENU`,`DESCRIPCION_SUBMENU`) values (1,3,'Roca','Medalla entregada por Brook'),(2,4,'Liston Rojo','Liston de Coordinacion'),(3,5,'Plus Def','Sube Def'),(4,4,'Liston Azul','Liston Azul'),(5,6,'Botas','Velocidad'),(6,6,'Sombrero','Da Misterio');

/*Table structure for table `tbl_tipoentrenador` */

DROP TABLE IF EXISTS `tbl_tipoentrenador`;

CREATE TABLE `tbl_tipoentrenador` (
  `ID_TIPOENTRENADOR` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_TIPOENTRENADOR` varchar(30) NOT NULL,
  `DESCRIPCION_TIPOENTRENADOR` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPOENTRENADOR`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_tipoentrenador` */

insert  into `tbl_tipoentrenador`(`ID_TIPOENTRENADOR`,`NOMBRE_TIPOENTRENADOR`,`DESCRIPCION_TIPOENTRENADOR`) values (1,'Administrador','Encargado de Administrar este sitio'),(2,'Entrenador','Encargado de capturar, criar, enfrentar y cuidar Pokemon'),(3,'Coordinador','Participa en concursos de belleza y destreza Pokemon'),(4,'Criador','Encargado del bienestar, alimentacion y habitat Pokemon'),(5,'Contabilidad','Llevar regiustros');

/* Trigger structure for table `tbl_menu` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tr_MenuCascada` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tr_MenuCascada` BEFORE DELETE ON `tbl_menu` FOR EACH ROW BEGIN
	
	delete from tbl_submenu WHERE ID_MENU = old.ID_MENU;
    END */$$


DELIMITER ;

/* Trigger structure for table `tbl_tipoentrenador` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tr_PerfilCascada` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tr_PerfilCascada` BEFORE DELETE ON `tbl_tipoentrenador` FOR EACH ROW BEGIN
	delete from tbl_menu WHERE ID_TIPOENTRENADOR = old.ID_TIPOENTRENADOR;
	DELETE FROM tbl_entrenador WHERE ID_TIPOENTRENADOR = old.ID_TIPOENTRENADOR;
    END */$$


DELIMITER ;

/* Procedure structure for procedure `sp_gestionarEntrenador` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_gestionarEntrenador` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_gestionarEntrenador`(
		sAccion INT,
		sId INT,
		sTipo INT,
		sNombre VARCHAR(20),
		sAlias VARCHAR(20),
		sSexo VARCHAR(1),
		sRival VARCHAR(20),
		sPass VARCHAR(20),
		sPassA VARCHAR(20)
    )
BEGIN
    
    -- Accion1 Agregar Entrenador ------------------------------------------
	IF(sAccion = 1)
		THEN
		BEGIN
			INSERT INTO tbl_entrenador 
			(ID_TIPOENTRENADOR, NOMBRE_ENTRENADOR, ALIAS_ENTRENADOR, SEXO_ENTRENADOR, RIVAL_ENTRENADOR, CONTRA_ENTRENADOR)
			VALUES
			( sTipo, sNombre, sAlias, sSexo, sRival, AES_ENCRYPT(sPass,'llave'));
		END;
	END IF;
    -- Accion2 Obtener TODO por el Nombre ------------------------------------------
	IF(sAccion = 2)
		THEN
		BEGIN
			SELECT ID_ENTRENADOR, ID_TIPOENTRENADOR, NOMBRE_ENTRENADOR, ALIAS_ENTRENADOR, SEXO_ENTRENADOR, RIVAL_ENTRENADOR, SOBREMI_ENTRENADOR, AES_DECRYPT(CONTRA_ENTRENADOR,'llave') AS CONTRA_ENTRENADOR, AES_DECRYPT(ADMIN_ENTRENADOR,'llave') AS ADMIN_ENTRENADOR, NUM_INTENTOS, FECHA_BLOQUEO, BLOQUEO 
			FROM tbl_entrenador WHERE NOMBRE_ENTRENADOR = sNombre;
		END;
	END IF;	
    -- Accion3 Actualizar por el ID ------------------------------------------
	IF(sAccion = 3)
		THEN
		BEGIN
			UPDATE tbl_entrenador 
				SET
				
				ID_TIPOENTRENADOR = sTipo , 
				NOMBRE_ENTRENADOR = sNombre , 
				ALIAS_ENTRENADOR = sAlias , 
				SEXO_ENTRENADOR = sSexo , 
				RIVAL_ENTRENADOR = sRival , 
				CONTRA_ENTRENADOR = AES_ENCRYPT(sPass,'llave') ,
				ADMIN_ENTRENADOR = AES_ENCRYPT(sPassA,'llave') 
				
				WHERE
				ID_ENTRENADOR = sId ;
		END;
	END IF;
	-- Accion4 Borrar Registro de la tabla por su ID ------------------------------------------
	IF(sAccion = 4)
		THEN
		BEGIN
			DELETE FROM tbl_entrenador WHERE ID_ENTRENADOR = sId;
		END;
	END IF;	
	-- Accion5 Obtener TODO de la tabla ------------------------------------------
	IF(sAccion = 5)
		THEN
		BEGIN
			SELECT ID_ENTRENADOR, ID_TIPOENTRENADOR, NOMBRE_ENTRENADOR, ALIAS_ENTRENADOR, SEXO_ENTRENADOR, RIVAL_ENTRENADOR, SOBREMI_ENTRENADOR, AES_DECRYPT(CONTRA_ENTRENADOR,'llave') AS CONTRA_ENTRENADOR, AES_DECRYPT(ADMIN_ENTRENADOR,'llave') AS ADMIN_ENTRENADOR, NUM_INTENTOS, FECHA_BLOQUEO, BLOQUEO 
			FROM tbl_entrenador ORDER BY ID_TIPOENTRENADOR	ASC;
		END;
	END IF;	
	-- Accion6 Obtener TODO por el ID ------------------------------------------
	IF(sAccion = 6)
		THEN
		BEGIN
			SELECT ID_ENTRENADOR, ID_TIPOENTRENADOR, NOMBRE_ENTRENADOR, ALIAS_ENTRENADOR, SEXO_ENTRENADOR, RIVAL_ENTRENADOR, SOBREMI_ENTRENADOR, AES_DECRYPT(CONTRA_ENTRENADOR,'llave') AS CONTRA_ENTRENADOR, AES_DECRYPT(ADMIN_ENTRENADOR,'llave') AS ADMIN_ENTRENADOR, NUM_INTENTOS, FECHA_BLOQUEO, BLOQUEO 
			FROM tbl_entrenador WHERE ID_ENTRENADOR = sId;
		END;
	END IF;	
	-- Accion7 Actualizar PARA ADMINISTRADOR ------------------------------------------
	IF(sAccion = 7)
		THEN
		BEGIN
			UPDATE tbl_entrenador 
				SET
				
				ID_TIPOENTRENADOR = sTipo , 
				NOMBRE_ENTRENADOR = sNombre , 
				ALIAS_ENTRENADOR = sAlias , 
				SEXO_ENTRENADOR = sSexo , 
				RIVAL_ENTRENADOR = sRival ,
				CONTRA_ENTRENADOR = AES_ENCRYPT(sPass,'llave') , 
				ADMIN_ENTRENADOR = AES_ENCRYPT(sPassA,'llave') 
				
				WHERE
				ID_ENTRENADOR = sId ;
		END;
	END IF;
	-- Accion8 Actualizar PARA ADMINISTRADOR ------------------------------------------
	IF(sAccion = 8)
		THEN
		BEGIN
			INSERT INTO tbl_entrenador 
			(ID_TIPOENTRENADOR, NOMBRE_ENTRENADOR, ALIAS_ENTRENADOR, SEXO_ENTRENADOR, RIVAL_ENTRENADOR, ADMIN_ENTRENADOR)
			VALUES
			( sTipo, sNombre, sAlias, sSexo, sRival, AES_ENCRYPT(sPassA,'llave'));
		END;
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_gestionarMenu` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_gestionarMenu` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_gestionarMenu`(
		sAccion INT,
		sId INT,
		sTipoEntrenador  INT,
		sNombre VARCHAR(20),
		sDesc VARCHAR(60)
	)
BEGIN
    
        -- Accion1 Agregar Menu ------------------------------------------
	IF(sAccion = 1)
		THEN
		BEGIN
						
			INSERT INTO tbl_menu 
			(ID_TIPOENTRENADOR, NOMBRE_MENU, DESCRIPCION_MENU)
			VALUES
			( sTipoEntrenador, sNombre, sDesc);
		END;
	END IF;	
	
	-- Accion2 Buscar Menu por el Nombre------------------------------------------
	IF(sAccion = 2)
		THEN
		BEGIN
			SELECT * FROM tbl_menu WHERE NOMBRE_MENU = sNombre;
		END;
	END IF;	
	-- Accion3 Actualizar por el ID ------------------------------------------
	IF(sAccion = 3)
		THEN
		BEGIN
			UPDATE tbl_menu 
			SET
			
			ID_TIPOENTRENADOR = sTipoEntrenador , 
			NOMBRE_MENU = sNombre , 
			DESCRIPCION_MENU = sDesc
			
			WHERE
			ID_MENU = sId ;
		END;
	END IF;
	-- Accion4 Borrar Registro de la tabla por su ID ------------------------------------------
	IF(sAccion = 4)
		THEN
		BEGIN
			DELETE FROM tbl_menu WHERE ID_MENU = sId;
		END;
	END IF;
	-- Accion5 TODO de Menu ------------------------------------------
	IF(sAccion = 5)
		THEN
		BEGIN
			SELECT * FROM tbl_menu ORDER BY ID_TIPOENTRENADOR ASC;
		END;
	END IF;	
	-- Accion6 Obtener TODO por el ID ------------------------------------------
	IF(sAccion = 6)
		THEN
		BEGIN
			SELECT * FROM tbl_menu WHERE ID_MENU = sId;
		END;
	END IF;
	-- Accion7 Obtener Todos los registros por un Perfil  ------------------------------------------
	IF(sAccion = 7)
		THEN
		BEGIN
			SELECT * FROM tbl_menu WHERE ID_TIPOENTRENADOR = sTipoEntrenador;
		END;
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_gestionarPerfiles` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_gestionarPerfiles` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_gestionarPerfiles`(
		sAccion INT,
		sId INT,
		sNombre VARCHAR(20),
		sDesc VARCHAR(60)
   )
BEGIN
 -- Accion1 Agregar Nuevo Perfil ------------------------------------------
	IF(sAccion = 1)
		THEN
		BEGIN
			INSERT INTO tbl_tipoentrenador 
				( NOMBRE_TIPOENTRENADOR, DESCRIPCION_TIPOENTRENADOR )
				VALUES
				( sNombre, sDesc);
		END;
	END IF;	
	
    -- Accion2 Obtener TODO por el Nombre ------------------------------------------
	IF(sAccion = 2)
		THEN
		BEGIN
			SELECT * FROM tbl_tipoentrenador WHERE NOMBRE_TIPOENTRENADOR = sNombre;
		END;
	END IF;	
    -- Accion3 Actualizar por el ID ------------------------------------------
	IF(sAccion = 3)
		THEN
		BEGIN
			
			UPDATE tbl_tipoentrenador 
				SET
				NOMBRE_TIPOENTRENADOR = sNombre , 
				DESCRIPCION_TIPOENTRENADOR = sDesc
				
				WHERE
				ID_TIPOENTRENADOR = sId ;
		END;
	END IF;
    -- Accion4 Borrar Registro de la tabla por su ID ------------------------------------------
	IF(sAccion = 4)
		THEN
		BEGIN
			DELETE FROM tbl_tipoentrenador WHERE ID_TIPOENTRENADOR = sId;
		END;
	END IF;	
    -- Accion5 Obtener TODO de la tabla ------------------------------------------
	IF(sAccion = 5)
		THEN
		BEGIN
			SELECT * FROM tbl_tipoentrenador ORDER BY NOMBRE_TIPOENTRENADOR ASC;
		END;
	END IF;	
      -- Accion6 Obtener TODO por el ID ------------------------------------------
	IF(sAccion = 6)
		THEN
		BEGIN
			SELECT * FROM tbl_tipoentrenador WHERE ID_TIPOENTRENADOR = sId;
		END;
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_gestionarSubMenu` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_gestionarSubMenu` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_gestionarSubMenu`(
		sAccion INT,
		sId INT,
		sMenu INT,
		sNombre VARCHAR(20),
		sDesc VARCHAR(60)
    )
BEGIN
	-- Accion1 Agregar Nuevo SubMenu ------------------------------------------
	IF(sAccion = 1)
		THEN
		BEGIN
			INSERT INTO tbl_submenu 
				(ID_MENU, NOMBRE_SUBMENU, DESCRIPCION_SUBMENU)
				VALUES
				(sMenu, sNombre, sDesc);
		END;
	END IF;	
	
	 -- Accion2 Obtener TODO por el Nombre ------------------------------------------
	IF(sAccion = 2)
		THEN
		BEGIN
			SELECT * FROM tbl_submenu WHERE NOMBRE_SUBMENU = sNombre;
		END;
	END IF;	
	-- Accion3 Actualizar por el ID ------------------------------------------
	IF(sAccion = 3)
		THEN
		BEGIN
			UPDATE tbl_submenu 
			SET
			ID_MENU = sMenu , 
			NOMBRE_SUBMENU = sNombre , 
			DESCRIPCION_SUBMENU = sDesc
			
			WHERE
			ID_SUBMENU = sId ;
		END;
	END IF;
	-- Accion4 Borrar Registro de la tabla por su ID ------------------------------------------
	IF(sAccion = 4)
		THEN
		BEGIN
			DELETE FROM tbl_submenu WHERE ID_SUBMENU = sId;
		END;
	END IF;
	-- Accion5 TODO de Menu ------------------------------------------
	IF(sAccion = 5)
		THEN
		BEGIN
			SELECT * FROM tbl_submenu ORDER BY ID_MENU ASC;
		END;
	END IF;	
	-- Accion6 Obtener TODO por el ID ------------------------------------------
	IF(sAccion = 6)
		THEN
		BEGIN
			SELECT * FROM tbl_submenu WHERE ID_SUBMENU = sId;
		END;
	END IF;
	-- Accion7 Obtener TODO por el ID ------------------------------------------
	IF(sAccion = 7)
		THEN
		BEGIN
			SELECT * FROM tbl_submenu WHERE ID_MENU = sMenu;
		END;
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_Seguridad` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_Seguridad` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Seguridad`(
		sAccion INT,
		sId INT,
		sNombre VARCHAR(20),
		sIntento INT,
		sFechaBloqueo VARCHAR(20),
		sBloqueo INT
		
	)
BEGIN
	-- Accion1 Agregar Intento ------------------------------------------
	IF(sAccion = 1)
		THEN
		BEGIN
			UPDATE tbl_entrenador 
				SET				
				NUM_INTENTOS = sIntento 
				WHERE
				NOMBRE_ENTRENADOR = sNombre ;
		END;
	END IF;
	-- Accion2 Obtener Intento ------------------------------------------
	IF(sAccion = 2)
		THEN
		BEGIN
			SELECT NUM_INTENTOS FROM  tbl_entrenador WHERE NOMBRE_ENTRENADOR = sNombre ;
		END;
	END IF;
	-- Accion3 Reiniciar Intento ------------------------------------------
	IF(sAccion = 3)
		THEN
		BEGIN
			UPDATE tbl_entrenador 
				SET				
				NUM_INTENTOS = 0 
				WHERE
				NOMBRE_ENTRENADOR = sNombre ;
		END;
	END IF;
	-- Accion4 Obtener Fecha ------------------------------------------
	IF(sAccion = 4)
		THEN
		BEGIN
			SELECT FECHA_BLOQUEO FROM  tbl_entrenador WHERE NOMBRE_ENTRENADOR = sNombre ;
		END;
	END IF;
	-- Accion5 Actualizar Fecha ------------------------------------------
	IF(sAccion = 5)
		THEN
		BEGIN
			UPDATE tbl_entrenador 
				SET				
				FECHA_BLOQUEO = sFechaBloqueo 
				WHERE
				NOMBRE_ENTRENADOR = sNombre ;
		END;
	END IF;
	-- Accion6 BLOQUEAR ------------------------------------------
	IF(sAccion = 6)
		THEN
		BEGIN
			UPDATE tbl_entrenador 
				SET				
				BLOQUEO = sBloqueo
				WHERE
				NOMBRE_ENTRENADOR = sNombre ;
		END;
	END IF;
	-- Accion7 OBTENER BLOQUEO ------------------------------------------
	IF(sAccion = 7)
		THEN
		BEGIN
			SELECT BLOQUEO FROM  tbl_entrenador WHERE NOMBRE_ENTRENADOR = sNombre ;
		END;
	END IF;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
