/*
SQLyog Ultimate v9.02 
MySQL - 5.5.5-10.1.30-MariaDB : Database - bdequipoav
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdequipoav` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `bdequipoav`;

/*Table structure for table `departamento` */

DROP TABLE IF EXISTS `departamento`;

CREATE TABLE `departamento` (
  `iddep` int(11) NOT NULL AUTO_INCREMENT,
  `deptos` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`iddep`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `departamento` */

LOCK TABLES `departamento` WRITE;

insert  into `departamento`(`iddep`,`deptos`) values (1,'ADSystem'),(2,'Sistemas'),(3,'Electrica'),(4,'Patrimonio Cultural');

UNLOCK TABLES;

/*Table structure for table `detalle` */

DROP TABLE IF EXISTS `detalle`;

CREATE TABLE `detalle` (
  `iddetalle` int(15) NOT NULL AUTO_INCREMENT,
  `reservate` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `equipores` int(11) DEFAULT NULL,
  `localres` int(11) DEFAULT NULL,
  `horai` time DEFAULT NULL,
  `horaf` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `grupores` int(11) DEFAULT NULL,
  `ciclo` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `materiares` int(11) DEFAULT NULL,
  `estadores` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`iddetalle`),
  KEY `FK_detalle` (`localres`),
  KEY `FK_detalleeq` (`equipores`),
  KEY `FK_detalleus` (`reservate`),
  KEY `FK_detallemateria` (`materiares`),
  KEY `FK_detallegrupo` (`grupores`),
  CONSTRAINT `FK_detalle` FOREIGN KEY (`localres`) REFERENCES `local` (`idlocal`),
  CONSTRAINT `FK_detalleeq` FOREIGN KEY (`equipores`) REFERENCES `equipoav` (`idequipo`),
  CONSTRAINT `FK_detallegrupo` FOREIGN KEY (`grupores`) REFERENCES `grupo` (`idgrupo`),
  CONSTRAINT `FK_detallemateria` FOREIGN KEY (`materiares`) REFERENCES `materia` (`idmat`),
  CONSTRAINT `FK_detalleus` FOREIGN KEY (`reservate`) REFERENCES `usuario` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `detalle` */

LOCK TABLES `detalle` WRITE;

insert  into `detalle`(`iddetalle`,`reservate`,`equipores`,`localres`,`horai`,`horaf`,`fecha`,`grupores`,`ciclo`,`materiares`,`estadores`) values (12,'user1',3,10,'13:00:00','16:20:00','2018-05-31',5,'II',2,'activo'),(13,'user1',3,1,'13:00:00','15:00:00','2018-05-31',1,'I',2,'activo');

UNLOCK TABLES;

/*Table structure for table `equipoav` */

DROP TABLE IF EXISTS `equipoav`;

CREATE TABLE `equipoav` (
  `idequipo` int(11) NOT NULL AUTO_INCREMENT,
  `equipo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `marcaeq` int(11) NOT NULL,
  `numerodeserie` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaingreso` date NOT NULL,
  `estado` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `caracteristicas` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `departamentos` int(11) NOT NULL,
  PRIMARY KEY (`idequipo`),
  KEY `FK_equipoavde` (`departamentos`),
  KEY `FK_equipoavmarca` (`marcaeq`),
  CONSTRAINT `FK_equipoavde` FOREIGN KEY (`departamentos`) REFERENCES `departamento` (`iddep`),
  CONSTRAINT `FK_equipoavmarca` FOREIGN KEY (`marcaeq`) REFERENCES `marca` (`idmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `equipoav` */

LOCK TABLES `equipoav` WRITE;

insert  into `equipoav`(`idequipo`,`equipo`,`marcaeq`,`numerodeserie`,`fechaingreso`,`estado`,`caracteristicas`,`departamentos`) values (2,'Proyector',2,'p','2018-01-01','Disponible','kdfsklfnal',3),(3,'Laptop',3,'843584','2018-01-02','Disponible','klsdglksdlk',3);

UNLOCK TABLES;

/*Table structure for table `grupo` */

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo` (
  `idgrupo` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `seccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idgrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `grupo` */

LOCK TABLES `grupo` WRITE;

insert  into `grupo`(`idgrupo`,`grupo`,`seccion`) values (1,'Sis11','A'),(2,'Sis11','B'),(3,'Sis11','Unico'),(4,'Sis12','A'),(5,'Sis12','B'),(6,'Sis12','Unico');

UNLOCK TABLES;

/*Table structure for table `local` */

DROP TABLE IF EXISTS `local`;

CREATE TABLE `local` (
  `idlocal` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idlocal`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `local` */

LOCK TABLES `local` WRITE;

insert  into `local`(`idlocal`,`local`) values (1,'101'),(2,'102'),(3,'103'),(4,'104'),(5,'C101'),(6,'C102'),(7,'C103'),(8,'C104'),(9,'CC1'),(10,'CC2'),(11,'CC3'),(12,'CC4'),(13,'Auditorio');

UNLOCK TABLES;

/*Table structure for table `marca` */

DROP TABLE IF EXISTS `marca`;

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idmarca`),
  KEY `FK_marca` (`marca`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `marca` */

LOCK TABLES `marca` WRITE;

insert  into `marca`(`idmarca`,`modelo`,`marca`) values (2,'EXP-81758','Epson'),(3,'Satellite','Toshiba');

UNLOCK TABLES;

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `idmat` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idmat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `materia` */

LOCK TABLES `materia` WRITE;

insert  into `materia`(`idmat`,`materia`) values (2,'Desarrolo De Aplicaciones Para La Web'),(3,'Aplicacion De Metodologias Agiles y Testeo de Software');

UNLOCK TABLES;

/*Table structure for table `mod` */

DROP TABLE IF EXISTS `mod`;

CREATE TABLE `mod` (
  `idmod` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `marca` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `mod` */

LOCK TABLES `mod` WRITE;

UNLOCK TABLES;

/*Table structure for table `reportefalla` */

DROP TABLE IF EXISTS `reportefalla`;

CREATE TABLE `reportefalla` (
  `idrep` int(11) NOT NULL AUTO_INCREMENT,
  `usuariofall` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `equipofall` int(11) NOT NULL,
  `aulafall` int(11) NOT NULL,
  `grupofall` int(11) NOT NULL,
  `fallo` blob NOT NULL,
  `estadorep` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idrep`),
  KEY `FK_reportefalla` (`aulafall`),
  KEY `FK_reportefallausu` (`usuariofall`),
  KEY `FK_reportefallaequi` (`equipofall`),
  KEY `FK_reportefallagrupo` (`grupofall`),
  CONSTRAINT `FK_reportefalla` FOREIGN KEY (`aulafall`) REFERENCES `local` (`idlocal`),
  CONSTRAINT `FK_reportefallaequi` FOREIGN KEY (`equipofall`) REFERENCES `equipoav` (`idequipo`),
  CONSTRAINT `FK_reportefallagrupo` FOREIGN KEY (`grupofall`) REFERENCES `grupo` (`idgrupo`),
  CONSTRAINT `FK_reportefallausu` FOREIGN KEY (`usuariofall`) REFERENCES `usuario` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `reportefalla` */

LOCK TABLES `reportefalla` WRITE;

UNLOCK TABLES;

/*Table structure for table `tipous` */

DROP TABLE IF EXISTS `tipous`;

CREATE TABLE `tipous` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tipous` */

LOCK TABLES `tipous` WRITE;

insert  into `tipous`(`idtipo`,`tipos`) values (1,'Administrador'),(2,'Usuario');

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `iduser` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dep` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`iduser`),
  KEY `FK_usuariodep` (`dep`),
  KEY `FK_usuariotip` (`tipo`),
  CONSTRAINT `FK_usuariodep` FOREIGN KEY (`dep`) REFERENCES `departamento` (`iddep`),
  CONSTRAINT `FK_usuariotip` FOREIGN KEY (`tipo`) REFERENCES `tipous` (`idtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

insert  into `usuario`(`iduser`,`nombre`,`apellido`,`pass`,`dep`,`tipo`) values ('admin1','Geovanny','Ram','12345',1,1),('user1','Rafael','Ram','1',2,2),('user2','Miguel','Martinez','12345',3,2),('user3','erajoi','oÃ©fvsdp','12',4,2);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
