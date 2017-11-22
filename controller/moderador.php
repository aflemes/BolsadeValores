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
		
		$sql = "INSERT INTO moderador(`nm-moderador`, `dt-nascimento`,`cd-instituicao`,`nm-funcao`,`email`,`dt-ini-periodo`,`dt-fim-periodo`,`des-experiencia`) ";
		$sql.= "VALUES ('".$_POST['nm-moderador']."','".$_POST['dt-nascimento']."','".$_POST['cd-instituicao']."','".$_POST['nm-funcao']."','".$_POST['email']."','".$_POST['dt-ini-periodo']."','".$_POST['dt-fim-periodo']."','".$_POST['des-experiencia']."')";
		
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
		
		header('location: ../pages/add_moderador.php');
	}
	

?>