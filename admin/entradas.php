			<?php
				include '../menu/menu.php';
				include '../clases/clase_producto.php';
				$producto = new producto();

				$data = $producto->get_producto();
				include '../clases/clase_proveedor.php';
				$proveedor = new proveedor();
				include '../clases/clase_ubicacion.php';
				$ubicacion = new ubicacion();
		?>
					<ol class="breadcrumb">
					  <li><a  href="../admin/" style="cursor: pointer;">heavy parts</a></li>
					  <li class="active">Entradas de producto</li>
					</ol>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h1 class='text-center'>Entradas de producto</h1>
						</div>
						<div class="panel-body">
							<div id="entradas">
								<div class="col-xs-6">
									<input id="Cod" list="Cod_producto" class="form-control" onchange="buscar($(this).val(),3)" placeholder='Cod producto' required>
									<datalist id="Cod_producto">
										<?php
											foreach ($data as $row){ ?>
												<option value="<?php echo $row['Cod_producto'] ?>"></option>
											<?php } ?>
									</datalist><br>
									<input type="number" class="form-control" id="Precio_compra" placeholder="Precio Compra" required><br>
									<input type="number" class="form-control" id="Cantidad" placeholder="Cantidad" required>

								</div>
								<div class="col-xs-6">
									<input type="text" class="form-control" id="Nombre_proc" placeholder="Nombre_producto" disabled><br>
									<input type="number" class="form-control" id="Precio_Venta" placeholder="Precio Venta" required><br>
									<input type="number" class="form-control" id="Descuento" placeholder="Descuento" required>
								</div>
							</div>
								<div class="col-xs-12">
									<br><button type='submit' class="btn btn-success aEntrada">Agregar</button>
								</div>
						</div>
					</div>
					<!-- Modal -->
					<div class="modal" id="myModal" role="dialog">
						<div class="modal-dialog modal-lg">
							<!-- Modal content-->
							<div class="modal-content"  id="contenido-modal">

							</div>
						</div>
					</div>
<?php include '../pie/pie.php';
		if (!empty($_GET['IMP'])) {
			date_default_timezone_set('UTC'); ?>
			<div class="container" style='width:190mm; height:10mm; display: none; text-align: center;' id='contenido_im'>
				<div style='width:190mm; height:15mm; text-align: center; float:left;'>
					<h2>Reporte de Entradas de Producto N <?php echo $_GET['ultimo']." ".date('Y-m-d'); ?></h2>
				</div>
				<div style='width:190mm; text-align: center; float:left;'>
					<div style="width:39mm; height:10mm; border: 1px solid #000; float:left;"><b>Cod producto</b></div>
					<div style="width:112mm; height:10mm; border: 1px solid #000; float:left;"><b>Nombre de Producto</b></div>
					<div style="width:36.8mm; height:10mm; border: 1px solid #000; float:right;"><b>Cantidad</b></div>
				</div>
				<div style='width:190mm; height:5mm; text-align: center; float:left;'>
					<?php
						for ($i=0; $i < $_SESSION['n']; $i++) {
							if ($_SESSION["p"][$i] != null) {
								$r = $_SESSION["p"][$i];
								foreach ($r as $row) {
									if($row[0] != null){ ?>
										<div style='width:190mm; min-height:5mm; text-align: center; float:left;'>
											<div style="width:39mm; height:auto; border: 1px solid #000; float:left;"><?php echo $row[0] ?></div>
											<div style="width:112mm; height:auto; border: 1px solid #000; float:left;"><?php echo $row[5] ?></div>
											<div style="width:36.8mm; height:auto; border: 1px solid #000; float:right;"><?php echo $row[1] ?></div>
										</div>
								<?php }
								}
							}
						}?>
				</div>
			</div>
			<script type="text/javascript">
				  var ficha = document.getElementById('contenido_im');
				  var ventimp = window.open(' ', 'popimpr');
				  ventimp.document.write( ficha.innerHTML );
				  ventimp.document.close();
				  ventimp.print( );
				  ventimp.close();
			</script>
<?php
$_SESSION['p'] = null;
$_SESSION['n'] = 0;
		} ?>
<script>
	function buscar(dato,tipo){
		if (dato != '') {
			console.log(dato);
			$.ajax({
				url: "agregar_pu.php",
				type : 'post',
				dataType: 'html',
				data: {
					dato: dato,
					tipo: tipo
				},
			})
			.done(function(data) {
				document.getElementById('entradas').innerHTML = data;
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				$('#img').html("");
			});
        }
	}
</script>
