/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsEditorial$$
CREATE PROCEDURE SpConsEditorial(
	id int
)
BEGIN
	SELECT edi.id, 
	edi.nombre, 
	edi.direccion, 
	edi.estadoAuditoria, 
	edi.fechaIngreso, 
	edi.usuarioIngreso, 
	edi.fechaModifica, 
	edi.usuarioModifica, 
	edi.fechaElimina, 
	edi.usuarioElimina, 
	(SELECT COUNT(*) FROM libro AS lib WHERE lib.idEditorial = edi.id) AS numeroLibros
	FROM editorial AS edi
	WHERE edi.estadoAuditoria = 1 
   AND (((id IS NULL) AND (edi.id IS NOT NULL)) OR (edi.id = id))
	ORDER BY edi.id DESC;
END
$$