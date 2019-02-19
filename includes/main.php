<?php
	//Starts
	ob_start();
	session_start();
	
	include("includes/globais.php");
	include("classes/DB.class.php");
	include("classes/Edicao.class.php");
	include("classes/Adm.class.php");
	
	//Conexão com banco de dados
	$conectar=new DB;
	$con = $conectar->conectar();
		
	//Verifica será realizada ação de abrir detalhes
	$_SESSION["noticDetail"] = substr($acao,0,12);
	
	
		if($acao=="" && $startaction==""){
			include("views/home.php");
			
		}elseif($acao=="adm" && $startaction==1){
			//Abrir sessao
			$sessao = new Adm;
			$sessao->abrirSessao();
			$_SESSION["adm-msg"] = "";
			
			include("views/adm.php");
			
		}elseif($acao=="adm-logout" && $startaction==1){
			$sessao = new Adm;
			$sessao->apagarSessoes();
			include("views/home.php");
			
		}elseif($acao=="cadastrar" && $startaction==1){
			$sessao = new Adm;
			$sessao->cadastrar($con);
			//View Adm
			include("views/adm.php");

		}elseif($acao=="voltar" && $startaction==1){
			include("views/home.php");
			
		}elseif($acao=="home" && $startaction==1){
			include("views/home.php");
			
		}elseif($acao=="photo" && $startaction==1){
			include("views/photo.php");
			
		}elseif(($acao=="noticias" || $_SESSION["noticDetail"]=="notic-detail" || $acao=="historia") && $startaction==1){ //página detalhada
			include("views/default.php");
		}
?>