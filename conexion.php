<?php

	//localhost
	//$host= 'localhost';
	//$db="desa";
	//$user='root';
	//$pass='';
	//$charset= 'utf8mb4';
	//remotehost
	$host= 'remotemysql.com';
	$db="tLhpxUt2uu";
	$user='tLhpxUt2uu';
	$pass='CaL5EXZTw6';
	$charset= 'utf8mb4';
	



$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {	
	$con=new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
	echo "Error".$e->getMessage();
}

?>