/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpChaStaRol$$
CREATE PROCEDURE SpChaStaRol(
   id INT,
   estado INT,
   userupdate VARCHAR(20)
)
BEGIN

	UPDATE rol AS ro
	SET ro.fechaModifica = NOW(), 
	ro.usuarioElimina = userupdate, 
	ro.estado=estado 
	WHERE ro.id = id;

END
$$