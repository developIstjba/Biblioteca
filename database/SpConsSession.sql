/**
 * Author:  Jonathan
 * Created: 28 jul 2023
 */


DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsSession$$
CREATE PROCEDURE SpConsSession(
   token varchar(200)
)
BEGIN

SELECT *
FROM Sessions AS tk
WHERE tk.token=token;

END
$$
