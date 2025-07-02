create database Alcolimetro
use Alcolimetro

create table Personas (
    idPersona int identity(1,1),
    Nombre varchar(100),
    APaterno varchar(100),
    AMaterno varchar(100),
    Telefono varchar(20),
    Edad int,
    primary key (idPersona)
)

insert into Personas (Nombre, APaterno, AMaterno, Telefono, Edad) 
values
('Francisco Antonio', 'Castillo', 'Velásquez', '555-123-4567', 43),
('Claudia', 'Durán', 'Aviles', '555-234-5678', 46),
('Jairo', 'Pacindo', 'Piña', '555-345-6789', 25),
('Cecilia', 'Alvarado', 'Salayandia', '555-456-7890', 43),
('Jesús', 'Calleja', 'Ángel', '555-567-8901', 38),
('Adela', 'Becerra', 'Chavéz', '555-678-9012', 49),
('Andrea', 'Garcia', 'Casa', '555-789-0123', 27),
('Jose Javier', 'Moya', 'Moya', '555-890-1234', 25),
('Nelson Hernán', 'Torres', 'Cervantes', '555-901-2345', 32),
('Roque Josúe', 'Aguirre', 'Viveros', '555-123-4567', 20),
('Eduardo', 'Barrón', 'Mendoza', '555-234-5678', 22),
('Emiliano', 'Arvizu', 'Rueda', '555-345-6789', 23),
('Ana', 'Francisco', 'Nicolas', '555-456-7890', 20),
('Jesús', 'Jiménez', 'De Santiago', '555-567-8901', 24),
('María Inés', 'Hernández', 'Vicencio', '555-678-9012', 20),
('Ian David', 'Rodríguez', 'Ruiz', '555-789-0123', 20),
('María Fernanda', 'López', 'García', '555-234-5678', 29),
('Jorge Luis', 'Martínez', 'Hernández', '555-345-6789', 35),
('Ana Sofía', 'Ramírez', 'Torres', '555-456-7890', 27),
('Carlos Eduardo', 'González', 'Pérez', '555-567-8901', 40),
('Diana Carolina', 'Sánchez', 'Rodríguez', '555-678-9012', 32),
('Luis Alberto', 'Pérez', 'Morales', '555-789-0123', 38),
('Gabriela Alejandra', 'Hernández', 'Díaz', '555-890-1234', 26),
('Ricardo Javier', 'Torres', 'Fernández', '555-901-2345', 45),
('Patricia Elena', 'Gutiérrez', 'Jiménez', '555-012-3456', 31),
('Fernando Daniel', 'Vargas', 'Cruz', '555-111-2222', 36),
('Carmen Lucía', 'Ortega', 'Navarro', '555-222-3333', 28),
('José Manuel', 'Rojas', 'Castro', '555-333-4444', 41),
('Valeria Isabel', 'Mendoza', 'Reyes', '555-444-5555', 30),
('Eduardo Andrés', 'Flores', 'Silva', '555-555-6666', 34),
('Beatriz Renata', 'Cabrera', 'Medina', '555-666-7777', 29),
('Alejandro Iván', 'Navarro', 'Ríos', '555-777-8888', 39),
('Laura Ximena', 'Ramos', 'Salazar', '555-888-9999', 25),
('Roberto Esteban', 'Castro', 'Delgado', '555-999-0000', 44),
('Natalia Montserrat', 'Luna', 'Figueroa', '555-000-1111', 33),
('Andrés Felipe', 'Zamora', 'Miranda', '555-101-2020', 37),
('Camila Soledad', 'Peña', 'Escobar', '555-202-3030', 29),
('Emilio Santiago', 'Fuentes', 'Barrera', '555-303-4040', 41),
('Natalia Beatriz', 'Herrera', 'Luna', '555-404-5050', 26),
('Esteban Rodrigo', 'Cruz', 'Soto', '555-505-6060', 39),
('Mariana Alejandra', 'Silva', 'Rojas', '555-606-7070', 31),
('Tomás Leonardo', 'Figueroa', 'Vargas', '555-707-8080', 44),
('Fernanda Elisa', 'Moreno', 'Aguilar', '555-808-9090', 28),
('Sergio Javier', 'Paredes', 'Montes', '555-909-1010', 35),
('Valentina Julieta', 'Núñez', 'Arroyo', '555-010-1111', 27),
('Francisco Mateo', 'Escamilla', 'Guerrero', '555-111-1212', 42),
('Lorena Patricia', 'Méndez', 'Esquivel', '555-121-1313', 30),
('Juan Sebastián', 'Mejía', 'Larios', '555-131-1414', 38),
('Alejandra Luciana', 'Castañeda', 'Ibáñez', '555-141-1515', 25),
('Luis Fernando', 'Orozco', 'Villanueva', '555-151-1616', 36),
('Daniel Alejandro', 'Salas', 'Hidalgo', '555-161-1717', 43),
('Regina Victoria', 'Campos', 'Solís', '555-171-1818', 32),
('Hugo Adrián', 'Ponce', 'Padilla', '555-181-1919', 29),
('Ximena Guadalupe', 'Estrada', 'Muñoz', '555-191-2020', 34),
('Antonio Rafael', 'Juárez', 'Cervantes', '555-202-2121', 40),
('Carolina Paulina', 'Santos', 'Trejo', '555-212-2222', 27),
('Felipe Gerardo', 'Ibarra', 'Guzmán', '555-222-2323', 39),
('Renata Aylin', 'Delgado', 'Blanco', '555-232-2424', 31),
('Joaquín Esteban', 'Galván', 'Cordero', '555-242-2525', 44),
('Silvia Mariana', 'López', 'Benítez', '555-252-2626', 28),
('Cristian Isaías', 'Reyes', 'Palacios', '555-262-2727', 35),
('Elena Andrea', 'Hernández', 'Téllez', '555-272-2828', 26),
('José Ricardo', 'Soto', 'Arellano', '555-282-2929', 41),
('Monserrat Evelin', 'Medina', 'Camacho', '555-292-3030', 30),
('David Emiliano', 'Navarrete', 'Puga', '555-303-3131', 38),
('Paulina Michelle', 'Arriaga', 'Del Valle', '555-313-3232', 25),
('Roberto Adrián', 'Villegas', 'Zavala', '555-323-3333', 36),
('Fernanda Valeria', 'Pizarro', 'Ocampo', '555-333-3434', 43),
('Rodrigo Nicolás', 'Quintero', 'Maya', '555-343-3535', 32),
('Andrea Gabriela', 'Terán', 'Valdés', '555-353-3636', 29)

create table Periodos (
    idPeriodo int identity(1,1),
    FechaInicio date,
    FechaFinal date,
    primary key (idPeriodo)
)

insert into Periodos (FechaInicio, FechaFinal) 
values
('2024-01-01', '2024-04-30'),
('2024-05-01', '2024-08-31'),
('2024-09-01', '2024-12-31'),
('2025-01-01', '2025-04-30'),
('2025-05-01', '2025-08-31'),
('2025-09-01', '2025-12-31'),
('2026-01-01', '2026-04-30'),
('2026-05-01', '2026-08-31'),
('2026-09-01', '2026-12-31'),
('2027-01-01', '2027-04-30'),
('2027-05-01', '2027-08-31'),
('2027-09-01', '2027-12-31'),
('2028-01-01', '2028-04-30'),
('2028-05-01', '2028-08-31'),
('2028-09-01', '2028-12-31'),
('2029-01-01', '2029-04-30'),
('2029-05-01', '2029-08-31'),
('2029-09-01', '2029-12-31'),
('2030-01-01', '2030-04-30'),
('2030-05-01', '2030-08-31'),
('2030-09-01', '2030-12-31'),
('2031-01-01', '2031-04-30'),
('2031-05-01', '2031-08-31'),
('2031-09-01', '2031-12-31'),
('2032-01-01', '2032-04-30'),
('2032-05-01', '2032-08-31'),
('2032-09-01', '2032-12-31'),
('2033-01-01', '2033-04-30'),
('2033-05-01', '2033-08-31'),
('2033-09-01', '2033-12-31'),
('2034-01-01', '2034-04-30'),
('2034-05-01', '2034-08-31'),
('2034-09-01', '2034-12-31'),
('2035-01-01', '2035-04-30'),
('2035-05-01', '2035-08-31'),
('2035-09-01', '2035-12-31'),
('2036-01-01', '2036-04-30'),
('2036-05-01', '2036-08-31'),
('2036-09-01', '2036-12-31'),
('2037-01-01', '2037-04-30'),
('2037-05-01', '2037-08-31'),
('2037-09-01', '2037-12-31'),
('2038-01-01', '2038-04-30'),
('2038-05-01', '2038-08-31'),
('2038-09-01', '2038-12-31'),
('2039-01-01', '2039-04-30'),
('2039-05-01', '2039-08-31'),
('2039-09-01', '2039-12-31'),
('2040-01-01', '2040-04-30'),
('2040-05-01', '2040-08-31'),
('2040-09-01', '2040-12-31'),
('2041-01-01', '2041-04-30'),
('2041-05-01', '2041-08-31'),
('2041-09-01', '2041-12-31'),
('2042-01-01', '2042-04-30'),
('2042-05-01', '2042-08-31'),
('2042-09-01', '2042-12-31'),
('2043-01-01', '2043-04-30'),
('2043-05-01', '2043-08-31'),
('2043-09-01', '2043-12-31'),
('2044-01-01', '2044-04-30'),
('2044-05-01', '2044-08-31'),
('2044-09-01', '2044-12-31'),
('2045-01-01', '2045-04-30'),
('2045-05-01', '2045-08-31'),
('2045-09-01', '2045-12-31'),
('2046-01-01', '2046-04-30'),
('2046-05-01', '2046-08-31'),
('2046-09-01', '2046-12-31'),
('2047-01-01', '2047-04-30'),
('2047-05-01', '2047-08-31'),
('2047-09-01', '2047-12-31'),
('2048-01-01', '2048-04-30'),
('2048-05-01', '2048-08-31'),
('2048-09-01', '2048-12-31'),
('2049-01-01', '2049-04-30'),
('2049-05-01', '2049-08-31'),
('2049-09-01', '2049-12-31'),
('2050-01-01', '2050-04-30'),
('2050-05-01', '2050-08-31'),
('2050-09-01', '2050-12-31'),
('2051-01-01', '2051-04-30'),
('2051-05-01', '2051-08-31'),
('2051-09-01', '2051-12-31'),
('2052-01-01', '2052-04-30'),
('2052-05-01', '2052-08-31'),
('2052-09-01', '2052-12-31')

create table Carreras (
    idCarrera int identity(1,1),
    Carrera varchar(100),
    primary key (idCarrera)
)

insert into Carreras (Carrera) 
values
('Sistemas Computacionales'),
('Redes y Telecomunicaciones'),
('Negocios Internacionales'),
('Tecnologías de la Información'),
('Administración de Empresas'),
('Automotriz'),
('Mecatrónica'),
('Manufactura'),
('Arquitectura'),
('Contaduría'),
('Psicología'),
('Derecho'),
('Ingeniería Civil'),
('Ingeniería Química'),
('Gastronomía'),
('Mercadotecnia'),
('Biotecnología')

create table Profesiones (
    idProfesion int identity(1,1),
    Profesion varchar(100),
    primary key (idProfesion)
)

insert into Profesiones (Profesion)
values
('Ingeniería de Software'),
('Ciberseguridad'),
('Inteligencia Artificial'),
('Ciencia de Datos'),
('Redes y Telecomunicaciones'),
('Sistemas Embebidos'),
('Arquitectura de Computadoras'),
('Desarrollo de Aplicaciones Móviles'),
('Computación en la Nube'),
('Tecnologías de la Información'),
('Ingeniería en Computación'),
('Big Data'),
('Automatización y Control'),
('Desarrollo Web'),
('Analítica de Negocios'),
('Gestión de Proyectos de TI'),
('Ingeniería de Datos'),
('Robótica'),
('Internet de las Cosas (IoT)'),
('Desarrollo de Videojuegos')

create table Areas (
    idArea int identity(1,1),
    Area varchar(100),
    primary key (idArea)
)

insert into Areas (Area)
values
('Planeación'),
('Laboratorios y talleres'),
('Vinculación'),
('Servicios Estudiantiles'),
('Recursos Humanos'),
('Recursos Materiales'),
('Biblioteca'),
('Orientación Educativa'),
('Jurídico'),
('Secretaría Académica'),
('Finanzas'),
('Comunicación y Relaciones Públicas'),
('Desarrollo Institucional'),
('Control Escolar'),
('Tecnologías de la Información'),
('Investigación y Desarrollo'),
('Administración de Proyectos'),
('Asuntos Internacionales'),
('Desarrollo de Infraestructura'),
('Atención a la Salud Estudiantil')

create table Puestos (
    idPuesto int identity(1,1),
    Puesto varchar(100),
    primary key (idPuesto)
)

insert into Puestos (Puesto) values
('Administrativo'),('Docente'),('Jefe de departamento'),('Director'),('Coordinador'),('Subdirector'),('Secretario Académico'),
('Auxiliar Administrativo'),('Técnico de Laboratorio'),('Asesor Pedagógico'),('Profesor Titular'),('Profesor Adjunto'),('Investigador'),
('Tutor Académico'),('Jefe de Personal'),('Contador'),('Director de Recursos Humanos'),('Jefe de Finanzas'),('Especialista en Tecnología Educativa'),
('Director de Comunicación'),('Analista de Datos'),('Responsable de Calidad'),('Gestor de Proyectos'),('Director de Investigación'),
('Supervisor de Servicios Estudiantiles'),('Gerente de Innovación')

create table Grupos (
    idGrupo int identity(1,1),
    Grupo varchar(150),
    idCarrera int,
    Cuatrimestre int,
    primary key (idGrupo),
    foreign key (idCarrera) references Carreras(idCarrera)
)

insert into Grupos (Grupo, idCarrera, Cuatrimestre)
values
('S201', 1, 5),
('S202', 1, 5),
('S203', 1, 5),
('S204', 1, 5),
('S205', 1, 5),
('S206', 1, 5),
('M171', 7, 8),
('M172', 7, 8),
('M173', 7, 8),
('M174', 7, 8),
('M175', 7, 8),
('M176', 7, 8),
('T301', 3, 6),
('T302', 3, 6),
('T303', 3, 6),
('T304', 3, 6),
('T305', 3, 6),
('T306', 3, 6),
('C401', 4, 7),
('C402', 4, 7),
('C403', 4, 7),
('C404', 4, 7),
('C405', 4, 7),
('C406', 4, 7),
('A501', 5, 9),
('A502', 5, 9),
('A503', 5, 9),
('A504', 5, 9),
('A505', 5, 9)

create table Autorizados (
    idAutorizado int identity(1,1),
    idPersona int,
    idPuesto int,
    primary key (idAutorizado),
    foreign key (idPersona) references Personas(idPersona),
    foreign key (idPuesto) references Puestos(idPuesto)
)

insert into Autorizados (idPersona, idPuesto) 
values
(1, 2),
(2, 2),
(3, 2),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 2),
(9, 2),
(17, 5),
(18, 6),
(19, 7),
(20, 8),
(21, 9),
(22, 10),
(23, 11),
(24, 12),
(25, 13),
(26, 14),
(27, 15),
(28, 16),
(29, 17),
(30, 18),
(31, 19),
(32, 20),
(33, 21),
(34, 22),
(35, 23),
(36, 24),
(37, 25),
(38, 26)

create table Registros (
    idRegistro int identity(1,1),
    Fecha date,
    idPersona int,
    idAutorizado int,
    Medicion decimal(10,2),
    primary key (idRegistro),
    foreign key (idPersona) references Personas(idPersona),
    foreign key (idAutorizado) references Autorizados(idAutorizado)
)

insert into Registros (Fecha, idPersona, idAutorizado, Medicion)
values
('2025-02-01', 10, 1, 0.03),
('2025-02-03', 13, 2, 0.05),
('2025-02-05', 16, 3, 0.08),
('2025-02-07', 10, 4, 0.10),
('2025-02-10', 10, 5, 0.12),
('2025-02-12', 11, 6, 0.15),
('2025-02-15', 14, 7, 0.18),
('2025-02-18', 15, 8, 0.20),
('2025-02-22', 12, 9, 0.25),
('2025-02-27', 11, 4, 0.30),
('2025-03-02', 13, 5, 0.33),
('2025-03-05', 16, 6, 0.36),
('2025-03-08', 10, 7, 0.40),
('2025-03-12', 14, 8, 0.42),
('2025-03-15', 15, 9, 0.45),
('2025-03-18', 12, 1, 0.50),
('2025-03-22', 11, 2, 0.55),
('2025-03-25', 13, 3, 0.60),
('2025-03-28', 16, 4, 0.65),
('2025-04-01', 10, 5, 0.70),
('2025-04-04', 14, 6, 0.75),
('2025-04-07', 15, 7, 0.80),
('2025-04-10', 12, 8, 0.85),
('2025-04-14', 11, 9, 0.90),
('2025-04-17', 13, 1, 0.95),
('2025-04-20', 16, 2, 1.00),
('2025-04-23', 10, 3, 1.05),
('2025-04-26', 14, 4, 1.10),
('2025-04-30', 15, 5, 1.15)

create table Personal (
    idPersonal int identity(1,1),
    idPuesto int,
    Cedula varchar(50),
    idPersona int,
    idProfesion int,
    idArea int,
    primary key (idPersonal),
    foreign key (idPuesto) references Puestos(idPuesto),
    foreign key (idPersona) references Personas(idPersona),
    foreign key (idProfesion) references Profesiones(idProfesion),
    foreign key (idArea) references Areas(idArea)
)

insert into Personal (idPuesto, Cedula, idPersona, idProfesion, idArea)
values
(2, '1023456789', 1, 1, 10),
(2, '2045678912', 2, 2, 10),
(2, '3067891234', 3, 3, 10),
(1, '4089123456', 4, 4, 10),
(1, '5091234567', 5, 5, 10),
(1, '6012345678', 6, 6, 10),
(1, '7023456789', 7, 7, 10),
(2, '8034567891', 8, 8, 10),
(2, '9045678912', 9, 9, 10),
(5, '1023456789', 17, 1, 10),
(6, '2045678912', 18, 2, 10),
(7, '3067891234', 19, 3, 10),
(8, '4089123456', 20, 4, 10),
(9, '5091234567', 21, 5, 10),
(10, '6012345678', 22, 6, 10),
(11, '7023456789', 23, 7, 10),
(12, '8034567891', 24, 8, 10),
(13, '9045678912', 25, 9, 10),
(14, '1012345678', 26, 10, 10),
(15, '1112345678', 27, 11, 10),
(16, '1212345678', 28, 12, 10),
(17, '1312345678', 29, 13, 10),
(18, '1412345678', 30, 14, 10),
(19, '1512345678', 31, 15, 10),
(20, '1612345678', 32, 16, 10),
(21, '1712345678', 33, 17, 10),
(22, '1812345678', 34, 18, 10),
(23, '1912345678', 35, 19, 10),
(24, '2012345678', 36, 20, 10),
(25, '2112345678', 37, 20, 10)

create table Tutores (
    idTutor int identity(1,1),
    idPersonal int,
    primary key (idTutor),
    foreign key (idPersonal) references Personal(idPersonal)
)

insert into Tutores (idPersonal)
values
(1),(2),(3),(4),(5),(6),(7),(8),(9),(10),
(11),(12),(13),(14),(15),(16),(17),(18),(19),(20),
(21),(22),(23),(24),(25),(26),(27),(28),(29),(30)

create table AsignacionTutores (
    idAsignacion int identity(1,1),
    idGrupo int,
    idTutor int,
    idPeriodo int,
    primary key (idAsignacion),
    foreign key (idGrupo) references Grupos(idGrupo),
    foreign key (idTutor) references Tutores(idTutor),
    foreign key (idPeriodo) references Periodos(idPeriodo)
)

insert into AsignacionTutores (idGrupo, idTutor, idPeriodo)
values
(3, 1, 1),
(1, 2, 2),
(7, 3, 3),
(6, 4, 4),
(9, 5, 5),
(4, 6, 6),
(2, 7, 7),
(5, 8, 8),
(8, 9, 9),
(9, 10, 10),
(10, 11, 11),
(11, 12, 12),
(12, 13, 13),
(13, 14, 14),
(14, 15, 15),
(15, 16, 16),
(16, 17, 17),
(17, 18, 18),
(18, 19, 19),
(19, 20, 20),
(20, 21, 21),
(21, 22, 22),
(22, 23, 23),
(23, 24, 24),
(24, 25, 25),
(25, 26, 26),
(26, 27, 27),
(27, 28, 28),
(28, 29, 29)

create table Estudiantes (
    idEstudiante int identity(1,1),
    Matricula varchar(20) unique,
    idPersona int,
    idAsignacion int,
    primary key (idEstudiante),
    foreign key (idPersona) references Personas(idPersona),
    foreign key (idAsignacion) references AsignacionTutores(idAsignacion)
)

insert into Estudiantes (Matricula, idPersona, idAsignacion)
values
('123048138', 10, 1),
('123045976', 11, 1),
('123045464', 12, 1),
('123047674', 13, 1),
('123048152', 14, 1),
('123046059', 15, 1),
('123047624', 16, 1)
