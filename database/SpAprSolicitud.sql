/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpAprSolicitud$$
CREATE PROCEDURE SpAprSolicitud(
	id int,
	estado int,  
	userUpdate VARCHAR(20)
)
BEGIN
	  UPDATE solicitud as sol SET 
	  sol.estado = estado,
	  sol.fechaAutorizacion = NOW(),
	  sol.fechaModifica = NOW(),
	  sol.usuarioModifica = userUpdate
	  WHERE sol.estadoAuditoria = 1 and sol.id = id;
	
END
$$