<?php
session_start();
if (!empty($_POST['id']))
{
	include '../clases/clase_producto.php';
	$producto = new producto();
	$data = $producto->get_id_producto($_POST['id']);

	include '../clases/clase_proveedor.php';
	$proveedor = new proveedor();
	$data_proveedor = $proveedor->get_proveedor();

	include '../clases/clase_ubicacion.php';
	$ubicacion = new ubicacion();
	$data_ubicacion = $ubicacion->get_ubicacion();

	include '../clases/clase_precio.php';
	$precio = new precio();
	?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" onclick="$('#myModal').hide();">&times;</button>
		<h4 class="modal-title">Producto</h4>
	</div>
	<div class="modal-body">
	<div id="edit-product-messages"></div>
	<?php
	foreach ($data as $row)
	{	?>
		<div class="row">
			<div class="col-sm-8">
				<div class="col-sm-12 thumbnail">
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon">Cod Producto:</div>
    					<input name='Cod_producto' type="hidden" class="form-control" id="vCod" value="<?php echo $row['Cod_producto']; ?>" <?php if ($_SESSION['Nivel'] ==1) { echo "disabled"; } ?>>
    					<input name='Cod_producto' type="text" class="form-control" id="Cod_producto" value="<?php echo $row['Cod_producto']; ?>" <?php if ($_SESSION['Nivel'] ==1) { echo "disabled"; } ?>>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon">Nombre:</div>
    					<input name='Nombre' type="hidden" class="form-control" id="vNombre" value="<?php echo $row['Nombre']; ?>" <?php if ($_SESSION['Nivel'] ==1) { echo "disabled"; } ?>>
    					<input name='Nombre' type="text" class="form-control" id="Nombre" value="<?php echo $row['Nombre']; ?>" <?php if ($_SESSION['Nivel'] ==1) { echo "disabled"; } ?>>
					</div>
				</div>
				<br><br><br>
				<div class="col-sm-6"></div>
					<div class="col-sm-6">
						<div class="input-group">
							<input type="hidden" name="vId" id='vId' value="<?php echo $row['Id_producto']; ?>">
							<input type="hidden" name="vPre_c" id='vPre_c' value="<?php $precio1 = $precio->get_precio_id_producto($row['Id_producto']); echo $precio1[0][2]; ?>">
	    					<input name="Cantidad" id="Cantidad" type="text" class="form-control" value="<?php $precio1 = $precio->get_precio_id_producto($row['Id_producto']); echo $precio1[0][1]; ?>" <?php if ($_SESSION['Nivel'] ==1) { echo "disabled"; } ?>>
	    					<div class="input-group-addon">Stock</div>
						</div>
					</div>
					<br><br>
					<div class="col-sm-6"></div>
					<div class="col-sm-6">
						<div class="input-group">
							<div class="input-group-addon">Precio: $</div>
							<input name="Precio" type="hidden" class="form-control" id="vPrecio" value="<?php $precio1 = $precio->get_precio_id_producto($row['Id_producto']); echo $precio1[0][3]; ?>" <?php if ($_SESSION['Nivel'] ==1) { echo "disabled"; } ?>>
	    					<input name="Precio" type="text" class="form-control" id="Precio" value="<?php $precio1 = $precio->get_precio_id_producto($row['Id_producto']); echo $precio1[0][3]; ?>" <?php if ($_SESSION['Nivel'] ==1) { echo "disabled"; } ?>>
						</div>
					</div>
					<br><br><br><br>
					<div class="col-sm-6">
						<div class="input-group">
							<div class="input-group-addon">Proveedor</div>
							<input list="b_proveedor" class="form-control" onchange="buscar($(this).val(),1)" placeholder='proveedor' value="<?php $proveedor1 = $proveedor->get_id_proveedor($row['Id_proveedor']); echo $proveedor1[0][1]; ?>" <?php if ($_SESSION['Nivel'] ==1) { echo "disabled"; } ?>>
							<datalist id="b_proveedor">
								<?php
									foreach ($data_proveedor as $rows){ ?>
										<option value="<?php echo $rows['Nombre'] ?>"></option>
									<?php } ?>
							</datalist><br>
							<input type="hidden" name="Id_proveedor" id="Id_proveedor" value="<?php $proveedor1 = $proveedor->get_id_proveedor($row['Id_proveedor']); echo $proveedor1[0][0]; ?>">
						</div></div>
					<div class="col-sm-6">
						<div class="input-group">
							<div class="input-group-addon">Ubicacion: Estante</div>
							<input list="b_ubicacion" class="form-control" onchange="buscar($(this).val(),2)" placeholder='ubicacion' value="<?php $ubicacion1 = $ubicacion->get_id_ubicacion($row['Id_ubicacion']); echo $ubicacion1[0][1]; ?>" <?php if ($_SESSION['Nivel'] ==1) { echo "disabled"; } ?>>
							<datalist id="b_ubicacion">
								<?php
									foreach ($data_ubicacion as $rows){ ?>
										<option value="<?php echo $rows['Estante'] ?>"></option>
									<?php } ?>
							</datalist><br>
							<input type="hidden" name="Id_ubicacion" id="Id_ubicacion" value="<?php $ubicacion1 = $ubicacion->get_id_ubicacion($row['Id_ubicacion']); echo $ubicacion1[0][1]; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="col-sm-12">
					<img src="../img/<?php echo $row['img']; ?>" alt="" class="img-responsive img-thumbnail" width="250px">
					<br><br>
					<?php if ($_SESSION['Nivel'] ==2) { ?>
						<div class="file-loading">
				          <input id="Ima" name="Ima" type="file"'>
				        </div>
					<?php } ?>
				</div>
				<div class="col-sm-12"><br>
					<div class="input-group">
						<div class="input-group-addon">Descripcion:</div>
    					<input name="Descripcion" type="text" class="form-control" id="Descripcion" value="<?php echo $row['Descripcion']; ?>" <?php if ($_SESSION['Nivel'] ==1) { echo "disabled"; } ?>>
					</div>
				</div>
			</div>
		</div>
		<input name="Id_producto" type="hidden" class="form-control" id="Id_producto" value="<?php echo $row['Id_producto']; ?>">
	<?php } ?>
	</div>
	<div class="modal-footer">
		<?php if ($_SESSION['Nivel'] ==1) { ?>
			<div class="col-sm-9">
				<div class="input-group">
					<div class="input-group-addon">Cantidad:</div>
					<input name="Id_producto" type="number" class="form-control" id="vCant" value="1">
				</div>
			</div>
			<button type='button' class='btn btn-success aPedido'>Facturar</button> <?php }else{ ?>
			<input type="submit" class='btn btn-success' value="Guardar"/>
			<?php } ?>
		<a href="#" class="btn btn-danger" data-dismiss="modal" onclick="$('#myModal').hide();">Cerrar</a>
	</div>
<?php } ?>

