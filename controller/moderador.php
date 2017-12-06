<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	require_once("config.php");
	require_once("database.php");
	
	switch($_SESSION['action']){
		case "add_moderador":
			add();
			break;
		case "edit_moderador":
			edit();
			break;
		default:
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

		$moderador = $_POST['cd-moderador'];
		try {
			$nome 	      = $_POST['nm-moderador'];
			$nascimento   = $_POST['dt-nascimento'];
			$funcao	      = $_POST['nm-funcao'];
			$email 	      = $_POST['email'];
			$ini_periodo  = $_POST['dt-ini-periodo'];
			$fim_periodo  = $_POST['dt-fim-periodo'];
			$experiencia  = $_POST['des-experiencia'];			
			
			$sql = "UPDATE `moderador` SET `nm-moderador`='$nome',`dt-nascimento`='$nascimento',`nm-funcao`='$funcao',`email`='$email',`dt-ini-periodo`='$ini_periodo',`dt-fim-periodo`='$fim_periodo',`des-experiencia`='$experiencia' WHERE `cd-moderador` = ".$moderador;
			
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
		
		header('location: ../pages/edit_moderador.php?id='.$moderador);
		
	}
	
	function delete(){
		$database = open_database();
		$found = null;

		$record = $_POST['moderador'];
		try {
			if ($record) {
				$sql = "DELETE FROM MODERADOR WHERE `cd-moderador` = ".$record;
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
			if ($id) {
				$sql = "SELECT * FROM MODERADOR WHERE `cd-moderador` = " . $id;
				$result = $database->query($sql);
	    
				if ($result->num_rows > 0) {
					$found = $result->fetch_assoc();
				}
			}else{
					$sql = "SELECT * FROM MODERADOR";
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
		
		$valida = "SELECT * FROM `moderador` WHERE `nm-moderador` = '".$_POST['nm-moderador']."'";
		$result = $database->query($valida);
		
		if ($result->num_rows > 0) {
			$_SESSION['message'] = 'Moderador já cadastrado';
			$_SESSION['type'] 	 = 'danger';
		}else{		
			$sql = "INSERT INTO moderador(`nm-moderador`, `dt-nascimento`,`cd-instituicao`,`nm-funcao`,`email`,`dt-ini-periodo`,`dt-fim-periodo`,`des-experiencia`) ";
			$sql.= "VALUES ('".$_POST['nm-moderador']."','".$_POST['dt-nascimento']."','".$_POST['cd-instituicao']."','".$_POST['nm-funcao']."','".$_POST['email']."','".$_POST['dt-ini-periodo']."','".$_POST['dt-fim-periodo']."','".$_POST['des-experiencia']."')";
			
			try {
				$database->query($sql);

				$_SESSION['message'] = 'Registro cadastrado com sucesso.';
				$_SESSION['type'] = 'success';
	  
			} catch (Exception $e) {
				$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
				$_SESSION['error']   = $database->error;
				$_SESSION['type'] = 'danger';
			} 
		}

		close_database($database);
		
		header('location: ../pages/add_moderador.php');
	}
	
	function getLastProtocol(){
		$database = open_database();
		$sql = "SELECT `cd-protocolo` from moderador order by `cd-protocolo` desc";
		
		try {
			$result = $database->query($sql);

			if ($result) {
				$found = $result->fetch_assoc();
				return intval($found['cd-protocolo']);
			}
  
		} catch (Exception $e) {
			return 0;
		} 

		close_database($database);
		
	}
	

?>