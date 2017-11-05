<?php
				if (!isset($_POST['validacion'])) {
					if (basename($_SERVER["PHP_SELF"]) != 'index.php') {
						header('location: ../admin');
					}
				}
				if (!empty($_GET['id'])) {
					include '../clases/clase_detalle_cliente.php';
					$detalle_cliente = new detalle_cliente();
					$data = $detalle_cliente->get_id_detalle_cliente($_GET['id']);

							$nvl = 0;
							foreach ($data as $row){
								$nvl += 1;
							}
				}?>

			<form action='' method='POST' role='form' class='col-xs-12 col-sm-12 col-md-6 col-lg-6' enctype='multipart/form-data'>
				<legend>detalle cliente</legend>
					<div class='form-group'>
					<input type='text' name='Cod_cliente' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[1];}else{if(!empty($_POST['Cod_cliente'])){echo $_POST['Cod_cliente'];}}?>' placeholder='Cod_cliente' required><br>
					<input type='text' name='Id_cliente' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[2];}else{if(!empty($_POST['Id_cliente'])){echo $_POST['Id_cliente'];}}?>' placeholder='Id_cliente' required><br>
					<input type='text' name='Nit' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[3];}else{if(!empty($_POST['Nit'])){echo $_POST['Nit'];}}?>' placeholder='Nit' required><br>
					<input type='text' name='Nrc' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[4];}else{if(!empty($_POST['Nrc'])){echo $_POST['Nrc'];}}?>' placeholder='Nrc' required><br>
					<input type='text' name='Direccion' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[5];}else{if(!empty($_POST['Direccion'])){echo $_POST['Direccion'];}}?>' placeholder='Direccion' required><br>
					<input type='text' name='Telefono' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[6];}else{if(!empty($_POST['Telefono'])){echo $_POST['Telefono'];}}?>' placeholder='Telefono' required><br>
					<input type='text' name='Estado' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[7];}else{if(!empty($_POST['Estado'])){echo $_POST['Estado'];}}?>' placeholder='Estado' required><br>
					</div>
				<button type='submit' name='add' class='btn btn-success'>Guardar</button>
			</form>
<?php
				if (isset($_POST['add'])) {
					if (!empty($_GET['id'])) {
						if (!empty($_POST['Cod_cliente']) &&!empty($_POST['Id_cliente']) &&!empty($_POST['Nit']) &&!empty($_POST['Nrc']) &&!empty($_POST['Direccion']) &&!empty($_POST['Telefono']) &&!empty($_POST['Estado'])) {
						if ($detalle_cliente->edit_detalle_cliente($_GET['id'],$_POST['Cod_cliente'],$_POST['Id_cliente'],$_POST['Nit'],$_POST['Nrc'],$_POST['Direccion'],$_POST['Telefono'],$_POST['Estado']) == 0) { ?>

							<script>alert('Se ha editado un registro con exito');location.href='view_detalle_cliente.php';</script>
						<?php }else{ ?>
							<script>alert('Ocurrio un error!');location.href='view_detalle_cliente.php';</script>

						<?php }
					}
					}else{
					if (!empty($_POST['Cod_cliente']) &&!empty($_POST['Id_cliente']) &&!empty($_POST['Nit']) &&!empty($_POST['Nrc']) &&!empty($_POST['Direccion']) &&!empty($_POST['Telefono']) &&!empty($_POST['Estado'])) {
						include '../clases/clase_detalle_cliente.php';
						$detalle_cliente = new detalle_cliente();
						if ($detalle_cliente->add_detalle_cliente($_POST['Cod_cliente'],$_POST['Id_cliente'],$_POST['Nit'],$_POST['Nrc'],$_POST['Direccion'],$_POST['Telefono'],$_POST['Estado']) == 0) { ?>

							<script>alert('Se agrego con exito');location.href='view_detalle_cliente.php';</script>

						<?php }else{ ?>
							<script>alert('Ocurrio un error!');location.href='view_detalle_cliente.php';</script>

						<?php }

					}
				}
				}
			?>
