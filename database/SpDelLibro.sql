/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpDelLibro$$
CREATE PROCEDURE SpDelLibro(
   id INT,
   userdelete VARCHAR(20)
)
BEGIN

UPDATE libro AS lib
SET lib.fechaElimina=NOW(), 
lib.usuarioElimina = userdelete, 
lib.estadoAuditoria=0 
WHERE lib.id = id;

END
$$