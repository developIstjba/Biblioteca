/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsMenu$$
CREATE PROCEDURE SpConsMenu(
	id int
)
BEGIN
	SELECT me.id, me.nombre, me.descripcion, me.url, me.icono, me.idPadre 
	FROM menu AS me 
	WHERE (((id IS NULL) AND (me.id IS NOT NULL)) OR (me.id = id));
END
$$