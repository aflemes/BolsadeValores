<?php
	require_once('database.php');
	require_once(DBAPI);
	
	$customers = null;
	$customer = null;

	/**
	 *  Listagem de Clientes
	 */
	function index() {
		global $customers;
		$customers = find_all('customers');
	}


?>