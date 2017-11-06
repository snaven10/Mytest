<?php
					class factura{
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

						public function get_factura(){
							try{
								$q = $this->pdo->prepare('SELECT * FROM factura');
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function ultimo($par){
							try{
								$q = $this->pdo->prepare('SELECT * , (max(Numero_cor)+1) as Numero FROM factura where CCF = ? and Estado = 1');
								$q->bindParam(1,$par);
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
						public function add_factura($Serie,$Numero_factura,$ccf,$Estado){
							try {
								$q = $this->pdo->prepare('INSERT INTO factura(Serie,Numero_factura,CCF,Estado) values(?,?,?,?)');

								$q->bindParam(1,$Serie);
								$q->bindParam(2,$Numero_factura);
								$q->bindParam(3,$ccf);
								$q->bindParam(4,$Estado);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function edit_factura($Id_factura,$Serie,$Numero_factura,$Numero_cor,$Estado){
							try {
								$q = $this->pdo->prepare('UPDATE factura SET Serie =?, Numero_factura =?, Numero_cor =?, Estado =? WHERE Id_factura=?');

								$q->bindParam(1,$Serie);
								$q->bindParam(2,$Numero_factura);
								$q->bindParam(3,$Numero_cor);
								$q->bindParam(4,$Estado);
								$q->bindParam(5,$Id_factura);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function edit_facturas($Id_factura,$Estado){
							try {
								$q = $this->pdo->prepare('UPDATE factura SET Estado =? WHERE Id_factura=?');

								$q->bindParam(1,$Estado);
								$q->bindParam(2,$Id_factura);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function edit_facturas_c($Id_factura,$Numero_cor){
							try {
								$q = $this->pdo->prepare('UPDATE factura SET Numero_cor =? WHERE Id_factura=?');

								$q->bindParam(1,$Numero_cor);
								$q->bindParam(2,$Id_factura);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function del_factura($Id_factura){
							try {
								$q = $this->pdo->prepare('DELETE FROM factura WHERE Id_factura=?');
								$q->bindParam(1,$Id_factura);
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
