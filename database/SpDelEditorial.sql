/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpDelEditorial$$
CREATE PROCEDURE SpDelEditorial(
   id INT,
   userdelete VARCHAR(20)
)
BEGIN

UPDATE editorial AS edi
SET edi.fechaElimina=NOW(), 
edi.usuarioElimina = userdelete, 
edi.estadoAuditoria=0 
WHERE edi.id = id;

END
$$