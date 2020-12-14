
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `bicicletas` (
    `id` INT(5) NOT NULL AUTO_INCREMENT,
    `estado` VARCHAR(8) NOT NULL,
	`numero_serial` VARCHAR(10) NOT NULL,
    `nombre` VARCHAR(60) NOT NULL,
    `marca` VARCHAR(10) NOT NULL,
    `modelo` VARCHAR(10) NOT NULL,
    `color1` VARCHAR(10) NOT NULL,
    `color2` VARCHAR(10) NOT NULL,
    `tipo` VARCHAR(10) NOT NULL,
    `valor` VARCHAR(10) NOT NULL,
    `extra_info` VARCHAR(100) NOT NULL,
    
    PRIMARY KEY (`id`),
    UNIQUE KEY `numero_serial` (`numero_serial`)
)  ENGINE=INNODB DEFAULT CHARSET=LATIN1;

INSERT INTO `bicicletas` (`id`,`estado`,`numero_serial`,`nombre`,`marca`, `modelo`, `color1`, `color2`,`tipo`,`valor`,`extra_info`) VALUES
(1, 'Robada', 'AX35635', 'burrita','GW','Hyena', 'azul','blanco','BMX','100000','No tiene conos'),
(2, 'Robada', 'AX35644', 'bike2','BKL','Mona', 'amarillo','blanco','BMX','10043400','No tiene conos'),
(3, 'Normal', 'AX35322', 'bike3','Thanos','Hola', 'azul','negro','Montaña','46400','No tiene conos'),
(4, 'Robada', 'AX35325', 'bike4','Venzo','Julius', 'azul','rojo','Urbana','100000','No tiene conos'),
(5, 'Normal', 'AX31225', 'bike5','Ronco','Kp', 'verde','blanco','BMX','100043300','No tiene conos'),
(6, 'Robada', 'AX12345', 'bike6','Sueq','R1', 'azul','blanco','Plegable','1100','No tiene conos');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
