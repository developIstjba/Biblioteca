/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpUpdDetalleSolicitud$$
CREATE PROCEDURE SpUpdDetalleSolicitud(
   idSolicitud INT,
   idLibro INT,
   estado SMALLINT,
   userUpdate VARCHAR(20)
)
BEGIN

    UPDATE detallesolicitud AS det
    SET det.fechaModifica = NOW(), 
    det.usuarioModifica = userUpdate, 
    det.estadoAuditoria = estado 
    WHERE det.idLibro = idLibro AND det.idSolicitud = idSolicitud;

END
$$