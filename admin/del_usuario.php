<?php
						if (!empty($_GET['id'])) {
							include '../clases/clase_usuario.php';
							$usuario = new usuario();
							if ($usuario->del_usuario($_GET['id']) == 0) { ?>
									<script>alert('Se elimino con exito');location.href='view_usuario.php';</script>
									<?php
							}else{ ?>
									<script>alert('Ocurrio un error al borrar!');location.href='view_usuario.php';</script>
									<?php
							}
						}else{ ?>
									<script>location.href='view_usuario.php';</script>
									<?php
						}
					?>