/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpUpdLibro$$
CREATE PROCEDURE SpUpdLibro(
	id int,
   codigo VARCHAR(40),
   idEditorial int,
   titulo VARCHAR(400),
   pais VARCHAR(80),
	anio VARCHAR(4),
   isbn VARCHAR(40),   
   idTipo int,
	portada VARCHAR(400), 
	url VARCHAR(800),  
	copias int,   
	ubicacion VARCHAR(80),
	userUpdate VARCHAR(20)
)
BEGIN

	UPDATE libro as lib SET 
	lib.codigo = codigo,
	lib.idEditorial = idEditorial,
	lib.titulo = titulo,
	lib.pais = pais,
	lib.anio = anio,
	lib.isbn = isbn,
	lib.idTipo = idTipo,
	lib.portada = portada,
	lib.url = url,
	lib.copias = copias,
	lib.ubicacion = ubicacion,
	lib.fechaModifica = NOW(),
	lib.usuarioModifica = userUpdate 
	where lib.estadoAuditoria = 1 and lib.id = id;

END
$$