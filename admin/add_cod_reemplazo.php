<?php
				if (!isset($_POST['validacion'])) {
					if (basename($_SERVER["PHP_SELF"]) != 'index.php') {
						header('location: ../admin');
					}
				}
				if (!empty($_GET['id'])) {
					include '../clases/clase_cod_reemplazo.php';
					$cod_reemplazo = new cod_reemplazo();
					$data = $cod_reemplazo->get_id_cod_reemplazo($_GET['id']);
							
							$nvl = 0;
							foreach ($data as $row){
								$nvl += 1;
							}
				}?>

			<form action='' method='POST' role='form' class='col-xs-12 col-sm-12 col-md-6 col-lg-6' enctype='multipart/form-data'>
				<legend>cod reemplazo</legend>
					<div class='form-group'>
					<input type='text' name='Cod_reemplazo' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[1];}else{if(!empty($_POST['Cod_reemplazo'])){echo $_POST['Cod_reemplazo'];}}?>' placeholder='Cod_reemplazo' required><br>
					<input type='text' name='Id_producto' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[2];}else{if(!empty($_POST['Id_producto'])){echo $_POST['Id_producto'];}}?>' placeholder='Id_producto' required><br>
					<input type='text' name='Estado' class='form-control'   value='<?php if(!empty($_GET['id'])){echo $row[3];}else{if(!empty($_POST['Estado'])){echo $_POST['Estado'];}}?>' placeholder='Estado' required><br>
 
					</div>											
				<button type='submit' name='add' class='btn btn-success'>Guardar</button>
			</form>
<?php
				if (isset($_POST['add'])) {
					if (!empty($_GET['id'])) {
						if (!empty($_POST['Cod_reemplazo']) &&!empty($_POST['Id_producto']) &&!empty($_POST['Estado'])) {
						if ($cod_reemplazo->edit_cod_reemplazo($_GET['id'],$_POST['Cod_reemplazo'],$_POST['Id_producto'],$_POST['Estado']) == 0) { ?>

							<script>alert('Se ha editado un registro con exito');location.href='view_cod_reemplazo.php';</script>
						<?php }else{ ?>
							<script>alert('Ocurrio un error!');location.href='view_cod_reemplazo.php';</script>
							
						<?php }
					}
					}else{
					if (!empty($_POST['Cod_reemplazo']) &&!empty($_POST['Id_producto']) &&!empty($_POST['Estado'])) {
						include '../clases/clase_cod_reemplazo.php';
						$cod_reemplazo = new cod_reemplazo();
						if ($cod_reemplazo->add_cod_reemplazo($_POST['Cod_reemplazo'],$_POST['Id_producto'],$_POST['Estado']) == 0) { ?>

							<script>alert('Se agrego con exito');location.href='view_cod_reemplazo.php';</script>
							
						<?php }else{ ?>
							<script>alert('Ocurrio un error!');location.href='view_cod_reemplazo.php';</script>
							 
						<?php }

					}
				}
				}
			?>