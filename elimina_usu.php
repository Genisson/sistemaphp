<?php



	$id = $_GET['id'];
	$mysqli = new mysqli("localhost", "root", "", "bdpessoa");		
	$sql = $mysqli->query("delete from tbusuario where id='$id'");	
	echo "eliminado";
	echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=cadastro.php'>";
	
?>
     <SCRIPT LANGUAGE="javascript"> 
         alert("Contato Eliminado"); 
     </SCRIPT> 

	 
	 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=cadastro.php">