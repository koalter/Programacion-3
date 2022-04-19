-- Tabla: usuario
-- (id autoincrement ,nombre,apellido, clave,mail,fecha_de_registro )
CREATE TABLE `utn_prog3`.`usuario` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `nombre` VARCHAR(50) NOT NULL , 
    `apellido` VARCHAR(50) NOT NULL , 
    `clave` VARCHAR(100) NOT NULL , 
    `mail` VARCHAR(100) NOT NULL , 
    `fecha_de_registro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `localidad` VARCHAR(100) NOT NULL , 
    PRIMARY KEY (`id`), 
    UNIQUE (`mail`)
) ENGINE = InnoDB;

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `clave`, `mail`, `fecha_de_registro`, `localidad`) 
VALUES (101, 'Esteban', 'Madou', '2345', 'dkantor0@example.com', '2021-01-07', 'Quilmes'),
    (102, 'German', 'Gerram', '1234', 'ggerram1@hud.gov', '2020-05-08', 'Berazategui'),
    (103, 'Deloris', 'Fosis', '5678', 'bsharpe2@wisc.edu', '2020-11-28', 'Avellaneda'),
    (104, 'Brok', 'Neiner', '4567', 'bblazic3@desdev.cn', '2020-12-08', 'Quilmes'),
    (105, 'Garrick', 'Brent', '6789', 'gbrent4@theguardian.com', '2020-12-17', 'Moron'),
    (106, 'Bili', 'Baus', '0123', 'bhoff5@addthis.com', '2020-11-27', 'Moreno');

-- Tabla:producto
-- (id autoincremental,código_de_barra (6 cifras ),nombre ,tipo, stock,
-- precio,fecha_de_creación,fecha_de_modificación )
CREATE TABLE `utn_prog3`.`producto` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `codigo_de_barra` INT(8) NULL , 
    `nombre` VARCHAR(100) NOT NULL , 
    `tipo` VARCHAR(50) NOT NULL , 
    `stock` INT NULL , 
    `precio` FLOAT NULL , 
    `fecha_de_creacion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `fecha_de_modificacion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`), 
    UNIQUE (`codigo_de_barra`)
) ENGINE = InnoDB;

INSERT INTO `producto` (`id`, `codigo_de_barra`, `nombre`, `tipo`, `stock`, `precio`,
    `fecha_de_creacion`, `fecha_de_modificacion`)
VALUES (1001, 77900361, 'Westmacott', 'liquido', 33, 15.87, '2021-02-09', '2020-09-26'),
    (1002, 77900362, 'Spirit', 'solido', 45, 69.74, '2020-09-18', '2020-04-14'),
    (1003, 77900363, 'Newgrosh', 'polvo', 14, 68.19, '2020-11-29', '2021-02-11'),
    (1004, 77900364, 'McNickle', 'polvo', 19, 53.51, '2020-11-28', '2020-04-17'),
    (1005, 77900365, 'Hudd', 'solido', 68, 26.56, '2020-12-19', '2020-06-19'),
    (1006, 77900366, 'Schrader', 'polvo', 17, 96.54, '2020-08-02', '2020-04-18'),
    (1007, 77900367, 'Bachellier', 'solido', 59, 69.17, '2021-01-30', '2020-06-07'),
    (1008, 77900368, 'Fleming', 'solido', 38, 66.77, '2020-10-26', '2020-10-03'),
    (1009, 77900369, 'Hurry', 'solido', 44, 43.01, '2020-07-04', '2020-05-30'),
    (1010, 77900310, 'Krauss', 'polvo', 73, 35.73, '2021-03-03', '2020-08-30');

-- Tabla:venta
-- (id autoincremental,id_producto ,id_usuario, cantidad,fecha_de_venta, )
CREATE TABLE `utn_prog3`.`venta` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `id_producto` INT NOT NULL , 
    `id_usuario` INT NOT NULL , 
    `cantidad` INT NOT NULL , 
    `fecha_de_venta` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`), 
    INDEX (`id_producto`, `id_usuario`)
) ENGINE = InnoDB;

ALTER TABLE `venta` 
ADD CONSTRAINT `fk_producto` FOREIGN KEY (`id_producto`) 
REFERENCES `producto`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; 
ALTER TABLE `venta` 
ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) 
REFERENCES `usuario`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO `venta` (`id_producto`, `id_usuario`, `cantidad`, `fecha_de_venta`)
VALUES (1001, 101, 2, '2020-07-19'),
    (1008, 102, 3, '2020-08-16'),
    (1007, 102, 4, '2021-01-24'),
    (1006, 103, 5, '2021-01-14'),
    (1003, 104, 6, '2021-03-20'),
    (1005, 105, 7, '2021-02-22'),
    (1003, 104, 6, '2020-12-02'),
    (1003, 106, 6, '2020-06-10'),
    (1002, 106, 6, '2021-02-04'),
    (1001, 106, 1, '2020-05-17');

--
-- 3.- Realizar las siguientes consultas.
--
-- 1. Obtener los detalles completos de todos los usuarios, ordenados alfabéticamente.
SELECT * FROM `usuario`
ORDER BY `apellido`;

-- 2. Obtener los detalles completos de todos los productos líquidos.
SELECT * FROM `producto`
WHERE `tipo` = 'liquido';

-- 3. Obtener todas las compras en los cuales la cantidad esté entre 6 y 10 inclusive.
SELECT * FROM `venta`
WHERE `cantidad` BETWEEN 6 AND 10;

-- 4. Obtener la cantidad total de todos los productos vendidos.
SELECT SUM(`cantidad`) from `venta`;

-- 5. Mostrar los primeros 3 números de productos que se han enviado.
SELECT `id`, `codigo_de_barra` FROM `producto`
LIMIT 3;

-- 6. Mostrar los nombres del usuario y los nombres de los productos de cada venta.
SELECT u.`nombre` as 'usuario', p.`nombre` as 'producto' FROM `venta` v, `usuario` u, `producto` p
WHERE v.`id_usuario` = u.`id`
AND v.`id_producto` = p.`id`;

-- 7. Indicar el monto (cantidad * precio) por cada una de las ventas.
SELECT ROUND(`cantidad`*`precio`, 2) as monto FROM `venta` v, `producto` p
WHERE v.`id_producto` = p.`id`;

-- 8. Obtener la cantidad total del producto 1003 vendido por el usuario 104.
SELECT COUNT(`cantidad`) FROM `venta`
WHERE `id_producto` = 1003
AND `id_usuario` = 104;

-- 9. Obtener todos los números de los productos vendidos por algún usuario de ‘Avellaneda’
SELECT p.`id`, p.`codigo_de_barra` FROM `venta` v, `usuario` u, `producto` p
WHERE v.`id_usuario` = u.`id`
AND v.`id_producto` = p.`id`
AND u.`localidad` = 'Avellaneda';

-- 10. Obtener los datos completos de los usuarios cuyos nombres contengan la letra ‘u’.
SELECT * FROM `usuario`
WHERE `nombre` LIKE ('%u%');

-- 11. Traer las ventas entre junio del 2020 y febrero 2021.
SELECT * FROM `venta`
WHERE `fecha_de_venta` BETWEEN STR_TO_DATE('2020-06-01', '%Y-%m-%d') AND STR_TO_DATE('2021-02-28', '%Y-%m-%d');

-- 12. Obtener los usuarios registrados antes del 2021.
SELECT * FROM `usuario`
WHERE `fecha_de_registro` < '2021-01-01';

-- 13. Agregar el producto llamado ‘Chocolate’, de tipo Sólido y con un precio de 25,35.
INSERT INTO `producto` (`nombre`, `tipo`, `precio`)
VALUES ('Chocolate', 'solido', 25.35);

-- 14. Insertar un nuevo usuario.
INSERT INTO `usuario` (`nombre`, `apellido`, `clave`, `mail`, `localidad`)
VALUES ('Lorenzo', 'Cea', 'p455w0rd', 'callejeros1984@hotmail.com', 'CABA');

-- 15. Cambiar los precios de los productos de tipo sólido a 66,60.
UPDATE `producto`
SET `precio` = 66.66
WHERE `tipo` = 'solido';

-- 16. Cambiar el stock a 0 de todos los productos cuyas cantidades de stock sean menores a 20 inclusive.
UPDATE `producto`
SET `stock` = 0
WHERE `stock` <= 20

-- 17. Eliminar el producto número 1010.
DELETE FROM `producto`
WHERE `id` = 1010

-- 18. Eliminar a todos los usuarios que no han vendido productos.
DELETE FROM `usuario`
WHERE `id` NOT IN (SELECT `id_usuario` FROM `venta`);