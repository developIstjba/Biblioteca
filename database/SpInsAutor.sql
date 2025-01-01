/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpInsAutor$$
CREATE PROCEDURE SpInsAutor(
   primernombre VARCHAR(40),
   segundonombre VARCHAR(40),
   primerapellido VARCHAR(40),
   segundoapellido VARCHAR(40),   
   corporativo int,
   nombrecorporativo VARCHAR(240),   
   usercreate VARCHAR(20)
)
BEGIN

INSERT INTO `autor`(`primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `corporativo`, `nombreCorporativo`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (primernombre, segundonombre, primerapellido ,segundoapellido, corporativo, nombrecorporativo, 1, NOW(), usercreate, null, null, null, null);

END
$$