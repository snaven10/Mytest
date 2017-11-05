<?php
				if (!isset($_POST['validacion'])) {
					if (basename($_SERVER["PHP_SELF"]) != 'index.php') {
						header('location: ../admin');
					}
				}
				include '../clases/clase_encabezado_factura.php';

				$encabezado_factura = new encabezado_factura();

				$data = $encabezado_factura->get_encabezado_factura();
				
								include '../clases/clase_factura.php';
								$factura = new factura();
								include '../clases/clase_usuario.php';
								$usuario = new usuario();
								include '../clases/clase_pedido.php';
								$pedido = new pedido();
		?>
					<ol class="breadcrumb">
					  <li><a onclick="contenido('view_producto.php');">heavy parts</a></li>
					  <li class="active">encabezado factura</li>
					</ol>
					<div class="panel panel-primary"> 
						<div class="panel-heading"> 
							<h1 class='text-center'>encabezado factura</h1>
						</div> 
						<div class="panel-body"> 
							<a href='add_encabezado_factura.php' class='btn btn-info'>Nuevo encabezado factura</a><br><br>
							<div class='table-responsive'>
								<table class='table table-striped table-bordered' id='tabla_datos'>
									<thead>
										<tr> 
											<td>Id_encabezado_factura</td>
									<td>Id_factura</td>
									<td>N_fac</td>
									<td>N_ccf</td>
									<td>Fecha</td>
									<td>Fecha_vencimiento</td>
									<td>Abono</td>
									<td>Compra_total</td>
									<td>Condicon_operacion</td>
									<td>Id_usuario</td>
									<td>Id_pedido</td>
									<td>Estado</td>  
											<td class='text-center'><b>Opciones</b></td>
										</tr>
									</thead>
									<?php
									foreach ($data as $row) {?>
									<tr> 
										<td><?php echo $row['Id_encabezado_factura'] ?></td>
								<td><?php $factura1 = $factura->get_id_factura($row['Id_factura']); echo $factura1[0][2] ?></td>
								<td><?php echo $row['N_fac'] ?></td>
								<td><?php echo $row['N_ccf'] ?></td>
								<td><?php echo $row['Fecha'] ?></td>
								<td><?php echo $row['Fecha_vencimiento'] ?></td>
								<td><?php echo $row['Abono'] ?></td>
								<td><?php echo $row['Compra_total'] ?></td>
								<td><?php echo $row['Condicon_operacion'] ?></td>
								<td><?php $usuario1 = $usuario->get_id_usuario($row['Id_usuario']); echo $usuario1[0][2] ?></td>
								<td><?php $pedido1 = $pedido->get_id_pedido($row['Id_pedido']); echo $pedido1[0][2] ?></td>
								<td><?php echo $row['Estado'] ?></td>
										<td><a href='add_encabezado_factura.php?id=<?php echo $row[0] ?>' class='btn btn-info'>Editar</a>&nbsp;&nbsp;&nbsp;<a href='del_encabezado_factura.php?id=<?php echo $row[0] ?>' class='btn btn-danger'>Eliminar</a></td>				
									</tr>
									<?php }?>
								</table>
							</div>	 
						</div> 
					</div>
		