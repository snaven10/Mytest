<?php
				if (!isset($_POST['validacion'])) {
					if (basename($_SERVER["PHP_SELF"]) != 'index.php') {
						header('location: ../admin');
					}
				}
				include '../clases/clase_detalle_cliente.php';

				$detalle_cliente = new detalle_cliente();

				$data = $detalle_cliente->get_detalle_cliente();

								include '../clases/clase_cliente.php';
								$cliente = new cliente();
		?>
					<ol class="breadcrumb">
					  <li><a onclick="contenido('view_producto.php');">heavy parts</a></li>
					  <li class="active">detalle cliente</li>
					</ol>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h1 class='text-center'>detalle cliente</h1>
						</div>
						<div class="panel-body">
							<a href='add_detalle_cliente.php' class='btn btn-info'>Nuevo detalle cliente</a><br><br>
							<div class='table-responsive'>
								<table class='table table-striped table-bordered' id='tabla_datos'>
									<thead>
										<tr>
											<td>Id_detalle_cliente</td>
									<td>Cod_cliente</td>
									<td>Id_cliente</td>
									<td>Nit</td>
									<td>Nrc</td>
									<td>Direccion</td>
									<td>Telefono</td>
									<td>Estado</td>
										<td class='text-center'><b>Opciones</b></td>
										</tr>
									</thead>
									<?php
									foreach ($data as $row) {?>
									<tr>
										<td><?php echo $row['Id_detalle_cliente'] ?></td>
										<td><?php echo $row['Cod_cliente'] ?></td>
										<td><?php $cliente1 = $cliente->get_id_cliente($row['Id_cliente']); echo $cliente1[0][2] ?></td>
										<td><?php echo $row['Nit'] ?></td>
										<td><?php echo $row['Nrc'] ?></td>
										<td><?php echo $row['Direccion'] ?></td>
										<td><?php echo $row['Telefono'] ?></td>
										<td><?php echo $row['Estado'] ?></td>
										<td><a href='add_detalle_cliente.php?id=<?php echo $row[0] ?>' class='btn btn-info'>Editar</a>&nbsp;&nbsp;&nbsp;<a href='del_detalle_cliente.php?id=<?php echo $row[0] ?>' class='btn btn-danger'>Eliminar</a></td>
									</tr>
									<?php }?>
								</table>
							</div>
						</div>
					</div>

