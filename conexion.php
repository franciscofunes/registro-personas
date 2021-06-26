<?php
	//localhost
	$host= 'localhost';
	$db="desa";
	$user='root';
	$pass='';
	$charset= 'utf8mb4';





	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

	try {	
		$con=new PDO($dsn, $user, $pass);
	} catch (PDOException $e) {
		echo "Error".$e->getMessage();
	}

?>