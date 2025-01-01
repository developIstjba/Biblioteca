/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpUpdLibroArea$$
CREATE PROCEDURE SpUpdLibroArea(
   idLibro INT,
   idArea INT,
   estado SMALLINT,
   userUpdate VARCHAR(20)
)
BEGIN

    UPDATE libroarea AS lar
    SET lar.fechaModifica = NOW(), 
    lar.usuarioModifica = userUpdate, 
    lar.estadoAuditoria  = estado 
    WHERE lar.idLibro = idLibro AND lar.idArea = idArea;

END
$$