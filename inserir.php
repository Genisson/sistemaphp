	<?php
	

			$mysqli = new mysqli("localhost", "root", "", "bdpessoa");	
			$nome = $_GET['nome'];
			$idade = $_GET['idade'];
			$end = $_GET['endereco'];						
			$sql = $mysqli->query("insert into tbcontatos (nome, idade, endereco) values ('$nome', $idade, '$end') ");			
			
	?>	

		    <SCRIPT LANGUAGE="javascript"> 
            alert("Contato Registrado"); 
            </SCRIPT> 
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=listar.php">
