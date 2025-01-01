/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpCerSolicitud$$
CREATE PROCEDURE SpCerSolicitud(
	id int,
	estado int, 
	observacion VARCHAR(400),
	userUpdate VARCHAR(20)
)
BEGIN
	  UPDATE solicitud as sol SET 
	  sol.estado = estado,
	  sol.fechaCierre = NOW(),
	  sol.observacionCierre = observacion,
	  sol.fechaModifica = NOW(),
	  sol.usuarioModifica = userUpdate
	  WHERE sol.estadoAuditoria = 1 and sol.id = id;
	
END
$$