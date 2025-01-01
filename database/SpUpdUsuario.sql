/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpUpdUsuario$$
CREATE PROCEDURE SpUpdUsuario(
   id INT,
   idrol int,
   cedula VARCHAR(10),
   primerNombre VARCHAR(40),
   segundoNombre VARCHAR(40),
   primerApellido VARCHAR(40),
   segundoApellido VARCHAR(40),   
   correo VARCHAR(400),
	telefono VARCHAR(9), 
	celular VARCHAR(10),  
	direccion VARCHAR(400), 
   username VARCHAR(20),
   clave VARCHAR(200),	 
   userUpdate VARCHAR(20)
)
BEGIN

	UPDATE usuario AS usu
		SET usu.idRol = idrol,
		usu.username = username,
		usu.password = clave,
		usu.cedula = cedula,
		usu.primerNombre = primerNombre,
		usu.segundoNombre = segundoNombre,
		usu.primerApellido = primerApellido,
		usu.segundoApellido = segundoApellido,
		usu.correo = correo,
		usu.telefono = telefono,
		usu.celular = celular,
		usu.direccion = direccion,
		usu.fechaModifica = NOW(),
		usu.usuarioModifica = userUpdate
	WHERE usu.id = id;

END
$$