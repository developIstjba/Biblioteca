/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsTipoSolicitante$$
CREATE PROCEDURE SpConsTipoSolicitante(
	id int
)
BEGIN
	SELECT 
		ro.id, 
		ro.nombre, 
		ro.descripcion, 
		ro.mnemonico, 
		ro.estadoAuditoria, 
		ro.fechaIngreso, 
		ro.usuarioIngreso, 
		ro.fechaModifica, 
		ro.usuarioModifica, 
		ro.fechaElimina, 
		ro.usuarioElimina 
	FROM tiposolicitante AS ro
	WHERE ro.estadoAuditoria <> 0 
   AND (((id IS null or id = 0) AND (ro.id IS NOT NULL)) OR (ro.id = id));
END
$$