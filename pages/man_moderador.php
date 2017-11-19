<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/favicon.ico">
	<title>Manutenção de Moderadores</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/dashboard.css" rel="stylesheet">
</head>
<?php
	session_start();
	unset($_SESSION['action']);
	$_SESSION['action'] = 'findall';
	
	require_once("../controller/moderador.php");
	$moderadores = findall(0);
	
	//print_r($moderadores);
?>
<body> 
	<!-- Modal -->
	<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalLabel">Excluir Moderador</h4>
				</div>
				<div class="modal-body">Deseja realmente excluir este Moderador? </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">Sim</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
				</div>
			</div>
		</div>
	</div>
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
					<li><a href="add_instituicao.html">Adicionar Instituição</a></li>
					<li><a href="man_instituicao.html">Manutenção de Instituições</a></li>
					<li><a href="add_moderador.php">Adicionar Moderador</a></li>
					<li class="active">
						<a href="#">Manutenção de Moderador <span class="sr-only">(current)</span></a>
					</li>
				</ul>
			</div>
		</div>
		
		<div id="top" class="row">
			<div class="col-md-3">
				<h2>Moderador</h2>
			</div>
			<div class="col-md-6">
				<div class="input-group h2">
					<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Moderadores">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
			</div>
		 
			<div class="col-md-3">
				<a href="add_moderador.php" class="btn btn-primary pull-right h2">Novo Moderador</a>
			</div>
			
		</div> <!-- /#top -->
	 
		<hr />
		<div id="list" class="row">
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Nome Moderador</th>
							<th>Dt. Nascimento</th>
							<th>Email</th>
							<th>Função</th>
							<th class="actions">Ações</th>
						 </tr>
					</thead>
					<tbody>
					<?php if ($moderadores) { ?>		
					<?php foreach ($moderadores as $moderador) { ?>
						<tr>
							<td><?php echo $moderador['nm-moderador']; ?></td>				
							<td><?php echo $moderador['dt-nascimento']; ?></td>				
							<td><?php echo $moderador['email']; ?></td>
							<td><?php echo $moderador['nm-funcao']; ?></td>
							<td class="actions">
								<a class="btn btn-success btn-xs" href="view.html">Visualizar</a>
								<a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
								<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
							</td>
						</tr>
					<?php } ?>		
					<?php } ?>
					</tbody>
				 </table>
				</div>
			</div>
		</div> <!-- /#list -->
	 
		<div id="bottom" class="row">
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div class="col-md-12">
					 
					<ul class="pagination">
						<li class="disabled"><a>&lt; Anterior</a></li>
						<li class="disabled"><a>1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
					</ul><!-- /.pagination -->
				</div>
			</div>
		</div> <!-- /#bottom -->
	</div>
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/functions.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>