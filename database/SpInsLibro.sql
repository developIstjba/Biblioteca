/**
 * Author:  Jonathan
 * Created: 27 jul 2023
 */

DELIMITER $$
DROP PROCEDURE IF EXISTS SpInsLibro$$
CREATE PROCEDURE SpInsLibro(
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
   userCreate VARCHAR(20)
)
BEGIN

INSERT INTO `libro`(`codigo`,`idEditorial`, `titulo`, `pais`, `anio`, `isbn`, `idTipo`, `portada`, `url`, `copias`, `ubicacion`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (codigo, idEditorial, titulo, pais, anio, isbn, idTipo, portada, url, copias, ubicacion, 1, NOW(), userCreate, Null, Null, Null, Null);

END
$$