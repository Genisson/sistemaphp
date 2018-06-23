<?php



	$mysqli = new mysqli("localhost", "root", "", "bdpessoa");	
	     
		$id = $_POST['id']; 
        $login = $_POST['login'];
		$pass = $_POST['pass'];
		$nome = $_POST['nome'];
		$perfil = $_POST['perfil'];
		$ativo = $_POST['ativo'];

	$sql = $mysqli->query("update tbusuario set login='$login',pass='$pass', nome='$nome', perfil='$perfil', ativo='$ativo' where id=$id");
?>	

     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=cadastro.php">	 
     
