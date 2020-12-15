
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `perdidas` (
    `id` INT(5) NOT NULL AUTO_INCREMENT,
    `nserial` VARCHAR(10) NOT NULL,
    `fecha` DATE NOT NULL,
	`hora` VARCHAR(10) NOT NULL,
    `lugar` VARCHAR(60) NOT NULL,
    `info_lugar` VARCHAR(60) NOT NULL,
    `detalles` VARCHAR(60) NOT NULL,
    `recompensa` VARCHAR(10) NOT NULL,
    `nombre` VARCHAR(20),
    `email` VARCHAR(20),
    `telefono` VARCHAR(12),
    
    PRIMARY KEY (`id`),
    UNIQUE KEY `nserial` (`nserial`)
)  ENGINE=INNODB DEFAULT CHARSET=LATIN1;

INSERT INTO `perdidas` (`id`,`nserial`,`fecha`,`hora`,`lugar`, `info_lugar`, `detalles`, `recompensa`,`nombre`,`email`,`telefono`) VALUES
(1, 'AX35635', '2020-12-14', '08:30','Sincelejo','En la esquina de la casa', 'Buscar luna azul','20000','','',''),
(2, 'AX12345', '2020-12-15', '17:45','Bquilla','No hay des', 'Depende','Maravilla','Plegable','gusta@gmail.com','625126');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
