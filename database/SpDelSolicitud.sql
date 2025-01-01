/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpDelSolicitud$$
CREATE PROCEDURE SpDelSolicitud(
   id INT,
   userdelete VARCHAR(20)
)
BEGIN

UPDATE solicitud AS sol
SET sol.fechaElimina=NOW(), 
sol.usuarioElimina = userdelete, 
sol.estadoAuditoria=0 
WHERE sol.id = id;

END
$$