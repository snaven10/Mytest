<?php
				include '../menu/menu.php';
				/*if (!isset($_POST['validacion'])) {
					if (basename($_SERVER["PHP_SELF"]) != 'index.php') {
						header('location: ../admin');
					}
				}*/
				include '../clases/clase_proveedor.php';

				$proveedor = new proveedor();

				$data = $proveedor->get_proveedor();
				
		?>
					<ol class="breadcrumb">
					  <li><a onclick="contenido('view_proveedor.php');">heavy parts</a></li>
					  <li class="active">proveedor</li>
					</ol>
					<div class="panel panel-primary"> 
						<div class="panel-heading"> 
							<h1 class='text-center'>proveedor</h1>
						</div> 
						<div class="panel-body"> 
							<a href='add_proveedor.php' class='btn btn-info'>Nuevo proveedor</a><br><br>
							<div class='table-responsive'>
								<table class='table table-striped table-bordered' id='tabla_datos'>
									<thead>
										<tr> 
											<td>Id_proveedor</td>
									<td>Nombre</td>
									<td>Nit_empresa</td>
									<td>Telefono</td>
									<td>Direccion</td>
									<td>Email</td>
									<td>Estado</td>  
											<td class='text-center'><b>Opciones</b></td>
										</tr>
									</thead>
									<?php
									foreach ($data as $row) {?>
									<tr> 
										<td><?php echo $row['Id_proveedor'] ?></td>
								<td><?php echo $row['Nombre'] ?></td>
								<td><?php echo $row['Nit_empresa'] ?></td>
								<td><?php echo $row['Telefono'] ?></td>
								<td><?php echo $row['Direccion'] ?></td>
								<td><?php echo $row['Email'] ?></td>
								<td><?php echo $row['Estado'] ?></td>
										<td><a href='add_proveedor.php?id=<?php echo $row[0] ?>' class='btn btn-info'>Editar</a>&nbsp;&nbsp;&nbsp;<a href='del_proveedor.php?id=<?php echo $row[0] ?>' class='btn btn-danger'>Eliminar</a></td>				
									</tr>
									<?php }?>
								</table>
							</div>	 
						</div> 
					</div>
<?php include '../pie/pie.php';  ?>		