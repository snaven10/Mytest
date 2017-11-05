<?php
				include '../menu/menu.php';
				/*if (!isset($_POST['validacion'])) {
					if (basename($_SERVER["PHP_SELF"]) != 'index.php') {
						header('location: ../admin');
					}
				}*/
				include '../clases/clase_cliente.php';

				$cliente = new cliente();

				$data = $cliente->get_cliente();
				
		?>
					<ol class="breadcrumb">
					  <li><a onclick="contenido('view_producto.php');">heavy parts</a></li>
					  <li class="active">cliente</li>
					</ol>
					<div class="panel panel-primary"> 
						<div class="panel-heading"> 
							<h1 class='text-center'>cliente</h1>
						</div> 
						<div class="panel-body"> 
							<a href="add_cliente.php" class='btn btn-info'>Nuevo cliente</a><br><br>
							<div class='table-responsive'>
								<table class='table table-striped table-bordered' id='tabla_datos'>
									<thead>
										<tr> 
											<td>Id_cliente</td>
									<td>tipo_cliente</td>
									<td>Nombre</td>
									<td>Estado</td>  
											<td class='text-center'><b>Opciones</b></td>
										</tr>
									</thead>
									<?php
									foreach ($data as $row) {?>
									<tr> 
										<td><?php echo $row['Id_cliente'] ?></td>
								<td><?php echo $row['tipo_cliente'] ?></td>
								<td><?php echo $row['Nombre'] ?></td>
								<td><?php echo $row['Estado'] ?></td>
										<td><a href='add_cliente.php?id=<?php echo $row[0] ?>' class='btn btn-info'>Editar</a>&nbsp;&nbsp;&nbsp;<a href='del_cliente.php?id=<?php echo $row[0] ?>' class='btn btn-danger'>Eliminar</a></td>				
									</tr>
									<?php }?>
								</table>
							</div>	 
						</div> 
					</div>
<?php include '../pie/pie.php';  ?>
		