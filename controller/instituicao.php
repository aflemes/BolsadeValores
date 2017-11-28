<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	require_once("config.php");
	require_once("database.php");
	
	switch($_SESSION['action']){
		case "add_instituicao":
			add();
			break;
		case "edit_instituicao":
			edit();
			break;
	}
	if (isset($_POST['action'])){
		switch($_POST['action']){
			case "delete":
				delete();
				break;
		}
	}
	
	function edit(){
		$database = open_database();
		$found = null;
		
		$_SESSION['action'] = "";

		$instituicao = $_POST['cd-instituicao'];
		try {
			$nome = $_POST['nm-instituicao'];
			$cnpj = $_POST['cd-cnpj'];
			$cep  = $_POST['cd-cep'];
			$endereco = $_POST['nm-endereco'];
			$numero = $_POST['cd-numero'];
			$compl  = $_POST['nm-complemento'];
			$bairro  = $_POST['nm-bairro'];
			//$cidade  = $_POST['nm-bairro'];
			$uf  	 = $_POST['nm-uf'];
			$tipo    = $_POST['nm-tipo'];
			
			$sql = "UPDATE `instituicao` SET `nm-instituicao`='$nome',`cd-cnpj`='$cnpj',`cd-cep`='$cep ',`nm-endereco`='$endereco',`cd-numero`=".$numero.",`nm-complemento`='$compl',`nm-bairro`='$bairro',`nm-uf`='$uf',`nm-tipo`='$tipo' WHERE `cd-instituicao` = ".$instituicao;
			$result = $database->query($sql);
	
			if ($result) {
				$_SESSION['type'] = 'success';
			}
			else 
				$_SESSION['type'] = 'failure';				
			
		} catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
		}
	
		close_database($database);
		
		header('location: ../pages/edit_instituicao.php?id='.$instituicao);
		
	}
	
	
	function delete(){
		$database = open_database();
		$found = null;

		$record = $_POST['instituicao'];
		try {
			if ($record) {
				$sql = "DELETE FROM instituicao WHERE `cd-instituicao` = ".$record;
				$result = $database->query($sql);
	    
				if ($result) {
					$_SESSION['type'] = 'success';
				}
				else 
					$_SESSION['type'] = 'failure';				
			}
		} catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
		}
	
		close_database($database);
		echo $_SESSION['type'];
	}
	
	function findall($id){
		$database = open_database();
		$found = null;

		try {
			if ($id > 0) {
				$sql = "SELECT * FROM instituicao WHERE `cd-instituicao` = " . $id;
				
				$result = $database->query($sql);
	    
				if ($result) {
					$found = $result->fetch_assoc();
				}
			}else{
					$sql = "SELECT * FROM instituicao";
					$result = $database->query($sql);
	    
					if ($result->num_rows > 0) {
						$found = $result->fetch_all(MYSQLI_ASSOC);
					}
			}
			} catch (Exception $e) {
				$_SESSION['message'] = $e->GetMessage();
				$_SESSION['type'] = 'danger';
			}
	
			close_database($database);
			return $found;
	}
	
	function add(){
		$database = open_database();
		
		$sql = "INSERT INTO instituicao(`nm-instituicao`, `cd-cnpj`,`cd-cep`,`nm-endereco`,`cd-numero`,`nm-complemento`,`nm-bairro`,`nm-cidade`,`nm-uf`,`nm-tipo`) ";
		$sql.= "VALUES ('".$_POST['nm-instituicao']."','".$_POST['cd-cnpj']."','".$_POST['cd-cep']."','".$_POST['nm-endereco']."','".$_POST['cd-numero']."','".$_POST['nm-complemento']."','".$_POST['nm-bairro']."','".$_POST['nm-cidade']."','".$_POST['nm-uf']."','".$_POST['nm-tipo']."')";
		
		echo $sql."<br>";

		try {
			$database->query($sql);

			$_SESSION['message'] = 'Registro cadastrado com sucesso.';
			$_SESSION['type'] = 'success';
  
		} catch (Exception $e) {
			$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
			$_SESSION['error']   = $database->error;
			$_SESSION['type'] = 'danger';
		} 
		close_database($database);
		
		header('location: ../pages/add_instituicao.php');
	}

?>