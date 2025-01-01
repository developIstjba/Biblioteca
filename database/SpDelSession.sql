/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpDelSession$$
CREATE PROCEDURE SpDelSession(
   token varchar(200)
)
BEGIN

UPDATE Sessions AS tk
SET tk.fechaCierre=NOW(), tk.estado=0 WHERE tk.token=token;

END
$$
