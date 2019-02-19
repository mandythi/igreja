<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Administração<?php $title ?></title>
		<meta name="description" content="Description of your site goes here">
		<meta name="keywords" content="keyword1, keyword2, keyword3">
		<link href="css/adm.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="js/scripts_alerts.js"></script>
		
	</head>
	
	<!-- <body onload="Alertas('<?php echo $_SESSION["adm-msg"]; ?>')"> -->
	<body>
		<div class="page">
			<div class="main">
				<div class="header">
					<div class="header-top">
						<h1>Company <span>Name</span></h1>
						<div class="adm-logout"><a href="index.php?acao=adm-logout" method="post">Sair</a></div>
					</div>
				</div>
				
				<div class="content-all">
					<form method="post" action="index.php?acao=cadastrar">
						<!-- Seleção de Ação -->
						<div class="adm-selecao">
							<h1 class="title">Administração</h1>
							<div class="adm-form-selecao">
									<div class="adm-rotulo">Selecione o Módulo</div>
									<select name="adm-caixa-selecao">
										<option value="historia">História</option>
										<option value="noticias">Notícias</option>
									</select>
							</div>
							
							<!-- Inserir título de notícia -->
							<div class="adm-titulo-noticia">
								<div class="adm-rotulo">Título</div>
								<input type="text" maxlength=255 name="adm-titulo" />
							</div>
							
							<!-- Imagem -->
							<div class="adm-src">
								<div class="adm-rotulo">Imagem</div>
								<form method="post" action="index.php?acao=src_img">
									<div class="adm-src-img"><input type="text" maxlength=255 name="adm-src" /></div>
									<div class="adm-bot-src-img"><input type="submit" value="..." title="Selecione uma imagem" /></div>
								</form>
							</div>
							
							<!-- Notícia Ativa/Inativa -->
							<div class="adm-ativo">
								<div class="adm-rotulo">Ativo ou Inativo?</div>
									<div class="adm-radio1"><input type="radio" name="adm-radio" value=1 checked> Ativo</div>
									<div class="adm-radio2"><input type="radio" name="adm-radio" value=2> Inativo</div>
							</div>
							
							<!-- Área de texto da notícia -->
							<div class="adm-textarea">
								<div class="adm-rotulo">Insira o conteúdo</div>
									<textarea name=adm-texto></textarea>
							</div>
		
							<div class="adm-botao"><input type="submit" value="Inserir Notícia" /></div>
						</form>
					</div>
					
				</div> <!--content-all-->

<?php include("views/footer.php"); ?>