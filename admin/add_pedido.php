<?php
				if (!isset($_POST['validacion'])) {
					if (basename($_SERVER["PHP_SELF"]) != 'index.php') {
						header('location: ../admin');
					}
				}
				if (!empty($_GET['id'])) {
					include '../clases/clase_pedido.php';
					$pedido = new pedido();
					$data = $pedido->get_id_pedido($_GET['id']);

							$nvl = 0;
							foreach ($data as $row){
								$nvl += 1;
							}
				}?>

			<form action='' method='POST' role='form' class='col-xs-12 col-sm-12 col-md-6 col-lg-6' enctype='multipart/form-data'>
				<legend>pedido</legend>
					<div class='form-group'>
					<input type='text' name='Id_vendedor' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[1];}else{if(!empty($_POST['Id_vendedor'])){echo $_POST['Id_vendedor'];}}?>' placeholder='Id_vendedor' required><br>
					<input type='text' name='Id_mecanico' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[2];}else{if(!empty($_POST['Id_mecanico'])){echo $_POST['Id_mecanico'];}}?>' placeholder='Id_mecanico' required><br>
					<input type='text' name='Id_cliente' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[3];}else{if(!empty($_POST['Id_cliente'])){echo $_POST['Id_cliente'];}}?>' placeholder='Id_cliente' required><br>

					</div>
				<button type='submit' name='add' class='btn btn-success'>Guardar</button>
			</form>
<?php
				if (isset($_POST['add'])) {
					if (!empty($_GET['id'])) {
						if (!empty($_POST['Id_vendedor']) &&!empty($_POST['Id_mecanico']) &&!empty($_POST['Id_cliente'])) {
						if ($pedido->edit_pedido($_GET['id'],$_POST['Id_vendedor'],$_POST['Id_mecanico'],$_POST['Id_cliente']) == 0) { ?>

							<script>alert('Se ha editado un registro con exito');location.href='view_pedido.php';</script>
						<?php }else{ ?>
							<script>alert('Ocurrio un error!');location.href='view_pedido.php';</script>

						<?php }
					}
					}else{
					if (!empty($_POST['Id_vendedor']) &&!empty($_POST['Id_mecanico']) &&!empty($_POST['Id_cliente'])) {
						include '../clases/clase_pedido.php';
						$pedido = new pedido();
						if ($pedido->add_pedido($_POST['Id_vendedor'],$_POST['Id_mecanico'],$_POST['Id_cliente']) == 0) { ?>

							<script>alert('Se agrego con exito');location.href='view_pedido.php';</script>

						<?php }else{ ?>
							<script>alert('Ocurrio un error!');location.href='view_pedido.php';</script>

						<?php }

					}
				}
				}
			?>
