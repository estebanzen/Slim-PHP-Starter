# Slim-PHP-Starter

Simple API Rest semilla

## Métodos:

> GET
> POST
> PUT
> DELETE

### Url localhost puerto :81

[http://localhost:81/slim_starter/public/api/clientes](http://localhost:81/slim_starter/public/api/clientes "http://localhost:81/slim_starter/public/api/clientes")

### Base de datos de ejemplo
```sql
-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.22 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para slim_starter
CREATE DATABASE IF NOT EXISTS `slim_starter` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `slim_starter`;

-- Volcando estructura para tabla slim_starter.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apellidos` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `departamento` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla slim_starter.clientes: ~0 rows (aproximadamente)
DELETE FROM `clientes`;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `apellidos`, `nombre`, `telefono`, `email`, `direccion`, `ciudad`, `departamento`) VALUES
	(1, 'Gonzales', 'Nestor', '112242466', 'nestorgonzales@gmail.com', 'belgrano 5125', 'Ciudad Autónoma de Buenos Aires', '6to'),
	(2, 'Marta', 'Cardenas', '3523525', 'marta@gmail.com', 'santa fe 1412', '', '');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

```


#### Documentación Oficial de Slim:
[https://www.slimframework.com/docs/](https://www.slimframework.com/docs/ "https://www.slimframework.com/docs/")