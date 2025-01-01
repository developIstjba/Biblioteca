/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsCarrera$$
CREATE PROCEDURE SpConsCarrera(
	id int
)
BEGIN
SELECT ar.id, 
	ar.nombre, 
	ar.mnemonico, 
	ar.estadoAuditoria, 
	ar.fechaIngreso, 
	ar.usuarioIngreso, 
	ar.fechaModifica, 
	ar.usuarioModifica, 
	ar.fechaElimina, 
	ar.usuarioElimina 
	FROM carrera AS ar 
	WHERE ar.estadoAuditoria = 1 
   AND (((id IS NULL) AND (ar.id IS NOT NULL)) OR (ar.id = id));
END
$$
