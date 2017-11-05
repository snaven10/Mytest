<?php
						if (!empty($_GET['id'])) {
							include '../clases/clase_encabezado_factura.php';
							$encabezado_factura = new encabezado_factura();
							if ($encabezado_factura->del_encabezado_factura($_GET['id']) == 0) { ?>
									<script>alert('Se elimino con exito');location.href='view_encabezado_factura.php';</script>
									<?php
							}else{ ?>
									<script>alert('Ocurrio un error al borrar!');location.href='view_encabezado_factura.php';</script>
									<?php
							}
						}else{ ?>
									<script>location.href='view_encabezado_factura.php';</script>
									<?php
						}
					?>