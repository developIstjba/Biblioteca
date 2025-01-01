/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpInsLibroArea$$
CREATE PROCEDURE SpInsLibroArea(
   idLibro int,
   idArea int,
   userCreate VARCHAR(20)
)
BEGIN

INSERT INTO `libroarea`(`idLibro`, `idArea`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (idLibro, idArea, 1, NOW(), userCreate, null, null, null, null);

END
$$