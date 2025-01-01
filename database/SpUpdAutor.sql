/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpUpdAutor$$
CREATE PROCEDURE SpUpdAutor(
   id INT,
   primernombre VARCHAR(40),
   segundonombre VARCHAR(40),
   primerapellido VARCHAR(40),
   segundoapellido VARCHAR(40),
   corporativo int,
   nombrecorporativo VARCHAR(240),	   
   userupdate VARCHAR(20)
)
BEGIN

	UPDATE autor AS aut
		SET aut.primerNombre = primernombre, 
		aut.segundoNombre = segundonombre, 
		aut.primerApellido = primerapellido, 
		aut.segundoApellido = segundoapellido, 
		aut.corporativo = corporativo, 
		aut.nombreCorporativo = nombrecorporativo, 				
		aut.fechaModifica = NOW(), 
		aut.usuarioModifica = userupdate
	WHERE aut.id = id;

END
$$