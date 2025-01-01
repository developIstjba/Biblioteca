/**
 * Author:  Jonathan
 * Created: 13 ago 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpUpdateProfile$$
CREATE PROCEDURE SpUpdateProfile(
    username varchar(20),
    primerNombre varchar(40),
    segundoNombre varchar(40),
    primerApellido varchar(40),
    segundoApellido varchar(40),
    correo varchar(400),
    telefono varchar(9),
    celular varchar(10),
    direccion varchar(400),
    usuarioModifica VARCHAR(20)
)
BEGIN

UPDATE usuario AS usu
SET usu.primerNombre=primerNombre,
    usu.segundoNombre=segundoNombre,
    usu.primerApellido=primerApellido,
    usu.segundoApellido=segundoApellido,
    usu.correo=correo,
    usu.telefono=telefono,
    usu.celular=celular,
    usu.direccion=direccion,
    usu.fechaModifica=NOW(),
    usu.usuarioModifica=usuarioModifica
WHERE usu.username = username;
END
$$