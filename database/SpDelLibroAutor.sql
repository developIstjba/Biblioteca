/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpDelLibroAutor$$
CREATE PROCEDURE SpDelLibroAutor(
   idLibro INT,
   userDelete VARCHAR(20)
)
BEGIN

    UPDATE libroautor AS lau
    SET lau.fechaElimina=NOW(), 
    lau.usuarioElimina = userDelete, 
    lau.estadoAuditoria = 0 
    WHERE lau.idLibro = idLibro;

END
$$