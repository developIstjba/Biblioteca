/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpChaStaUsuario$$
CREATE PROCEDURE SpChaStaUsuario(
   id INT,
   estado INT,
   userupdate VARCHAR(20)
)
BEGIN

	UPDATE usuario AS usu
	SET usu.fechaModifica = NOW(), 
	usu.usuarioModifica = userupdate, 
	usu.estado=estado 
	WHERE usu.id = id;

END
$$