/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpInsLibroAutor$$
CREATE PROCEDURE SpInsLibroAutor(
   idLibro int,
   idAutor int,
   userCreate VARCHAR(20)
)
BEGIN

INSERT INTO `libroautor`(`idLibro`, `idAutor`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (idLibro, idAutor, 1, NOW(), userCreate, null, null, null, null);

END
$$