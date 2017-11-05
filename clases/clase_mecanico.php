<?php
include 'conectar.php';
					class mecanico extends conectar{
						public function get_mecanico(){
							try{
								$q = $this->pdo->prepare('SELECT * FROM mecanico');
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function ultimo(){
							try{
								$q = $this->pdo->prepare('SELECT max(Id_mecanico) FROM mecanico');
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

						public function buscar_mecanico($Cod,$Nit){
							try{
								$q = $this->pdo->prepare('SELECT * FROM mecanico where Cod_mecanico = ? or Nit = ? limit 1');
								$q->bindParam(1,$Cod);
								$q->bindParam(2,$Nit);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function buscar_mecanicos($Cod){
							try{
								$q = $this->pdo->prepare('SELECT * FROM mecanico where Cod_mecanico = ?');
								$q->bindParam(1,$Cod);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}
						public function add_mecanico($Cod_mecanico,$Nombre,$Nit,$Direccion,$Telefono,$Estado){
							try {
								$q = $this->pdo->prepare('INSERT INTO mecanico(Cod_mecanico,Nombre,Nit,Direccion,Telefono,Estado) values(?,?,?,?,?,?)');

								$q->bindParam(1,$Cod_mecanico);
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

						public function edit_mecanico($Id_mecanico,$Cod_mecanico,$Nombre,$Nit,$Direccion,$Telefono,$Estado){
							try {
								$q = $this->pdo->prepare('UPDATE mecanico SET Cod_mecanico =?, Nombre =?, Nit =?, Direccion =?, Telefono =?, Estado =? WHERE Id_mecanico=?');

								$q->bindParam(1,$Cod_mecanico);
								$q->bindParam(2,$Nombre);
								$q->bindParam(3,$Nit);
								$q->bindParam(4,$Direccion);
								$q->bindParam(5,$Telefono);
								$q->bindParam(6,$Estado);
								$q->bindParam(7,$Id_mecanico);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}
						public function del_mecanico($Id_mecanico){
							try {
								$q = $this->pdo->prepare('DELETE FROM mecanico WHERE Id_mecanico=?');
								$q->bindParam(1,$Id_mecanico);
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
