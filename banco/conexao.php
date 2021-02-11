<?php

class Conexao {
   private $conn;
	 public $id;
	 private $nome;
	 private $descricao;
	 private $preco;


   public function __construct()
	 {
		 try {
       $this->conn = new PDO("mysql:dbhost=localhost;dbname=crud", "root", "Ossoguian*10");
			 $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 }catch(PDOExcpetion $e){
			 echo $e->getMessage();
		 }
   }

   public function read()
	 {
		 try{
       $query = $this->conn->prepare("SELECT * FROM crudphp ORDER BY Id");
       $query->execute();
       $stmt = $query->fetchAll(PDO::FETCH_ASSOC);
			 return $stmt;
		 }catch(PDOExcpetion $e){
			 echo $e->getMessage();
		 }
   }

	 public function update($id)
	 {
		 if($_SERVER["REQUEST_METHOD"] == "POST") {

		 	try{	 
				$query = $this->conn->prepare("UPDATE crudphp SET Nome=:nome, Descricao=:descricao, Preco=:preco WHERE Id=:id");
				$query->bindValue(":id", $_POST["id"]);
		 		$query->bindValue(":nome", $_POST["nome"]);
				$query->bindValue(":descricao", $_POST["descricao"]);
		 		$query->bindValue(":preco", $_POST["preco"]);
		 		$query->execute();

		 		header("Location: ../index.php");

		 		}catch(PDOExcpetion $e) {
				 	echo $e->getMessage();
		 			}
		 	}
	 }

	public function updateScreen($id)
	{
		//$this->id = $_GET['id'];
			try {
				$query = $this->conn->prepare("SELECT * FROM crudphp WHERE Id=:id");
				$query->bindValue(":id", $id);
				$query->execute();
				$stmt = $query->fetchAll(PDO::FETCH_ASSOC);
				return $stmt;
				update($id);
			} catch(PDOExcpetion $e) {
					echo $e->getMessage();
			}
		}

	 
	 public function create()
	 {
		 if($_SERVER["REQUEST_METHOD"] == "POST") {
	 	$query = $this->conn->prepare("INSERT INTO crudphp (Nome, Descricao, Preco) VALUES (:nome, :descricao, :preco)");
		$query->bindValue(":nome", $_POST["nome"]);
		$query->bindValue(":descricao", $_POST["descricao"]);
		$query->bindValue(":preco", $_POST["preco"]);
		$query->execute();

		header("Location: ../index.php");
		 }
	 }

	 public function delete($id)
	 {
			if(isset($_GET['delete'])) {
	 		$query = $this->conn->prepare("DELETE FROM crudphp WHERE Id=:id");
			$query->bindValue(":id", $id);
			$query->execute();

			header("Location: ../index.php");
			}
	 }
	 
}
