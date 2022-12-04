SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `corporacion` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `corporacion`;

DROP TABLE IF EXISTS `almacenes`;
CREATE TABLE `almacenes` (
  `nombre` varchar(5) NOT NULL,
  `localizacion` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `almacenes` (`nombre`, `localizacion`, `descripcion`) VALUES
('centr', 'Albal', 'Sede Central'),
('citri', 'Alaquàs', 'Nave logística de frutas '),
('ofici', 'Albal', 'Oficinas Sede central '),
('refri', 'Catarroja', 'Nave logística de refrigerados');

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `CIF` varchar(9) NOT NULL,
  `tipo` varchar(1) NOT NULL COMMENT '0=proveedor, 1 = cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `empresas` (`id`, `nombre`, `CIF`, `tipo`) VALUES
(1, 'MercaHome', 'B46000000', '1'),
(2, 'Compra Cooperativa Valenciana', 'F98000000', '1'),
(3, 'FriendCash', 'B46000001', '1'),
(4, 'Noche', 'B46000002', '1'),
(5, 'Cooperativa Agrícola Naranjito', 'F98000001', '0'),
(6, 'Pescavella', 'B46000003', '0'),
(7, 'CampoCaliente', 'B46000004', '0'),
(8, 'Panpobre', 'B46000005', '0'),
(9, 'Carrefive', 'B46000006', '1'),
(10, 'Galerías Preciados ', 'B46000007', '0');

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `tipo` varchar(2) DEFAULT NULL COMMENT 'FC=Factura de Compra FV=Factura de Ventas',
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `facturas` (`id_factura`, `fecha`, `id_pedido`, `tipo`, `valor`) VALUES
(1, '2022-02-07', 1, 'FC', '150.15'),
(2, '2022-02-08', 1, 'FC', '100.00'),
(3, '2022-02-08', 2, 'FV', '380.65'),
(4, '2022-02-08', 3, 'FC', '1506.43'),
(5, '2022-02-09', 4, 'FV', '1300.43'),
(6, '2022-02-10', 4, 'FV', '844.89'),
(7, '2022-02-06', 5, 'FC', '874.56'),
(8, '2022-02-07', 6, 'FV', '1000.68'),
(9, '2022-02-08', 6, 'FV', '347.00'),
(10, '2022-02-03', 7, 'FC', '400.32'),
(11, '2022-02-04', 7, 'FC', '50.00'),
(12, '2022-02-04', 8, 'FV', '632.20');

DROP TABLE IF EXISTS `lineaspedidos`;
CREATE TABLE `lineaspedidos` (
  `id_linea` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `cantidad` decimal(6,2) NOT NULL,
  `precio` decimal(6,2) NOT NULL COMMENT 'Precio por unidad'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `lineaspedidos` (`id_linea`, `id_pedido`, `codigo_producto`, `cantidad`, `precio`) VALUES
(1, 1, 1, '40.50', '0.50'),
(2, 1, 11, '35.50', '0.25'),
(3, 1, 2, '100.30', '0.10'),
(4, 1, 12, '30.70', '0.15'),
(5, 2, 1, '20.30', '1.00'),
(6, 2, 11, '15.80', '0.50'),
(7, 3, 3, '22.50', '3.15'),
(8, 3, 4, '50.30', '2.01'),
(11, 4, 3, '10.50', '5.25'),
(12, 4, 4, '30.80', '4.23'),
(13, 5, 8, '30.00', '2.25'),
(14, 6, 8, '25.00', '4.80'),
(15, 7, 5, '6.00', '2.70'),
(16, 8, 6, '3.00', '5.00');

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(1) NOT NULL COMMENT 'Proveedor=P o Cliente=C',
  `fecha` date NOT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pedidos` (`id`, `tipo`, `fecha`, `observacion`, `id_empresa`) VALUES
(1, 'P', '2022-02-06', 'Pedido de compra de cítricos ', 5),
(2, 'C', '2022-02-07', 'Pedido de venta de cítricos', 1),
(3, 'P', '2022-02-07', 'Pedido de carne de cerdo iberico', 7),
(4, 'C', '2022-02-08', 'Pedido de carne', 4),
(5, 'P', '2022-02-03', 'Pedido de compra de merluzas', 6),
(6, 'C', '2022-02-04', 'Pedido de venta de pescado', 3),
(7, 'P', '2022-02-01', 'Compra de pan de molde y pan de hamburguesas', 8),
(8, 'C', '2022-02-02', 'Venta de panes', 2);

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `almacen` varchar(5) NOT NULL,
  `unidad` varchar(4) NOT NULL,
  `clasificacion` varchar(1) DEFAULT NULL COMMENT 'C=Caduca o P=Permanente',
  `preciounidad` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `productos` (`codigo`, `descripcion`, `almacen`, `unidad`, `clasificacion`, `preciounidad`) VALUES
(1, 'Naranjas', 'citri', 'Kg', NULL, '0.25'),
(2, 'Limones', 'citri', 'Kg', NULL, '0.10'),
(3, 'Lomo alto ibérico', 'refri', 'Kg', 'C', '3.15'),
(4, 'Magro de jamón ibérico', 'refri', 'Kg', 'C', '3.25'),
(5, 'Pan de molde sin corteza', 'centr', 'uds', NULL, '0.78'),
(6, 'Pan de molde integral', 'centr', 'uds', NULL, '0.98'),
(7, 'Bolsa de plástico', 'centr', 'uds', 'P', '0.01'),
(8, 'Merluza', 'refri', 'uds', 'C', '4.75'),
(9, 'Caja de Cartón', 'centr', 'uds', 'P', '0.30'),
(10, 'Caja de plástico', 'refri', 'uds', 'P', '0.15'),
(11, 'Mandarina', 'citri', 'Kg', NULL, '0.50'),
(12, 'Limas', 'citri', 'K', NULL, '0.15');

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `id_mov` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` decimal(6,2) NOT NULL,
  `stock` decimal(6,2) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `unidad` varchar(3) NOT NULL,
  `almacen` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `stock` (`id_mov`, `fecha`, `producto`, `cantidad`, `stock`, `precio`, `unidad`, `almacen`) VALUES
(1, '2022-02-01', 1, '20.00', '20.00', '25.15', 'uds', 'citri'),
(2, '2022-02-02', 1, '10.00', '10.00', '35.15', 'uds', 'citri'),
(3, '2022-02-01', 2, '75.00', '75.00', '1.00', 'Kg', 'citri'),
(4, '2022-02-02', 2, '50.00', '25.00', '2.00', 'Kg', 'citri'),
(5, '2022-02-02', 3, '12.00', '12.00', '0.50', 'l', 'refri'),
(6, '2022-02-03', 3, '12.00', '0.00', '1.00', 'l', 'refri'),
(7, '2022-02-04', 4, '100.00', '100.00', '0.01', 'uds', 'ofici'),
(8, '2022-02-04', 5, '250.00', '250.00', '0.50', 'uds', 'ofici'),
(9, '2022-02-04', 6, '30.00', '30.00', '1.25', 'uds', 'centr'),
(10, '2022-02-07', 6, '18.00', '12.00', '2.01', 'uds', 'centr'),
(11, '2022-02-07', 7, '10.00', '10.00', '125.00', 'Kg', 'centr'),
(12, '2022-02-08', 7, '20.00', '30.00', '125.00', 'Kg', 'centr'),
(13, '2022-02-08', 7, '27.00', '3.00', '210.87', 'Kg', 'centr'),
(14, '2022-02-08', 8, '72.69', '72.69', '0.87', 'Kg', 'citri'),
(15, '2022-02-09', 9, '45.68', '45.68', '1.02', 'Kg', 'centr'),
(16, '2022-02-09', 10, '1600.85', '1600.85', '0.25', 'Kg', 'citri'),
(17, '2022-02-14', 9, '30.00', '15.68', '2.00', 'Kg', 'centr'),
(18, '2022-02-14', 10, '1000.00', '600.85', '0.75', 'Kg', 'citri');


ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`nombre`);

ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `CIF` (`CIF`);

ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `fk_pedido_factura` (`id_pedido`);

ALTER TABLE `lineaspedidos`
  ADD PRIMARY KEY (`id_linea`),
  ADD KEY `fk_pedido` (`id_pedido`),
  ADD KEY `fk_codigo_producto` (`codigo_producto`);

ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empresa_id` (`id_empresa`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_almacen_producto` (`almacen`);

ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_mov`),
  ADD KEY `fk_almacen` (`almacen`),
  ADD KEY `fk_producto` (`producto`);


ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `lineaspedidos`
  MODIFY `id_linea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `productos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `stock`
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;


ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_factura` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`);

ALTER TABLE `lineaspedidos`
  ADD CONSTRAINT `fk_codigo_producto` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo`),
  ADD CONSTRAINT `fk_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`);

ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_empresa_id` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`);

ALTER TABLE `productos`
  ADD CONSTRAINT `fk_almacen_producto` FOREIGN KEY (`almacen`) REFERENCES `almacenes` (`nombre`);

ALTER TABLE `stock`
  ADD CONSTRAINT `fk_almacen` FOREIGN KEY (`almacen`) REFERENCES `almacenes` (`nombre`),
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`producto`) REFERENCES `productos` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
