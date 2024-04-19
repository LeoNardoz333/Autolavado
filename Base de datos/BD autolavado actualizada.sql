CREATE DATABASE if NOT exists Autolavado;
USE Autolavado;

#TABLAS 

CREATE USER if NOT EXISTS 'userAutolavado'@'localhost' IDENTIFIED BY 'chivas123';
GRANT ALL PRIVILEGES ON Autolavado.* TO 'userAutolavado'@'localhost';
FLUSH PRIVILEGES;

DROP TABLE if EXISTS empleados;
CREATE TABLE empleados(
idEmpleado INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50),
noAutos INT, 
noClientes INT,
permisos ENUM('admin','usuario'));

DROP TABLE if EXISTS tipoAuto;
CREATE TABLE tipoAuto(
idTipoAuto INT AUTO_INCREMENT PRIMARY KEY,
clasificacion VARCHAR(50),
unidad varchar(50), #medida en la que se evalua: piezas, puertas, etc..
valor DOUBLE); #valor por unidad de medida 

DROP TABLE if EXISTS pagos;
create table pagos(
id int primary key auto_increment,
fkidEmpleado int,
cantidad double,
fecha datetime,
foreign key(fkidEmpleado) references empleados(idEmpleado));

#Aquí ya se especificaría la cantidad, y ya con un trigger insertamos el valor en 
#el pago dependiendo de la clasificación
DROP TABLE if EXISTS ventas;
create table ventas(
id int primary key auto_increment,
fkidEmpleado int,
fkidTipoAuto int,
cantidad double, #cantidad de la unidad de medida
fecha datetime,
foreign key(fkidEmpleado) references empleados(idEmpleado),
foreign key(fkidTipoAuto) references tipoauto(idTipoAuto));

DROP TABLE if EXISTS ventasTotales;
create table ventasTotales(
id int primary key auto_increment,
fkidEmpleado int,
noClientes int,
fecha datetime,
foreign key(fkidEmpleado) references empleados(idEmpleado));

DROP TABLE if EXISTS clientes;
CREATE TABLE clientes(
idClientes INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50),
auto varchar(50),
fkidTipoAuto INT,
turno INT,
FOREIGN KEY(fkidTipoAuto) REFERENCES tipoauto (idTipoAuto));



#PROCEDIMIENTOS

#Procedimiento para empleados

DELIMITER $$
DROP PROCEDURE if EXISTS p_insertarempleados;
CREATE PROCEDURE p_insertarempleados(
    IN p_idEmpleado INT,
    IN p_nombre VARCHAR(50),
    IN p_noAutos INT,
    IN p_noClientes INT,
    IN p_permisos ENUM('admin','usuario')
)
BEGIN
    DECLARE x INT;
    SELECT COUNT(*) FROM empleados WHERE nombre = p_nombre INTO x;
    IF x = 0 THEN
        IF p_idEmpleado < 1 THEN
            INSERT INTO empleados VALUES (null, p_nombre, p_noAutos, p_noClientes, p_permisos); 
        ELSE
            UPDATE empleados SET nombre = p_nombre, noAutos = p_noAutos, noClientes = p_noClientes,
				 permisos = p_permisos WHERE idEmpleado = p_idEmpleado;
        END IF;
    ELSE
        UPDATE empleados SET nombre = p_nombre, noAutos = p_noAutos, noClientes = p_noClientes, 
		  permisos = p_permisos WHERE idEmpleado = p_idEmpleado;
    END IF;
END;

DELIMITER $$
DROP PROCEDURE if EXISTS p_eliminarempleados;
create procedure p_eliminarempleados(
in p_idEmpleado INT
)
BEGIN
	delete from empleados where idEmpleado = p_idEmpleado;
END;

DELIMITER $$
DROP PROCEDURE if EXISTS p_mostrarempleados;
create procedure p_mostrarempleados(
in p_nombre VARCHAR(50)
)
BEGIN
	select * from empleados where nombre like concat('%',p_nombre,'%');
END;


//Procedimiento para clientes

DELIMITER $$
DROP PROCEDURE if EXISTS p_insertarclientes;
CREATE PROCEDURE p_insertarclientes(
    IN p_idClientes INT,
    IN p_auto VARCHAR(50),
    IN p_nombre VARCHAR(50),
    IN p_fkidTipoAuto INT,
    IN p_turno INT
)
BEGIN
    DECLARE x INT;
    SELECT COUNT(*) FROM clientes WHERE nombre = p_nombre INTO x;
    IF x = 0 THEN
        IF p_idClientes < 1 THEN
            INSERT INTO clientes VALUES (null, p_nombre, p_auto, p_fkidTipoAuto, p_turno); 
        ELSE
            UPDATE clientes SET nombre = p_nombre, auto = p_auto, fkidTipoAuto = p_fkidTipoAuto, turno = p_turno 
				WHERE idClientes = p_idClientes;
        END IF;
    ELSE
        UPDATE clientes SET nombre = p_nombre, auto = p_auto, fkidTipoAuto = p_fkidTipoAuto, turno = p_turno 
		  WHERE idClientes = p_idClientes;
    END IF;
END;

#CALL p_insertarclientes(-1,'prueba cliente',1,5);
#SELECT * FROM clientes;

DELIMITER $$
DROP PROCEDURE if EXISTS p_eliminarclientes;
create procedure p_eliminarclientes(
in p_idClientes INT
)
BEGIN
	delete from clientes where idClientes = p_idClientes;
END;

DELIMITER $$
DROP PROCEDURE if EXISTS p_mostrarclientes;
create procedure p_mostrarclientes(
in p_nombre VARCHAR(5)
)
BEGIN
	SELECT * from clientes where nombre like p_nombre;
END;


#Procedimientos tipoAuto
DROP TABLE if EXISTS tipoAuto;
CREATE TABLE tipoAuto(
idTipoAuto INT AUTO_INCREMENT PRIMARY KEY,
auto varchar(50),
clasificacion VARCHAR(50),
unidad varchar(50), #medida en la que se evalua: piezas, puertas, etc..
valor DOUBLE); #valor por unidad de medida 

DELIMITER $$
DROP PROCEDURE if EXISTS p_insertartipoauto;
CREATE PROCEDURE p_insertartipoauto(
    IN p_idTipoAuto INT,
    IN p_clasificacion VARCHAR(50),
    IN p_unidad VARCHAR(50),
    IN p_valor DOUBLE
)
BEGIN
    DECLARE x INT;
    SELECT COUNT(*) FROM tipoAuto WHERE clasificacion = p_clasificacion INTO x;
    IF x = 0 THEN
        IF p_idTipoAuto < 1 THEN
            INSERT INTO tipoAuto VALUES (NULL, p_clasificacion, p_unidad, p_valor); 
        ELSE
            UPDATE tipoAuto SET  clasificacion = p_clasificacion, unidad = p_unidad, valor = p_valor 
				WHERE idTipoAuto = p_idTipoAuto;
        END IF;
    ELSE
        UPDATE tipoAuto SET clasificacion = p_clasificacion, unidad = p_unidad, valor = p_valor 
		  WHERE idTipoAuto = p_idTipoAuto;
    END IF;
END;


DELIMITER $$
DROP PROCEDURE if EXISTS p_eliminartipoauto;
create procedure p_eliminartipoauto(
in p_idTipoAuto INT
)
BEGIN
	delete from tipoAuto where idTipoAuto = p_idTipoAuto;
END;

DELIMITER $$
DROP PROCEDURE if EXISTS p_mostrartipoauto;
create procedure p_mostrartipoauto(
in p_clasificacion VARCHAR(40)
)
BEGIN
	SELECT * from tipoAuto where clasificacion LIKE p_clasificacion;
END;


#Procedimientos administrador

/*DELIMITER $$
DROP PROCEDURE if EXISTS p_insertaradministrador;
CREATE PROCEDURE p_insertaradministrador(
    IN p_idAdministrador INT,
    IN p_pagosEmpleados DOUBLE,
    IN p_fkidEmpleado INT
)
BEGIN
    DECLARE x INT;
    SELECT COUNT(*) FROM administrador WHERE pagosEmpleados = p_pagosEmpleados INTO x;
    IF x = 0 THEN
        IF p_idAdministrador < 1 THEN
            INSERT INTO administrador VALUES (null, p_pagosEmpleados, p_fkidEmpleado); 
        ELSE
            UPDATE administrador SET pagosEmpleados = p_pagosEmpleados, fkidEmpleado = p_fkidEmpleado WHERE idAdministrador = p_idAdministrador;
        END IF;
    ELSE
        UPDATE administrador SET pagosEmpleados = p_pagosEmpleados, fkidEmpleado = p_fkidEmpleado WHERE idAdministrador = p_idAdministrador;
    END IF;
END;

DELIMITER $$
DROP PROCEDURE if EXISTS p_eliminaradministrador;
create procedure p_eliminaradministrador(
in p_idAdministrador INT
)
BEGIN
	delete from administrador where idAdministrador = p_idAdministrador;
END;*/

DELIMITER $$
DROP PROCEDURE if EXISTS p_mostraradministrador;
create procedure p_mostraradministrador(
in p_idAdministrador INT
)
BEGIN
	SELECT * from administrador where idAdministrador = p_idAdministrador;
END;