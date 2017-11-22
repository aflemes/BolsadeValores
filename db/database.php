<?php
	function open_database(){
		$servername = "localhost";
		$username = "username";
		$password = "password";

		// Create connection
		$conn = new mysqli($servername, $username, $password);
		
		return $conn;
	}
?>	