<?php
				if (!isset($_POST['validacion'])) {
					if (basename($_SERVER["PHP_SELF"]) != 'index.php') {
						header('location: ../admin');
					}
				}
				if (!empty($_GET['id'])) {
					include '../clases/clase_encabezado_factura.php';
					$encabezado_factura = new encabezado_factura();
					$data = $encabezado_factura->get_id_encabezado_factura($_GET['id']);

							$nvl = 0;
							foreach ($data as $row){
								$nvl += 1;
							}
				}?>

			<form action='' method='POST' role='form' class='col-xs-12 col-sm-12 col-md-6 col-lg-6' enctype='multipart/form-data'>
				<legend>encabezado factura</legend>
					<div class='form-group'>
					<input type='text' name='Id_factura' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[1];}else{if(!empty($_POST['Id_factura'])){echo $_POST['Id_factura'];}}?>' placeholder='Id_factura' required><br>
					<input type='text' name='N_fac' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[2];}else{if(!empty($_POST['N_fac'])){echo $_POST['N_fac'];}}?>' placeholder='N_fac' required><br>
					<input type='text' name='N_ccf' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[3];}else{if(!empty($_POST['N_ccf'])){echo $_POST['N_ccf'];}}?>' placeholder='N_ccf' required><br>
					<input type='text' name='Fecha' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[4];}else{if(!empty($_POST['Fecha'])){echo $_POST['Fecha'];}}?>' placeholder='Fecha' required><br>
					<input type='text' name='Fecha_vencimiento' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[5];}else{if(!empty($_POST['Fecha_vencimiento'])){echo $_POST['Fecha_vencimiento'];}}?>' placeholder='Fecha_vencimiento' required><br>
					<input type='text' name='Abono' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[6];}else{if(!empty($_POST['Abono'])){echo $_POST['Abono'];}}?>' placeholder='Abono' required><br>
					<input type='text' name='Compra_total' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[7];}else{if(!empty($_POST['Compra_total'])){echo $_POST['Compra_total'];}}?>' placeholder='Compra_total' required><br>
					<input type='text' name='Condicon_operacion' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[8];}else{if(!empty($_POST['Condicon_operacion'])){echo $_POST['Condicon_operacion'];}}?>' placeholder='Condicon_operacion' required><br>
					<input type='text' name='Id_usuario' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[9];}else{if(!empty($_POST['Id_usuario'])){echo $_POST['Id_usuario'];}}?>' placeholder='Id_usuario' required><br>
					<input type='text' name='Id_pedido' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[10];}else{if(!empty($_POST['Id_pedido'])){echo $_POST['Id_pedido'];}}?>' placeholder='Id_pedido' required><br>
					<input type='text' name='Estado' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[11];}else{if(!empty($_POST['Estado'])){echo $_POST['Estado'];}}?>' placeholder='Estado' required><br>

					</div>
				<button type='submit' name='add' class='btn btn-success'>Guardar</button>
			</form>
<?php
				if (isset($_POST['add'])) {
					if (!empty($_GET['id'])) {
						if (!empty($_POST['Id_factura']) &&!empty($_POST['N_fac']) &&!empty($_POST['N_ccf']) &&!empty($_POST['Fecha']) &&!empty($_POST['Fecha_vencimiento']) &&!empty($_POST['Abono']) &&!empty($_POST['Compra_total']) &&!empty($_POST['Condicon_operacion']) &&!empty($_POST['Id_usuario']) &&!empty($_POST['Id_pedido']) &&!empty($_POST['Estado'])) {
						if ($encabezado_factura->edit_encabezado_factura($_GET['id'],$_POST['Id_factura'],$_POST['N_fac'],$_POST['N_ccf'],$_POST['Fecha'],$_POST['Fecha_vencimiento'],$_POST['Abono'],$_POST['Compra_total'],$_POST['Condicon_operacion'],$_POST['Id_usuario'],$_POST['Id_pedido'],$_POST['Estado']) == 0) { ?>

							<script>alert('Se ha editado un registro con exito');location.href='view_encabezado_factura.php';</script>
						<?php }else{ ?>
							<script>alert('Ocurrio un error!');location.href='view_encabezado_factura.php';</script>

						<?php }
					}
					}else{
					if (!empty($_POST['Id_factura']) &&!empty($_POST['N_fac']) &&!empty($_POST['N_ccf']) &&!empty($_POST['Fecha']) &&!empty($_POST['Fecha_vencimiento']) &&!empty($_POST['Abono']) &&!empty($_POST['Compra_total']) &&!empty($_POST['Condicon_operacion']) &&!empty($_POST['Id_usuario']) &&!empty($_POST['Id_pedido']) &&!empty($_POST['Estado'])) {
						include '../clases/clase_encabezado_factura.php';
						$encabezado_factura = new encabezado_factura();
						if ($encabezado_factura->add_encabezado_factura($_POST['Id_factura'],$_POST['N_fac'],$_POST['N_ccf'],$_POST['Fecha'],$_POST['Fecha_vencimiento'],$_POST['Abono'],$_POST['Compra_total'],$_POST['Condicon_operacion'],$_POST['Id_usuario'],$_POST['Id_pedido'],$_POST['Estado']) == 0) { ?>

							<script>alert('Se agrego con exito');location.href='view_encabezado_factura.php';</script>

						<?php }else{ ?>
							<script>alert('Ocurrio un error!');location.href='view_encabezado_factura.php';</script>

						<?php }

					}
				}
				}
			?>
