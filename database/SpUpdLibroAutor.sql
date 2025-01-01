/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpUpdLibroAutor$$
CREATE PROCEDURE SpUpdLibroAutor(
   idLibro INT,
   idAutor INT,
   estado SMALLINT,
   userUpdate VARCHAR(20)
)
BEGIN

    UPDATE libroautor AS lau
    SET lau.fechaModifica = NOW(), 
    lau.usuarioModifica = userUpdate, 
    lau.estadoAuditoria = estado 
    WHERE lau.idLibro = idLibro AND lau.idAutor = idAutor;

END
$$