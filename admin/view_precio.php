<?php
				if (!isset($_POST['validacion'])) {
					if (basename($_SERVER["PHP_SELF"]) != 'index.php') {
						header('location: ../admin');
					}
				}
				include '../clases/clase_precio.php';

				$precio = new precio();

				$data = $precio->get_precio();
				
								include '../clases/clase_producto.php';
								$producto = new producto();
		?>
					<ol class="breadcrumb">
					  <li><a onclick="contenido('view_producto.php');">heavy parts</a></li>
					  <li class="active">precio</li>
					</ol>
					<div class="panel panel-primary"> 
						<div class="panel-heading"> 
							<h1 class='text-center'>precio</h1>
						</div> 
						<div class="panel-body"> 
							<a href='add_precio.php' class='btn btn-info'>Nuevo precio</a><br><br>
							<div class='table-responsive'>
								<table class='table table-striped table-bordered' id='tabla_datos'>
									<thead>
										<tr> 
											<td>Id_precio</td>
									<td>Precio_compra</td>
									<td>Precio_venta</td>
									<td>Descuento</td>
									<td>Id_producto</td>
									<td>Descripcion</td>
									<td>Estado</td>  
											<td class='text-center'><b>Opciones</b></td>
										</tr>
									</thead>
									<?php
									foreach ($data as $row) {?>
									<tr> 
										<td><?php echo $row['Id_precio'] ?></td>
								<td><?php echo $row['Precio_compra'] ?></td>
								<td><?php echo $row['Precio_venta'] ?></td>
								<td><?php echo $row['Descuento'] ?></td>
								<td><?php $producto1 = $producto->get_id_producto($row['Id_producto']); echo $producto1[0][2] ?></td>
								<td><?php echo $row['Descripcion'] ?></td>
								<td><?php echo $row['Estado'] ?></td>
										<td><a href='add_precio.php?id=<?php echo $row[0] ?>' class='btn btn-info'>Editar</a>&nbsp;&nbsp;&nbsp;<a href='del_precio.php?id=<?php echo $row[0] ?>' class='btn btn-danger'>Eliminar</a></td>				
									</tr>
									<?php }?>
								</table>
							</div>	 
						</div> 
					</div>
		