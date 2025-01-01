create database if not exists bibliotecabd;

use bibliotecabd;

create table Autor(
id int not null auto_increment,
primerNombre varchar(40) null,
segundoNombre varchar(40) null,
primerApellido varchar(40) null,
segundoApellido varchar(40) NULL,
corporativo BOOLEAN NOT null,
nombreCorporativo VARCHAR(240) NULL,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) null,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id)
);


create table TipoLibro(
id int not null auto_increment,
nombre VARCHAR(80)  ,
descripcion varchar(400) ,
mnemonico varchar(4) not null,
estadoAuditoria smallint not NULL,
fechaIngreso datetime NULL,
usuarioIngreso varchar(20) null,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime NULL,
usuarioElimina varchar(20) null,
primary key(id)
);



create table Privilegio(
id int not null auto_increment,
nombre VARCHAR(80)  ,
descripcion varchar(400) ,
nivel smallint not NULL,
estadoAuditoria smallint not NULL,
fechaIngreso datetime NULL,
usuarioIngreso varchar(20) null,
fechaModifica datetime null,
usuarioModifica varchar(20) NULL,
fechaElimina datetime NULL,
usuarioElimina varchar(20) null,
primary key(id)
);


INSERT INTO `privilegio`(`nombre`, `descripcion`, `nivel`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) VALUES ('Lectura','',3,1,NOW(),'SERVER',null,null,null,null),
('Escritura','',5,1,NOW(),'SERVER',null,null,null,null),
('Modificación','',7,1,NOW(),'SERVER',null,null,null,null);


create table Editorial(
id int not null auto_increment,
nombre VARCHAR(80) not null,
direccion varchar(40) null,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) null,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id)
);

create table libro(
id int not null AUTO_INCREMENT,
codigo VARCHAR(40) NULL,
idEditorial int NULL,
titulo varchar(400) not null,
ciudad VARCHAR(80) NULL,
anio varchar(4) null,
isbn VARCHAR(40) null,
idTipo int not null,
portada varchar(400) null,
url varchar(800) NULL,
copias int not null,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) NULL,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id),
foreign key(idEditorial) references Editorial(id),
foreign key(idTipo) references TipoLibro(id)
);

create table Categoria(
id int not null auto_increment,
nombre varchar(100) not null,
descripcion VARCHAR(200) null,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) null,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id)
);


create table carrera(
id int not null auto_increment,
nombre varchar(400) not null,
mnemonico VARCHAR(6) not null,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) null,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id)
);

create table LibroAutor(
id int not null auto_increment,
idLibro int null,
idAutor int null,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) null,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id),
foreign key(idLibro) references Libro(id),
foreign key(idAutor) references Autor(id)
);


create table LibroArea(
id int not null auto_increment,
idLibro int null,
idArea int null,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) null,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id),
foreign key(idLibro) references Libro(id),
foreign key(idArea) references Area(id)
);



create table Parametro(
id int not null auto_increment,
nombre varchar(100) not NULL,
descripcion VARCHAR(400) null,
valor varchar(400) not NULL,
mnemonico varchar(4) not null,
primary key(id)
);


create table Rol(
id int not null auto_increment,
nombre varchar(100) not null,
descripcion varchar(400) null,
mnemonico varchar(4) not null,
estado smallint not null,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) null,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id)
);


create table Permiso(
id int not null AUTO_INCREMENT,
idRol int NULL,
idMenu int NULL,
idPrivilegio int null,
descripcion varchar(400) NULL,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) null,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id),
foreign key(idRol) references Rol(id),
foreign key(idMenu) references Menu(id),
foreign key(idPrivilegio) references Privilegio(id)
);


create table Menu(
id int not null auto_increment,
nombre varchar(100) not null,
descripcion varchar(400) null,
url VARCHAR(200) NULL,
icono varchar(100) null,
idPadre int null,
primary key(id)
);

create table Usuario(
id int not null auto_increment,
idRol int null,
username varchar(20) not null,
password varchar(200) not null,
cedula varchar(10) not null,
primerNombre varchar(40) not null,
segundoNombre varchar(40) null,
primerApellido varchar(40) not null,
segundoApellido varchar(40) null,
correo varchar(400) not null,
telefono varchar(9) null,
celular varchar(10) NOT null,
direccion varchar(400) not null,
estado smallint not null,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) null,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id)
);

create table Solicitud(
id int not null auto_increment,   
idTipoSolicitante int,   
idArea int,  
cedula VARCHAR(10) NOT NULL,
nombres VARCHAR(80) NOT NULL,
apellidos VARCHAR(80) NOT NULL,
correo VARCHAR(200) NOT NULL,
telefono VARCHAR(9) NULL,    
celular VARCHAR(10) NOT NULL,
direccion VARCHAR(400) NULL,
fechaPrestamo datetime not null,
observacionPrestamo varchar(400) null,
fechaAutorizacion datetime null,
fechaCierre datetime null,
observacionCierre varchar(400) null,
estado smallint not null,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) null,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) NULL,
primary key(id),
foreign key(idTipoSolicitante) references TipoSolicitante(id),
foreign key(idArea) references Area(id)
); 


create table DetalleSolicitud(
id int not null AUTO_INCREMENT,
idSolicitud INT NOT NULL,
idLibro INT NOT null,  
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) null,
fechaModifica datetime NULL,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id),
foreign key(idPrestamo) references Prestamo(id),
foreign key(idLibro) references Libro(id)
); 


CREATE TABLE Sessions (
  `id` int(11) null auto_increment ,
  `idUsuario` int(11) NOT NULL,
   `token` VARCHAR(200) NOT NULL,
  `fechaInicio` datetime NULL,
  `fechaCierre` datetime NULL,
  `estado` smallint(6) NOT NULL,
  `agente` VARCHAR(400) NULL,
  `ipCliente` VARCHAR(15) NULL,
Primary Key(id),
Foreign Key(idUsuario) References Usuario(id)
);


create table TipoSolicitante(
id int not null AUTO_INCREMENT,
nombre varchar(100) not null,
descripcion varchar(400) null,
mnemonico varchar(4) not null,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) null,
fechaModifica datetime NULL,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id)
); 


create table configuracion(
id int not null AUTO_INCREMENT,
descripcion varchar(400) not null,
valor varchar(400) not null, 
mnemonico varchar(5) not null,
primary key(id)
); 



create table Proyecto(
id int not null AUTO_INCREMENT,
idArea int NULL,
idTutor int NULL,
tema varchar(400) not null,
anio varchar(4) null,
url varchar(800) NULL,
urlAnexo varchar(800) NULL,
copias int not null,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) NULL,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id),
foreign key(idArea) references Area(id),
foreign key(idTutor) references Docente(id)
);


create table AutorProyecto(
id int not null auto_increment,
idProyecto int NULL,
apellidos varchar(40) null,
nombres varchar(40) null,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) null,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id)
);


create table Docente(
id int not null auto_increment,
cedula int NULL,
apellidos varchar(40) null,
nombres varchar(40) null,
profesional varchar(40) null,
estadoAuditoria smallint not null,
fechaIngreso datetime null,
usuarioIngreso varchar(20) null,
fechaModifica datetime null,
usuarioModifica varchar(20) null,
fechaElimina datetime null,
usuarioElimina varchar(20) null,
primary key(id)
);














