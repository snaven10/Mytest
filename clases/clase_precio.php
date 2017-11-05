<?php
					class precio{
						private $pdo;


						public function __Construct(){
							try{
							$this->pdo = new PDO('mysql:host=localhost;dbname=heavy_parts', 'root','');
							$this->pdo->exec('SET CHARACTER SET utf8');
							$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
							}catch(PDOException $e){
								echo 'Error!: '.$e->getMessage();
								die();
							}
						}

						public function get_precio(){
							try{
								$q = $this->pdo->prepare('SELECT * FROM precio');
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
						public function get_precio_id_producto($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM precio where Id_producto = ?');
								$q->bindParam(1,$id);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function get_id_precio($id){
							try{
								$q = $this->pdo->prepare('SELECT * FROM precio where Id_precio = ?');
								$q->bindParam(1,$id);
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}
						public function add_precio($Cantidad,$Precio_compra,$Precio_venta,$Descuento,$Id_producto,$Estado){
							try {
								$q = $this->pdo->prepare('INSERT INTO precio(Cantidad,Precio_compra,Precio_venta,Descuento,Id_producto,Estado) values(?,?,?,?,?,?)');

								$q->bindParam(1,$Cantidad);
								$q->bindParam(2,$Precio_compra);
								$q->bindParam(3,$Precio_venta);
								$q->bindParam(4,$Descuento);
								$q->bindParam(5,$Id_producto);
								$q->bindParam(6,$Estado);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function ultimo(){
							try{
								$q = $this->pdo->prepare('SELECT max(Id_entradas) FROM entradas');
								$q->execute();
								return $q->fetchAll();
								$this->pdo = null;
							}catch(PDOException $e){
								echo 'Error '.$e->getMessage();
							}
						}

						public function add_entradas($Fecha,$Numero){
							try {
								$q = $this->pdo->prepare('INSERT INTO entradas(Fecha,Numero) values(?,?)');

								$q->bindParam(1,$Fecha);
								$q->bindParam(2,$Numero);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function add_reporte_entrada($Id_entradas,$Cantidad,$Precio_compra,$Precio_venta,$Descuento,$Id_producto,$Estado){
							try {
								$q = $this->pdo->prepare('INSERT INTO reporte_entrada(Id_entradas,Cantidad,Precio_compra,Precio_venta,Descuento,Id_producto,Estado) values(?,?,?,?,?,?,?)');

								$q->bindParam(1,$Id_entradas);
								$q->bindParam(2,$Cantidad);
								$q->bindParam(3,$Precio_compra);
								$q->bindParam(4,$Precio_venta);
								$q->bindParam(5,$Descuento);
								$q->bindParam(6,$Id_producto);
								$q->bindParam(7,$Estado);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function edit_precio($Id_precio,$Cantidad,$Precio_venta,$Estado){
							try {
								$q = $this->pdo->prepare('UPDATE precio SET Cantidad =?, Precio_venta =?, Estado =? WHERE Id_precio=?');

								$q->bindParam(1,$Cantidad);
								$q->bindParam(2,$Precio_venta);
								$q->bindParam(3,$Estado);
								$q->bindParam(4,$Id_precio);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function edit_precios($Id_producto,$Cantidad,$Precio_compra,$Precio_venta,$Descuento,$Estado){
							try {
								$q = $this->pdo->prepare('UPDATE precio SET Cantidad = (Cantidad + '.$Cantidad.'), Precio_compra =?, Precio_venta =?, Descuento =?, Estado =? WHERE Id_producto=?');

								$q->bindParam(1,$Precio_compra);
								$q->bindParam(2,$Precio_venta);
								$q->bindParam(3,$Descuento);
								$q->bindParam(4,$Estado);
								$q->bindParam(5,$Id_producto);
								$q->execute();
								$this->pdo = null;
								return 0;
							} catch (PDOException $e) {
								echo 'Error '.$e->getMessage();
							}
							return 1;
						}

						public function del_precio($Id_precio){
							try {
								$q = $this->pdo->prepare('DELETE FROM precio WHERE Id_precio=?');
								$q->bindParam(1,$Id_precio);
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
