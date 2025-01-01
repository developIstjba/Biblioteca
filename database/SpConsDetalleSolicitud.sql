/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsDetalleSolicitud$$
CREATE PROCEDURE SpConsDetalleSolicitud(
	idSolicitud int,
	idLibro INT,
	estado SMALLINT
)
BEGIN
SELECT la.id, 
	la.idLibro, 
	la.idSolicitud, 
	la.estadoAuditoria, 
	la.fechaIngreso, 
	la.usuarioIngreso, 
	la.fechaModifica, 
	la.usuarioModifica, 
	la.fechaElimina, 
	la.usuarioElimina,
	lib.titulo,
	lib.codigo,
	edi.nombre as nombreEditorial,
	(SELECT GROUP_CONCAT(case when aut.corporativo <> 1 then concat(aut.primerApellido,' ',aut.primerNombre) else aut.nombreCorporativo end) FROM autor as aut, libroautor AS laut WHERE laut.idLibro = lib.id and aut.id = laut.idAutor and laut.estadoAuditoria =1) as autores
	FROM detallesolicitud AS la
	INNER JOIN libro AS lib ON la.idLibro = lib.id 
	INNER JOIN editorial AS edi ON lib.idEditorial = edi.id 
	WHERE (((estado IS NULL) AND (la.estadoAuditoria IS NOT NULL)) OR (la.estadoAuditoria = estado))
	AND (((idSolicitud IS NULL) AND (la.idSolicitud IS NOT NULL)) OR (la.idSolicitud = idSolicitud))
    AND (((idLibro IS NULL) AND (la.idLibro IS NOT NULL)) OR (la.idLibro = idLibro));
END
$$

