<?php
				if (!isset($_POST['validacion'])) {
					if (basename($_SERVER["PHP_SELF"]) != 'index.php') {
						header('location: ../admin');
					}
				}
				if (!empty($_GET['id'])) {
					include '../clases/clase_precio.php';
					$precio = new precio();
					$data = $precio->get_id_precio($_GET['id']);
							
							$nvl = 0;
							foreach ($data as $row){
								$nvl += 1;
							}
				}?>

			<form action='' method='POST' role='form' class='col-xs-12 col-sm-12 col-md-6 col-lg-6' enctype='multipart/form-data'>
				<legend>precio</legend>
					<div class='form-group'>
					<input type='text' name='Precio_compra' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[1];}else{if(!empty($_POST['Precio_compra'])){echo $_POST['Precio_compra'];}}?>' placeholder='Precio_compra' required><br>
					<input type='text' name='Precio_venta' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[2];}else{if(!empty($_POST['Precio_venta'])){echo $_POST['Precio_venta'];}}?>' placeholder='Precio_venta' required><br>
					<input type='text' name='Descuento' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[3];}else{if(!empty($_POST['Descuento'])){echo $_POST['Descuento'];}}?>' placeholder='Descuento' required><br>
					<input type='text' name='Id_producto' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[4];}else{if(!empty($_POST['Id_producto'])){echo $_POST['Id_producto'];}}?>' placeholder='Id_producto' required><br>
					<input type='text' name='Descripcion' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[5];}else{if(!empty($_POST['Descripcion'])){echo $_POST['Descripcion'];}}?>' placeholder='Descripcion' required><br>
					<input type='text' name='Estado' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[6];}else{if(!empty($_POST['Estado'])){echo $_POST['Estado'];}}?>' placeholder='Estado' required><br>
 
					</div>											
				<button type='submit' name='add' class='btn btn-success'>Guardar</button>
			</form>
<?php
				if (isset($_POST['add'])) {
					if (!empty($_GET['id'])) {
						if (!empty($_POST['Precio_compra']) &&!empty($_POST['Precio_venta']) &&!empty($_POST['Descuento']) &&!empty($_POST['Id_producto']) &&!empty($_POST['Descripcion']) &&!empty($_POST['Estado'])) {
						if ($precio->edit_precio($_GET['id'],$_POST['Precio_compra'],$_POST['Precio_venta'],$_POST['Descuento'],$_POST['Id_producto'],$_POST['Descripcion'],$_POST['Estado']) == 0) { ?>

							<script>alert('Se ha editado un registro con exito');location.href='view_precio.php';</script>
						<?php }else{ ?>
							<script>alert('Ocurrio un error!');location.href='view_precio.php';</script>
							
						<?php }
					}
					}else{
					if (!empty($_POST['Precio_compra']) &&!empty($_POST['Precio_venta']) &&!empty($_POST['Descuento']) &&!empty($_POST['Id_producto']) &&!empty($_POST['Descripcion']) &&!empty($_POST['Estado'])) {
						include '../clases/clase_precio.php';
						$precio = new precio();
						if ($precio->add_precio($_POST['Precio_compra'],$_POST['Precio_venta'],$_POST['Descuento'],$_POST['Id_producto'],$_POST['Descripcion'],$_POST['Estado']) == 0) { ?>

							<script>alert('Se agrego con exito');location.href='view_precio.php';</script>
							
						<?php }else{ ?>
							<script>alert('Ocurrio un error!');location.href='view_precio.php';</script>
							 
						<?php }

					}
				}
				}
			?>