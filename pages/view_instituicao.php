<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/favicon.ico">
	<title>Visualizar Instituição</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/dashboard.css" rel="stylesheet">
</head>
<?php
	require_once("../controller/instituicao.php");
	
	$id = $_GET['id'];
	$instituicao = findall($id);

?>
<body> 
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
				<h3 class="page-header">Visualizar Instituição</h3>
				<div class="col-md-4">
					<p><strong>Nome da Instituição</strong></p>
					<p><?php echo $instituicao["nm-instituicao"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>CNPJ</strong></p>
					<p><?php echo $instituicao["cd-cnpj"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>CEP</strong></p>
					<p><?php echo $instituicao["cd-cep"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Endereço</strong></p>
					<p><?php echo $instituicao["nm-endereco"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Número</strong></p>
					<p><?php echo $instituicao["cd-numero"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Complemento</strong></p>
					<p><?php echo $instituicao["nm-complemento"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Bairro</strong></p>
					<p><?php echo $instituicao["nm-bairro"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Cidade</strong></p>
					<p><?php echo $instituicao["nm-cidade"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>UF</strong></p>
					<p><?php echo $instituicao["nm-uf"]; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Tipo</strong></p>
					<p><?php echo $instituicao["nm-tipo"]; ?></p>
				</div>
				<hr/><hr/><hr/><hr/><hr/><hr/><hr/>
				<hr/><hr/><hr/><hr/><hr/><hr/><hr/>
				<div class="row">
					<div id="actions" class="row">
						<div class="col-md-12">
							<a href="../pages/edit_instituicao.php?id=<?php echo $instituicao["cd-instituicao"]; ?>" class="btn btn-primary">Editar</a>
							<a href="../pages/man_instituicao.php" class="btn btn-default">Fechar</a>
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