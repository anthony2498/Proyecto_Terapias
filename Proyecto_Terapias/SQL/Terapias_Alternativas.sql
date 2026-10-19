DROP DATABASE IF EXISTS Terapias_Alternativas;
CREATE DATABASE Terapias_Alternativas;
USE Terapias_Alternativas;

-- Tablas

-- Roles
CREATE TABLE Roles (
    ID_Rol INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL UNIQUE
);

-- Usuarios
CREATE TABLE Usuarios (
    ID_Usuario INT AUTO_INCREMENT PRIMARY KEY,
    ID_Rol INT NOT NULL,
    Nombre VARCHAR(50) NOT NULL,
    Apellido VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    Estado ENUM('Activo', 'Inactivo') NOT NULL DEFAULT 'Activo',
    Fecha_Registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ID_Rol) REFERENCES Roles(ID_Rol)
);

-- Clientes
CREATE TABLE Clientes (
    ID_Cliente INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Identificacion VARCHAR(20) NOT NULL UNIQUE,
    Edad INT NOT NULL,
    Telefono VARCHAR(20) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Genero ENUM('Masculino', 'Femenino', 'Otro') NOT NULL,
    Provincia VARCHAR(50) NOT NULL,
    Direccion VARCHAR(255) NOT NULL,
    Fecha_Registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Terapeutas
CREATE TABLE Terapeutas (
    ID_Terapeuta INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Identificacion VARCHAR(20) NOT NULL UNIQUE,
    Telefono VARCHAR(20) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Provincia VARCHAR(50) NOT NULL,
    Direccion VARCHAR(255) NOT NULL,
    Disponibilidad ENUM('Disponible', 'No disponible') NOT NULL DEFAULT 'Disponible',
    Estado ENUM('Activo', 'Inactivo') NOT NULL DEFAULT 'Activo',
    Fecha_Registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Terapias
CREATE TABLE Terapias (
    ID_Terapia INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL UNIQUE,
    Descripcion TEXT,
    Precio_Base DECIMAL(10,2) NOT NULL,
    Duracion_Estimada INT NOT NULL
);

-- Relacion Terapeuta Terapia
CREATE TABLE Terapeuta_Terapia (
    ID_Terapeuta INT NOT NULL,
    ID_Terapia INT NOT NULL,
    PRIMARY KEY (ID_Terapeuta, ID_Terapia),
    FOREIGN KEY (ID_Terapeuta) REFERENCES Terapeutas(ID_Terapeuta),
    FOREIGN KEY (ID_Terapia) REFERENCES Terapias(ID_Terapia)
);

-- Citas
CREATE TABLE Citas (
    ID_Cita INT AUTO_INCREMENT PRIMARY KEY,
    ID_Cliente INT NOT NULL,
    ID_Terapeuta INT NOT NULL,
    ID_Terapia INT NOT NULL,
    Fecha DATE NOT NULL,
    Hora TIME NOT NULL,
    Estado ENUM('Pendiente', 'Confirmada', 'Cancelada', 'Completada') NOT NULL DEFAULT 'Pendiente',
    Notas TEXT NULL,
    Fecha_Registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ID_Cliente) REFERENCES Clientes(ID_Cliente),
    FOREIGN KEY (ID_Terapeuta) REFERENCES Terapeutas(ID_Terapeuta),
    FOREIGN KEY (ID_Terapia) REFERENCES Terapias(ID_Terapia)
);

-- Productos
CREATE TABLE Productos (
    ID_Producto INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL UNIQUE,
    Descripcion TEXT,
    Stock INT NOT NULL DEFAULT 0,
    Precio_Unitario DECIMAL(10,2) NOT NULL
);

-- Facturas
CREATE TABLE Facturas (
    ID_Factura INT AUTO_INCREMENT PRIMARY KEY,
    ID_Cliente INT NOT NULL,
    Fecha_Emision DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Total DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    Estado_Pago ENUM('Pendiente', 'Pagado', 'Anulado') NOT NULL DEFAULT 'Pendiente',
    Metodo_Pago VARCHAR(50),
    FOREIGN KEY (ID_Cliente) REFERENCES Clientes(ID_Cliente)
);

-- Detalle Factura
CREATE TABLE Detalle_Factura (
    ID_Detalle INT AUTO_INCREMENT PRIMARY KEY,
    ID_Factura INT NOT NULL,
    ID_Terapia INT NULL,
    ID_Producto INT NULL,
    Cantidad INT NOT NULL DEFAULT 1,
    Precio_Unitario DECIMAL(10,2) NOT NULL,
    Subtotal DECIMAL(10,2) GENERATED ALWAYS AS (Cantidad * Precio_Unitario) STORED,
    FOREIGN KEY (ID_Factura) REFERENCES Facturas(ID_Factura),
    FOREIGN KEY (ID_Terapia) REFERENCES Terapias(ID_Terapia),
    FOREIGN KEY (ID_Producto) REFERENCES Productos(ID_Producto),
    CONSTRAINT CK_Detalle_Factura_Item CHECK (
        (ID_Terapia IS NOT NULL AND ID_Producto IS NULL)
        OR
        (ID_Terapia IS NULL AND ID_Producto IS NOT NULL)
    )
);

-- Roles 
INSERT INTO Roles (Nombre) VALUES
('Administrador'),
('Recepcionista');

-- Datos Usuarios
INSERT INTO Usuarios (ID_Rol, Nombre, Apellido, Email, Password, Estado) VALUES
(1, 'Admin', 'Sistema', 'admin@terapias.com', 'admin123', 'Activo');

-- Terapias
INSERT INTO Terapias (Nombre, Descripcion, Precio_Base, Duracion_Estimada) VALUES
('Masaje Relajante', 'Terapia enfocada en relajacion muscular y bienestar general', 25000.00, 60),
('Aromaterapia', 'Uso de aceites esenciales para relajacion y equilibrio', 20000.00, 45),
('Acupuntura', 'Tecnica terapeutica tradicional para alivio y equilibrio corporal', 30000.00, 60),
('Reflexologia', 'Estimulo en puntos especificos de pies y manos', 22000.00, 50),
('Terapia de Piedras Calientes', 'Terapia corporal con piedras de calor controlado', 28000.00, 60);


-- Productos
INSERT INTO Productos (Nombre, Descripcion, Stock, Precio_Unitario) VALUES
('Aceite Esencial Lavanda', 'Aceite natural para aromaterapia', 20, 6500.00),
('Crema Relajante', 'Crema de uso terapeutico para masajes', 15, 4800.00),
('Vela Aromatica', 'Vela aromatica para sesiones de relajacion', 25, 3500.00);

-- Ind
CREATE INDEX IDX_Citas_Fecha ON Citas(Fecha);
CREATE INDEX IDX_Citas_Cliente ON Citas(ID_Cliente);
CREATE INDEX IDX_Citas_Terapeuta ON Citas(ID_Terapeuta);
CREATE INDEX IDX_Facturas_Cliente ON Facturas(ID_Cliente);