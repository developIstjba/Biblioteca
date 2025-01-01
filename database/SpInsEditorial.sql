/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpInsEditorial$$
CREATE PROCEDURE SpInsEditorial(
   nombre VARCHAR(80),
   direccion VARCHAR(400),
   usercreate VARCHAR(20)
)
BEGIN

INSERT INTO `editorial`(`nombre`, `direccion`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`)
VALUES (nombre, direccion, 1, NOW(), usercreate, null, null, null, null);

END
$$