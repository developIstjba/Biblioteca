/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpUpdPermiso$$
CREATE PROCEDURE SpUpdPermiso(
   id INT,
   idrol INT,
   idmenu INT,
   descripcion VARCHAR(400),
   idPrivilegio INT,   
   userupdate VARCHAR(20)
)
BEGIN

	UPDATE permiso AS pe 
		SET pe.idrol = idrol, 
		pe.idmenu = idmenu, 	
		pe.descripcion = descripcion, 
		pe.idPrivilegio = idPrivilegio, 
		pe.fechaModifica = NOW(), 
		pe.usuarioModifica = userupdate 
	WHERE pe.id = id;

END
$$