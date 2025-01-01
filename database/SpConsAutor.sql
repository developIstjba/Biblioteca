/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsAutor$$
CREATE PROCEDURE SpConsAutor(
	id int
)
BEGIN
SELECT aut.id,
    aut.primerNombre,
    aut.segundoNombre,
    aut.primerApellido,
    aut.segundoApellido,
    aut.corporativo,
    aut.nombreCorporativo,
    aut.estadoAuditoria,
    aut.fechaIngreso,
    aut.usuarioIngreso,
    aut.fechaModifica,
    aut.usuarioModifica,
    aut.fechaElimina,
    aut.usuarioElimina, 
    (SELECT COUNT(*) FROM libroautor AS laut WHERE laut.idAutor = aut.id AND laut.estadoAuditoria = 1) AS numeroLibros
    FROM autor AS aut 
    WHERE aut.estadoAuditoria = 1 
    AND (((id IS NULL) AND (aut.id IS NOT NULL)) OR (aut.id = id));
END
$$