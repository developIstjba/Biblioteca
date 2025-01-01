/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsPermiso$$
CREATE PROCEDURE SpConsPermiso(
	id int
)
BEGIN
	SELECT 
		pe.id, 
		pe.idRol,
		ro.nombre AS nombreRol, 
		pe.idMenu,
		me.nombre AS nombreMenu, 
		pe.descripcion,
		pe.idPrivilegio,
		pe.estadoAuditoria, 
		pe.fechaIngreso, 
		pe.usuarioIngreso, 
		pe.fechaModifica, 
		pe.usuarioModifica, 
		pe.fechaElimina, 
		pe.usuarioElimina,
		pr.nombre AS nombrePrivilegio 
	FROM permiso AS pe
	INNER JOIN menu AS me ON pe.idMenu = me.id
	INNER JOIN rol AS ro ON pe.idRol = ro.id 
	INNER JOIN privilegio AS pr ON pe.idPrivilegio = pr.id
	WHERE pe.estadoAuditoria = 1 
   AND (((id IS NULL) AND (pe.id IS NOT NULL)) OR (pe.id = id));
END
$$