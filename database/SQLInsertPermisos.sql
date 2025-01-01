/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */


/*
*	Roles
*/
INSERT INTO `rol` (`id`, `nombre`, `descripcion`, `mnemonico`, `estado`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) VALUES
(1, 'Administrador', 'Rol de administrador del sistema', 'ADMI', 1, 1, '2023-07-23 16:08:37', 'SERVER', '2023-10-09 01:02:24', 'admin', NULL, NULL),
(2, 'Gestor', 'Rol de gestor de Biblioteca', 'GEST', 1, 1, '2023-07-23 16:08:37', 'SERVER', NULL, NULL, NULL, NULL),
(3, 'Docente', 'Rol de consultas para docentes del ISTJBA', 'DOCE', 1, 1, '2023-07-23 16:08:37', 'SERVER', NULL, NULL, NULL, NULL),
(4, 'Estudiante', 'Rol para estudiantes del ISTJBA', 'ESTU', 1, 1, '2023-07-23 16:08:37', 'SERVER', NULL, NULL, '2023-10-08 16:32:07', 'admin');


/*
*	Permisos
*/
INSERT INTO `permiso` (`id`, `idRol`, `idMenu`, `idPrivilegio`, `descripcion`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) VALUES
(1, 1, 1, 3, 'Modificación de permiso.', 1, '2023-10-24 00:10:03', 'SERVER', '2023-12-28 01:14:15', 'admin', NULL, NULL),
(2, 1, 2, 3, NULL, 1, '2023-10-24 00:10:03', 'SERVER', NULL, NULL, NULL, NULL),
(3, 1, 3, 3, NULL, 1, '2023-10-24 00:10:03', 'SERVER', NULL, NULL, NULL, NULL),
(4, 1, 4, 3, NULL, 1, '2023-10-24 00:10:03', 'SERVER', NULL, NULL, NULL, NULL),
(5, 1, 5, 3, NULL, 1, '2023-10-24 00:10:03', 'SERVER', NULL, NULL, NULL, NULL),
(6, 1, 6, 3, NULL, 1, '2023-10-24 00:10:03', 'SERVER', NULL, NULL, NULL, NULL),
(7, 1, 7, 3, NULL, 1, '2023-10-24 00:10:03', 'SERVER', NULL, NULL, NULL, NULL),
(8, 1, 8, 3, NULL, 1, '2023-10-24 00:10:03', 'SERVER', NULL, NULL, NULL, NULL),
(9, 1, 9, 3, NULL, 1, '2023-10-24 00:10:03', 'SERVER', NULL, NULL, NULL, NULL),
(10, 1, 10, 3, NULL, 1, '2023-10-24 00:10:03', 'SERVER', NULL, NULL, NULL, NULL),
(11, 1, 11, 3, NULL, 1, '2023-10-24 00:10:04', 'SERVER', NULL, NULL, NULL, NULL),
(12, 2, 1, 3, NULL, 1, '2023-10-24 00:10:04', 'SERVER', NULL, NULL, NULL, NULL),
(13, 2, 2, 3, NULL, 1, '2023-10-24 00:10:04', 'SERVER', NULL, NULL, NULL, NULL),
(14, 2, 3, 3, NULL, 1, '2023-10-24 00:10:04', 'SERVER', NULL, NULL, NULL, NULL),
(15, 2, 4, 3, NULL, 1, '2023-10-24 00:10:04', 'SERVER', NULL, NULL, NULL, NULL),
(16, 2, 5, 3, NULL, 1, '2023-10-24 00:10:04', 'SERVER', NULL, NULL, NULL, NULL),
(17, 2, 6, 3, NULL, 1, '2023-10-24 00:10:04', 'SERVER', NULL, NULL, NULL, NULL),
(18, 2, 7, 3, NULL, 1, '2023-10-24 00:10:04', 'SERVER', NULL, NULL, NULL, NULL),
(19, 1, 12, 3, NULL, 1, '2024-03-01 19:45:12', 'SERVER', NULL, NULL, NULL, NULL),
(20, 3, 2, 1, 'Rol docente consulta de libros', 1, '2024-04-05 14:42:08', 'admin', NULL, NULL, NULL, NULL),
(21, 3, 1, 3, 'Docente permiso de acceso menú de Biblioteca', 1, '2024-04-05 18:46:06', 'admin', NULL, NULL, NULL, NULL),
(22, 4, 1, 3, 'Estudiante permiso de acceso a menú Biblioteca', 1, '2024-04-05 19:05:00', 'admin', NULL, NULL, NULL, NULL),
(23, 4, 2, 1, 'Rol Estudiante consulta de libros', 1, '2024-04-05 19:05:58', 'admin', NULL, NULL, NULL, NULL);


INSERT INTO `permiso` (`id`, `idRol`, `idMenu`, `idPrivilegio`, `descripcion`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) VALUES
(24, 1, 13, 3, 'Permiso de acceso a menú proyectos', 1, '2023-10-24 00:10:03', 'SERVER', '2023-12-28 01:14:15', 'admin', NULL, NULL);
/*
*   Menu
*/

INSERT INTO `menu` (`id`, `nombre`, `descripcion`, `url`, `icono`, `idPadre`, `mnemonico`) VALUES
(1, 'Biblioteca', 'Menú biblioteca', '/biblioteca', NULL, NULL, ''),
(2, 'Libros', 'Menú Libros', '/biblioteca/libro', NULL, 1, 'BIBLIB'),
(3, 'Autores', 'Menú Autores', '/biblioteca/autor', NULL, 1, 'BIBAUT'),
(4, 'Editoriales', 'Menú Editoriales', '/biblioteca/editorial', NULL, 1, 'BIBEDI'),
(5, 'Solicitudes', 'Menú Solicitudes', '/solicitud', NULL, NULL, ''),
(6, 'Elaboradas', 'Menú Solicitudes elaboradas', '/solicitud/elaborada', NULL, 5, 'SOLELA'),
(7, 'Cerradas', 'Menú Solicitudes cerradas', '/solicitud/cerrada', NULL, 5, 'SOLCER'),
(8, 'Administración', 'Menú Administración', '/administracion', NULL, NULL, ''),
(9, 'Roles', 'Menú Roles', '/administracion/rol', NULL, 8, 'ADMROL'),
(10, 'Permisos', 'Menú Permisos', '/administracion/permiso', NULL, 8, 'ADMPER'),
(11, 'Usuarios', 'Menú Usuarios', '/administracion/usuario', NULL, 8, 'ADMUSU'),
(12, 'Aprobadas', 'Menú Solicitudes aprobadas', '/solicitud/aprobada', NULL, 5, 'SOLAPR');

INSERT INTO `menu` (`id`, `nombre`, `descripcion`, `url`, `icono`, `idPadre`, `mnemonico`) VALUES
(13, 'Tesis', 'Menú Proyectos de titulación', '/biblioteca/proyecto', NULL, 1, 'BIBPRO');
/*
 * Tipo de Solicitante
 */

INSERT INTO `tiposolicitante`(`nombre`, `descripcion`, `mnemonico`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES ('Estudiante','Solicitante con matrícula vigente a la fecha en el Instituto','SEST', 1, NOW(),'SERVER', null, null, null, null),
 ('Egresado','Solicitante que culmino sus estudios en el Instituto','SEGR', 1, NOW(),'SERVER', null, null, null, null),
 ('Docente','Docente investigador del Instituto','SDOC', 1, NOW(),'SERVER', null, null, null, null),
 ('Externo','Público en general o personas ajenas al instituto','SEXT', 1, NOW(),'SERVER', null, null, null, null);


/*	Administrador */

INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (1,1, null, 7, 1,NOW(),'SERVER',null,null,null,null);
INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (1,2, null, 7, 1,NOW(),'SERVER',null,null,null,null);
INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (1,3, null, 7, 1,NOW(),'SERVER',null,null,null,null);
INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (1,4, null, 7, 1,NOW(),'SERVER',null,null,null,null);

INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (1,5, null, 7, 1,NOW(),'SERVER',null,null,null,null);
INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (1,6, null, 7, 1,NOW(),'SERVER',null,null,null,null);
INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (1,7, null, 7, 1,NOW(),'SERVER',null,null,null,null);


INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (1,8, null, 7, 1,NOW(),'SERVER',null,null,null,null);
INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (1,9, null, 7, 1,NOW(),'SERVER',null,null,null,null);
INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (1,10, null, 7, 1,NOW(),'SERVER',null,null,null,null);
INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (1,11, null, 7, 1,NOW(),'SERVER',null,null,null,null);


/*	Gestor de Biblioteca */

INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (2,1, null, 7, 1,NOW(),'SERVER',null,null,null,null);
INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (2,2, null, 7, 1,NOW(),'SERVER',null,null,null,null);
INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (2,3, null, 7, 1,NOW(),'SERVER',null,null,null,null);
INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (2,4, null, 7, 1,NOW(),'SERVER',null,null,null,null);

INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (2,5, null, 7, 1,NOW(),'SERVER',null,null,null,null);
INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (2,6, null, 7, 1,NOW(),'SERVER',null,null,null,null);
INSERT INTO `permiso`(`idRol`, `idMenu`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (2,7, null, 7, 1,NOW(),'SERVER',null,null,null,null);








