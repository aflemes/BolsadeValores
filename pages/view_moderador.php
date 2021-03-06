<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/favicon.ico">
	<title>Visualizar Moderador</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/dashboard.css" rel="stylesheet">
</head>
<?php
	require_once("../controller/moderador.php");
	
	$id = $_GET['id'];
	$moderador = findall($id);

?>
<body> 
	<!-- /.modal -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Bolsa de Valores</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Início</a></li>
					<li><a href="#">Opções</a></li>
					<li><a href="#">Perfil</a></li>
					<li><a href="#">Ajuda</a></li>
					<li><a href="#" id="liSair">Sair</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div id="main" class="container-fluid">
		<br>
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
					<li><a href="add_instituicao.php">Adicionar Instituição</a></li>
					<li><a href="man_instituicao.php">Manutenção de Instituições</a></li>
					<li><a href="add_moderador.php">Adicionar Moderador</a></li>
					<li><a href="man_moderador.php">Manutenção de Moderador</a></li>
				</ul>
			</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h3 class="page-header">Visualizar Moderador</h3>
				<div class="col-md-4">
					<p><strong>Nome do Moderador</strong></p>
					<p><?php echo $moderador["nm-moderador"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Data de Nascimento</strong></p>
					<p><?php echo $moderador["dt-nascimento"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Função</strong></p>
					<p><?php echo $moderador["nm-funcao"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Email</strong></p>
					<p><?php echo $moderador["email"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Dt. Início do Período</strong></p>
					<p><?php echo $moderador["dt-ini-periodo"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Dt. Fim do Período</strong></p>
					<p><?php echo $moderador["dt-fim-periodo"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Descrição Experiência</strong></p>
					<p><?php echo $moderador["des-experiencia"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Protocolo</strong></p>
					<p><?php echo $moderador["cd-protocolo"]; ?></p>
				</div>
				<br/><br/><br/><br/>
				<br/><br/><br/><br/>
				<div class="row">
					<div id="actions" class="row">
						<div class="col-md-12">
							<a href="../pages/edit_moderador.php?id=<?php echo $moderador["cd-moderador"]; ?>" class="btn btn-primary">Editar</a>
							<a href="../pages/man_moderador.php" class="btn btn-default">Fechar</a>
						</div>			
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/functions.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>