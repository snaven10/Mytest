<?php
include 'conectar.php';
					class usuario extends conectar{
						public function get_usuario(){
							try{
								$q = $this->pdo->prepare('SELECT * FROM usuario');
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function login_usuario($Usser, $Pass, $Tipo){
							try{
								$q = $this->pdo->prepare('SELECT * FROM usuario where Usuario = ? and Password = ? and Nivel = ?');
								$q->bindParam(1,$Usser);
								$q->bindParam(2,$Pass);
								$q->bindParam(3,$Tipo);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
								return 0;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
							return 1;
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
						public function add_usuario($Nombre,$Usuario,$Password,$Nivel,$Estado){
							try {
								$q = $this->pdo->prepare('INSERT INTO usuario(Nombre,Usuario,Password,Nivel,Estado) values(?,?,?,?,?)');

								$q->bindParam(1,$Nombre);
						$q->bindParam(2,$Usuario);
						$q->bindParam(3,$Password);
						$q->bindParam(4,$Nivel);
						$q->bindParam(5,$Estado);
						$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function edit_usuario($Id_usuario,$Nombre,$Usuario,$Password,$Nivel,$Estado){
							try {
								$q = $this->pdo->prepare('UPDATE usuario SET Nombre =?, Usuario =?, Password =?, Nivel =?, Estado =? WHERE Id_usuario=?');

								$q->bindParam(1,$Nombre);
						$q->bindParam(2,$Usuario);
						$q->bindParam(3,$Password);
						$q->bindParam(4,$Nivel);
						$q->bindParam(5,$Estado);
						$q->bindParam(6,$Id_usuario);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}
						public function del_usuario($Id_usuario){
							try {
								$q = $this->pdo->prepare('DELETE FROM usuario WHERE Id_usuario=?');
								$q->bindParam(1,$Id_usuario);
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
