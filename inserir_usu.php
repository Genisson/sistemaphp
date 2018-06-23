	<?php
	

			$mysqli = new mysqli("localhost", "root", "", "bdpessoa");	
			$login = $_GET['login'];
			$senha = $_GET['pass'];
			$nome = $_GET['nome'];
			$perfil = $_GET['perfil'];
			$ativo = $_GET['ativo'];
           			
			$sql = $mysqli->query("insert into tbusuario (login, pass, nome , perfil , ativo) values ('$login', '$senha', '$nome' , '$perfil', '$ativo') ");			
			
	?>	

		    
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=cadastro.php">
