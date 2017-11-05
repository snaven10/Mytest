<?php
						if (!empty($_GET['id'])) {
							include '../clases/clase_precio.php';
							$precio = new precio();
							if ($precio->del_precio($_GET['id']) == 0) { ?>
									<script>alert('Se elimino con exito');location.href='view_precio.php';</script>
									<?php
							}else{ ?>
									<script>alert('Ocurrio un error al borrar!');location.href='view_precio.php';</script>
									<?php
							}
						}else{ ?>
									<script>location.href='view_precio.php';</script>
									<?php
						}
					?>