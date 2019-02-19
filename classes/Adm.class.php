<?php
	class Adm{
		public $modulo;
		public $titulo;
		public $srcimg;
		public $atividade;
		public $texto;
		
		function __construct(){

		}//fim construtor
		
		function __destruct(){
			//Definir
		}//fim destrutor
		
		function abrirSessao(){
			if(!isset($_SESSION)){
				session_start();
			}
		}//Fim abrirsessao
		
		function apagarSessoes(){
			session_unset();
			session_destroy();
			/*session_write_close();*/
		}//Fim apagarSessoes
		
		function cadastrar($conexao){
			$this->modulo = $_POST['adm-caixa-selecao'];
			$this->titulo = trim($_POST['adm-titulo']);
			$this->srcimg = trim($_POST['adm-src']);
			$this->atividade = $_POST['adm-radio'];
			$this->texto = trim($_POST['adm-texto']);
			
				//Se todos os campos forem preenchidos
				if(empty($this->modulo) || empty($this->titulo) || empty($this->srcimg) || empty($this->atividade) || empty($this->texto)){
					$_SESSION["adm-msg"] = "Todos os campos devem ser preenchidos!";
				}else{
					switch($this->modulo){
						case "noticias";
							//Cadastra dados no banco de dados
							$insert = $conexao->prepare("INSERT INTO " .$this->modulo. "(notic_src_img, notic_titulo, notic_texto, notic_ativo)VALUES('$this->srcimg','$this->titulo','$this->texto','$this->atividade')");
							$insert->execute();
							//$insert = mysqli_query("INSERT INTO " .$this->modulo. "(notic_src_img, notic_titulo, notic_texto, notic_ativo)VALUES('$this->srcimg','$this->titulo','$this->texto','$this->atividade')");
							$_SESSION["adm-msg"] = "Notícia cadastrada com sucesso!";
							break;
							
						case "historia";
							$insert = $conexao->prepare("INSERT INTO " .$this->modulo. "(hist_src_img, hist_titulo, hist_texto, hist_ativo)VALUES('$this->srcimg','$this->titulo','$this->texto','$this->atividade')");
							$insert->execute();	
							//$insert = mysqli_query("INSERT INTO " .$this->modulo. "(hist_src_img, hist_titulo, hist_texto, hist_ativo)VALUES('$this->srcimg','$this->titulo','$this->texto','$this->atividade')");
							$_SESSION["adm-msg"] = "História cadastrada com sucesso!";
							break;
					}
				}
		}//cadastrar

		//Cadastra usuários
		/*public function cadastrar($nome, $usuario, $email, $senha){
			//Tratamento das variáveis
			$nome=$nome;
			$usuario=strtolower($usuario);
			$email=strtolower($email);
			$senha=$senha;
			
			//Inserção no banco de dados
			$valida=mysql_query("SELECT * FROM usuarios WHERE usuario='$usuario'");
			$contar=mysql_num_rows($valida);
			
				if($contar==0){
					$insert=mysql_query("INSERT INTO usuarios(nome, usuario, email, senha, nivel, status)VALUES('$nome','$usuario','$email','$senha',1,0)");
				}else{
					$msg="Desculpe, mas este usuário ou e-mail já existe em nosso sistema!";
				}
			
				if(isset($insert)){
					$msg="Cadastro realizado com sucesso, aguarde a nossa aprovação!";
				}else{
					if(empty($msg)){
						$msg="Ops! Houve um erro em nosso sistema, contate o administrador!";
					}
				}
			return $msg;
		}
	
		public function cadastrarcartao($idusuario,$bandeira,$numcartao,$titular){
			$valida=mysql_query("SELECT * FROM cartao WHERE idusuario='".$idusuario."' AND bandeira='".$bandeira."' AND numcartao='".$numcartao."' AND titular='".$titular."'");
			$contar=mysql_num_rows($valida);
			
				if($contar==0){
					$insert=mysql_query("INSERT INTO cartao(idusuario, bandeira, numcartao, titular)VALUES('$idusuario','$bandeira','$numcartao','$titular')");
				}else{
					$msg="Desculpe, mas este catão de crédito já existe em nosso sistema!";
				}
				
				if(isset($insert)){
					$msg="s-Cartão de crédito cadastrado com sucesso!";
				}else{
					if(empty($msg)){
						$msg="Ops! Houve um erro em nosso sistema, contate o administrador!";
					}
				}
			return $msg;
		}*/
	}
?>