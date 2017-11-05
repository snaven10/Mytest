-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2017 at 09:40 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heavy_parts`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `Id_cliente` int(11) NOT NULL,
  `tipo_cliente` varchar(50) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`Id_cliente`, `tipo_cliente`, `Nombre`, `Estado`) VALUES
(1, '1', 'samuel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cod_reemplazo`
--

CREATE TABLE `cod_reemplazo` (
  `Id_cod_reemplazo` int(11) NOT NULL,
  `Cod_reemplazo` varchar(255) DEFAULT NULL,
  `Id_producto` int(11) DEFAULT NULL,
  `Estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comicion`
--

CREATE TABLE `comicion` (
  `Id_comicion` int(11) NOT NULL,
  `Id_vendedor` int(11) DEFAULT NULL,
  `Id_mecanico` int(11) DEFAULT NULL,
  `Comicion` int(11) DEFAULT NULL,
  `Tipo_persona` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comicion`
--

INSERT INTO `comicion` (`Id_comicion`, `Id_vendedor`, `Id_mecanico`, `Comicion`, `Tipo_persona`, `Estado`) VALUES
(1, 1, 1, 12, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_cliente`
--

CREATE TABLE `detalle_cliente` (
  `Id_detalle_cliente` int(11) NOT NULL,
  `Cod_cliente` varchar(50) DEFAULT NULL,
  `Id_cliente` int(255) DEFAULT NULL,
  `Nit` varchar(30) DEFAULT NULL,
  `Nrc` varchar(30) DEFAULT NULL,
  `Direccion` text,
  `Telefono` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `Id_detalle_venta` int(11) NOT NULL,
  `Id_pedido` int(11) DEFAULT NULL,
  `Id_producto` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Precio_u` double DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `encabezado_factura`
--

CREATE TABLE `encabezado_factura` (
  `Id_encabezado_factura` int(11) NOT NULL,
  `Id_factura` int(11) DEFAULT NULL,
  `N_fac` int(11) DEFAULT NULL,
  `N_ccf` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Fecha_vencimiento` date DEFAULT NULL,
  `Abono` double DEFAULT NULL,
  `Compra_total` double DEFAULT NULL,
  `Condicon_operacion` int(11) DEFAULT NULL,
  `Id_usuario` int(11) DEFAULT NULL,
  `Id_pedido` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

CREATE TABLE `factura` (
  `Id_factura` int(11) NOT NULL,
  `Serie` varchar(255) DEFAULT NULL,
  `Numero_factura` varchar(50) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mecanico`
--

CREATE TABLE `mecanico` (
  `Id_mecanico` int(11) NOT NULL,
  `Cod_mecanico` varchar(50) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Nit` varchar(30) DEFAULT NULL,
  `Direccion` text,
  `Telefono` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mecanico`
--

INSERT INTO `mecanico` (`Id_mecanico`, `Cod_mecanico`, `Nombre`, `Nit`, `Direccion`, `Telefono`, `Estado`) VALUES
(1, 'wqedqwdqw', 'Samuel Funes', '32213423423', 'San Miguel, San Miguel', 75539280, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `Id_pedido` int(11) NOT NULL,
  `Id_vendedor` int(11) DEFAULT NULL,
  `Id_mecanico` int(11) DEFAULT NULL,
  `Id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `precio`
--

CREATE TABLE `precio` (
  `Id_precio` int(11) NOT NULL,
  `Precio_compra` double DEFAULT NULL,
  `Precio_venta` double DEFAULT NULL,
  `Descuento` double DEFAULT NULL,
  `Id_producto` int(11) DEFAULT NULL,
  `Descripcion` text,
  `Estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `precio`
--

INSERT INTO `precio` (`Id_precio`, `Precio_compra`, `Precio_venta`, `Descuento`, `Id_producto`, `Descripcion`, `Estado`) VALUES
(1, 12, 2, 12, 1, 'dsfsdf', '1'),
(2, 12, 3, 12, 2, 'dsfsdf', '1'),
(3, 12, 5, 12, 3, 'dsfsdf', '1'),
(4, 12, 6, 12, 4, 'dsfsdf', '1'),
(5, 12, 8, 12, 5, 'dsfsdf', '1'),
(6, 12, 99, 12, 6, 'dsfsdf', '1'),
(7, 12, 12, 12, 7, 'dsfsdf', '1'),
(8, 12, 123124, 12, 8, 'dsfsdf', '1'),
(9, 12, 534, 12, 9, 'dsfsdf', '1'),
(10, 12, 655, 12, 10, 'dsfsdf', '1'),
(11, 12, 657, 12, 11, 'dsfsdf', '1'),
(12, 12, 567, 12, 12, 'dsfsdf', '1'),
(13, 12, 657, 12, 13, 'dsfsdf', '1'),
(14, 23, 23, 2, NULL, 'dgfgdfg', '1'),
(15, 1, 1, 1, 29, 'sa', '1'),
(16, 111, 22, 22, 30, 'dsfsdf', '1'),
(17, 111, 22, 22, 31, 'dsfsdf', '1'),
(18, 111, 22, 22, 32, 'dsfsdf', '1'),
(19, 111, 22, 22, 33, 'dsfsdf', '1'),
(20, 12, 12, 12, 34, 'adas', '1');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `Id_producto` int(11) NOT NULL,
  `Cod_producto` varchar(100) DEFAULT NULL,
  `Cod_oem` varchar(100) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Nombre` text,
  `Descripcion` text,
  `img` text,
  `Id_proveedor` int(11) DEFAULT NULL,
  `Id_ubicacion` int(11) DEFAULT NULL,
  `Estado` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`Id_producto`, `Cod_producto`, `Cod_oem`, `Cantidad`, `Nombre`, `Descripcion`, `img`, `Id_proveedor`, `Id_ubicacion`, `Estado`) VALUES
(1, '12w', '43', 12, 'nose', 'dfgdfgdfg', 'img.jpg', 1, 1, 1),
(2, 'ee2', '34', 13, 'quien', 'dfgdfgdfgd', 'img2.jpg', 1, 1, 1),
(3, 'dd3', '6', 14, 'hola', 'dfgfdgdfgdf', 'img.jpg', 1, 1, 1),
(4, '123w', '7', 66, 'AAAA', 'dgdfgfdgfd', 'img.jpg', 1, 1, 1),
(5, '12ws', '8', 44, 'uuuu', 'gfdgdfgfdgfd', 'img.jpg', 1, 1, 1),
(6, '45tg', '45', 3, 'porque', 'dfgdfgfdgfdgfd', 'img.jpg', 1, 1, 1),
(7, '54yg', '32', 6, 'prueba', 'dfgdfgfdgfdghfd', 'img.jpg', 1, 1, 1),
(9, '67h', '67', 7, 'dos', 'cbvcbvcbvcbdfgdf', 'img.jpg', 1, 1, 1),
(10, '43', '56', 8, 'cuatro', 'fgnhhfghgfhfghfgb', 'img.jpg', 1, 1, 1),
(11, 'g', '43', 9, 'cei', 'bcvbvnvbnhgkgyhfbcvvcnghjhg', 'img.jpg', 1, 1, 1),
(12, '3', '54', 1, 'nose', 'fgfgfhfjgyjuyghdfbcbfhdf', 'img.jpg', 1, 1, 1),
(13, '4', '67', 2, 'aja', 'dfgdfghjgfhyrdtrtutrfytfytrhcbfc', 'img.jpg', 1, 1, 1),
(14, '34', '345', 9, 'si', 'sdfghkjljgfdzsfgdfgdfgfdgfdgfdgfd', 'img.jpg', 1, 1, 1),
(15, 'fill494', '33411', 6, 'filtro Diesel mwm4.10', 'filtro para motor wollvaje', NULL, 2, 1, 1),
(16, 'desf', '3242', 2, 'dxgdffgd', 'dgfgdfg', NULL, 1, 1, 1),
(17, 'desf', '3242', 2, 'dxgdffgd', 'dgfgdfg', NULL, 1, 1, 1),
(18, 'desf', '3242', 2, 'dxgdffgd', 'dgfgdfg', NULL, 1, 1, 1),
(19, 'desf', '3242', 2, 'dxgdffgd', 'dgfgdfg', NULL, 1, 1, 1),
(20, 'desf', '3242', 2, 'dxgdffgd', 'dgfgdfg', NULL, 1, 1, 1),
(21, 'desf', '3242', 2, 'dxgdffgd', 'dgfgdfg', NULL, 1, 1, 1),
(22, 'desf', '3242', 2, 'dxgdffgd', 'dgfgdfg', NULL, 1, 1, 1),
(23, 'desf', '3242', 2, 'dxgdffgd', 'dgfgdfg', NULL, 1, 1, 1),
(24, 'desf', '3242', 2, 'dxgdffgd', 'dgfgdfg', NULL, 1, 1, 1),
(27, '123456', '3242', 2, 'dxgdffgd', 'dgfgdfg', NULL, 1, 1, 1),
(28, '123456', '3242', 2, 'dxgdffgd', 'dgfgdfg', NULL, 1, 1, 1),
(29, 'wqq', 'wqq', 1, 'sam', 'sa', NULL, 0, 1, 2),
(30, 'fweewe', '232', 3, 'xcx', 'dsfsdf', NULL, 0, 1, 1),
(31, 'fweewe', '232', 3, 'xcx', 'dsfsdf', NULL, 0, 1, 1),
(32, 'fweewe', '232', 3, 'xcx', 'dsfsdf', NULL, 0, 1, 1),
(33, 'fweewe', '232', 3, 'xcx', 'dsfsdf', NULL, 1, 1, 1),
(34, '123456', '121', 12, 'sam', 'adas', 'img_170902025957.png', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `Id_proveedor` int(11) NOT NULL,
  `Nombre` text,
  `Nit_empresa` varchar(25) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Direccion` text,
  `Email` varchar(255) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`Id_proveedor`, `Nombre`, `Nit_empresa`, `Telefono`, `Direccion`, `Email`, `Estado`) VALUES
(1, 'George', 'dfgd', 34, 'rege', 'fdgd', 3),
(2, 'wix', '234234234', 234234234, 'San Miguel', 'frjsamuel@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ubicacion`
--

CREATE TABLE `ubicacion` (
  `Id_ubicacion` int(11) NOT NULL,
  `Estante` int(11) DEFAULT NULL,
  `Repisa` int(11) DEFAULT NULL,
  `Casilla` varchar(2) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ubicacion`
--

INSERT INTO `ubicacion` (`Id_ubicacion`, `Estante`, `Repisa`, `Casilla`, `Estado`) VALUES
(1, 1, 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `Id_usuario` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Usuario` varchar(255) DEFAULT NULL,
  `Password` text,
  `Nivel` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`Id_usuario`, `Nombre`, `Usuario`, `Password`, `Nivel`, `Estado`) VALUES
(1, 'Samuel Funes', 'snaven', 'e10adc3949ba59abbe56e057f20f883e', 2, 1),
(2, 'George ', 'george', 'e10adc3949ba59abbe56e057f20f883e', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendedor`
--

CREATE TABLE `vendedor` (
  `Id_vendedor` int(11) NOT NULL,
  `Cod_vendedor` varchar(50) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Nit` varchar(30) DEFAULT NULL,
  `Direccion` text,
  `Telefono` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendedor`
--

INSERT INTO `vendedor` (`Id_vendedor`, `Cod_vendedor`, `Nombre`, `Nit`, `Direccion`, `Telefono`, `Estado`) VALUES
(1, '312312', 'George', '24234', 'fbdfgdfg', 244353, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_cliente`);

--
-- Indexes for table `cod_reemplazo`
--
ALTER TABLE `cod_reemplazo`
  ADD PRIMARY KEY (`Id_cod_reemplazo`);

--
-- Indexes for table `comicion`
--
ALTER TABLE `comicion`
  ADD PRIMARY KEY (`Id_comicion`);

--
-- Indexes for table `detalle_cliente`
--
ALTER TABLE `detalle_cliente`
  ADD PRIMARY KEY (`Id_detalle_cliente`);

--
-- Indexes for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`Id_detalle_venta`);

--
-- Indexes for table `encabezado_factura`
--
ALTER TABLE `encabezado_factura`
  ADD PRIMARY KEY (`Id_encabezado_factura`);

--
-- Indexes for table `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Id_factura`);

--
-- Indexes for table `mecanico`
--
ALTER TABLE `mecanico`
  ADD PRIMARY KEY (`Id_mecanico`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Id_pedido`);

--
-- Indexes for table `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`Id_precio`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Id_proveedor`);

--
-- Indexes for table `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`Id_ubicacion`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- Indexes for table `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`Id_vendedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cod_reemplazo`
--
ALTER TABLE `cod_reemplazo`
  MODIFY `Id_cod_reemplazo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comicion`
--
ALTER TABLE `comicion`
  MODIFY `Id_comicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detalle_cliente`
--
ALTER TABLE `detalle_cliente`
  MODIFY `Id_detalle_cliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `Id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `encabezado_factura`
--
ALTER TABLE `encabezado_factura`
  MODIFY `Id_encabezado_factura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `factura`
--
ALTER TABLE `factura`
  MODIFY `Id_factura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mecanico`
--
ALTER TABLE `mecanico`
  MODIFY `Id_mecanico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Id_pedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `precio`
--
ALTER TABLE `precio`
  MODIFY `Id_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `Id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `Id_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `Id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
