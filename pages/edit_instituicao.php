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
	
	$id_instituicao = $_GET["id"];
	require_once("../controller/instituicao.php");
	$instituicao = findall($id_instituicao);
	
				
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
					Registro atualizado com sucesso
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
					<li><a href="add_instituicao.php">Adicionar Instituição</a></li>
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
							<input type="text" class="form-control" name="nm-instituicao" value="<?php echo $instituicao['nm-instituicao'];?>">
						</div>
						<div class="form-group col-md-4">
							<label for="campo2">CNPJ</label>
							<input type="text" class="form-control" name="cd-cnpj" value="<?php echo $instituicao['cd-cnpj'];?>">
						</div>
					 
						<div class="form-group col-md-4">
							<label for="campo3">CEP</label>
							<input type="text" class="form-control" name="cd-cep" value="<?php echo $instituicao['cd-cep'];?>">
						</div>
						
						<div class="form-group col-md-4">
							<label for="campo4">Endereço</label>
							<input type="text" class="form-control" name="nm-endereco" value="<?php echo $instituicao['nm-endereco'];?>">
						</div>
						
						<div class="form-group col-md-4">
							<label for="campo5">Número</label>
							<input type="text" class="form-control" name="cd-numero" value="<?php echo $instituicao['cd-numero'];?>">
						</div>
						
						<div class="form-group col-md-4">
							<label for="campo6">Complemento</label>
							<input type="text" class="form-control" name="nm-complemento" value="<?php echo $instituicao['nm-complemento'];?>">
						</div>
						
						<div class="form-group col-md-4">
							<label for="campo7">Bairro</label>
							<input type="text" class="form-control" name="nm-bairro" value="<?php echo $instituicao['nm-bairro'];?>">
						</div>
						
						<div class="form-group col-md-4">
							<label for="campo8">UF</label>
							<select name="nm-uf" class="form-control">
								<?php $uf = $instituicao['nm-uf']; ?>
								<option value="">-- Selecione --</option>
								<option value="Acre"     <?php if ($uf === "Acre") echo "selected"; ?>>
									Acre
								</option>
								<option value="Alagoas"  <?php if ($uf === "Alagoas") echo "selected"; ?>>
									Alagoas
								</option>
								<option value="Amapá"    <?php if ($uf === "Amapá") echo "selected"; ?>>
									Amapá
								</option>
								<option value="Amazonas" <?php if ($uf === "Amazonas") echo "selected"; ?>>
									Amazonas
								</option>
								<option value="Bahia"	 <?php if ($uf === "Bahia") echo "selected"; ?>>
									Bahia
								</option>
								<option value="Ceará"	 <?php if ($uf === "Ceará") echo "selected"; ?>>
									Ceará
								</option>
								<option value="Distrito Federal" <?php if ($uf === "Distrito Federal") echo "selected"; ?>>
									Distrito Federal
								</option>
								<option value="Espírito Santo" <?php if ($uf === "Espírito Santo") echo "selected"; ?>>
									Espírito Santo
								</option>
								<option value="Goiás" <?php if ($uf === "Goiás") echo "selected"; ?>>
									Goiás
								</option>
								<option value="Maranhão" <?php if ($uf === "Maranhão") echo "selected"; ?>>
									Maranhão
								</option>
								<option value="Mato Grosso" <?php if ($uf === "Mato Grosso") echo "selected"; ?>>
									Mato Grosso
								</option>
								<option value="Mato Grosso do Sul" <?php if ($uf === "Mato Grosso do Sul") echo "selected"; ?>>
									Mato Grosso do Sul
								</option>
								<option value="Minas Gerais" <?php if ($uf === "Minas Gerais") echo "selected"; ?>>
									Minas Gerais
								</option>
								<option value="Pará" <?php if ($uf === "Pará") echo "selected"; ?>>
									Pará
								</option>
								<option value="Paraíba" <?php if ($uf === "Paraíba") echo "selected"; ?>>
									Paraíba
								</option>
								<option value="Paraná" <?php if ($uf === "Paraná") echo "selected"; ?>>
									Paraná
								</option>
								<option value="Pernambuco" <?php if ($uf === "Pernambuco") echo "selected"; ?>>
									Pernambuco
								</option>
								<option value="Piauí" <?php if ($uf === "Piauí") echo "selected"; ?>>
									Piauí
								</option>
								<option value="Rio de Janeiro" <?php if ($uf === "Rio de Janeiro") echo "selected"; ?>>
									Rio de Janeiro
								</option>
								<option value="Rio Grande do Norte" <?php if ($uf === "Rio Grande do Norte") echo "selected"; ?>>
									Rio Grande do Norte
								</option>
								<option value="Rio Grande do Sul" <?php if ($uf === "Rio Grande do Sul") echo "selected"; ?>>
									Rio Grande do Sul
								</option>
								<option value="Rondônia" <?php if ($uf === "Rondônia") echo "selected"; ?>>
									Rondônia
								</option>
								<option value="Rorâima" <?php if ($uf === "Rorâima") echo "selected"; ?>>
									Rorâima
								</option>
								<option value="Santa Catarina" <?php if ($uf === "Santa Catarina") echo "selected"; ?>>
									Santa Catarina
								</option>
								<option value="São Paulo" <?php if ($uf === "São Paulo") echo "selected"; ?>>
									São Paulo
								</option>
								<option value="Sergipe" <?php if ($uf === "Sergipe") echo "selected"; ?>>
									Sergipe
								</option>
								<option value="Tocantins" <?php if ($uf === "Tocantins") echo "selected"; ?>>
									Tocantins
								</option>
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