<?php

				include '../menu/menu.php';
				include '../clases/clase_producto.php';
				$producto = new producto();
				$data = $producto->get_producto();

				include '../clases/clase_proveedor.php';
				$proveedor = new proveedor();
				include '../clases/clase_ubicacion.php';
				$ubicacion = new ubicacion();
				include '../clases/clase_precio.php';
				$precio = new precio();
		?>
					<ol class="breadcrumb">
					  <li><a  href="../admin/" style="cursor: pointer;">heavy parts</a></li>
					  <li class="active">Inventario</li>
					</ol>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h1 class='text-center'>Inventario</h1>
						</div>
						<div class="panel-body">
							<?php if (isset($_SESSION['Id']) && isset($_SESSION['Nivel']) && $_SESSION['Nivel'] ==2) { ?>
							<a href="add_producto.php" class='btn btn-info'>Nuevo producto</a><br><br>
							<?php } ?>
							<div class='table-responsive' style="margin-top: 1%">
								<table class='table table-bordered table-hover' id='tabla_datos'>
									<thead>
										<tr>
										<th>Cod_producto</th>
											<th>Cod_oem</th>
											<th>Cantidad</th>
											<th>Nombre</th>
											<th>Descripcion</th>
											<th>Proveedor</th>
											<th>Ubicacion</th>
										</tr>
									</thead>
									<tbody class="result">
										<?php
										$i = 0;
										$h = 1;
										foreach ($data as $row) {
											if ($i == 5) {
												$h++;
												$i = 0;
											}
											?>
										<tr style="cursor: pointer;" onclick="modal('<?php echo $row['Id_producto'] ?>');" class="pag pag-<?php echo $h; ?>">
											<td><?php echo $row['Cod_producto'] ?></td>
											<td><?php echo $row['Cod_oem'] ?></td>
											<td><?php $precio1 = $precio->get_precio_id_producto($row['Id_producto']); echo $precio1[0][1]; ?></td>
											<td><?php echo $row['Nombre'] ?></td>
											<td><?php echo $row['Descripcion'] ?></td>
											<td><?php $proveedor1 = $proveedor->get_id_proveedor($row['Id_proveedor']); echo $proveedor1[0][1] ?></td>
											<td>Estante <?php $ubicacion1 = $ubicacion->get_id_ubicacion($row['Id_ubicacion']); echo $ubicacion1[0][1] ?></td>
										</tr>
										<?php $i++; }?>
									</tbody>
								</table>
								<nav class="pagi text-right" style="margin-top: -2%">
							 		<ul class="pagination"></ul>
								</nav>
							</div>
						</div>
					</div>
<?php include '../pie/pie.php'; ?>
<script>
	function buscar(dato,tipo){
		if (dato != '') {
			//alert(dato+' Tipo: '+tipo);
			$('#img').html("<img src='../img/cargando.gif' width=30 height=30/>");
			console.log(dato);
			$.ajax({
				url: "agregar_pu.php",
				type : 'post',
				dataType: 'html',
				data: {
					dato: dato,
					tipo: tipo
				},
			})
			.done(function(data) {
				if (tipo == 1) {
					$('#Id_proveedor').val(data);
					console.log(data);
				}else if(tipo == 2){
					$('#Id_ubicacion').val(data);
					console.log(data);
				}
				console.log('hola');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				$('#img').html("");
				console.log('hola');
			});
        }
	}
</script>
