<?php
	class Edicao{
		public $buscar;
		public $total;
		public $tabela;
		public $acao;
	
		function __construct($conexao, $tabela){

			switch($tabela){
				case "historia":
					$buscar = $conexao->prepare('SELECT * FROM ' . $tabela . ' WHERE hist_ativo = 1');
					$buscar->execute();
					$total= $buscar->rowCount();
					break;

				case "noticias":
					$buscar = $conexao->prepare('SELECT * FROM ' . $tabela . ' WHERE notic_ativo = 1');
					$buscar->execute();
					$total= $buscar->rowCount();
					break;
			}

			$this->buscar = $buscar;
			$this->total = $total;
		}//fim construtor
		
		function __destruct(){
			//Definir
		}//fim destrutor
	
		function historia(){
			if($this->total > 0){
				$linha = $this->buscar->fetch(PDO::FETCH_OBJ);
				//$linha=mysql_fetch_array($this->buscar);
					if($linha->hist_ativo==1){

						$src_img = str_replace($linha->hist_src_img, '/', '\\');

						echo'<div class="content-all">
								<div class="content-event">
										<div class="event-detail">
											<img src='.$src_img.' class="event-img">
											<h1 class="event-title">'.$linha->hist_titulo.'<h1><br>
											<div class="event-descrip">'.nl2br($linha->hist_texto).'<br><br></div>
											<div class="event-prev"><a href="index.php?acao=voltar" method="post">&laquo; Voltar</a></div>
										</div>
								</div>
							</div> <!--content-all-->';
					}
			}
		}//fim historia
		
		function noticias($acao){
			if($this->total > 0){
				If($acao == "noticias"){
					$ladoDiv="left"; //Primeira div sempre ao lado esquerdo
					//Inicio da div
					echo '<div class="content-all">
							<!-- Página dinâmica de Noticias -->
							<div class="content-main">
									<div class="content-noticias">
										<h1 class="title">Notícias</h1>';
					
					$PosicaoNoticia = 0;
					//$arrIds=array();
					
						while($linha = $this->buscar->fetch(PDO::FETCH_OBJ)){
						//while($linha=mysql_fetch_array($this->buscar)){
							if($linha->notic_ativo==1){ //Verifica se esta ativo
								switch($ladoDiv){
									case "left";
										$PosicaoNoticia++; //Cria posição da noticia no array
										echo '<div class="noticias-left"><a href="index.php?acao=notic-detail'.$PosicaoNoticia.'" method="post"><div class="noticias-link"><p>'.$linha->notic_titulo.'</p></div><br><img src='.$linha->notic_src_img.' class="events-img"><p>'.substr($linha->notic_texto,0,300).'...<div class="leiamais">Leia mais</div></p></a></div>';
										$ladoDiv="right";
										$arrIds["Notic".$PosicaoNoticia] = $linha->notic_id; //Armazena posicão da noticia dentro do array
										break;
										
									case "right";
										$PosicaoNoticia++;
										echo '<div class="noticias-right"><a href="index.php?acao=notic-detail'.$PosicaoNoticia.'" method="post"><div class="noticias-link"><p>'.$linha->notic_titulo.'</p></div><br><img src='.$linha->notic_src_img.' class="events-img"><p>'.substr($linha->notic_texto,0,300).'...<div class="leiamais">Leia mais</div></p></a></div>';
										$ladoDiv="left";
										$arrIds["Notic".$PosicaoNoticia] = $linha->notic_id; //Armazena ID da notícia
										break;
										
								}//Fim swith
							}
						}//Fim While
					
					//Fim div inicio
					echo 			'</div>
							</div>
						</div> <!--content-all-->';
						
					$_SESSION['notic_id'] = $arrIds; //Super global recebe lista com IDs			

				} //Fim if
			} //Fim If total
		}//Fim noticias
		
		function noticiaDetalhe($acao){
			echo '<div class="content-all">';
										
			$idAcionado = trim(str_replace("notic-detail","",$acao));
			$arr=$_SESSION['notic_id'];

				while($linha = $this->buscar->fetch(PDO::FETCH_OBJ)){
				//while($linha=mysql_fetch_array($this->buscar)){
					if($arr["Notic".$idAcionado]==$linha->notic_id){
						echo '<div class="content-event">
									<div class="event-detail">
										<img src='.$linha->notic_src_img.' class="event-img">
										<h1 class="event-title">'.$linha->notic_titulo.'<h1><br>
										<div class="event-descrip">'.nl2br($linha->notic_texto).'<br><br></div>
										<div class="event-prev"><a href="index.php?acao=voltar" method="post">&laquo; Voltar</a></div>
									</div>
								</div>
							</div> <!--content-all-->';
						break;
					}
				}
		}
		
	}//Fim Classe

?>