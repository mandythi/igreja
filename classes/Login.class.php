<?php
	class Login{
		public function logar($conn, $usuario, $senha){
			
			try {
				//$conn = new PDO('mysql:host=localhost;dbname=estudo', $user, $pass);
				//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			  
			  $data=$conn->query("SELECT * FROM usuarios WHERE usuario='".$usuario."' AND senha='".$senha."' LIMIT 1");
				$data = $conn->query('SELECT * FROM minhaTabela WHERE nome = ' . $conn->quote($name));
			  
				/*foreach($data as $row) {
					print_r($row);
				}*/
			} catch(PDOException $e) {
				echo "ERROR: " . $e->getMessage();
			}
			/*$msg="";
			$buscar= mysql_query("SELECT * FROM usuarios WHERE usuario='".$usuario."' AND senha='".$senha."' LIMIT 1");
			$total=mysql_num_rows($buscar);
			
				if($total==1){
					$dados=mysql_fetch_array($buscar);
						if($dados["status"]==1){
							$_SESSION["usuario"]=$dados["usuario"];
							$_SESSION["senha"]=$dados["senha"];
							$_SESSION["nivel"]=$dados["nivel"];
							$_SESSION["nome"]=$dados["nome"];
							$_SESSION["status"]=$dados["status"];
							$_SESSION["ID"]=$dados["ID"];
							setcookie("logado",1);
						}elseif($dados["status"]==0){
							$msg="i-Aguarde a nossa aprovação!"; //"i-": refere a msg de informação
						}
						
						if(isset($_COOKIE["logado"])){
							$msg="";
						}
							
				}else{
					$msg="Ops! Digite o seu usuário e sua senha corretamente ou cadastre-se!";
				}
				
			return $msg;*/
			
			
		}
	}
?>