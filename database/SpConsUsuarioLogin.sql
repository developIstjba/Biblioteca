/**
 * Author:  Jonathan
 * Created: 9 jul. 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsUsuarioLogin$$
CREATE PROCEDURE SpConsUsuarioLogin(
    username VARCHAR(20)
)
BEGIN
  SELECT 
	usu.id,
	usu.idRol,
	usu.username,
	usu.password,
	usu.cedula,
	usu.primerNombre,
	usu.segundoNombre,
	usu.primerApellido,
	usu.segundoApellido,
	usu.correo,
	usu.telefono,
	usu.celular,
	usu.direccion,
	usu.estado,
	usu.estadoAuditoria,
	usu.fechaIngreso,
	usu.usuarioIngreso,
	usu.fechaModifica,
	usu.usuarioModifica,
	usu.fechaElimina,
	usu.usuarioElimina,
	ro.nombre AS nombreRol 
  FROM usuario AS usu
  INNER JOIN rol AS ro ON usu.idRol = ro.id AND ro.estadoAuditoria = 1 and ro.estado = 1
  WHERE usu.estadoAuditoria = 1 and usu.estado = 1
  AND usu.username = username;
END
$$
