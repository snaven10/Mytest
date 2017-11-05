<?php
				if (!isset($_POST['validacion'])) {
					if (basename($_SERVER["PHP_SELF"]) != 'index.php') {
						header('location: ../admin');
					}
				}
				include '../clases/clase_detalle_venta.php';

				$detalle_venta = new detalle_venta();

				$data = $detalle_venta->get_detalle_venta();
				
								include '../clases/clase_pedido.php';
								$pedido = new pedido();
								include '../clases/clase_producto.php';
								$producto = new producto();
		?>
					<ol class="breadcrumb">
					  <li><a onclick="contenido('view_producto.php');">heavy parts</a></li>
					  <li class="active">detalle venta</li>
					</ol>
					<div class="panel panel-primary"> 
						<div class="panel-heading"> 
							<h1 class='text-center'>detalle venta</h1>
						</div> 
						<div class="panel-body"> 
							<a href='add_detalle_venta.php' class='btn btn-info'>Nuevo detalle venta</a><br><br>
							<div class='table-responsive'>
								<table class='table table-striped table-bordered' id='tabla_datos'>
									<thead>
										<tr> 
											<td>Id_detalle_venta</td>
									<td>Id_pedido</td>
									<td>Id_producto</td>
									<td>Cantidad</td>
									<td>Precio_u</td>
									<td>Estado</td>  
											<td class='text-center'><b>Opciones</b></td>
										</tr>
									</thead>
									<?php
									foreach ($data as $row) {?>
									<tr> 
										<td><?php echo $row['Id_detalle_venta'] ?></td>
								<td><?php $pedido1 = $pedido->get_id_pedido($row['Id_pedido']); echo $pedido1[0][2] ?></td>
								<td><?php $producto1 = $producto->get_id_producto($row['Id_producto']); echo $producto1[0][2] ?></td>
								<td><?php echo $row['Cantidad'] ?></td>
								<td><?php echo $row['Precio_u'] ?></td>
								<td><?php echo $row['Estado'] ?></td>
										<td><a href='add_detalle_venta.php?id=<?php echo $row[0] ?>' class='btn btn-info'>Editar</a>&nbsp;&nbsp;&nbsp;<a href='del_detalle_venta.php?id=<?php echo $row[0] ?>' class='btn btn-danger'>Eliminar</a></td>				
									</tr>
									<?php }?>
								</table>
							</div>	 
						</div> 
					</div>
		