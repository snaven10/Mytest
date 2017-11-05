<?php
@session_start();
if (!isset($_SESSION['Id']) && !isset($_SESSION['Nivel'])) {
	header('location: ../');
}
 ?>
<!DOCTYPE html>
		<html lang='es'>
			<head>
				<title>vendedor</title>
				<meta charset='UTF-8'>
				<meta name=description content=''>
				<meta name=viewport content='width=device-width, initial-scale=1'>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'>
				<link href='../css/bootstrap.min.css' rel='stylesheet'>
				<link href='../css/style_cont.css' rel='stylesheet'>
				<link rel='stylesheet' type='text/css' href='../css/dataTables.bootstrap.min.css'>
								<!-- jQuery -->
				<script src="../js/jquery.min.js"></script>
				<script type="text/javascript" language="javascript" src="../js/funciones.js"></script>
			</head>
			<body>
				<nav class='navbar navbar-inverse navbar-fixed-top' ng-controller='HeaderController' role='navigation' style='border-radius:0px;'>
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'>
							<span class='sr-only'>Menu</span>
							<span class='glyphicon glyphicon-plus' style='color: #fff;'></span>
						</button>
						<a class='navbar-brand' style="cursor: pointer;" href="view_producto.php">heavy parts</a>
					</div>
					<div class='collapse navbar-collapse navbar-ex1-collapse'>
						<ul class='nav navbar-nav'>
							<?php if (isset($_SESSION['Id']) && isset($_SESSION['Nivel']) && $_SESSION['Nivel'] ==2) { ?>
							<li>
								<a class="" type="button" data-toggle="dropdown" style="cursor: pointer;">Usuarios<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="view_usuario.php" style="cursor: pointer;">Vista Usuarios</a></li>
									<li><a href="add_usuario.php" style="cursor: pointer;">Agregar Usuario</a></li>
								</ul>
							</li>
							<li>
								<a href="view_cliente.php">Clientes</a>
							</li>
							<li>
								<a href="view_proveedor.php">Proveedores</a>
							</li>
							<li>
								<a href="view_ubicacion.php">Ubicacion</a>
							</li>
							<li>
								<a class="" type="button" data-toggle="dropdown" style="cursor: pointer;">Comisiones<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="view_vendedor.php" style="cursor: pointer;">Vendedor</a></li>
									<li><a href="view_mecanico.php" style="cursor: pointer;">Mecanico</a></li>
									<li><a href="view_comicion.php" style="cursor: pointer;">Agregar Comision</a></li>
								</ul>
							</li>
							<li>
								<a class="" type="button" data-toggle="dropdown" style="cursor: pointer;">Factura<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li>
										<a href="add_factura.php?tipo=1" style="cursor: pointer;">CCF</a></li>
									<li>
										<a href="add_factura.php?tipo=0" style="cursor: pointer;">FACTURA</a></li>
									</li>
									<li>
										<a href="view_factura.php?tipo=1" style="cursor: pointer;">Vista ccf o Factura</a></li>
									<li>
									<li><a href="#" style="cursor: pointer;">Anular Factura</a></li>
								</ul>
							</li>
							<?php } ?>
							<li><a href="add_factura.php" style="cursor: pointer;">Reporte venta</a></li>
							<?php if (isset($_SESSION['Id']) && isset($_SESSION['Nivel']) && $_SESSION['Nivel'] ==2) { ?>
							<li>
								<a class="" type="button" data-toggle="dropdown" style="cursor: pointer;">Entradas<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="entradas.php" style="cursor: pointer;">Agregar Entradas</a></li>
									<li><a href="buscar_reportes_entradas.php" style="cursor: pointer;">Reporte de Entradas</a></li>
								</ul>
							</li>
							<li><a href="add_factura.php" style="cursor: pointer;">Salidas</a></li>
							<?php } ?>
							<li><a href="salir.php" style="cursor: pointer;">Salir</a></li>
						</ul>
						<ul class="nav navbar-nav pull-right">
							<li class="active">
								<a href="#" id="vp" style="cursor: pointer;">
								<span class="glyphicon glyphicon-car-shop" aria-hidden="true"></span> Pedido</a>
								<a href="#" id="xp" style="display:none;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
							</li>
						</ul>
					</div>

				</nav>

				<div class='container-fluid' style='margin-top: 5%;' ng-view id='contenido'>
				<div class="contP">
					<div class="list-group cnBody">
							<div class="list-group-item active">
								<?php if (isset($_SESSION['Id']) && isset($_SESSION['Nivel']) && $_SESSION['Nivel'] ==2) { ?>
									<div class='row'>
										<form action="guardar_entradas.php" method="POST" accept-charset="utf-8">
											<button type='submit' name="guardar" class="list-group-item active text-center">Guardar Entradas</button>
										</form>
									</div>
									<div class="row">
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
											Cod
										</div>
										<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
											Cantidad
										</div>
										<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
											Precio_C
										</div>
										<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
											Precio_V
										</div>
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
											Opciones
										</div>
									</div>
								<?php }else if(isset($_SESSION['Id']) && isset($_SESSION['Nivel']) && $_SESSION['Nivel'] ==1){ ?>
									<div class="row">
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
											Codigo
										</div>
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
											Nombre
										</div>
										<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
											Cantidad
										</div>
										<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
											Precio
										</div>
										<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
											Opciones
										</div>
									</div>
								<?php } ?>
							</div>
							<div id="dp">
								<div class="list-group-item">Aun no se ha realizado ningun pedido...</div>
							</div>
							<?php if (isset($_SESSION['Id']) && isset($_SESSION['Nivel']) && $_SESSION['Nivel'] ==2) { ?>

							<?php }else if(isset($_SESSION['Id']) && isset($_SESSION['Nivel']) && $_SESSION['Nivel'] ==1){ ?>
								<a href='#' onclick="modal_fac();" class="list-group-item active text-center">Facturar Pedido</a>
							<?php } ?>
					</div>
				</div>
