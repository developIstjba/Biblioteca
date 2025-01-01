/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsLibroDisponible$$
CREATE PROCEDURE SpConsLibroDisponible(
	id int,
	titulo VARCHAR(400)
)
BEGIN
select * from 
(SELECT lib.id,
	lib.codigo,
	lib.idEditorial, 
	lib.titulo, 
	lib.pais, 
	lib.anio, 
	lib.isbn, 
	lib.idTipo, 
	lib.copias, 
	lib.estadoAuditoria, 
	edi.nombre AS nombreEditorial, 
	(SELECT GROUP_CONCAT(ar.nombre) from categoria as ar, libroarea AS liar WHERE liar.idLibro = lib.id and ar.id = liar.idArea and liar.estadoAuditoria = 1) as areas,
    (SELECT GROUP_CONCAT(case when aut.corporativo <> 1 then concat(aut.primerApellido,' ',aut.primerNombre) else aut.nombreCorporativo end) FROM autor as aut, libroautor AS laut WHERE laut.idLibro = lib.id and aut.id = laut.idAutor and laut.estadoAuditoria =1) as autores, 
	(case when (select count(dsol.idLibro) from detallesolicitud as dsol inner join solicitud as sol on dsol.idSolicitud = sol.id and sol.estado = 2 and sol.estadoAuditoria = 1 where dsol.idLibro = lib.id and dsol.estadoAuditoria = 1) < lib.copias then 1 else 0 end) as disponibilidad  
    FROM libro AS lib 
	INNER JOIN editorial AS edi ON lib.idEditorial = edi.id 
	WHERE lib.estadoAuditoria = 1 
) as tmpsol
WHERE tmpsol.estadoAuditoria = 1 and tmpsol.disponibilidad = 1 
   	AND (((titulo IS NULL) AND (tmpsol.titulo IS NOT NULL)) OR (tmpsol.titulo = titulo)) 
  	AND (((id IS NULL) AND (tmpsol.id IS NOT NULL)) OR (tmpsol.id = id));
END
$$