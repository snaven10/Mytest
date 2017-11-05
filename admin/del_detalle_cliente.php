<?php
						if (!empty($_GET['id'])) {
							include '../clases/clase_detalle_cliente.php';
							$detalle_cliente = new detalle_cliente();
							if ($detalle_cliente->del_detalle_cliente($_GET['id']) == 0) { ?>
									<script>alert('Se elimino con exito');location.href='view_detalle_cliente.php';</script>
									<?php
							}else{ ?>
									<script>alert('Ocurrio un error al borrar!');location.href='view_detalle_cliente.php';</script>
									<?php
							}
						}else{ ?>
									<script>location.href='view_detalle_cliente.php';</script>
									<?php
						}
					?>