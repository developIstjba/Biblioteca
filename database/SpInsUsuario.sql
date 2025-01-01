/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpInsUsuario$$
CREATE PROCEDURE SpInsUsuario(
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
   usercreate VARCHAR(20)
)
BEGIN

INSERT INTO `usuario`(`idRol`, `username`, `password`, `cedula`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `correo`, `telefono`, `celular`, `direccion`, `estado`,`estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (idrol, username, clave, cedula, primerNombre, segundoNombre, primerApellido ,segundoApellido, correo, telefono, celular, direccion, 1,1, NOW(), usercreate, null, null, null, null);

END
$$