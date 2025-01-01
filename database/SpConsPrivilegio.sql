/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsPrivilegio$$
CREATE PROCEDURE SpConsPrivilegio(
	id int
)
BEGIN
   
	SELECT pr.id, pr.nombre, pr.descripcion, pr.nivel, pr.estadoAuditoria, pr.fechaIngreso, pr.usuarioIngreso, pr.fechaModifica, pr.usuarioModifica, pr.fechaElimina, pr.usuarioElimina 
	FROM privilegio AS pr 
	WHERE pr.estadoAuditoria = 1 
	AND (((id IS NULL) AND (pr.id IS NOT NULL)) OR (pr.id = id));  

END
$$