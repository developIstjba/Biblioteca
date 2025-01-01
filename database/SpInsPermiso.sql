/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpInsPermiso$$
CREATE PROCEDURE SpInsPermiso(
   idrol int,
   idmenu int,
   descripcion VARCHAR(400),
   idPrivilegio int,
   usercreate VARCHAR(20)
)
BEGIN

INSERT INTO permiso(`idRol`, `idMenu`, `idPrivilegio`, `descripcion`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (idrol,idmenu,idPrivilegio,descripcion,1,NOW(),usercreate,null,null,null,null);

END
$$