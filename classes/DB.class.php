<?php
 class DB{
	public function conectar(){

		$pdo = new PDO("mysql:host=localhost;dbname=igreja", "root", "");
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); //Chama atributos como objetos
		
		if(!$pdo)
		{
			die();
		}

		return $pdo;
		// $host="localhost";
		// $user="root";
		// $pass="";
		// $dbname="igreja";
		
		// $erro_conexao="Desculpe, não foi possível realizar conexão com o banco de dados.";
		// $conexao=mysqli_connect($host,$user,$pass,$dbname);
		// //$selectdb=mysqli_select_db($host, $dbname,)or die($erro_conexao);
		
		// return $conexao;
	}
 }

?>