/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpUpdEditorial$$
CREATE PROCEDURE SpUpdEditorial(
   id INT,
   nombre VARCHAR(80),
   direccion VARCHAR(400),
   userupdate VARCHAR(20)
)
BEGIN

UPDATE editorial AS edi
SET edi.nombre = nombre, 
edi.direccion = direccion, 
edi.fechaModifica = NOW(), 
edi.usuarioModifica = userupdate
WHERE edi.id = id;

END
$$