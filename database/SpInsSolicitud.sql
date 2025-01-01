/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpInsSolicitud$$
CREATE PROCEDURE SpInsSolicitud(
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
	userCreate VARCHAR(20)
)
BEGIN

INSERT INTO `solicitud`(`idTipoSolicitante`, `idArea`, `cedula`, `nombres`, `apellidos`, `correo`, `telefono`, `celular`, `direccion`, `fechaPrestamo`, `observacionPrestamo`, `fechaAutorizacion`, `fechaCierre`, `observacionCierre`, `estado`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (tipoSolicitante, area, cedula, nombres, apellidos, correo,telefono, celular, direccion, fecha, observacion,null,null,null,1,1,NOW(),userCreate,null,null,null,null);

END
$$