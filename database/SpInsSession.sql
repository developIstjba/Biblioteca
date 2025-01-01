/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpInsSession$$
CREATE PROCEDURE SpInsSession(
    idUsuario int,
    ipCliente varchar(15),
    agente varchar(400),
    token varchar(200)
)
BEGIN
INSERT INTO Sessions(`idUsuario`, `fechaInicio`, `fechaCierre`, `agente`, `token`, `ipCliente`, `estado`) 
VALUES (idUsuario,NOW(),null,agente,token,ipCliente,1);
END
$$