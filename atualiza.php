<?php

session_start();

	$mysqli = new mysqli("localhost", "root", "", "bdpessoa");	
	
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$idade =  $_POST['idade'];
	$end =  $_POST['endereco'];	

	$sql = $mysqli->query("update tbcontatos set nome='$nome', idade=$idade, endereco='$end' where id=$id");
?>	

	 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=listar.php">


