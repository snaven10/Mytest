<?php
include '../clases/clase_proveedor.php';
include '../clases/clase_ubicacion.php';
include '../clases/clase_producto.php';
include '../clases/clase_precio.php';
include '../clases/clase_mecanico.php';
include '../clases/clase_vendedor.php';
if ($_POST['tipo'] == 1) {
	$proveedor = new proveedor();
	$data_proveedor = $proveedor->buscar_proveedor($_POST['dato']);
	foreach ($data_proveedor as $key) {
		echo $key['Id_proveedor'];
	}
}elseif ($_POST['tipo'] == 2) {
	$ubicacion = new ubicacion();
	$data_ubicacion = $ubicacion->buscar_ubicacion($_POST['dato']);
	foreach ($data_ubicacion as $key) {
		echo $key['Id_ubicacion'];
	}
}elseif ($_POST['tipo'] == 3) {
	$precio = new precio();
	$producto = new producto();
	$data = $producto->get_producto_cod($_POST['dato']);
	foreach ($data as $key) {
		$precios = $precio->get_precio_id_producto($key['Id_producto']);
		foreach ($precios as $row_precios){}
		?>
	<div id="entradas">
		<div class="col-xs-6">
			<b>Cod Producto:</b>
			<input id="Cod" value="<?php echo $_POST['dato']; ?>" list="Cod_producto" class="form-control" onchange="buscar($(this).val(),3)" placeholder='Cod producto' required>
			<datalist id="Cod_producto">
				<?php
					$data1 = $producto->get_producto();
					foreach ($data1 as $row){ ?>
						<option value="<?php echo $row['Cod_producto'] ?>"></option>
					<?php } ?>
			</datalist><br>
			<b>Precio Compra:</b>
			<input type="number" value="<?php echo $row_precios[2]; ?>" class="form-control" id="Precio_compra" placeholder="Precio Compra" required><br>
			<b>Cantidad:</b>
			<input type="number" value="<?php echo $row_precios[1]; ?>" class="form-control" id="Cantidad" placeholder="Cantidad" required>

		</div>
		<div class="col-xs-6">
			<b>Nombre Producto:</b>
			<input type="text" value="<?php echo $key['Nombre']; ?>" class="form-control" placeholder="Nombre_producto" disabled><br>
			<b>Precio Venta:</b>
			<input type="number" value="<?php echo $row_precios[3]; ?>" class="form-control" id="Precio_Venta" placeholder="Precio Venta" required><br>
			<b>Descuento:</b>
			<input type="number" value="<?php echo $row_precios[4]; ?>" class="form-control" id="Descuento" placeholder="Descuento" required>
			<input type="hidden" value="<?php echo $key['Nombre']; ?>" class="form-control" id="Nombre_proc" placeholder="Nombre_producto">
		</div>
	</div>
		<?php
	}
}elseif ($_POST['tipo'] == 4) {
	$vendedor = new vendedor();
	$data_vendedor = $vendedor->buscar_vendedor($_POST['dato']);
	foreach ($data_vendedor as $key) {
		echo $key['Id_vendedor'];
	}
}elseif ($_POST['tipo'] == 5) {
	$mecanico = new mecanico();
	$data_mecanico = $mecanico->buscar_mecanicos($_POST['dato']);
	foreach ($data_mecanico as $key) {
		echo $key['Id_mecanico'];
	}
}
 ?>
