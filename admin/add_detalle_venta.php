<?php
				if (!isset($_POST['validacion'])) {
					if (basename($_SERVER["PHP_SELF"]) != 'index.php') {
						header('location: ../admin');
					}
				}
				if (!empty($_GET['id'])) {
					include '../clases/clase_detalle_venta.php';
					$detalle_venta = new detalle_venta();
					$data = $detalle_venta->get_id_detalle_venta($_GET['id']);

							$nvl = 0;
							foreach ($data as $row){
								$nvl += 1;
							}
				}?>

			<form action='' method='POST' role='form' class='col-xs-12 col-sm-12 col-md-6 col-lg-6' enctype='multipart/form-data'>
				<legend>detalle venta</legend>
					<div class='form-group'>
					<input type='text' name='Id_pedido' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[1];}else{if(!empty($_POST['Id_pedido'])){echo $_POST['Id_pedido'];}}?>' placeholder='Id_pedido' required><br>
					<input type='text' name='Id_producto' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[2];}else{if(!empty($_POST['Id_producto'])){echo $_POST['Id_producto'];}}?>' placeholder='Id_producto' required><br>
					<input type='text' name='Cantidad' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[3];}else{if(!empty($_POST['Cantidad'])){echo $_POST['Cantidad'];}}?>' placeholder='Cantidad' required><br>
					<input type='text' name='Precio_u' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[4];}else{if(!empty($_POST['Precio_u'])){echo $_POST['Precio_u'];}}?>' placeholder='Precio_u' required><br>
					<input type='text' name='Estado' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[5];}else{if(!empty($_POST['Estado'])){echo $_POST['Estado'];}}?>' placeholder='Estado' required><br>

					</div>
				<button type='submit' name='add' class='btn btn-success'>Guardar</button>
			</form>
<?php
				if (isset($_POST['add'])) {
					if (!empty($_GET['id'])) {
						if (!empty($_POST['Id_pedido']) &&!empty($_POST['Id_producto']) &&!empty($_POST['Cantidad']) &&!empty($_POST['Precio_u']) &&!empty($_POST['Estado'])) {
						if ($detalle_venta->edit_detalle_venta($_GET['id'],$_POST['Id_pedido'],$_POST['Id_producto'],$_POST['Cantidad'],$_POST['Precio_u'],$_POST['Estado']) == 0) { ?>

							<script>alert('Se ha editado un registro con exito');location.href='view_detalle_venta.php';</script>
						<?php }else{ ?>
							<script>alert('Ocurrio un error!');location.href='view_detalle_venta.php';</script>

						<?php }
					}
					}else{
					if (!empty($_POST['Id_pedido']) &&!empty($_POST['Id_producto']) &&!empty($_POST['Cantidad']) &&!empty($_POST['Precio_u']) &&!empty($_POST['Estado'])) {
						include '../clases/clase_detalle_venta.php';
						$detalle_venta = new detalle_venta();
						if ($detalle_venta->add_detalle_venta($_POST['Id_pedido'],$_POST['Id_producto'],$_POST['Cantidad'],$_POST['Precio_u'],$_POST['Estado']) == 0) { ?>

							<script>alert('Se agrego con exito');location.href='view_detalle_venta.php';</script>

						<?php }else{ ?>
							<script>alert('Ocurrio un error!');location.href='view_detalle_venta.php';</script>

						<?php }

					}
				}
				}
			?>
