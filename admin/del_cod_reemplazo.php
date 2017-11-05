<?php
						if (!empty($_GET['id'])) {
							include '../clases/clase_cod_reemplazo.php';
							$cod_reemplazo = new cod_reemplazo();
							if ($cod_reemplazo->del_cod_reemplazo($_GET['id']) == 0) { ?>
									<script>alert('Se elimino con exito');location.href='view_cod_reemplazo.php';</script>
									<?php
							}else{ ?>
									<script>alert('Ocurrio un error al borrar!');location.href='view_cod_reemplazo.php';</script>
									<?php
							}
						}else{ ?>
									<script>location.href='view_cod_reemplazo.php';</script>
									<?php
						}
					?>