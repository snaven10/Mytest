<?php
					class vendedor{
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

						public function get_vendedor(){
							try{
								$q = $this->pdo->prepare('SELECT * FROM vendedor');
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function get_id_vendedor($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM vendedor where Id_vendedor = ?');
								$q->bindParam(1,$id);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function buscar_vendedor($cod){
							try{
								$q = $this->pdo->prepare('SELECT * FROM vendedor where Cod_vendedor = ? limit 1');
								$q->bindParam(1,$cod);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function add_vendedor($Cod_vendedor,$Nombre,$Nit,$Direccion,$Telefono,$Estado){
							try {
								$q = $this->pdo->prepare('INSERT INTO vendedor(Cod_vendedor,Nombre,Nit,Direccion,Telefono,Estado) values(?,?,?,?,?,?)');

								$q->bindParam(1,$Cod_vendedor);
								$q->bindParam(2,$Nombre);
								$q->bindParam(3,$Nit);
								$q->bindParam(4,$Direccion);
								$q->bindParam(5,$Telefono);
								$q->bindParam(6,$Estado);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function edit_vendedor($Id_vendedor,$Cod_vendedor,$Nombre,$Nit,$Direccion,$Telefono,$Estado){
							try {
								$q = $this->pdo->prepare('UPDATE vendedor SET Cod_vendedor =?, Nombre =?, Nit =?, Direccion =?, Telefono =?, Estado =? WHERE Id_vendedor=?');

								$q->bindParam(1,$Cod_vendedor);
						$q->bindParam(2,$Nombre);
						$q->bindParam(3,$Nit);
						$q->bindParam(4,$Direccion);
						$q->bindParam(5,$Telefono);
						$q->bindParam(6,$Estado);
						$q->bindParam(7,$Id_vendedor);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}
						public function del_vendedor($Id_vendedor){
							try {
								$q = $this->pdo->prepare('DELETE FROM vendedor WHERE Id_vendedor=?');
								$q->bindParam(1,$Id_vendedor);
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
