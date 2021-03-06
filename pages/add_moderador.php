<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/favicon.ico">
	<title>Adicionar Moderador</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/dashboard.css" rel="stylesheet">
	
</head>
<?php
	session_start();
	$_SESSION['action'] = '';
	require_once("../controller/moderador.php");
	
	$_SESSION['action'] = "add_moderador";
	
	$cd_protocolo = getLastProtocol();
	$cd_protocolo++;
	
				
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
	
	<div class="modal fade" id="moderador-cadastrado-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalLabel">Erro</h4>
				</div>
				<div class="modal-body">
					Moderador já cadastrado!
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
					<li class="active">
						<a href="add_moderador.php">Adicionar Moderador<span class="sr-only">(current)</span></a>
					</li>
					<li><a href="man_moderador.php">Manutenção de Moderador</a></li>
				</ul>
			</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h3 class="page-header">Adicionar Moderador</h3>
				<form  id="fornulario" method="post" action="../controller/moderador.php">
					<div class="row">
						<div class="form-group col-md-4">
							<label for="campo1">Nome do Moderador</label>
							<input type="text" class="form-control" name="nm-moderador" required>
						</div>
						<div class="form-group col-md-3">
							<label for="campo2">Data de Nascimento</label>
							<input type="date" class="form-control" id="dt-nascimento" name="dt-nascimento" required>
						</div>
						<div class="form-group col-md-2">
							<label for="campo2">Idade</label>
							<input type="text" class="form-control" id="idade" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
							<label for="campo3">Insituição</label>
							<input type="text" class="form-control" name="cd-instituicao" required>
						</div>
					</div>
					<div class="row">	
						<div class="form-group col-md-3">
							<label for="campo4">Função</label>
							<select name="nm-funcao" class="form-control" required>
								<option value="">-- Selecione --</option>
								<option value="Professor">Professor</option>
								<option value="Facilitador">Facilitador</option>
								<option value="Outra Função">Outra Função</option>
							</select>
						</div>
						
						<div class="form-group col-md-3">
							<label for="campo5">Email</label>
							<input type="email" class="form-control" name="email" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
							<label for="campo6">Período Moderação (Inicial)</label>
							<input type="date" class="form-control" id="dt-ini-periodo" name="dt-ini-periodo" required>
							
						</div>
						
						<div class="form-group col-md-3">
							<label for="campo7">Período Moderação (Final)</label>
							<input type="date" class="form-control" id="dt-fim-periodo" name="dt-fim-periodo" required>

						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
							<label for="campo8">Descrição da experiência</label>
							
							<textarea rows="4" cols="50" class="form-control" name="des-experiencia" required>
							</textarea>
						</div>
					</div>
					<div class="row">	
						<div class="form-group col-md-2">
							<label for="campo9">Protocolo</label>
							<input type="text" class="form-control" name="cd-protocolo" value="<?php echo $cd_protocolo; ?>" readonly>
						</div>					
					</div>
					<div id="actions" class="row">
						<div class="col-md-12">
							<button type="submit" id="btnSalvar" class="btn btn-primary">Salvar</button>
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
<script>
	$("#dt-nascimento").blur(function(){
		var dtNascimento = new Date($("#dt-nascimento").val());
		$("#idade").val(getIdade(dtNascimento) + " Ano(s)");
	});

	$("#btnSalvar").click(function(){
		var dtNascimento     = new Date($("#dt-nascimento").val());
		var dtPeriodoInicial = new Date($("#dt-ini-periodo").val());
		var dtPeriodoFinal   = new Date($("#dt-fim-periodo").val());
		
		if (!Is18(dtNascimento)){
			return;
		}			
		if (dtPeriodoInicial > dtPeriodoFinal){
			alert("Periodo Inicial deve ser MENOR que Periodo Final");
			return;
		}
		
		$("#fornulario").submit();
		
	});

	function Is18(dtNascimento) 
	{		
	  if (!(getIdade(dtNascimento) >= 18)){
		   alert("Moderador deve ter mais de 18 Anos");
		   return false;
	  }
	  
	  return true;
		  
	}
	
	function getIdade(nascimento) {
	    var hoje = new Date();
	  
		//Retorna a diferença entre hoje e a data de nascimento em anos.
		var ano = hoje.getFullYear() - nascimento.getFullYear();
	 
		//Retorna a diferença de mês do mês de nascimento para o atual.
		var m = hoje.getMonth() - nascimento.getMonth();

		//Caso ainda não tenha ultrapassado o dia e o mês
		if (m < 0 || (m === 0 && hoje.getDate() < nascimento.getDate())) {
			ano--;
		}
		return ano;
	}
</script>


<?php
	if (isset($_SESSION['type'])){
		if (trim(strcmp($_SESSION['type'],"success")) == 0){
			echo "<script type='text/javascript'>
					$(document).ready(function(){
						$('#sucess-modal').modal('show');
					});
				</script>";
		}
		else{
			echo "<script type='text/javascript'>
					$(document).ready(function(){
						$('#moderador-cadastrado-modal').modal('show');
					});
				</script>";
		}
	}
	
	unset($_SESSION['type']);
?>
</body>
</html>	