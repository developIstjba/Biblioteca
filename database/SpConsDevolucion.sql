/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsDevolucion$$
CREATE PROCEDURE SpConsDevolucion(
	id int
)
BEGIN
SELECT pre.id,
	pre.cedula,
	pre.nombres,
	pre.apellidos,
	pre.correo,
	pre.telefono,
	pre.celular,
	pre.direccion,
	pre.fecha,
	pre.observacion,
	pre.estado,
	pre.fechaIngreso,
	pre.usuarioIngreso,
	pre.fechaModifica,
	pre.usuarioModifica,
	pre.fechaElimina,
	pre.usuarioElimina 
	FROM prestamo AS pre
	INNER JOIN devolucion AS dev ON pre.id = dev.idprestamo AND dev.estado = 1 
	WHERE pre.estado = 1 
   AND (((id IS NULL) AND (pre.id IS NOT NULL)) OR (pre.id = id));
END
$$