/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpInsRol$$
CREATE PROCEDURE SpInsRol(
   nombre VARCHAR(100),
   descripcion VARCHAR(400),
   mnemonico VARCHAR(4),
   usercreate VARCHAR(20)
)
BEGIN

INSERT INTO `rol`(`nombre`, `descripcion`, `mnemonico`, `estado`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`)
VALUES (nombre, descripcion, mnemonico,1 ,1, NOW(), usercreate, null, null, null, null);

END
$$