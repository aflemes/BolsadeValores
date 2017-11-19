<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/favicon.ico">
	<title>Adicionar Instituição</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/dashboard.css" rel="stylesheet">
	
</head>
<?php
	session_start();
	
	$_SESSION['action'] = "add_instituicao";
				
?>
<body> 
	<!-- Modal -->
	<div class="modal fade" id="sucess-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalLabel">Sucesso</h4>
				</div>
				<div class="modal-body">
					Registro incluído com sucesso
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
				</div>
			</div>
		</div>
	</div> <!-- /.modal -->
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
					<li class="active">
						<a href="#">Adicionar Instituição <span class="sr-only">(current)</span></a>
					</li>
					<li><a href="man_instituicao.php">Manutenção de Instituições</a></li>
					<li><a href="add_moderador.php">Adicionar Moderador</a></li>
					<li><a href="man_moderador.php">Manutenção de Moderador</a></li>
				</ul>
			</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h3 class="page-header">Adicionar uma Instituição</h3>
				<form method="post" action="../controller/instituicao.php">
					<div class="row">
						<div class="form-group col-md-4">
							<label for="campo1">Nome da Instituição</label>
							<input type="text" class="form-control" name="nm-instituicao">
						</div>
						<div class="form-group col-md-4">
							<label for="campo2">CNPJ</label>
							<input type="text" class="form-control" name="cd-cnpj">
						</div>
					 
						<div class="form-group col-md-4">
							<label for="campo3">CEP</label>
							<input type="text" class="form-control" name="cd-cep">
						</div>
						
						<div class="form-group col-md-4">
							<label for="campo4">Endereço</label>
							<input type="text" class="form-control" name="nm-endereco">
						</div>
						
						<div class="form-group col-md-4">
							<label for="campo5">Número</label>
							<input type="text" class="form-control" name="cd-numero">
						</div>
						
						<div class="form-group col-md-4">
							<label for="campo6">Complemento</label>
							<input type="text" class="form-control" name="nm-complemento">
						</div>
						
						<div class="form-group col-md-4">
							<label for="campo7">Bairro</label>
							<input type="text" class="form-control" name="nm-bairro">
						</div>
						
						<div class="form-group col-md-4">
							<label for="campo8">UF</label>
							<select name="nm-uf" class="form-control">
								<option value="">-- Selecione --</option>
								<option value="Acre">Acre</option>
								<option value="Alagoas">Alagoas</option>
								<option value="Amapá">Amapá</option>
								<option value="Amazonas">Amazonas</option>
								<option value="Bahia">Bahia</option>
								<option value="Ceará">Ceará</option>
								<option value="Distrito Federal">Distrito Federal</option>
								<option value="Espírito Santo">Espírito Santo</option>
								<option value="Goiás">Goiás</option>
								<option value="Maranhão">Maranhão</option>
								<option value="Mato Grosso">Mato Grosso</option>
								<option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
								<option value="Minas Gerais">Minas Gerais</option>
								<option value="Pará">Pará</option>
								<option value="Paraíba">Paraíba</option>
								<option value="Paraná">Paraná</option>
								<option value="Pernambuco">Pernambuco</option>
								<option value="Piauí">Piauí</option>
								<option value="Rio de Janeiro">Rio de Janeiro</option>
								<option value="Rio Grande do Norte">Rio Grande do Norte</option>
								<option value="Rio Grande do Sul">Rio Grande do Sul</option>
								<option value="Rondônia">Rondônia</option>
								<option value="Rorâima">Rorâima</option>
								<option value="Santa Catarina">Santa Catarina</option>
								<option value="São Paulo">São Paulo</option>
								<option value="Sergipe">Sergipe</option>
								<option value="Tocantins">Tocantins</option>
							</select>
						</div>
						
						<div class="form-group col-md-4">
							<label for="campo9">Tipo</label>
							<select name="nm-tipo" class="form-control">
								<option value="">-- Selecione --</option>
								<option value="Universidade">Universidade</option>
								<option value="Aceleradora">Aceleradora</option>
								<option value="Extensão">Extensão</option>
								<option value="SEBRAE">SEBRAE</option>
								
							</select>
						</div>
					</div>
					<div id="actions" class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Salvar</button>
							<a href="index.html" class="btn btn-default">Cancelar</a>
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/functions.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php
	if (isset($_SESSION['type'])){
		if (trim(strcmp($_SESSION['type'],"success")) == 0){
			echo "<script type='text/javascript'>
					$(document).ready(function(){
						$('#sucess-modal').modal('show');
					});
				</script>";
		}
	}
	
	unset($_SESSION['type']);
?>
</body>
</html>	