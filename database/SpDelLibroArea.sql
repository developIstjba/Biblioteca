/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpDelLibroArea$$
CREATE PROCEDURE SpDelLibroArea(
   idLibro INT,
   userDelete VARCHAR(20)
)
BEGIN

    UPDATE libroarea AS lar
    SET lar.fechaElimina = NOW(), 
    lar.usuarioElimina = userDelete, 
    lar.estadoAuditoria=0 
    WHERE lar.idLibro = idLibro;

END
$$