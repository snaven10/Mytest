<?php 
class conectar
{
	private $pdo;
	public function __Construct(){
		try{
		$this->pdo = new PDO('mysql:host=localhost;dbname=bd', 'root','');
		$this->pdo->exec('SET CHARACTER SET utf8');
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}catch(PDOException $e){
			echo 'Error!: '.$e->getMessage();
			die();
		}
	}
	public function slect_tabla(){
		try{
			$q = $this->pdo->prepare('SELECT * FROM tabla');
			$q->execute();
			return $q->fetchAll();
			$this->pdo = null;
		}catch(PDOException $e){
			echo 'Error '.$e->getMessage();
		}
	}
	
	public function select_tabla_2($id){
		try{
			$q = $this->pdo->prepare('SELECT * FROM tabla_2 where Id_tabla_2 = ?');
			$q->bindParam(1,$id);
			$q->execute();
			return $q->fetchAll();
			$this->pdo = null;
		}catch(PDOException $e){
			echo 'Error '.$e->getMessage();
		}
	}
	public function slect_tabla_id($id){
		try{
			$q = $this->pdo->prepare('SELECT * FROM tabla where Id_tabla = ?');
			$q->bindParam(1,$id);
			$q->execute();
			return $q->fetchAll();
			$this->pdo = null;
		}catch(PDOException $e){
			echo 'Error '.$e->getMessage();
		}
	}
	public function add_producto($campo_1,$campo_2,$Id_tabla_2){
		try {
			$q = $this->pdo->prepare('INSERT INTO tabla(campo_1,campo_2,Id_tabla_2) values(?,?,?)');
			 
			$q->bindParam(1,$campo_1);
			$q->bindParam(2,$campo_2);
			$q->bindParam(3,$Id_tabla_2);
			$q->execute();
			$this->pdo = null;
			return 0;
		} catch (PDOException $e) {
			echo 'Error '.$e->getMessage();
		}
		return 1;
	}

	public function edit_producto($Id_tabla,$campo_1,$campo_2,$Id_tabla_2){
		try {
			$q = $this->pdo->prepare('UPDATE tabla SET campo_1 =?, campo_2 =?, Id_tabla_2 =? WHERE Id_tabla=?');
			 
			$q->bindParam(1,$campo_1);
			$q->bindParam(2,$campo_2);
			$q->bindParam(3,$Id_tabla_2); 
			$q->bindParam(4,$Id_tabla); 
			$q->execute();
			$this->pdo = null;
			return 0;
		} catch (PDOException $e) {
			echo 'Error '.$e->getMessage();
		}
		return 1;
	}
	public function del_tabla($Id_tabla){
		try {
			$q = $this->pdo->prepare('DELETE FROM tabla WHERE Id_tabla=?');
			$q->bindParam(1,$Id_tabla);
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