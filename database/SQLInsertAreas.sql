/*
Categorias 
*/

INSERT INTO `categoria`(`nombre`, `descripcion`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) VALUES
('Contabilidad','',1,NOW(),'SERVER',Null,Null,Null,Null),
('Administración','',1,NOW(),'SERVER',Null,Null,Null,Null),
('Procesamiento de Alimentos','',1,NOW(),'SERVER',Null,Null,Null,Null),
('Inglés','',1,NOW(),'SERVER',Null,Null,Null,Null),
('Planificación de Transporte','',1,NOW(),'SERVER',Null,Null,Null,Null),
('Lectura General','',1,NOW(),'SERVER',Null,Null,Null,NULL),
('Seguridad Penitenciaria','',1,NOW(),'SERVER',Null,Null,Null,Null),
('Medición y Monitoreo Ambiental','',1,NOW(),'SERVER',Null,Null,Null,Null),
('Desarrollo de Software','',1,NOW(),'SERVER',Null,Null,Null,Null),
('Ensamblaje y Mantenimiento de Equipos de Cómputo','',1,NOW(),'SERVER',Null,Null,Null,Null),
('Revista','',1,NOW(),'SERVER',Null,Null,Null,Null),
('Investigación','',1,NOW(),'SERVER',Null,Null,Null,NULL),
('Seguridad y Prevención de Riesgos Laborales','',1,NOW(),'SERVER',Null,Null,Null,Null);



/*
Tipos libros
*/
INSERT INTO `tipolibro`(`nombre`, `descripcion`, `mnemonico`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) VALUES 
('Físico','','FLIB',1,NOW(),'SERVER',Null,Null,Null,Null),
('Digital','','ELIB',1,NOW(),'SERVER',Null,Null,Null,NULL);




/*
 * Carreras
 * */

INSERT INTO `carrera`(`nombre`, `mnemonico`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) VALUES
('Contabilidad','CONTAB',1,NOW(),'SERVER',Null,Null,Null,Null),
('Administración','ADMINI',1,NOW(),'SERVER',Null,Null,Null,Null),
('Procesamiento de Alimentos','PROALI',1,NOW(),'SERVER',Null,Null,Null,Null),
('Inglés','INGLES',1,NOW(),'SERVER',Null,Null,Null,Null),
('Planificación de Transporte','PLATRA',1,NOW(),'SERVER',Null,Null,Null,Null),
('Seguridad Penitenciaria','SEGPEN',1,NOW(),'SERVER',Null,Null,Null,Null),
('Medición y Monitoreo Ambiental','MONAMB',1,NOW(),'SERVER',Null,Null,Null,Null),
('Desarrollo de Software','DESOFT',1,NOW(),'SERVER',Null,Null,Null,Null),
('Ensamblaje y Mantenimiento de Equipos de Cómputo','ENMACO',1,NOW(),'SERVER',Null,Null,Null,Null),
('Seguridad y Prevención de Riesgos Laborales','RIELAB',1,NOW(),'SERVER',Null,Null,Null,Null);



