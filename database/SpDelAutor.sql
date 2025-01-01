/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpDelAutor$$
CREATE PROCEDURE SpDelAutor(
   id INT,
   userdelete VARCHAR(20)
)
BEGIN

    UPDATE autor AS aut
    SET aut.fechaElimina=NOW(), 
    aut.usuarioElimina = userdelete, 
    aut.estadoAuditoria=0 
    WHERE aut.id = id;

END
$$