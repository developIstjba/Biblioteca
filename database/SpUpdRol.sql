/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpUpdRol$$
CREATE PROCEDURE SpUpdRol(
   id INT,
   nombre VARCHAR(100),
   descripcion VARCHAR(400),	 
	mnemonico VARCHAR(4),  
   userupdate VARCHAR(20)
)
BEGIN

	UPDATE rol AS ro 
		SET ro.nombre = nombre, 
		ro.descripcion = descripcion, 
		ro.mnemonico = mnemonico,		
		ro.fechaModifica = NOW(), 
		ro.usuarioModifica = userupdate 
	WHERE ro.id = id;

END
$$