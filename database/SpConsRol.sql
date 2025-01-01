/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsRol$$
CREATE PROCEDURE SpConsRol(
	id int
)
BEGIN
	SELECT 
		ro.id, 
		ro.nombre, 
		ro.descripcion, 
		ro.mnemonico, 
		ro.estado,
		ro.estadoAuditoria, 
		ro.fechaIngreso, 
		ro.usuarioIngreso, 
		ro.fechaModifica, 
		ro.usuarioModifica, 
		ro.fechaElimina, 
		ro.usuarioElimina 
	FROM rol AS ro
	WHERE ro.estadoAuditoria <> 0 
   AND (((id IS NULL) AND (ro.id IS NOT NULL)) OR (ro.id = id));
END
$$