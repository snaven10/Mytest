<?php
					class pedido{
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

						public function get_pedido(){
							try{
								$q = $this->pdo->prepare('SELECT * FROM pedido');
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}
						public function ultimo(){
							try{
								$q = $this->pdo->prepare('SELECT max(Id_pedido) FROM pedido');
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
						public function get_id_mecanico($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM mecanico where Id_mecanico = ?');
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

						public function get_id_detalle_cliente($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM detalle_cliente where Id_cliente = ?');
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
						public function add_pedido($Id_vendedor,$Id_mecanico,$Id_cliente){
							try {
								$q = $this->pdo->prepare('INSERT INTO pedido(Id_vendedor,Id_mecanico,Id_cliente) values(?,?,?)');

								$q->bindParam(1,$Id_vendedor);
						$q->bindParam(2,$Id_mecanico);
						$q->bindParam(3,$Id_cliente);
						$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function edit_pedido($Id_pedido,$Id_vendedor,$Id_mecanico,$Id_cliente){
							try {
								$q = $this->pdo->prepare('UPDATE pedido SET Id_vendedor =?, Id_mecanico =?, Id_cliente =? WHERE Id_pedido=?');

								$q->bindParam(1,$Id_vendedor);
						$q->bindParam(2,$Id_mecanico);
						$q->bindParam(3,$Id_cliente);
						$q->bindParam(4,$Id_pedido);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}
						public function del_pedido($Id_pedido){
							try {
								$q = $this->pdo->prepare('DELETE FROM pedido WHERE Id_pedido=?');
								$q->bindParam(1,$Id_pedido);
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
