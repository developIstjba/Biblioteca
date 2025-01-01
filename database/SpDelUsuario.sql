/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpDelUsuario$$
CREATE PROCEDURE SpDelUsuario(
   id INT,
   userdelete VARCHAR(20)
)
BEGIN

	UPDATE usuario AS usu
	SET usu.fechaElimina=NOW(), 
	usu.usuarioElimina = userdelete, 
	usu.estadoAuditoria=0 
	WHERE usu.id = id;

END
$$