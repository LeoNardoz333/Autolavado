DROP DATABASE if EXISTS Autolavado;
CREATE DATABASE Autolavado;
USE Autolavado;

#TABLAS 

CREATE USER if NOT EXISTS 'userAutolavado'@'localhost' IDENTIFIED BY 'chivas123';
GRANT ALL PRIVILEGES ON Autolavado.* TO 'userAutolavado'@'localhost';
FLUSH PRIVILEGES;

DROP TABLE if EXISTS empleados;
CREATE TABLE empleados(
idEmpleado INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50));

CREATE TABLE usuarios(
idUsuario INT AUTO_INCREMENT PRIMARY KEY,
fkidEmpleado INT,
usuario VARCHAR(50),
contrasena VARCHAR(50),
permisos ENUM('admin','usuario'),
FOREIGN KEY(fkidEmpleado) REFERENCES empleados(idEmpleado));

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
fecha date,
foreign key(fkidEmpleado) references empleados(idEmpleado));

DROP TABLE if EXISTS clientes;
CREATE TABLE clientes(
idClientes INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50),
auto varchar(50),
fkidTipoAuto INT,
turno INT,
FOREIGN KEY(fkidTipoAuto) REFERENCES tipoauto (idTipoAuto));

#Aquí ya se especificaría la cantidad, y ya con un trigger insertamos el valor en  la cantidad,
#el pago dependiendo de la clasificación
DROP TABLE if EXISTS ventas;
create table ventas(
id int primary key auto_increment,
fkidEmpleado int,
fkidTipoAuto INT,
fkidCliente INT,
cantidad double, #cantidad de la unidad de medidad
fecha date,
foreign key(fkidEmpleado) references empleados(idEmpleado),
foreign key(fkidCliente) references Clientes(idClientes),
foreign key(fkidTipoAuto) references tipoauto(idTipoAuto));

DROP TABLE if EXISTS ventasTotales;
create table ventasTotales(
id int primary key auto_increment,
fkidEmpleado int,
noClientes int,
fecha date,
foreign key(fkidEmpleado) references empleados(idEmpleado));



#PROCEDIMIENTOS

#Procedimiento para empleadosados

DELIMITER $$
DROP PROCEDURE if EXISTS p_insertarempleados;
CREATE PROCEDURE p_insertarempleados(
    IN p_idEmpleado INT,
    IN p_nombre VARCHAR(50)
)
BEGIN
    DECLARE x INT;
    SELECT COUNT(*) FROM empleados WHERE nombre = p_nombre INTO x;
    IF x = 0 THEN
        IF p_idEmpleado < 1 THEN
            INSERT INTO empleados VALUES (null, p_nombre);
        ELSE
            UPDATE empleados SET nombre = p_nombre
				 WHERE idEmpleado = p_idEmpleado;
        END IF;
    ELSE
        UPDATE empleados SET nombre = p_nombre
		   WHERE idEmpleado = p_idEmpleado;
    END IF;
END;$$

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
END;$$

DELIMITER $$
DROP PROCEDURE if EXISTS p_insertarclientes;
CREATE PROCEDURE p_insertarclientes(
    IN p_idClientes INT,
    IN p_nombre VARCHAR(50),
    IN p_auto VARCHAR(50),
    IN p_fkidTipoAuto INT,
    IN p_turno INT
)
BEGIN
   IF p_idClientes < 1 THEN
      INSERT INTO clientes VALUES (null, p_nombre, p_auto, p_fkidTipoAuto, p_turno); 
   ELSE
      UPDATE clientes SET nombre = p_nombre, auto = p_auto, fkidTipoAuto = p_fkidTipoAuto, turno = p_turno
				WHERE idClientes = p_idClientes;
	END IF;
END;$$

#CALL p_insertarclientes(-1,'prueba cliente',1,5);
#SELECT * FROM clientes;

DELIMITER $$
DROP PROCEDURE if EXISTS p_eliminarclientes;
create procedure p_eliminarclientes(
in p_idClientes INT
)
BEGIN
	delete from clientes where idClientes = p_idClientes;
END;$$

/*DELIMITER $$
DROP PROCEDURE if EXISTS p_mostrarclientes;p_mostrarclientes;
create procedure p_mostrarclientes(rclientes(
in p_nombre VARCHAR(50)
)
BEGIN
	SELECT c.idClientes, c.nombre, c.auto, t.clasificacion, c.turno from clientes c, tipoauto t ombre, c.auto, t.clasificacion, c.turno from clientes c, tipoauto t 
	where nombre like p_nombre AND c.fkidTipoAuto = t.idTipoAuto;re AND c.fkidTipoAuto = t.idTipoAuto;
END;*/

#Procedimientos tipoAuto
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
$$

DELIMITER $$
DROP PROCEDURE if EXISTS p_eliminartipoauto;
create procedure p_eliminartipoauto(
in p_idTipoAuto INT
)
BEGIN
	delete from tipoAuto where idTipoAuto = p_idTipoAuto;
END;$$

DELIMITER $$
DROP PROCEDURE if EXISTS p_mostrartipoauto;
create procedure p_mostrartipoauto(
in p_clasificacion VARCHAR(40)
)
BEGIN
	SELECT * from tipoAuto where clasificacion LIKE p_clasificacion;
END;$$


#Procedimientos administradorador

/*DELIMITER $$
DROP PROCEDURE if EXISTS p_insertaradministrador;p_insertaradministrador;
CREATE PROCEDURE p_insertaradministrador(aradministrador(
    IN p_idAdministrador INT,INT,
    IN p_pagosEmpleados DOUBLE,OUBLE,
    IN p_fkidEmpleado INT
)
BEGIN
    DECLARE x INT;
    SELECT COUNT(*) FROM administrador WHERE pagosEmpleados = p_pagosEmpleados INTO x;administrador WHERE pagosEmpleados = p_pagosEmpleados INTO x;
    IF x = 0 THEN
        IF p_idAdministrador < 1 THENdor < 1 THEN
            INSERT INTO administrador VALUES (null, p_pagosEmpleados, p_fkidEmpleado); dministrador VALUES (null, p_pagosEmpleados, p_fkidEmpleado); 
        ELSE
            UPDATE administrador SET pagosEmpleados = p_pagosEmpleados, fkidEmpleado = p_fkidEmpleado WHERE idAdministrador = p_idAdministrador;strador SET pagosEmpleados = p_pagosEmpleados, fkidEmpleado = p_fkidEmpleado WHERE idAdministrador = p_idAdministrador;
        END IF;
    ELSE
        UPDATE administrador SET pagosEmpleados = p_pagosEmpleados, fkidEmpleado = p_fkidEmpleado WHERE idAdministrador = p_idAdministrador;dor SET pagosEmpleados = p_pagosEmpleados, fkidEmpleado = p_fkidEmpleado WHERE idAdministrador = p_idAdministrador;
    END IF;
END;

DELIMITER $$
DROP PROCEDURE if EXISTS p_eliminaradministrador;p_eliminaradministrador;
create procedure p_eliminaradministrador(aradministrador(
in p_idAdministrador INT
)
BEGIN
	delete from administrador where idAdministrador = p_idAdministrador;r where idAdministrador = p_idAdministrador;
END;*/

DELIMITER $$
DROP PROCEDURE if EXISTS p_mostraradministrador;
create procedure p_mostraradministrador(
in p_idAdministrador INT
)
BEGIN
	SELECT * from administrador where idAdministrador = p_idAdministrador;
END;$$

delimiter $$
CREATE TRIGGER insertar_ventasTotales
AFTER INSERT ON ventas
FOR EACH ROW
BEGIN
	DECLARE existe INT;
	SELECT COUNT(*) INTO existe FROM ventastotales WHERE fkidEmpleado = NEW.fkidEmpleado
		AND fecha = NEW.fecha;
	if existe > 0 then
		UPDATE ventastotales SET noClientes = noClientes + 1 WHERE fkidEmpleado = NEW.fkidEmpleado
			AND fecha = NEW.fecha;
	ELSE
		INSERT INTO ventastotales values(NULL, NEW.fkidEmpleado, 1, NEW.fecha);
	END if;
END; $$

#Actualizar ventas y clientesntes
delimiter $$
DROP TRIGGER if EXISTS modificar_pagos;
CREATE TRIGGER modificar_pagos
AFTER UPDATE ON ventas
FOR EACH ROW
BEGIN
	DECLARE cantidadActual INT;
   DECLARE valorNuevo float;
   DECLARE valorViejo float;
   select valor into valorNuevo from tipoAuto WHERE idTipoAuto = new.fkidTipoAuto;
   select valor into valorViejo from tipoAuto where idTipoAuto = old.fkidTipoAuto;
	SELECT cantidad INTO cantidadActual from pagos where fecha = new.fecha and fkidEmpleado = new.fkidEmpleado;
	if NEW.cantidad != OLD.cantidad then
		UPDATE pagos SET cantidad = (cantidadActual - (old.cantidad * valorViejo)) + (new.cantidad * valorNuevo)
            WHERE fkidEmpleado = NEW.fkidEmpleado AND fecha = NEW.fecha;
   END if;
END; $$

delimiter $$
DROP TRIGGER if EXISTS quitar_pagos;
CREATE TRIGGER quitar_pagos
AFTER delete ON ventas
FOR EACH ROW
BEGIN
	DECLARE cantidadActual INT;
    DECLARE valorViejo float;
    select valor into valorViejo from tipoAuto where idTipoAuto = old.fkidTipoAuto;
	SELECT cantidad INTO cantidadActual from pagos where fecha = old.fecha;
	UPDATE pagos SET cantidad = (cantidadActual - (old.cantidad * valorViejo)) 
        WHERE fkidEmpleado = old.fkidEmpleado AND fecha = old.fecha;
END; $$

/*delimiter $$
drop trigger if exists insertar_venta;
create trigger insertar_venta
after insert on clientes
for each ROW
BEGIN
    insert into ventas(fkidTipoAuto, fkidCliente, fecha) values(new.fkidTipoAuto, new.idClientes, NOW());
end; $$*/

delimiter ;

CREATE VIEW v_pagosDiarios AS
SELECT p.id, e.idEmpleado, e.nombre, p.cantidad, p.fecha FROM pagos p, empleados e
WHERE p.fkidEmpleado = e.idEmpleado;

CREATE VIEW v_clientesTotales AS
SELECT v.id, e.idEmpleado, e.nombre, v.noClientes, v.fecha FROM ventasTotales v, empleados e
WHERE v.fkidEmpleado = e.idEmpleado;

CREATE VIEW v_clientesFecha AS
SELECT v.id, e.idEmpleado, e.nombre, a.clasificacion, v.cantidad, v.fecha FROM ventas v, empleados e, tipoauto a
WHERE v.fkidEmpleado = e.idEmpleado AND v.fkidTipoAuto = a.idTipoAuto;

CREATE VIEW v_turno AS
SELECT turno
FROM clientes
ORDER BY idClientes DESC
LIMIT 1;

CREATE VIEW v_clientes as
SELECT c.idClientes, c.nombre, c.auto, t.clasificacion, c.turno from clientes c, tipoauto t
	where c.fkidTipoAuto = t.idTipoAuto;
	
SELECT * FROM v_turno;
SELECT * FROM v_clientes;