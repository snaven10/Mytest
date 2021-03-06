<?php
					class detalle_cliente{
						private $pdo;


						public function __Construct(){
							try{
							$this->pdo = new PDO('mysql:host=zpj83vpaccjer3ah.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=bh2bqxaj2gufz5p5', 'pyhbktn8q6qv6dqn','qy7z8czcb88hyghz');
							$this->pdo->exec('SET CHARACTER SET utf8');
							$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
							}catch(PDOException $e){
								echo 'Error!: '.$e->getMessage();
								die();
							}
						}

						public function get_detalle_cliente(){
							try{
								$q = $this->pdo->prepare('SELECT * FROM detalle_cliente');
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}
						public function get_id_cliente($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM cliente where Id_cliente = ?');
								$q->bindParam(1,$id);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function buscar_cliente($cod,$Nrc){
							try{
								$q = $this->pdo->prepare('SELECT * FROM detalle_cliente where Cod_cliente = ? or Nrc = ? limit 1');
								$q->bindParam(1,$cod);
								$q->bindParam(2,$Nrc);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function get_id_detalle_cliente($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM detalle_cliente where Id_detalle_cliente = ?');
								$q->bindParam(1,$id);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}
						public function add_detalle_cliente($Cod_cliente,$Id_cliente,$Nit,$Nrc,$Direccion,$Telefono,$Estado){
							try {
								$q = $this->pdo->prepare('INSERT INTO detalle_cliente(Cod_cliente,Id_cliente,Nit,Nrc,Direccion,Telefono,Estado) values(?,?,?,?,?,?,?)');

								$q->bindParam(1,$Cod_cliente);
								$q->bindParam(2,$Id_cliente);
								$q->bindParam(3,$Nit);
								$q->bindParam(4,$Nrc);
								$q->bindParam(5,$Direccion);
								$q->bindParam(6,$Telefono);
								$q->bindParam(7,$Estado);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function edit_detalle_cliente($Id_detalle_cliente,$Cod_cliente,$Id_cliente,$Nit,$Nrc,$Direccion,$Telefono,$Estado){
							try {
								$q = $this->pdo->prepare('UPDATE detalle_cliente SET Cod_cliente =?, Id_cliente =?, Nit =?, Nrc =?, Direccion =?, Telefono =?, Estado =? WHERE Id_detalle_cliente=?');

								$q->bindParam(1,$Cod_cliente);
						$q->bindParam(2,$Id_cliente);
						$q->bindParam(3,$Nit);
						$q->bindParam(4,$Nrc);
						$q->bindParam(5,$Direccion);
						$q->bindParam(6,$Telefono);
						$q->bindParam(7,$Estado);
						$q->bindParam(8,$Id_detalle_cliente);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}
						public function del_detalle_cliente($Id_detalle_cliente){
							try {
								$q = $this->pdo->prepare('DELETE FROM detalle_cliente WHERE Id_detalle_cliente=?');
								$q->bindParam(1,$Id_detalle_cliente);
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
