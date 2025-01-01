/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpDelDetalleSolicitud$$
CREATE PROCEDURE SpDelDetalleSolicitud(
   id INT,
   userdelete VARCHAR(20)
)
BEGIN

UPDATE detallesolicitud AS sol
SET sol.fechaElimina=NOW(), 
sol.usuarioElimina = userdelete, 
sol.estadoAuditoria=0 
WHERE sol.idSolicitud = id;

END
$$