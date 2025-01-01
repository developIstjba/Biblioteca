/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsArea$$
CREATE PROCEDURE SpConsArea(
	id int
)
BEGIN
SELECT ar.id, 
	ar.nombre, 
	ar.descripcion, 
	ar.estadoAuditoria, 
	ar.fechaIngreso, 
	ar.usuarioIngreso, 
	ar.fechaModifica, 
	ar.usuarioModifica, 
	ar.fechaElimina, 
	ar.usuarioElimina 
	FROM categoria AS ar 
	WHERE ar.estadoAuditoria = 1 
   AND (((id IS NULL) AND (ar.id IS NOT NULL)) OR (ar.id = id));
END
$$

