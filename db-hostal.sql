create database hostal;

create table roles(
id_role int primary key auto_increment not null,
titulo varchar(20) not null,
descripcion varchar(75) not null,
estado char(1) not null
);

create table usuarios(
id_usuario int primary key auto_increment not null,
id_role int not null,
nombres varchar(75) not null,
apellidos varchar(75) not null,
iden_personal varchar(20) null,
fecha_nacimiento date null,
correo varchar(150) not null unique,
clave varchar(250) not null,
estado char(1) not null,
foreign key (id_role) references roles(id_role)
);

create table habitaciones(
id_numero_habitacion int primary key unique not null,
cantidad_camas int not null,
cantidad_banios int not null,
img_presentacion varchar(250) not null,
precio_habitacion decimal(7,2) not null,
estado char(1) not null
); 

create table reservaciones(
id_reservacion bigint primary key auto_increment not null,
id_numero_habitacion int not null,
id_usuario int not null,
fecha_desde datetime,
fecha_hasta datetime not null,
atencion_extra decimal(7,2) null,
precio_total decimal(7,2) null,
estado_reservacion varchar(10) not null,
foreign key(id_numero_habitacion) references habitaciones(id_numero_habitacion),
foreign key(id_usuario) references usuarios(id_usuario)
);


insert into roles(titulo, descripcion, estado)
values('Cliente', 'Es el Rol del cliente en le sistema', 'A'),
('Recepcionista', 'Encargada de recibir a los clientes y validar las reservas en lineas', 'A'),
('Supervisor', 'Encargado de supervisar las anomalias de las reservaciones y/o problemas', 'A');

select * from roles;

insert into habitaciones(id_numero_habitacion, cantidad_camas, cantidad_banios, img_presentacion, precio_habitacion, estado)
values(5434, 1, 2, './assets/img/habitaciones/habitacion-5434.jpg', 150.00, 'D'),
(4567, 1, 1, './assets/img/habitaciones/habitacion-4567.jpg', 125.00, 'D'),
(3456, 2, 1, './assets/img/habitaciones/habitacion-3456.jpg', 135.00, 'D'),
(6788, 2, 2, './assets/img/habitaciones/habitacion-6788.jpg', 175.00, 'D'),
(9865, 2, 4, './assets/img/habitaciones/habitacion-9865.jpg', 199.00, 'D'),
(1234, 3, 3, './assets/img/habitaciones/habitacion-1234.jpg', 250.00, 'D');

INSERT INTO hostal.usuarios
(id_usuario, id_role, nombres, apellidos, iden_personal, fecha_nacimiento, correo, clave, estado)
VALUES(1, 1, 'Eduardo Ernesto', 'Rodriguez', NULL, '1997-02-01', 'eduardo@gmail.com', '8c969a11bac7c8af404e0245074f3d4df19d69588fe8118dbe6f897b1df5579f424c65dc26cad569ecb57aa39476f9ae9939c9d46f9fb1bb9815feca1fca4e089181187a0a2f5c0e4996875f13f68fabe1f24ac6d30f8e142e39d9', 'A');
INSERT INTO hostal.usuarios
(id_usuario, id_role, nombres, apellidos, iden_personal, fecha_nacimiento, correo, clave, estado)
VALUES(2, 2, 'Jessica Alejandra ', 'Romero', NULL, '1998-02-06', 'jessica@gmail.com', '448a928d890d9f977ece30df333665e1e6fa7ec0cb35e95ad78ffc95c1876768c09b7067443e6dde58d3e345ebba451c8599b1ec723bff7a1af3bcf2245b62a3c6aeed74ea2c126fbb28ac6f31892acf383acd0a68adf423cfdc99', 'A');
INSERT INTO hostal.usuarios
(id_usuario, id_role, nombres, apellidos, iden_personal, fecha_nacimiento, correo, clave, estado)
VALUES(3, 3, 'Ernesto Antonio ', 'Recinos', NULL, '1994-02-04', 'ernesto@gmail.com', '240e05ff5d0a330090b68dbe8b7b0c493a407b50ee71bf44da830b741b302063f0217664b9fc85c2b3bdfb3ac7ea5ff13298c14dd3d2ebe203b34d3c01018d7b677eb8d978ee9290c093a796dfbb34ba7f5af5a09e58070ad1eccc', 'A');

