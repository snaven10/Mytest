<?php
					class encabezado_factura{
						private $pdo;


						public function __Construct(){
							try{
							$this->pdo = new PDO('mysql:host=zpj83vpaccjer3ah.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=bh2bqxaj2gufz5p5', 'pyhbktn8q6qv6dqn','qy7z8czcb88hyghz');							$this->pdo->exec('SET CHARACTER SET utf8');
							$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
							}catch(PDOException $e){
								echo 'Error!: '.$e->getMessage();
								die();
							}
						}

						public function get_encabezado_factura(){
							try{
								$q = $this->pdo->prepare('SELECT * FROM encabezado_factura');
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function buscar_encabezado_factura($Id_pedido){
							try{
								$q = $this->pdo->prepare('SELECT * FROM encabezado_factura where Id_pedido = ?');
								$q->bindParam(1,$Id_pedido);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function get_id_factura($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM factura where Id_factura = ?');
								$q->bindParam(1,$id);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}
						public function get_id_usuario($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM usuario where Id_usuario = ?');
								$q->bindParam(1,$id);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}
						public function get_id_pedido($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM pedido where Id_pedido = ?');
								$q->bindParam(1,$id);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}
						public function get_id_encabezado_factura($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM encabezado_factura where Id_encabezado_factura = ?');
								$q->bindParam(1,$id);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}
						public function add_encabezado_factura($Id_factura,$N_fac,$N_ccf,$Fecha,$Fecha_vencimiento,$Descuento,$comision_mecanico,$comision_vendedor,$Abono,$Compra_total,$Condicon_operacion,$Id_usuario,$Id_pedido,$Estado){
							try {
								$q = $this->pdo->prepare('INSERT INTO encabezado_factura(Id_factura,N_fac,N_ccf,Fecha,Fecha_vencimiento,Descuento,Comision_m,Comision_v,Abono,Compra_total,Condicon_operacion,Id_usuario,Id_pedido,Estado) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');

								$q->bindParam(1,$Id_factura);
								$q->bindParam(2,$N_fac);
								$q->bindParam(3,$N_ccf);
								$q->bindParam(4,$Fecha);
								$q->bindParam(5,$Fecha_vencimiento);
								$q->bindParam(6,$Descuento);
								$q->bindParam(7,$comision_mecanico);
								$q->bindParam(8,$comision_vendedor);
								$q->bindParam(9,$Abono);
								$q->bindParam(10,$Compra_total);
								$q->bindParam(11,$Condicon_operacion);
								$q->bindParam(12,$Id_usuario);
								$q->bindParam(13,$Id_pedido);
								$q->bindParam(14,$Estado);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function edit_encabezado_factura($Id_encabezado_factura,$Id_factura,$N_fac,$N_ccf,$Fecha,$Fecha_vencimiento,$Abono,$Compra_total,$Condicon_operacion,$Id_usuario,$Id_pedido,$Estado){
							try {
								$q = $this->pdo->prepare('UPDATE encabezado_factura SET Id_factura =?, N_fac =?, N_ccf =?, Fecha =?, Fecha_vencimiento =?, Abono =?, Compra_total =?, Condicon_operacion =?, Id_usuario =?, Id_pedido =?, Estado =? WHERE Id_encabezado_factura=?');

								$q->bindParam(1,$Id_factura);
								$q->bindParam(2,$N_fac);
								$q->bindParam(3,$N_ccf);
								$q->bindParam(4,$Fecha);
								$q->bindParam(5,$Fecha_vencimiento);
								$q->bindParam(6,$Abono);
								$q->bindParam(7,$Compra_total);
								$q->bindParam(8,$Condicon_operacion);
								$q->bindParam(9,$Id_usuario);
								$q->bindParam(10,$Id_pedido);
								$q->bindParam(11,$Estado);
								$q->bindParam(12,$Id_encabezado_factura);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}
						public function del_encabezado_factura($Id_encabezado_factura){
							try {
								$q = $this->pdo->prepare('DELETE FROM encabezado_factura WHERE Id_encabezado_factura=?');
								$q->bindParam(1,$Id_encabezado_factura);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

					}
					?>
