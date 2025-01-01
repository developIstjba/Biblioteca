/**
 * Author:  Jonathan
 * Created: 13 ago 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpChangePassword$$
CREATE PROCEDURE SpChangePassword(
    username VARCHAR(20),
    newpassword varchar(200),
    usuarioModifica VARCHAR(20)
)
BEGIN

UPDATE usuario AS usu
SET usu.password=newpassword,
    usu.fechaModifica=NOW(),
    usu.usuarioModifica=usuarioModifica
WHERE usu.username = username;
END
$$