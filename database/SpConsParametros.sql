/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsParametros$$
CREATE PROCEDURE SpConsParametros(
	mnemonico VARCHAR(5)
)
BEGIN
SELECT cof.id, 
	cof.descripcion, 
	cof.valor, 
	cof.mnemonico
	FROM configuracion AS cof 
	WHERE (((mnemonico IS NULL) AND (cof.mnemonico IS NOT NULL)) OR (cof.mnemonico = mnemonico));
END
$$

