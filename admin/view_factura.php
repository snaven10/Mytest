<?php
				include '../menu/menu.php';
				include '../clases/clase_factura.php';
				$factura = new factura();
				$data = $factura->get_factura();

		?>
					<ol class="breadcrumb">
					  <li><a onclick="contenido('view_producto.php');">heavy parts</a></li>
					  <li class="active">factura</li>
					</ol>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h1 class='text-center'>factura</h1>
						</div>
						<div class="panel-body">
							<div class='table-responsive'>
								<table class='table table-striped table-bordered' id='tabla_datos'>
									<thead>
										<tr>
											<td>Serie</td>
											<td>Numero_factura</td>
											<td>Estado</td>
											<td class='text-center'><b>Opciones</b></td>
										</tr>
									</thead>
									<?php
									foreach ($data as $row) {?>
									<tr>
										<td><?php echo $row['Serie'] ?></td>
										<td><?php echo $row['Numero_factura'] ?></td>
										<td><?php if ($row["CCF"]==1) { echo "CCF"; }elseif ($row["CCF"]==0) { echo "FACTURA"; } ?></td>
										<td><a href='add_factura.php?id=<?php echo $row[0] ?>' class='btn btn-info'>Editar</a>&nbsp;&nbsp;&nbsp;<a href='del_factura.php?id=<?php echo $row[0] ?>' class='btn btn-danger'>Eliminar</a></td>
									</tr>
									<?php }?>
								</table>
							</div>
						</div>
					</div>
<?php include '../pie/pie.php';  ?>
