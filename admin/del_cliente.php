<?php
						if (!empty($_GET['id'])) {
							include '../clases/clase_cliente.php';
							$cliente = new cliente();
							if ($cliente->del_cliente($_GET['id']) == 0) { ?>
									<script>alert('Se elimino con exito');location.href='view_cliente.php';</script>
									<?php
							}else{ ?>
									<script>alert('Ocurrio un error al borrar!');location.href='view_cliente.php';</script>
									<?php
							}
						}else{ ?>
									<script>location.href='view_cliente.php';</script>
									<?php
						}
					?>