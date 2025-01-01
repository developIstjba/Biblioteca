/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpUpdSolicitud$$
CREATE PROCEDURE SpUpdSolicitud(
	id int,
   	cedula VARCHAR(10),
   	fecha datetime,
   	nombres VARCHAR(80),
   	apellidos VARCHAR(80),
	correo VARCHAR(200),
   	telefono VARCHAR(9),   
   	celular VARCHAR(10),
	direccion VARCHAR(400), 
	tipoSolicitante int,  
	observacion VARCHAR(400), 
	area int, 
	userUpdate VARCHAR(20)
)
BEGIN
	  UPDATE solicitud as sol SET 
	  sol.idTipoSolicitante=tipoSolicitante,
	  sol.cedula=cedula,
	  sol.nombres=nombres,
	  sol.apellidos=apellidos,
	  sol.correo=correo,
	  sol.telefono=telefono,
	  sol.celular=celular,
	  sol.direccion=direccion,
	  sol.fechaPrestamo= fecha,
	  sol.observacionPrestamo=observacion,
	  sol.idArea = area,
	  sol.fechaModifica=NOW(),
	  sol.usuarioModifica=userUpdate
	  WHERE sol.estadoAuditoria = 1 and sol.id = id;
	
END
$$