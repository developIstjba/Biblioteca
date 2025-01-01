/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpDelRol$$
CREATE PROCEDURE SpDelRol(
   id INT,
   userdelete VARCHAR(20)
)
BEGIN

	UPDATE rol AS ro
	SET ro.fechaElimina=NOW(), 
	ro.usuarioElimina = userdelete, 
	ro.estadoAuditoria=0 
	WHERE ro.id = id;

END
$$