<?php
if (isset($_POST['id']) && $_POST['tipo'] == 1) {
	include '../clases/clase_reporte_entrada.php';
	$reporte_entrada = new reporte_entrada();
	include '../clases/clase_producto.php';
	$producto = new producto();
	include '../clases/clase_entradas.php';
	$entradas = new entradas();
	$data = $reporte_entrada->get_id_entradas($_POST['id']);
	?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" onclick="$('#Modal_reportes').hide();">&times;</button>
		<h4 class="modal-title">Reporte de entradas</h4>
	</div>
	<div class="modal-body">
		<div class='table-responsive'>
			<table class='table table-striped table-bordered' id='tabla_datos'>
				<thead>
					<tr>
						<td>Numero Reporte</td>
						<td>Cantidad</td>
						<td>Precio_compra</td>
						<td>Precio_venta</td>
						<td>Descuento</td>
						<td>Nombre producto</td>
					</tr>
				</thead>
				<?php
				foreach ($data as $row) {?>
				<tr>
					<td><?php $entradas1 = $entradas->get_id_entradas($row['Id_entradas']); echo "Reporte N ".$entradas1[0][2] ?></td>
					<td><?php echo $row['Cantidad'] ?></td>
					<td><?php echo $row['Precio_compra'] ?></td>
					<td><?php echo $row['Precio_venta'] ?></td>
					<td><?php echo $row['Descuento'] ?></td>
					<td><?php $producto1 = $producto->get_id_producto($row['Id_producto']); echo $producto1[0][3] ?></td>
				</tr>
				<?php }?>
			</table>
		</div>
	</div>
	<div class="modal-footer">
        <a href='reporte_entradas.php?imp=<?php echo $_POST['id']; ?>' class='btn btn-success'>Imprimir</a>
        <a href="#" class="btn btn-danger" data-dismiss="modal" onclick="$('#Modal_reportes').hide();">Cerrar</a>
    </div>
	<?php
	exit;
}elseif ($_GET['imp']) {
include '../clases/clase_reporte_entrada.php';
$reporte_entrada = new reporte_entrada();
include '../clases/clase_producto.php';
$producto = new producto();
include '../clases/clase_entradas.php';
$entradas = new entradas();
$data = $reporte_entrada->get_id_entradas($_GET['imp']);
	?>
<link href='../css/bootstrap.min.css' rel='stylesheet'>
<div class="container" style='width:190mm; height:10mm; display: none; text-align: center;' id='imp_rep'>
	<div style='width:190mm; height:15mm; text-align: center; float:left;'>
		<h2>Reporte de Entradas de Producto N <?php $entradas1 = $entradas->get_id_entradas($_GET['imp']); echo $entradas1[0][2]." ".$entradas1[0][1] ?></h2>
	</div>
	<div style='width:190mm; text-align: center; float:left;'>
		<div style="width:39mm; height:10mm; border: 1px solid #000; float:left;"><b>Cod producto</b></div>
		<div style="width:112mm; height:10mm; border: 1px solid #000; float:left;"><b>Nombre de Producto</b></div>
		<div style="width:36.8mm; height:10mm; border: 1px solid #000; float:right;"><b>Cantidad</b></div>
	</div>
	<div style='width:190mm; height:5mm; text-align: center; float:left;'>
		<?php
		foreach ($data as $row) {?>
			<div style='width:190mm; min-height:5mm; text-align: center; float:left;'>
				<div style="width:39mm; height:auto; border: 1px solid #000; float:left;"><?php $producto2 = $producto->get_id_producto($row['Id_producto']); echo $producto2[0][1]; $producto = null; $producto = new producto(); ?></div>
				<div style="width:112mm; height:auto; border: 1px solid #000; float:left;"><?php $producto1 = $producto->get_id_producto($row['Id_producto']); echo $producto1[0][3] ?></div>
				<div style="width:36.8mm; height:auto; border: 1px solid #000; float:right;"><?php echo $row['Cantidad'] ?></div>
			</div>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">
  var ficha = document.getElementById('imp_rep');
  var ventimp = window.open(' ', 'popimpr');
  ventimp.document.write( ficha.innerHTML );
  ventimp.document.close();
  ventimp.print( );
  ventimp.close();
</script>
<?php
echo "<script>location.href='buscar_reportes_entradas.php';</script>";
}

?>

