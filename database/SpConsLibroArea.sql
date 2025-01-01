/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsLibroArea$$
CREATE PROCEDURE SpConsLibroArea(
	idLibro int,
	idArea INT,
	estado SMALLINT
)
BEGIN
SELECT la.id, 
	la.idLibro, 
	la.idArea, 
	la.estadoAuditoria, 
	la.fechaIngreso, 
	la.usuarioIngreso, 
	la.fechaModifica, 
	la.usuarioModifica, 
	la.fechaElimina, 
	la.usuarioElimina,
	ar.nombre as nombreArea 
	FROM libroarea AS la 
	INNER JOIN categoria AS ar ON la.idArea = ar.id and ar.estadoAuditoria = 1
	WHERE (((estado IS NULL) AND (la.estadoAuditoria IS NOT NULL)) OR (la.estadoAuditoria = estado))
	AND (((idArea IS NULL) AND (la.idArea IS NOT NULL)) OR (la.idArea = idArea))
    AND (((idLibro IS NULL) AND (la.idLibro IS NOT NULL)) OR (la.idLibro = idLibro));
END
$$

