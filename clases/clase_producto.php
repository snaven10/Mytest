<?php
					class producto{
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

						public function get_producto(){
							try{
								$q = $this->pdo->prepare('SELECT * FROM producto');
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function ultimo(){
							try{
								$q = $this->pdo->prepare('SELECT max(Id_producto) FROM producto');
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function get_id_proveedor($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM proveedor where Id_proveedor = ?');
								$q->bindParam(1,$id);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function get_producto_cod($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM producto where Cod_producto = ?');
								$q->bindParam(1,$id);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function get_id_ubicacion($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM ubicacion where Id_ubicacion = ?');
								$q->bindParam(1,$id);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}
						public function get_id_producto($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM producto where Id_producto = ?');
								$q->bindParam(1,$id);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}
						public function add_producto($Cod_producto,$Cod_oem,$Nombre,$Descripcion,$img,$Id_proveedor,$Id_ubicacion,$Estado){
							try {
								$q = $this->pdo->prepare('INSERT INTO producto(Cod_producto,Cod_oem,Nombre,Descripcion,img,Id_proveedor,Id_ubicacion,Estado) values(?,?,?,?,?,?,?,?)');

								$q->bindParam(1,$Cod_producto);
								$q->bindParam(2,$Cod_oem);
								$q->bindParam(3,$Nombre);
								$q->bindParam(4,$Descripcion);
								$q->bindParam(5,$img);
								$q->bindParam(6,$Id_proveedor);
								$q->bindParam(7,$Id_ubicacion);
								$q->bindParam(8,$Estado);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function edit_producto($Id_producto,$Cod_producto,$Nombre,$Descripcion,$img,$Id_proveedor,$Id_ubicacion,$Estado){
							try {
								$q = $this->pdo->prepare('UPDATE producto SET Cod_producto =?, Nombre =?, Descripcion =?, img =?, Id_proveedor =?, Id_ubicacion =?, Estado =? WHERE Id_producto=?');

								$q->bindParam(1,$Cod_producto);
								$q->bindParam(2,$Nombre);
								$q->bindParam(3,$Descripcion);
								$q->bindParam(4,$img);
								$q->bindParam(5,$Id_proveedor);
								$q->bindParam(6,$Id_ubicacion);
								$q->bindParam(7,$Estado);
								$q->bindParam(8,$Id_producto);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}
						public function del_producto($Id_producto){
							try {
								$q = $this->pdo->prepare('DELETE FROM producto WHERE Id_producto=?');
								$q->bindParam(1,$Id_producto);
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
