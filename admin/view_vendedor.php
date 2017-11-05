<?php
				include '../menu/menu.php';
				include '../clases/clase_vendedor.php';
				$vendedor = new vendedor();
				$data = $vendedor->get_vendedor();
		?>
					<ol class="breadcrumb">
					  <li><a onclick="contenido('view_producto.php');">heavy parts</a></li>
					  <li class="active">vendedor</li>
					</ol>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h1 class='text-center'>vendedor</h1>
						</div>
						<div class="panel-body">
							<a href='add_vendedor.php' class='btn btn-info'>Nuevo vendedor</a><br><br>
							<div class='table-responsive'>
								<table class='table table-striped table-bordered' id='tabla_datos'>
									<thead>
										<tr>
											<td>Id_vendedor</td>
											<td>Cod_vendedor</td>
											<td>Nombre</td>
											<td>Nit</td>
											<td>Direccion</td>
											<td>Telefono</td>
											<td>Estado</td>
											<td class='text-center'><b>Opciones</b></td>
										</tr>
									</thead>
									<?php
									foreach ($data as $row) {?>
									<tr>
										<td><?php echo $row['Id_vendedor'] ?></td>
										<td><?php echo $row['Cod_vendedor'] ?></td>
										<td><?php echo $row['Nombre'] ?></td>
										<td><?php echo $row['Nit'] ?></td>
										<td><?php echo $row['Direccion'] ?></td>
										<td><?php echo $row['Telefono'] ?></td>
										<td><?php echo $row['Estado'] ?></td>
										<td><a href='add_vendedor.php?id=<?php echo $row[0] ?>' class='btn btn-info'>Editar</a>&nbsp;&nbsp;&nbsp;<a href='del_vendedor.php?id=<?php echo $row[0] ?>' class='btn btn-danger'>Eliminar</a></td>
									</tr>
									<?php }?>
								</table>
							</div>
						</div>
					</div>
<?php include '../pie/pie.php';  ?>
