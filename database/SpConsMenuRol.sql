/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsMenuRol$$
CREATE PROCEDURE SpConsMenuRol(
    rol int
)
BEGIN
	SELECT me.id, me.nombre, me.descripcion, me.url, me.icono, me.idPadre, me.mnemonico, pri.nivel  
	FROM menu AS me 
	INNER JOIN permiso AS pe ON me.id = pe.idMenu and pe.estadoAuditoria = 1  
	INNER JOIN rol AS ro ON pe.idRol = ro.id and ro.estadoAuditoria = 1 and ro.estado = 1 
	INNER JOIN privilegio AS pri ON pe.idPrivilegio = pri.id and pri.estadoAuditoria = 1  
	WHERE ro.id = rol;
END
$$