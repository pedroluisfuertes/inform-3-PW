 create table if not exists libro (
	id int AUTO_INCREMENT,
	titulo varchar(256) CHARACTER SET utf8,
	autor varchar(256) CHARACTER SET utf8,
	editorial varchar(256) CHARACTER SET utf8,
	fecha_publicacion date,
	edicion int, 
	descripcion text CHARACTER SET utf8,
	idUsuario varchar(128), 
	PRIMARY KEY(id),
	FOREIGN KEY(idUsuario) references usuario(email)
);

create table if not exists libro_Comentarios (
	idComentario int AUTO_INCREMENT,
	idLibro int,
	idUsuario varchar(128), 
	comentario text CHARACTER SET utf8,
	valoracion int, 
	PRIMARY KEY(idComentario),
	FOREIGN KEY(idLibro) references libro(id) on delete cascade,
	FOREIGN KEY(idUsuario) references usuario(email) on delete cascade

);