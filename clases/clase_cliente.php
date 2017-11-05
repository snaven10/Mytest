<?php
include 'conectar.php';
					class cliente extends conectar{
						public function get_cliente(){
							try{
								$q = $this->pdo->prepare('SELECT * FROM cliente');
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function ultimo(){
							try{
								$q = $this->pdo->prepare('SELECT max(Id_cliente) FROM cliente');
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}
						public function buscar($cod,$rnc){
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
						public function add_cliente($tipo_cliente,$Nombre,$Estado){
							try {
								$q = $this->pdo->prepare('INSERT INTO cliente(tipo_cliente,Nombre,Estado) values(?,?,?)');

								$q->bindParam(1,$tipo_cliente);
						$q->bindParam(2,$Nombre);
						$q->bindParam(3,$Estado);
						$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function edit_cliente($Id_cliente,$tipo_cliente,$Nombre,$Estado){
							try {
								$q = $this->pdo->prepare('UPDATE cliente SET tipo_cliente =?, Nombre =?, Estado =? WHERE Id_cliente=?');

								$q->bindParam(1,$tipo_cliente);
						$q->bindParam(2,$Nombre);
						$q->bindParam(3,$Estado);
						$q->bindParam(4,$Id_cliente);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}
						public function del_cliente($Id_cliente){
							try {
								$q = $this->pdo->prepare('DELETE FROM cliente WHERE Id_cliente=?');
								$q->bindParam(1,$Id_cliente);
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
