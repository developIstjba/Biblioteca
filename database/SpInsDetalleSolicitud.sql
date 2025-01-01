/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpInsDetalleSolicitud$$
CREATE PROCEDURE SpInsDetalleSolicitud(
   idSolicitud INT,
   idLibro INT,
   userCreate VARCHAR(20)
)
BEGIN

INSERT INTO detallesolicitud (`idSolicitud`, `idLibro`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (idSolicitud, idLibro, 1, NOW(), userCreate, null, null, null, null);

END
$$