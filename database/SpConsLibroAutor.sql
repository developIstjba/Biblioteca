/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsLibroAutor$$
CREATE PROCEDURE SpConsLibroAutor(
	idLibro int,
	idAutor INT,
	estado SMALLINT	
)
BEGIN
SELECT la.id, 
	la.idLibro, 
	la.idAutor, 
	la.estadoAuditoria, 
	la.fechaIngreso, 
	la.usuarioIngreso, 
	la.fechaModifica, 
	la.usuarioModifica, 
	la.fechaElimina, 
	la.usuarioElimina,
	aut.nombreCorporativo,
	aut.primerNombre,
	aut.segundoNombre,
	aut.primerApellido,
	aut.segundoApellido 
	FROM libroautor AS la
	INNER JOIN autor AS aut ON la.idAutor = aut.id and aut.estadoAuditoria = 1
	WHERE (((estado IS NULL) AND (la.estadoAuditoria IS NOT NULL)) OR (la.estadoAuditoria = estado))
	AND (((idAutor IS NULL) AND (la.idAutor IS NOT NULL)) OR (la.idAutor = idAutor))
    AND (((idLibro IS NULL) AND (la.idLibro IS NOT NULL)) OR (la.idLibro = idLibro));
END
$$

