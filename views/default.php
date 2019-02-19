<?php
	include("views/generico.php");

		if($acao=="noticias"){
			$Edicao = new Edicao($con, "noticias"); //Parametros: tabela
			$Edicao->noticias($acao); //Parametros: ação

		}elseif($acao=="historia"){
			$Edicao = new Edicao($con,"historia"); //Parametros: tabela
			$Edicao->historia("historia");
			
		}elseif($_SESSION["noticDetail"]=="notic-detail"){
			$Edicao = new Edicao($con, "noticias"); //Parametros: tabela
			$Edicao->noticiaDetalhe($acao); //Parametros: ação*/
		}
		
	include("views/footer.php"); 
?>