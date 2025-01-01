/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpConsTipoLibro$$
CREATE PROCEDURE SpConsTipoLibro(
	id int
)
BEGIN
	SELECT tlib.id,
	tlib.nombre,
	tlib.descripcion,
	tlib.mnemonico,
	tlib.estadoAuditoria,
	tlib.fechaIngreso,
	tlib.usuarioIngreso,
	tlib.fechaModifica,
	tlib.usuarioModifica,
	tlib.fechaElimina,
	tlib.usuarioElimina 
	FROM tipolibro AS tlib 
	WHERE tlib.estadoAuditoria = 1
   AND (((id IS NULL) AND (tlib.id IS NOT NULL)) OR (tlib.id = id));
END
$$