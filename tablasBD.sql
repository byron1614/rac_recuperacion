create table programador (
proga_id serial not null primary key,
proga_nombreS varchar(50) not null,
proga_apellidoS varchar(50) not null,
proga_sit char (1) DEFAULT '1' 
);

Create table aplicaciones (
apli_id serial not null primary key,
apli_nombre varchar (50) not null,
apli_estado char (1) DEFAULT '1'
);

Create table asi_programador (
asi_id serial not null primary key,
asi_programador int not null,
asi_apli int not null,
asi_sit char (1) DEFAULT '1',
foreign key (asi_programador) REFERENCES programador(proga_id),
foreign key (asi_apli) REFERENCES aplicaciones (apli_id)
);

Create table fallos (
fal_id serial not null primary key,
fal_apli int not null,
fal_descripcion varchar (50) not null,
fal_fecha date not null,
fal_estado char (1) DEFAULT '1',
foreign key (fal_apli) REFERENCES aplicaciones(apli_id)
);