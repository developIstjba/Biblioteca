/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsPrestamo$$
CREATE PROCEDURE SpConsPrestamo(
	id INT,
	estado smallint
)
BEGIN
SELECT pre.id,
	pre.idTipoSolicitante, 
	pre.idArea,
	pre.cedula,
	pre.nombres,
	pre.apellidos,
	pre.correo,
	pre.telefono,
	pre.celular,
	pre.direccion,
	pre.fechaPrestamo,
	pre.observacionPrestamo,
	pre.fechaAutorizacion,
	pre.fechaCierre,
	pre.observacionCierre,	
	pre.estado,
	pre.estadoAuditoria,
	pre.fechaIngreso,
	pre.usuarioIngreso,
	pre.fechaModifica,
	pre.usuarioModifica,
	pre.fechaElimina,
	pre.usuarioElimina,
	(SELECT timestampdiff(DAY, pre.fechaAutorizacion, now())) AS diasPrestamo,
	ar.nombre as nombreArea,
	tsol.nombre as nombreTipoSolicitante
	FROM solicitud AS pre
	INNER JOIN tiposolicitante AS tsol ON pre.idTipoSolicitante = tsol.id 
	INNER JOIN carrera AS ar ON pre.idArea = ar.id 
	WHERE pre.estadoAuditoria = 1 
	AND (((estado IS null or estado = 0) AND (pre.estado IS NOT NULL)) OR (pre.estado = estado)) 
    AND (((id IS null or id = 0) AND (pre.id IS NOT NULL)) OR (pre.id = id));
END
$$