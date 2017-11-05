<?php
				include '../menu/menu.php';
				/*if (!isset($_POST['validacion'])) {
					if (basename($_SERVER["PHP_SELF"]) != 'index.php') {
						header('location: ../admin');
					}
				}*/
				include '../clases/clase_usuario.php';

				$usuario = new usuario();

				$data = $usuario->get_usuario();
				
		?>
					<ol class="breadcrumb">
					  <li><a onclick="contenido('view_producto.php');">heavy parts</a></li>
					  <li class="active">usuario</li>
					</ol>
					<div class="panel panel-primary"> 
						<div class="panel-heading"> 
							<h1 class='text-center'>usuario</h1>
						</div> 
						<div class="panel-body"> 
							<a href='add_usuario.php' class='btn btn-info'>Nuevo usuario</a><br><br>
							<div class='table-responsive'>
								<table class='table table-striped table-bordered' id='tabla_datos'>
									<thead>
										<tr> 
											<td>Id_usuario</td>
									<td>Nombre</td>
									<td>Usuario</td>
									<td>Password</td>
									<td>Nivel</td>
									<td>Estado</td>  
											<td class='text-center'><b>Opciones</b></td>
										</tr>
									</thead>
									<?php
									foreach ($data as $row) {?>
									<tr> 
										<td><?php echo $row['Id_usuario'] ?></td>
								<td><?php echo $row['Nombre'] ?></td>
								<td><?php echo $row['Usuario'] ?></td>
								<td><?php echo $row['Password'] ?></td>
								<td><?php echo $row['Nivel'] ?></td>
								<td><?php echo $row['Estado'] ?></td>
										<td><a href='add_usuario.php?id=<?php echo $row[0] ?>' class='btn btn-info'>Editar</a>&nbsp;&nbsp;&nbsp;<a href='del_usuario.php?id=<?php echo $row[0] ?>' class='btn btn-danger'>Eliminar</a></td>				
									</tr>
									<?php }?>
								</table>
							</div>	 
						</div> 
					</div>
<?php include '../pie/pie.php';  ?>		