/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpDelPermiso$$
CREATE PROCEDURE SpDelPermiso(
   id INT,
   userdelete VARCHAR(20)
)
BEGIN

	UPDATE permiso AS pe
	SET pe.fechaElimina=NOW(), 
	pe.usuarioElimina = userdelete, 
	pe.estadoAuditoria=0 
	WHERE pe.id = id;

END
$$