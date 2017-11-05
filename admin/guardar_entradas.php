<?php session_start();
include '../clases/clase_producto.php';
				$producto = new producto();
				$data = $producto->get_producto();
				include '../clases/clase_proveedor.php';
				$proveedor = new proveedor();
				include '../clases/clase_ubicacion.php';
				$ubicacion = new ubicacion();
				include '../clases/clase_precio.php';
				$precio = new precio();
date_default_timezone_set('UTC');
if (isset($_POST['guardar'])) {
	$numero = $precio->ultimo();
	if ($numero[0][0] == "") {
		$num = 1;
	}elseif ($numero[0][0] > 0) {
		$num = ($numero[0][0]+1);
	}
	$precio = null;
	$precio = new precio();
	if ($precio->add_entradas(date('Y-m-d'),$num,1) == 0) {
		$precio = null;
		$precio = new precio();
	}else{ ?>
		<script>alert('Ocurrio un error!');location.href='guardar_entradas.php';</script>
	<?php }
	for ($i=0; $i < $_SESSION['n']; $i++) {
		if ($_SESSION["p"][$i] != null) {
			$r = $_SESSION["p"][$i];
			foreach ($r as $row) {
				if($row[0] != null){
					$data = $producto->get_producto_cod($row[0]);
					foreach ($data as $key) {
						$cod = $key['Id_producto'];
						$precio->edit_precios($cod,$row[1],$row[2],$row[3],$row[4],1);
						$precio = null;
						$precio = new precio();
						$ultimo_c = $precio->ultimo();
						if (count($ultimo_c[0][0]) == 0) {
							$ultimo = 1;
						}elseif ($ultimo_c[0][0] > 0) {
							$ultimo = ($ultimo_c[0][0]);
						}
						if ($precio->add_reporte_entrada($ultimo,$row[1],$row[2],$row[3],$row[4],$cod,1) == 0) {
							$precio = null;
							$precio = new precio();
						}else{ ?>
							<script>alert('Ocurrio un error!');location.href='guardar_entradas.php';</script>
						<?php }
					}
				}
			}
		}
	}
	echo "<script>location.href='entradas.php?IMP=1&ultimo=".$ultimo."';</script>";
}
?>
