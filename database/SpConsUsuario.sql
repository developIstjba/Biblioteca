/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsUsuario$$
CREATE PROCEDURE SpConsUsuario(
	id int
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
	INNER JOIN rol AS ro ON usu.idRol = ro.id 
	WHERE usu.estadoAuditoria <> 0 
    AND (((id IS NULL) AND (usu.id IS NOT NULL)) OR (usu.id = id));
END
$$