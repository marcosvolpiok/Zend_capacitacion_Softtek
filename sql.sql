CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;






INSERT INTO empresas (nombre, descripcion) VALUES ('BBVA', 'Banco comercial');
INSERT INTO empresas (nombre, descripcion) VALUES ('JP Morgan', 'Banco de inversion');
INSERT INTO empresas (nombre, descripcion) VALUES ('Bear Stearns', 'Salvado en el 2008 fraudulentamente');
INSERT INTO empresas (nombre, descripcion) VALUES ('Grupo Prisma', 'Medios de pago');
INSERT INTO empresas (nombre, descripcion) VALUES ('ANSES', 'I like stealing!');
INSERT INTO empresas (nombre, descripcion) VALUES ('Wenance', 'Que lindo sueldo que tenés ¡Campeón!');
