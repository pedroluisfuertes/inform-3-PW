create table usuario(
	email varchar(128) primary key,
	nombre varchar(256) not null, 
	apellidos varchar(256) not null, 
	pass varchar(256) not null, 
	edad int
)