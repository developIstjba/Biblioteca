/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsLibro$$
CREATE PROCEDURE SpConsLibro(
	id int,
	titulo VARCHAR(400),
	idTipo int,
	idEditorial int
)
BEGIN
SELECT lib.id,
	lib.codigo,
	lib.idEditorial, 
	lib.titulo, 
	lib.pais, 
	lib.anio, 
	lib.isbn, 
	lib.idTipo, 
	lib.portada, 
	lib.url, 
	lib.copias,
	lib.ubicacion,
	lib.estadoAuditoria, 
	lib.fechaIngreso, 
	lib.usuarioIngreso, 
	lib.fechaModifica, 
	lib.usuarioModifica, 
	lib.fechaElimina, 
	lib.usuarioElimina, 
	edi.nombre AS nombreEditorial, 
	tlib.nombre AS nombreTipo,
	(SELECT GROUP_CONCAT(ar.nombre) from categoria as ar, libroarea AS liar WHERE liar.idLibro = lib.id and ar.id = liar.idArea and liar.estadoAuditoria = 1) as areas,
    (SELECT GROUP_CONCAT(case when aut.corporativo <> 1 then concat(aut.primerApellido,' ',aut.primerNombre) else aut.nombreCorporativo end) FROM autor as aut, libroautor AS laut WHERE laut.idLibro = lib.id and aut.id = laut.idAutor and laut.estadoAuditoria =1) as autores,
    (case when (select count(dsol.idLibro) from detallesolicitud as dsol inner join solicitud as sol on dsol.idSolicitud = sol.id and sol.estado = 2 and sol.estadoAuditoria = 1 where dsol.idLibro = lib.id and DSOL.estadoAuditoria = 1) < lib.copias then 1 else 0 end) as disponibilidad 
	FROM libro AS lib 
	INNER JOIN editorial AS edi ON lib.idEditorial = edi.id 
	INNER JOIN tipolibro AS tlib ON lib.idTipo = tlib.id 
	WHERE lib.estadoAuditoria <> 0 
   	AND (((titulo IS NULL) AND (lib.titulo IS NOT NULL)) OR (lib.titulo = titulo)) 
   	AND (((idTipo IS NULL) AND (lib.idTipo IS NOT NULL)) OR (lib.idTipo = idTipo)) 
   	AND (((idEditorial IS NULL) AND (lib.idEditorial IS NOT NULL)) OR (lib.idEditorial = idEditorial))
  	AND (((id IS NULL) AND (lib.id IS NOT NULL)) OR (lib.id = id));
END
$$