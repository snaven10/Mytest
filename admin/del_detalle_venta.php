<?php
						if (!empty($_GET['id'])) {
							include '../clases/clase_detalle_venta.php';
							$detalle_venta = new detalle_venta();
							if ($detalle_venta->del_detalle_venta($_GET['id']) == 0) { ?>
									<script>alert('Se elimino con exito');location.href='view_detalle_venta.php';</script>
									<?php
							}else{ ?>
									<script>alert('Ocurrio un error al borrar!');location.href='view_detalle_venta.php';</script>
									<?php
							}
						}else{ ?>
									<script>location.href='view_detalle_venta.php';</script>
									<?php
						}
					?>